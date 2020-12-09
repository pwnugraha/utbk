<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Paket_ujian extends AdminBase
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "Paket ujian";
    }

    public function index()
    {
        $this->data['item'] = $this->base_model->get_join_item('result', 'tryout.*, paket_soal.name as paket_soal_name', NULL, 'tryout', array('paket_soal'), array('tryout.paket_soal_id=paket_soal.id'), array('inner'));
        $this->adminview('admin/paketujian/paketujian', $this->data);
    }

    public function create()
    {
        $this->data['paket_soal'] = $this->base_model->get_item('result', 'paket_soal', '*');

        $this->form_validation->set_rules('name', 'Nama Sesi', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('quota', 'Kuota', 'trim|is_natural');
        $this->form_validation->set_rules('start_time', 'Jam mulai', 'trim|required');
        $this->form_validation->set_rules('end_time', 'Jam selesai', 'trim|required');
        $this->form_validation->set_rules('paket_soal', 'Paket Soal', 'trim|required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');

        $this->data['sesi'] = [];
        if ($this->form_validation->run() === FALSE) {
            $this->data['name'] = [
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name'),
                'class' => 'form-control',
                'placeholder' => 'Nama sesi tryout'
            ];
            $this->data['description'] = [
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description'),
                'class' => 'form-control',
                'placeholder' => 'Deskripsi tryout'
            ];
            $this->data['quota'] = [
                'name'  => 'quota',
                'id'    => 'quota',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('quota'),
                'class' => 'form-control',
                'placeholder' => 'Kuota (Isikan 0 jika tidak terbatas)'
            ];
            $this->data['start_time'] = [
                'name'  => 'start_time',
                'id'    => 'start_time',
                'type'  => 'time',
                'value' => $this->form_validation->set_value('start_time'),
                'class' => 'form-control',
            ];
            $this->data['end_time'] = [
                'name'  => 'end_time',
                'id'    => 'end_time',
                'type'  => 'time',
                'value' => $this->form_validation->set_value('end_time'),
                'class' => 'form-control',
            ];
            $this->adminview('admin/paketujian/tambahpaketujian', $this->data);
        } else {
            $params = array(
                'name' => $this->input->post('name', TRUE),
                'description' => $this->input->post('description', TRUE),
                'quota' => $this->input->post('quota', TRUE),
                'start_time' => $this->input->post('start_time', TRUE),
                'end_time' => $this->input->post('end_time', TRUE),
                'paket_soal_id' => $this->input->post('paket_soal', TRUE),
                'status' => $this->input->post('status', TRUE),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            );
            if ($this->base_model->insert_item('tryout', $params, 'id')) {
                $this->_result_msg('danger', 'Data baru telah ditambahkan');
            } else {
                $this->_result_msg('success', 'Gagal menambahkan data');
            }
            redirect('manage/paket_ujian/index');
        }
    }

    public function update($id = NULL)
    {
        $this->data['post'] = $this->base_model->get_item('row', 'tryout', '*', ['id' => $id]);
        if (!$this->data['post']) {
            show_404();
        }
        $this->data['paket_soal'] = $this->base_model->get_item('result', 'paket_soal', '*');

        $this->form_validation->set_rules('name', 'Nama Sesi', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('quota', 'Kuota', 'trim|is_natural');
        $this->form_validation->set_rules('start_time', 'Jam mulai', 'trim|required');
        $this->form_validation->set_rules('end_time', 'Jam selesai', 'trim|required');
        $this->form_validation->set_rules('paket_soal', 'Paket Soal', 'trim|required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');

        $this->data['sesi'] = $this->base_model->get_item('row', 'tryout', '*');
        if ($this->form_validation->run() === FALSE) {
            $this->data['name'] = [
                'name'  => 'name',
                'id'    => 'name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('name', $this->data['sesi']['name']),
                'class' => 'form-control',
                'placeholder' => 'Nama sesi tryout'
            ];
            $this->data['description'] = [
                'name'  => 'description',
                'id'    => 'description',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('description', $this->data['sesi']['description']),
                'class' => 'form-control',
                'placeholder' => 'Deskripsi tryout'
            ];
            $this->data['quota'] = [
                'name'  => 'quota',
                'id'    => 'quota',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('quota', $this->data['sesi']['quota']),
                'class' => 'form-control',
                'placeholder' => 'Kuota (Isikan 0 jika tidak terbatas)'
            ];
            $this->data['start_time'] = [
                'name'  => 'start_time',
                'id'    => 'start_time',
                'type'  => 'time',
                'value' => $this->form_validation->set_value('start_time', $this->data['sesi']['start_time']),
                'class' => 'form-control',
            ];
            $this->data['end_time'] = [
                'name'  => 'end_time',
                'id'    => 'end_time',
                'type'  => 'time',
                'value' => $this->form_validation->set_value('end_time', $this->data['sesi']['end_time']),
                'class' => 'form-control',
            ];
            $this->adminview('admin/paketujian/tambahpaketujian', $this->data);
        } else {
            $params = array(
                'name' => $this->input->post('name', TRUE),
                'description' => $this->input->post('description', TRUE),
                'quota' => $this->input->post('quota', TRUE),
                'start_time' => $this->input->post('start_time', TRUE),
                'end_time' => $this->input->post('end_time', TRUE),
                'paket_soal_id' => $this->input->post('paket_soal', TRUE),
                'status' => $this->input->post('status', TRUE),
                'modified' => date('Y-m-d H:i:s')
            );
            $act = $this->base_model->update_item('tryout', $params, array('id' => $id));
            if (!$act) {
                $this->_result_msg('danger', 'Gagal menyimpan data');
            } else {
                $this->_result_msg('success', 'Data berhasil diubah');
            }
            redirect('manage/paket_ujian/update/' . $id);
        }
    }

    public function delete($id = NULL)
    {
        if (!$this->base_model->get_item('row', 'tryout', 'id', array('id' => $id))) {
            $this->_result_msg('danger', 'Data tidak ditemukan');
        } else {
            if ($this->base_model->delete_item('tryout', array('id' => $id))) {
                $this->_result_msg('success', 'Data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/paket_ujian');
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

    public function add_soal()
    {

        $this->form_validation->set_rules('material', 'Nama Bank Soal', 'trim|required|numeric');
        $this->form_validation->set_rules('paket_soal_id', 'Paket Soal', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->adminview('admin/paketsoal/tambahpaketsoal', $this->data);
        } else {
            $butir_soal = $this->base_model->get_item('result', 'soal', '*', ['bank_soal_id' => $this->input->post('material')]);
            foreach ($butir_soal as $soal) {
                $params = array(
                    'paket_soal_id' => $this->input->post('paket_soal_id'),
                    'soal_id' => $soal['id']
                );
                if ($this->base_model->get_item('row', 'butir_paket_soal', '*', $params)) {
                    $this->base_model->delete_item('butir_paket_soal', $params);
                }
                $this->base_model->insert_item('butir_paket_soal', $params);
            }
            redirect('manage/paket_soal/update/' . $this->input->post('paket_soal_id'));
        }
    }
}
