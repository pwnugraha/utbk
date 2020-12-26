<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $this->data['had_exam'] = $this->base_model->get_join_item('result', 'exam.*, users.first_name, users.company', NULL, 'exam', ['users'], ['exam.user_id = users.id'], ['inner']);

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
        $this->base_model->update_item('orders', ['status' => 'settlement'], array('id' => $id));
        redirect('manage/laporan');
    }

    public function nilai_tryout($month)
    {
        $exam_data = $this->base_model->get_join_item('result', 'users.first_name, users.company, exam_score.score, kategori_soal.category, kategori_soal.subject', NULL, 'exam_score', ['exam', 'users', 'kategori_soal'], ['exam.id=exam_score.exam_id', 'exam.user_id=users.id', 'kategori_soal.id=exam_score.kategori_soal_id'], ['inner', 'inner', 'inner'], ['exam.month' => $month]);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 2;
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Sekolah');
        $sheet->setCellValue('C1', 'Tryout');
        $sheet->setCellValue('D1', 'Subject');
        $sheet->setCellValue('E1', 'Nilai');
        if (!empty($exam_data)) {
            foreach ($exam_data as $v) {
                $sheet->setCellValue('A' . $i, $v['first_name']);
                $sheet->setCellValue('B' . $i, $v['company']);
                $sheet->setCellValue('C' . $i, $v['category']);
                $sheet->setCellValue('D' . $i, $v['subject']);
                $sheet->setCellValue('E' . $i, $v['score']);
                $i++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('data.xlsx') . '"');
        $writer->save('php://output');
    }

    public function had_tryout()
    {
        $exam_data = $this->base_model->get_join_item('result', 'exam.*, users.first_name, users.company', NULL, 'exam', ['users'], ['exam.user_id = users.id'], ['inner']);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i = 2;
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Sekolah');
        $sheet->setCellValue('C1', 'Tryout');
        $sheet->setCellValue('D1', 'Bulan');
        $sheet->setCellValue('E1', 'Keterangan');
        if (!empty($exam_data)) {
            foreach ($exam_data as $v) {
                $tryout = '';
                $doing_tryout = '';
                if ($v['tka'] == 1 && $v['tps'] == 1) {
                    $tryout = 'TKA, TPS';
                } else if ($v['tka'] == 1 && $v['tps'] == 0) {
                    $tryout = 'TKA';
                } else if ($v['tka'] == 0 && $v['tps'] == 1) {
                    $tryout = 'TPS';
                }

                if ($v['status'] == 1) {
                    $doing_tryout = 'Sedang Ujian TKA Saintek';
                } else if ($v['status'] == 2) {
                    $doing_tryout = 'Sedang Ujian TKA Soshum';
                } else if ($v['status'] == 3) {
                    $doing_tryout = 'Sedang Ujian TKA Campuran';
                } else if ($v['status'] == 4) {
                    $doing_tryout = 'Sedang Ujian TPS';
                } else {
                    $doing_tryout = 'Tidak Sedang Ujian';
                }

                $sheet->setCellValue('A' . $i, $v['first_name']);
                $sheet->setCellValue('B' . $i, $v['company']);
                $sheet->setCellValue('C' . $i, $tryout);
                $sheet->setCellValue('E' . $i, $v['month']);
                $sheet->setCellValue('D' . $i, $doing_tryout);
                $i++;
            }
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('data.xlsx') . '"');
        $writer->save('php://output');
    }

    public function define_exam_score($month)
    {
        if (!$this->base_model->get_item('result', 'exam', '*', ['month' => $month])) {
            show_404();
        }
        $start_time = microtime(true);
        ini_set("memory_limit", "-1");
        set_time_limit(0);

        $this->load->model('base_model');
        $exam_data = [];
        $mapel = $this->base_model->get_item('result', 'kategori_soal', '*');
        $exam = $this->base_model->get_join_item('result', 'user_exam.*, exam.user_id', NULL, ['user_exam'], ['exam'], ['exam.id = user_exam.exam_id'], ['inner'], ['month' => $month, 'tka' => 1, 'tps' => 1]);

        if (!empty($exam)) {
            $v = 0;
            foreach ($exam as $i) {
                $exam_data[$i['kategori_soal_id']]['score_data'][] = [
                    'soal' => $i['soal_id'],
                    'user' => $i['user_id'],
                    'score' => $i['score'],
                    'exam_id' => $i['exam_id']
                ];
                $v++;
            }

            $x = 0;
            foreach ($exam_data as $key => $i) {
                $this->_define_score($i['score_data'], $key);
                $x++;
            }

            $execution_time = (microtime(true) - $start_time);
            $this->session->set_flashdata('message_sa', 'Nilai Tryout berhasil diproses.');
        }
        redirect('manage/laporan');
    }

    public function _define_score($exam_data, $kategori)
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
            $nilai[$i['soal']]['exam'][$i['user']] = $i['exam_id'];
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
                $nilai_mentah[$ukey]['exam_id'] = $nilai[$key]['exam'][$ukey];
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
            if ($this->base_model->get_item('row', 'exam_score', '*', ['kategori_soal_id' => $kategori, 'exam_id' => $i['exam_id']])) {
                $this->base_model->update_item('exam_score', ['score' => $nilai_mentah[$key]['final_score']], ['exam_id' => $i['exam_id'], 'kategori_soal_id' => $kategori]);
            } else {
                $params = [
                    'kategori_soal_id' => $kategori,
                    'score' => $nilai_mentah[$key]['final_score'],
                    'created' => date('Y-m-d H:i:s'),
                    'exam_id' => $i['exam_id']
                ];
                $this->base_model->insert_item('exam_score', $params);
            }
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
