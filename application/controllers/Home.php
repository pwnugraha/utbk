<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = "";

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/index');
        $this->load->view('homepage/footer');
    }

    public function tentang()
    {
        $data['title'] = "Tentang -";
        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/tentang');
        $this->load->view('homepage/footer');
    }

    public function testimoni()
    {
        $data['title'] = "Testimoni -";

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/testimoni');
        $this->load->view('homepage/footer');
    }
}
