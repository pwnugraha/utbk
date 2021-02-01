<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/third_party/midtrans/Midtrans.php';

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->model('base_model');
    }
    public function index()
    {
        $data['title'] = "";

        $data['master'] = $this->db->get('interface')->result_array();
        $data['misi'] = $this->db->get('interface_misi')->result_array();
        $data['faq'] = $this->db->get('interface_faq')->result_array();
        $data['img'] = $this->db->get('interface_img')->result_array();
        $data['testi'] = $this->db->get('testimoni')->result_array();
        $data['product'] = $this->base_model->get_join_item('result', 'product.*', NULL, 'product', ['product_item'], ['product.id=product_item.product_id'], ['inner'], ['status' => 1], ['product.id']);


        // die;

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/index');
        $this->load->view('homepage/footer');
    }

    public function tentang()
    {
        $data['master'] = $this->db->get('interface')->result_array();
        $data['misi'] = $this->db->get('interface_misi')->result_array();
        $data['faq'] = $this->db->get('interface_faq')->result_array();
        $data['img'] = $this->db->get('interface_img')->result_array();
        $data['testi'] = $this->db->get('testimoni')->result_array();

        $data['title'] = "Tentang -";
        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/tentang');
        $this->load->view('homepage/footer');
    }

    public function testimoni()
    {
        $data['master'] = $this->db->get('interface')->result_array();
        $data['misi'] = $this->db->get('interface_misi')->result_array();
        $data['faq'] = $this->db->get('interface_faq')->result_array();
        $data['img'] = $this->db->get('interface_img')->result_array();
        $data['testi'] = $this->db->get('testimoni')->result_array();

        $data['title'] = "Testimoni -";

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/testimoni');
        $this->load->view('homepage/footer');
    }
}
