<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->_is_logged_in();
    }

    public function index($id = null)
    {
        $data['title'] = "Tata tertib";
        $data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

        $this->load->view('exam/template/header', $data);
        // $this->load->view('exam/template/sidebar');
        $this->load->view('exam/template/topbar');
        $this->load->view('exam/index');
        $this->load->view('exam/template/footer');
    }

    public function start($id = null)
    {
        $data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();

        $data['title'] = "Selamat Mengerjakan Tryout - SobatUTBK";
        $this->load->view('exam/start', $data);
    }


    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }
}
