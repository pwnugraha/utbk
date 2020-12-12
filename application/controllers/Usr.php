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
        $this->data['tryout'] = $this->base_model->get_item('result', 'tryout', '*', ['status' => 1]);
        $this->data['active_room'] = [
            'tka_saintek' => 0,
            'tka_soshum' => 0,
            'tka_campuran' => 0,
            'tps' => 0,
        ];

        $doing_exam = $this->base_model->get_item('result', 'exam', 'status, COUNT(*) as active_exam', ['month' => date('n')], ['status']);
        if (!empty($doing_exam)) {
            foreach ($doing_exam as $i) {
                if ($i['status'] == 1) {
                    $this->data['active_room']['tka_saintek'] = $i['active_exam'];
                }
                if ($i['status'] == 2) {
                    $this->data['active_room']['tka_soshum'] = $i['active_exam'];
                }
                if ($i['status'] == 3) {
                    $this->data['active_room']['tka_campuran'] = $i['active_exam'];
                }
                if ($i['status'] == 4) {
                    $this->data['active_room']['tps'] = $i['active_exam'];
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
                        $params['tks'] = 1;
                        break;
                }
                $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status' => $exam_data['status']));
                redirect('usr');
            }
        }
    }
}
