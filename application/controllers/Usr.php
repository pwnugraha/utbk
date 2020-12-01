<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usr extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/index');
        $this->load->view('user/template/footer');
    }

    public function statistik()
    {
        $data['title'] = "Statistik";

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/statistik');
        $this->load->view('user/template/footer');
    }

    public function product()
    {
        $data['title'] = "Product";

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/product');
        $this->load->view('user/template/footer');
    }

    public function profile()
    {
        $data['title'] = "Profile";

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/profile');
        $this->load->view('user/template/footer');
    }
}
