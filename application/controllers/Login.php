<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login/index');
    }

    public function proses()
    {
        redirect('usr');
    }
}
