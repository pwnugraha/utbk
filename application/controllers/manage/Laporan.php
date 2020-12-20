<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Laporan extends AdminBase
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "Laporan";
    }

    public function index()
    {
        $this->data['item'] = $this->base_model->get_join_item('result', 'orders.*, users.first_name', NULL, ['orders'], ['users'], ['orders.user_id = users.id'], ['inner']);
        $this->data['exam'] = $this->base_model->get_item('result', 'exam', 'month, COUNT(month) as total', ['tka' => 1, 'tps' => 1], 'month');

        foreach ($this->data['exam'] as $key => $i) {
            $score_null = $this->base_model->count_result_item('exam', ['tka' => 1, 'tps' => 1, 'score' => NULL]);
            if ($score_null > 0) {
                $this->data['exam'][$key]['proses'] = $score_null . ' nilai tryout belum diproses';
            }
        }
        $this->adminview('admin/laporan/laporan', $this->data);
    }

    public function order_update($id = NULL)
    {
        $this->data['post'] = $this->base_model->get_item('row', 'orders', '*', ['id' => $id]);
        if (!$this->data['post']) {
            show_404();
        }
        $this->base_model->update_item('orders', ['status' => 1], array('id' => $id));
        redirect('manage/laporan');
    }

    public function define_exam_score($month)
    {
        if(!$this->base_model->get_item('result', 'exam', '*', ['month' => $month])){
            show_404();
        }
        $start_time = microtime(true);
        ini_set("memory_limit", "-1");
        set_time_limit(0);

        $this->load->model('base_model');
        $exam_data = [];
        $mapel = $this->base_model->get_item('result', 'kategori_soal', '*');
        $exam = $this->base_model->get_join_item('result', 'user_exam.*, exam.user_id', NULL, ['user_exam'], ['exam'], ['exam.id = user_exam.exam_id'], ['inner'], ['month' => $month, 'tka' => 1, 'tps' => 1]);
        $v = 0;
        foreach ($exam as $i) {
            $exam_data[$i['kategori_soal_id']]['score_data'][] = [
                'soal' => $i['soal_id'],
                'user' => $i['user_id'],
                'score' => $i['score']
            ];
            $v++;
        }

        $x = 0;
        foreach ($exam_data as $key => $i) {
            $exam_data[$key]['score_processed'] = $this->_define_score($i['score_data']);
            $x++;
        }

        $execution_time = (microtime(true) - $start_time);
        $this->session->set_flashdata('message_sa', 'Nilai Tryout berhasil diproses.');
        redirect('manage/laporan');
    }

    public function _define_score($exam_data)
    {
        if (empty($exam_data)) {
            show_404();
        }
        $nilai = [];
        $users_score = [];
        $nilai_mentah = [];
        //arrange score/soal
        foreach ($exam_data as $i) {
            $nilai[$i['soal']]['users'][$i['user']] = $i['score'];
        }

        //process start
        foreach ($nilai as $key => $i) {
            $true_on_answer = 0; //sum answer
            $users = 0; //count users

            foreach ($i['users'] as $ukey => $v) {
                //sum on true answer based on soal
                $nilai[$key]['true_answer'] = $true_on_answer += $v;
                $users++;

                //sum answer based on users (ukey is user_id)
                $users_score[$ukey]['answer'] = !isset($users_score[$ukey]['answer']) ? ((!is_null($v)) ? 1 : 0) : (($v >= 0 && !is_null($v)) ? $users_score[$ukey]['answer'] += 1 : $users_score[$ukey]['answer'] += 0);
                $users_score[$ukey]['user_answer_true'] = !isset($users_score[$ukey]['user_answer_true']) ? ((!is_null($v) && $v == 1) ? 1 : 0) : ((!is_null($v) && $v == 1) ? $users_score[$ukey]['user_answer_true'] += 1 : $users_score[$ukey]['user_answer_true'] += 0);
            }
            //get percentage of true answer
            $nilai[$key]['true_percentage'] = $nilai[$key]['true_answer'] / $users * 100;
            $nilai[$key]['score_level'] = $this->_define_bobot($nilai[$key]['true_percentage']);
        }

        //nilai mentah based on users
        $populate_score = 0;
        foreach ($nilai as $key => $i) {
            foreach ($i['users'] as $ukey => $v) {
                $nilai_mentah[$ukey]['soal'][$key] = $users_score[$ukey]['answer'] > 0 ? $users_score[$ukey]['user_answer_true'] / $users_score[$ukey]['answer'] * $nilai[$key]['users'][$ukey] * $nilai[$key]['score_level'] : 0;
                $nilai_mentah[$ukey]['nilai_mentah'] = !isset($nilai_mentah[$ukey]['nilai_mentah']) ? (($nilai_mentah[$ukey]['soal'][$key] > 0) ? $nilai_mentah[$ukey]['soal'][$key] : 0) : $nilai_mentah[$ukey]['nilai_mentah'] + $nilai_mentah[$ukey]['soal'][$key];
                $populate_score += $nilai_mentah[$ukey]['soal'][$key];
            }
        }
        //population average
        $populate_avg = $populate_score / count($nilai_mentah);
        //get standar deviation
        $sample_std = [];
        foreach ($nilai_mentah as $i) {
            array_push($sample_std, $i['nilai_mentah']);
        }
        $std = $this->_calculateStdDev($sample_std);

        //last process calculate nilai
        foreach ($nilai_mentah as $key => $i) {
            $nilai_mentah[$key]['final_score'] = round(500 + ((($i['nilai_mentah'] - $populate_avg) / $std) * 100), 2);
            $this->base_model->update_item('exam', ['score' => $nilai_mentah[$key]['final_score']], ['user_id' => $key]);
        }

        return ['nilai' => $nilai, 'users_score' => $users_score, 'nilai_mentah' => $nilai_mentah];
    }

    public function _calculateStdDev(array $array): float
    {
        $size = count($array);
        $mean = array_sum($array) / $size;
        $squares = array_map(function ($x) use ($mean) {
            return pow($x - $mean, 2);
        }, $array);

        return sqrt(array_sum($squares) / ($size - 1));
    }

    public function _define_bobot($v)
    {
        switch ($v) {
            case $v <= 30:
                return 4;
            case $v <= 70:
                return 3;
            default:
                return 2;
        }
    }
}
