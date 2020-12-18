<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usr extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->load->model('base_model');
        $this->_is_logged_in();
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $this->_is_doing_exam();
    }

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['ticket'] = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $this->session->userdata('user_id')]);
        $this->data['tryout'] = $this->base_model->get_item('result', 'tryout', '*', ['status' => 1], NULL, 'active_month DESC');
        $this->data['exam'] = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id')]);

        foreach ($this->data['tryout'] as $sesi) {
            if ($sesi['type'] == 1) {
                $this->data['active_room'][$sesi['active_month']]['tka_saintek'] = 0;
            }
            if ($sesi['type'] == 2) {
                $this->data['active_room'][$sesi['active_month']]['tka_soshum'] = 0;
            }
            if ($sesi['type'] == 3) {
                $this->data['active_room'][$sesi['active_month']]['tka_campuran'] = 0;
            }
            if ($sesi['type'] == 4) {
                $this->data['active_room'][$sesi['active_month']]['tps'] = 0;
            }
            $doing_exam = $this->base_model->get_item('row', 'exam', 'month, status, COUNT(*) as active_exam', ['month' => $sesi['active_month'], 'status' => $sesi['type']]);
 
            if (!empty($doing_exam)) {
                if ($doing_exam['status'] == 1) {
                    $this->data['active_room'][$sesi['active_month']]['tka_saintek'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 2) {
                    $this->data['active_room'][$sesi['active_month']]['tka_soshum'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 3) {
                    $this->data['active_room'][$sesi['active_month']]['tka_campuran'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 4) {
                    $this->data['active_room'][$sesi['active_month']]['tps'] = $doing_exam['active_exam'];
                }
            }
        }

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/index');
        $this->load->view('user/template/footer');
    }

    public function statistik()
    {
        $this->data['exam_history'] = $this->base_model->get_join_item('result', 'exam_history.*, score', NULL, 'exam_history', ['exam'], ['exam.id=exam_history.exam_id'], ['inner'], ['exam.user_id' => $this->session->userdata('user_id')]);
        $this->data['title'] = "Statistik";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/statistik');
        $this->load->view('user/template/footer');
    }

    public function product()
    {
        $this->data['title'] = "Product";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/product');
        $this->load->view('user/template/footer');
    }

    public function profile()
    {
        $this->data['title'] = "Profile";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/profile');
        $this->load->view('user/template/footer');
    }

    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
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
                $this->session->set_flashdata('message_sa', 'Selamat kamu telah menyelesaikan TPS/TKA');
                redirect('usr');
            }
        }
    }
}
