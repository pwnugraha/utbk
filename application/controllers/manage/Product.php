<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Product extends AdminBase
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "Product";
    }

    public function index()
    {
        $this->data['item'] = $this->base_model->get_item('result', 'product', '*');
        $this->adminview('admin/produk/product', $this->data);
    }

    public function create()
    {

        $this->form_validation->set_rules('name', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('price', 'Harga', 'trim|is_natural');
        $this->form_validation->set_rules('discount', 'Diskon', 'trim|is_natural');
        $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('end_date', 'Tanggal selesai', 'trim|required');
        $this->form_validation->set_rules('tryout', 'Jumlah Tryout', 'trim|is_natural');
        $this->form_validation->set_rules('consultation', 'Jumlah Konsultasi', 'trim|is_natural');
        $this->form_validation->set_rules('pendalaman', 'Jumlah Pendalaman', 'trim|is_natural');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|is_natural');

        if ($this->form_validation->run() === FALSE) {
            $this->data['name'] = [
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name'),
                'class' => 'form-control',
                'placeholder' => 'Nama Produk'
            ];
            $this->data['description'] = [
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description'),
                'class' => 'form-control',
                'placeholder' => 'Deskripsi Produk'
            ];
            $this->data['price'] = [
                'name'  => 'price',
                'id'    => 'price',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('price'),
                'class' => 'form-control',
                'placeholder' => 'Harga Produk'
            ];
            $this->data['discount'] = [
                'name'  => 'discount',
                'id'    => 'discount',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('discount'),
                'class' => 'form-control',
                'placeholder' => 'Diskon (Jika Ada)'
            ];
            $this->data['start_date'] = [
                'name'  => 'start_date',
                'id'    => 'start_date',
                'type'  => 'date',
                'value' => $this->form_validation->set_value('start_date'),
                'class' => 'form-control',
            ];
            $this->data['end_date'] = [
                'name'  => 'end_date',
                'id'    => 'end_date',
                'type'  => 'date',
                'value' => $this->form_validation->set_value('end_date'),
                'class' => 'form-control',
            ];
            $this->data['tryout'] = [
                'name'  => 'tryout',
                'id'    => 'tryout',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('tryout'),
                'class' => 'form-control',
                'placeholder' => 'Total Tryout'
            ];
            $this->data['consultation'] = [
                'name'  => 'consultation',
                'id'    => 'consultation',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('consultation'),
                'class' => 'form-control',
                'placeholder' => 'Total Konsultasi'
            ];
            $this->data['pendalaman'] = [
                'name'  => 'pendalaman',
                'id'    => 'pendalaman',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('pendalaman'),
                'class' => 'form-control',
                'placeholder' => 'Total Pendalaman'
            ];
            $this->data['message'] = validation_errors();
            $this->adminview('admin/produk/tambahproduct', $this->data);
        } else {
            $params = array(
                'name' => $this->input->post('name', TRUE),
                'description' => $this->input->post('description', TRUE),
                'price' => $this->input->post('price', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'start_date' => $this->input->post('start_date', TRUE),
                'end_date' => $this->input->post('end_date', TRUE),
                'tryout' => $this->input->post('tryout', TRUE),
                'consultation' => $this->input->post('consultation', TRUE),
                'pendalaman' => $this->input->post('pendalaman', TRUE),
                'status' => $this->input->post('status', TRUE),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            );
            if ($this->base_model->insert_item('product', $params, 'id')) {
                $this->_result_msg('danger', 'Data baru telah ditambahkan');
            } else {
                $this->_result_msg('success', 'Gagal menambahkan data');
            }
            redirect('manage/product/index');
        }
    }

    public function update($id = NULL)
    {
        $this->data['post'] = $this->base_model->get_item('row', 'product', '*', ['id' => $id]);
        if (!$this->data['post']) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('price', 'Harga', 'trim|is_natural');
        $this->form_validation->set_rules('discount', 'Diskon', 'trim|is_natural');
        $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'trim|required');
        $this->form_validation->set_rules('end_date', 'Tanggal selesai', 'trim|required');
        $this->form_validation->set_rules('tryout', 'Jumlah Tryout', 'trim|is_natural');
        $this->form_validation->set_rules('consultation', 'Jumlah Konsultasi', 'trim|is_natural');
        $this->form_validation->set_rules('pendalaman', 'Jumlah Pendalaman', 'trim|is_natural');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|is_natural');

        if ($this->form_validation->run() === FALSE) {
            $this->data['name'] = [
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name', $this->data['post']['name']),
                'class' => 'form-control',
                'placeholder' => 'Nama Produk'
            ];
            $this->data['description'] = [
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description', $this->data['post']['description']),
                'class' => 'form-control',
                'placeholder' => 'Deskripsi Produk'
            ];
            $this->data['price'] = [
                'name'  => 'price',
                'id'    => 'price',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('price', $this->data['post']['price']),
                'class' => 'form-control',
                'placeholder' => 'Harga Produk'
            ];
            $this->data['discount'] = [
                'name'  => 'discount',
                'id'    => 'discount',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('discount', $this->data['post']['discount']),
                'class' => 'form-control',
                'placeholder' => 'Diskon (Jika Ada)'
            ];
            $this->data['start_date'] = [
                'name'  => 'start_date',
                'id'    => 'start_date',
                'type'  => 'date',
                'value' => $this->form_validation->set_value('start_date', $this->data['post']['start_date']),
                'class' => 'form-control',
            ];
            $this->data['end_date'] = [
                'name'  => 'end_date',
                'id'    => 'end_date',
                'type'  => 'date',
                'value' => $this->form_validation->set_value('end_date', $this->data['post']['end_date']),
                'class' => 'form-control',
            ];
            $this->data['tryout'] = [
                'name'  => 'tryout',
                'id'    => 'tryout',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('tryout', $this->data['post']['tryout']),
                'class' => 'form-control',
                'placeholder' => 'Total Tryout'
            ];
            $this->data['consultation'] = [
                'name'  => 'consultation',
                'id'    => 'consultation',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('consultation', $this->data['post']['consultation']),
                'class' => 'form-control',
                'placeholder' => 'Total Konsultasi'
            ];
            $this->data['pendalaman'] = [
                'name'  => 'pendalaman',
                'id'    => 'pendalaman',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('pendalaman', $this->data['post']['pendalaman']),
                'class' => 'form-control',
                'placeholder' => 'Total Pendalaman'
            ];
            $this->adminview('admin/produk/tambahproduct', $this->data);
        } else {
            $params = array(
                'name' => $this->input->post('name', TRUE),
                'description' => $this->input->post('description', TRUE),
                'price' => $this->input->post('price', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'start_date' => $this->input->post('start_date', TRUE),
                'end_date' => $this->input->post('end_date', TRUE),
                'tryout' => $this->input->post('tryout', TRUE),
                'consultation' => $this->input->post('consultation', TRUE),
                'pendalaman' => $this->input->post('pendalaman', TRUE),
                'status' => $this->input->post('status', TRUE),
                'created' => date('Y-m-d H:i:s')
            );
            $act = $this->base_model->update_item('product', $params, array('id' => $id));
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
            }
            redirect('manage/product/update/' . $id);
        }
    }

    public function delete($id = NULL)
    {
        if (!$this->base_model->get_item('row', 'product', 'id', array('id' => $id))) {
            $this->_result_msg('danger', 'Data tidak ditemukan');
        } else { 
            if ($this->base_model->delete_item('product', array('id' => $id))) {
                $this->_result_msg('success', 'Data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/product');
    }

    public function delete_all($uri = NULL)
    {
        $data = $this->input->post('pcheck');
        if (!empty($data)) {
            foreach ($data as $value) {
                if ($this->base_model->get_item('row', 'bank_soal', 'id', array('id' => $value))) {
                    $this->base_model->delete_item('bank_soal', array('id' => $value));
                }
            }
        } else {
            $this->_result_msg('danger', 'Tidak ada data yang dipilih');
        }
        redirect('manage/bank_soal/show');
    }
}
