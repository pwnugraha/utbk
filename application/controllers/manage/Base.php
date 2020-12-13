<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminBase extends CI_Controller {

    protected $data = [];
    public function __construct() {

        parent::__construct();
        $this->load->model('base_model');
        $this->load->library(['ion_auth']);
        $this->_is_logged_in();
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $this->data['item'] = [];
    }

    public function adminview($child_view = "", $data = array()) {
        $data['child_template'] = $child_view;
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view($child_view);
        $this->load->view('admin/template/footer');
    }

    public function _result_msg($alert, $msg) {
        return $this->session->set_flashdata(array(
                    'msg' => $msg,
                    'alert' => 'alert-' . $alert
        ));
    }

    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the login page
            show_404();
        }
    }
}
