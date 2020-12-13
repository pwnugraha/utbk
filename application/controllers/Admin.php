<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->_is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";


        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    // ========== BANK SOAL
    public function banksoal()
    {
        $data['title'] = "Bank soal";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/banksoal/banksoal');
        $this->load->view('admin/template/footer');
    }

    public function tambahkoleksisoal()
    {
        $data['title'] = "Bank soal";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/banksoal/tambahkoleksisoal');
        $this->load->view('admin/template/footer');
    }

    public function tambahpertanyaan()
    {
        $data['title'] = "Bank soal";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/banksoal/tambahpertanyaan');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR BANK SOAL

    // ========== PAKET SOAL
    public function paketsoal()
    {
        $data['title'] = "Paket soal";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/paketsoal/paketsoal');
        $this->load->view('admin/template/footer');
    }

    public function tambahpaketsoal()
    {
        $data['title'] = "Paket soal";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/paketsoal/tambahpaketsoal');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR PAKET SOAL

    // ========== PAKET UJIAN
    public function paketujian()
    {
        $data['title'] = "Paket ujian";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/paketujian/paketujian');
        $this->load->view('admin/template/footer');
    }

    public function tambahpaketujian()
    {
        $data['title'] = "Paket ujian";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/paketujian/tambahpaketujian');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR PAKET UJIAN

    // ========== PRODUK
    public function product()
    {
        $data['title'] = "Product";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/produk/product');
        $this->load->view('admin/template/footer');
    }

    public function tambahproduct()
    {
        $data['title'] = "Product";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/produk/tambahproduct');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR PRODUK

    // ========= LAPORAN
    public function laporan()
    {
        $data['title'] = "Laporan";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/laporan');
        $this->load->view('admin/template/footer');
    }
    // ========= AKHIR LAPORAN

    // ========== USER DATA
    public function userdata()
    {
        $data['title'] = "User data";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/userdata/userdata');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR USER DATA

    // ========== RESELLER
    public function reseller()
    {
        $data['title'] = "Reseller";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/reseller/reseller');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR RESELLER

    // ========== HOMEPAGE
    public function homepage()
    {
        $data['title'] = "Homepage";

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/homepage/homepage');
        $this->load->view('admin/template/footer');
    }
    // ========== AKHIR HOMEPAGE

    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the login page
            show_404();
        }
    }
}
