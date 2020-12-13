<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->load->model('base_model');
        $this->_is_logged_in();
    }

    public function index($exam = null)
    {
        $this->_is_doing_exam();
        $this->_check_exam_category($exam);
        $data['title'] = "Tata tertib";
        $data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $data['ptn'] = $this->base_model->get_item('result', 'ptn', 'DISTINCT(nama)');
        $data['exam'] = $exam;

        $this->form_validation->set_rules('jurusan1', 'PTN Pilihan 1', 'trim|required|numeric');
        $this->form_validation->set_rules('jurusan2', 'PTN Pilihan 2', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE) {

            $data['error_message'] = (NULL != validation_errors()) ? 'Lengkapi PTN Pilihan 1 dan 2 sebelum memulai ujian' : '';
            $this->load->view('exam/template/header', $data);
            // $this->load->view('exam/template/sidebar');
            $this->load->view('exam/template/topbar');
            $this->load->view('exam/index');
            $this->load->view('exam/template/footer');
        } else {

            $this->_check_exam_category($exam);
            $category_exam = $this->_exam_status($exam);
            //get sesi for decide end time for user
            $sesi = $this->base_model->get_item('row', 'tryout', '*', ['status' => 1, 'type' => $category_exam, 'active_month' => date('n')]);
            $exam_time = date('H:i:s', strtotime('+1 hour +45 minutes', strtotime(date("H:i:s"))));
            $end_date = ($exam_time >= $sesi['end_time']) ? date('Y-m-d H:i:s', strtotime($sesi['end_time'])) : date('Y-m-d H:i:s', strtotime($exam_time));
            $params = array(
                'ptn1' => $this->input->post('jurusan1', TRUE),
                'ptn2' => $this->input->post('jurusan2', TRUE),
                'status' => $category_exam,
                'end_date' => $end_date,
            );
            if ($this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n')])) {
                $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n')));
            } else {
                $params['user_id'] = $this->session->userdata('user_id');
                $params['month'] = date('n');
                $this->base_model->insert_item('exam', $params);
            }

            //tiket min 1
            $this->base_model->update_item('ticket', [$exam => $exam - 1], array('user_id' => $this->session->userdata('user_id')));
            $exam_id = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n')]);
            //duplicate soal to user
            $exam_data = $this->base_model->get_join_item('result', 'soal.*', NULL, 'soal', ['butir_paket_soal', 'paket_soal', 'tryout'], ['soal.id = butir_paket_soal.soal_id', 'butir_paket_soal.paket_soal_id = paket_soal.id', 'paket_soal.id = tryout.paket_soal_id'], ['inner', 'inner', 'inner'], ['type' => $this->_exam_status($exam), 'active_month' => date('n'), 'status' => 1]);
            if (!empty($exam_data)) {
                foreach ($exam_data as $i) {
                    $soal = array(
                        'soal' => $i['description'],
                        'opt1' => $i['opt1'],
                        'opt2' => $i['opt2'],
                        'opt3' => $i['opt3'],
                        'opt4' => $i['opt4'],
                        'opt5' => $i['opt5'],
                        'answer' => $i['answer'],
                        'explanation' => $i['explanation'],
                        'exam_id' => $exam_id['id'],
                        'kategori_soal_id' => $i['kategori_soal_id'],
                        'soal_id' => $i['id'],
                        'category' => $category_exam,
                        'created' => date('Y-m-d H:i:s'),
                        'modified' => date('Y-m-d H:i:s'),
                    );
                    $this->base_model->insert_item('user_exam', $soal);
                }
            }
            redirect('exm/start');
        }
    }

    public function start()
    {
        $this->_is_doing_exam_on_start();
        $data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

        $data['title'] = "Selamat Mengerjakan Tryout - SobatUTBK";
        //get exam data
        $exam_data = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status !=' => 0]);
        $data['exam_time'] = (strtotime(date('Y-m-d H:i:s', strtotime($exam_data['end_date']))) - strtotime(date('Y-m-d H:i:s')));
        $data['exam_name'] = $this->_exam_category_status($exam_data['status']);
        $data['exam_items'] = $this->base_model->get_join_item('result', 'user_exam.*, kategori_soal.category as kategori_soal, subject', NULL, 'user_exam', ['kategori_soal'], ['user_exam.kategori_soal_id=kategori_soal.id'], ['inner'], ['exam_id' => $exam_data['id'], 'user_exam.category' => $exam_data['status']]);
        //arrange subject/mapel
        $data['subjects'] = [];
        foreach ($data['exam_items'] as $i) {
            if (!in_array($i['subject'], $data['subjects'])) {
                array_push($data['subjects'], $i['subject']);
            }
        }

        //arrange subject soal
        $data['subjects_soal'] = [];
        foreach ($data['subjects'] as $i) {
            foreach ($data['exam_items'] as $j) {
                if ($i == $j['subject']) {
                    $data['subjects_soal'][$i][] = [
                        'soal' => $j['soal'],
                        'opt' => [$j['opt1'], $j['opt2'], $j['opt3'], $j['opt4'], $j['opt5']],
                        'soal_id' => $j['id'],
                        'user_answer' => $j['user_answer']
                    ];
                }
            }
        }
        // var_dump($data['subjects']);
        // var_dump($data['subjects_soal']);
        // die();

        $this->load->view('exam/start-template/header', $data);
        $this->load->view('exam/start', $data);
        $this->load->view('exam/start-template/footer', $data);
    }

    public function finish()
    {
        $exam_data = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status !=' => 0]);
        if ($exam_data) {
            $params = array(
                'status' => 0,
                'end_date' => NULL,
            );
            switch ($exam_data['status']) {
                case 1:
                case 2:
                case 3:
                    $params['tka'] = 1;
                    break;
                case 4:
                    $params['tps'] = 1;
                    break;
            }
            $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status' => $exam_data['status']));
        }
        redirect('usr');
    }

    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function get_jurusan()
    {
        $data = $this->base_model->get_item('result', 'ptn', '*', ['nama' => $this->input->post('nama')]);
        if (!empty($data)) {
            echo json_encode(['status' => TRUE, 'data' => $data]);
        } else {
            echo json_encode(['status' => TRUE, 'data' => []]);
        }
    }

    public function update_answer()
    {
        $this->form_validation->set_rules('id', 'Soal', 'trim|required|numeric');
        $this->form_validation->set_rules('answer', 'Jawaban', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => FALSE, 'data' => [], 'message' => validation_errors()]);
        } else {
            $params = [
                'user_answer' => $this->input->post('answer', TRUE)
            ];
            $data = $this->base_model->update_item('user_exam', $params, array('id' => $this->input->post('id', TRUE)));
            if ($data) {
                echo json_encode(['status' => TRUE, 'data' => $data, 'message' => '']);
            } else {
                echo json_encode(['status' => FALSE, 'data' => $data, 'message' => '']);
            }
        }
    }

    public function _check_exam_category($exam = NULL)
    {
        switch ($exam) {
            case 'tka_saintek':
            case 'tka_soshum':
            case 'tka_campuran':
            case 'tps':
                //check ticket
                $ticket = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $this->session->userdata('user_id')]);
                //check exam
                $ctg_exam = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n')]);
                //get status
                $status = $this->_exam_status($exam);
                //get exam category
                $ctg = $this->_exam_category($exam);
                //check sesi using tiket, time range, quota
                $sesi = $this->base_model->get_item('row', 'tryout', '*', ['status' => 1, 'type' => $status, 'active_month' => date('n')]);
                if (!empty($sesi) && !empty($ticket)) {
                    //check if test is taken between time session
                    if (date('H:i:s') >= date('H:i:s', strtotime($sesi['start_time'])) && date('H:i:s') <= date('H:i:s', strtotime($sesi['end_time']))) {
                        //check if ticket and session quota available
                        if ($ticket[$exam] > 0 && $this->base_model->count_result_item('exam', ['status' => $status]) < $sesi['quota']) {
                            //check if already test on the current month base on exam category
                            if ($ctg_exam[$ctg] != 1) {
                                return TRUE;
                            } else {
                                $this->session->set_flashdata('message_sa', 'Kamu sudah mengikuti ujian' . strtoupper($ctg) . ' bulan ini. Info lebih lanjut hubungi CS kami.');
                            }
                        } else {
                            $this->session->set_flashdata('message_sa', 'Kuota kursi sudah penuh/tiket tidak tersedia. Cek kembali tiketmu dan silakan ikuti sesi selanjutnya sesuai jam sesi. Info lebih lanjut hubungi CS kami.');
                        }
                    } else {
                        $this->session->set_flashdata('message_sa', 'Sesi ujian yang dipilih belum dimulai. Cek kembali jam sesi. Info lebih lanjut hubungi CS kami.');
                    }
                } else {
                    $this->session->set_flashdata('message_sa', 'Sesi ujian yang dipilih tidak tersedia/tiket tidak tersedia. Info lebih lanjut hubungi CS kami.');
                }
                redirect('usr');
            default:
                redirect('usr');
        }
    }

    public function _exam_status($exam)
    {
        switch ($exam) {
            case 'tka_saintek':
                return 1;
            case 'tka_soshum':
                return 2;
            case 'tka_campuran':
                return 3;
            case 'tps':
                return 4;
            default:
                return 0;
        }
    }

    public function _exam_category($exam)
    {
        switch ($exam) {
            case 'tka_saintek':
            case 'tka_soshum':
            case 'tka_campuran':
                return 'tka';
            case 'tps':
                return 'tps';
            default:
                return 0;
        }
    }
    public function _exam_category_status($exam)
    {
        switch ($exam) {
            case 1:
                return 'TKA SAINTEK';
            case 2:
                return 'TKA SOSHUM';
            case 3:
                return 'TKA Campuran';
            case 4:
                return 'TPS';
            default:
                return 0;
        }
    }

    public function _is_doing_exam()
    {
        $exam_data = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status !=' => 0]);
        if ($exam_data) {
            if (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($exam_data['end_date']))) {
                redirect('exm/start');
            } else {
                $params = array(
                    'status' => 0,
                    'end_date' => NULL,
                );
                switch ($exam_data['status']) {
                    case 1:
                    case 2:
                    case 3:
                        $params['tka'] = 1;
                        break;
                    case 4:
                        $params['tps'] = 1;
                        break;
                }
                $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status' => $exam_data['status']));
                redirect('usr');
            }
        }
    }

    public function _is_doing_exam_on_start()
    {
        $exam_data = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status !=' => 0]);
        if ($exam_data) {
            if (date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime($exam_data['end_date']))) {

                $params = array(
                    'status' => 0,
                    'end_date' => NULL,
                );
                switch ($exam_data['status']) {
                    case 1:
                    case 2:
                    case 3:
                        $params['tka'] = 1;
                        break;
                    case 4:
                        $params['tps'] = 1;
                        break;
                }

                $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status' => $exam_data['status']));
                redirect('usr');
            }
        } else {
            redirect('usr');
        }
    }
}
