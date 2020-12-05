<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Bank_soal extends AdminBase
{

    public function __construct()
    {
        parent::__construct();
    }

    public function show($uri = NULL)
    {
        $data['item'] = $this->base_model->get_join_item('result', 'soal.*, category, subject', 'bank_soal.id DESC', 'bank_soal', array('kategori_soal'), array('bank_soal.kategori_soal_id=kategori_soal.id'), array('inner'));
        $this->adminview('manage/bank_soal/index', $data);
    }

    public function create()
    {
        $data['image'] = $this->base_model->get_join_item('result', 'media.*, first_name, last_name', 'media.id DESC', 'media', array('users'), array('media.user_id=users.id'), array('left'), array('media_type' => 'image', 'dir' => 'res/media/image/'));

        $assets = $this->_assets();
        $data['assets_header'] = $assets['assets_header'];
        $data['assets_footer'] = $assets['assets_footer'];

        $this->form_validation->set_rules('name', 'Nama Paket Soal', 'trim|required');
        $this->form_validation->set_rules('kategori_soal_id', 'Kategori Soal', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $this->adminview('manage/bank_soal/create', $data);
        } else {
            $params = array(
                'name' => $this->input->post('name', TRUE),
                'kategori_soal_id' => $this->input->post('kategori_soal_id', TRUE),
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            );
            $act = $this->base_model->insert_item('bank_soal', $params, 'id');
            // if (!$act) {
            //     $this->_result_msg('danger', 'Gagal menyimpan data');
            // } else {
            //       $this->_result_msg('success', ucfirst($data['uri']) . ' baru telah ditambahkan');
            // }
            redirect('manage/bank_soal/index');
        }
    }

    public function update($id = NULL)
    {
        $data['post'] = $this->base_model->get_item('row', 'bank_soal', '*', array('id' => $id));
        if (!$data['post']) {
            show_404();
        }

        if ($this->input->post('act', TRUE)) {
            $this->form_validation->set_rules('name', 'Nama Paket Soal', 'trim|required');
            $this->form_validation->set_rules('kategori_soal_id', 'Kategori Soal', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $this->adminview('manage/bank_soal/edit_f', $data);
            } else {
                $params = array(
                    'name' => $this->input->post('name', TRUE),
                    'kategori_soal_id' => $this->input->post('kategori_soal_id', TRUE),
                    'modified' => date('Y-m-d H:i:s'),
                );
                $act = $this->base_model->update_item('posts', $params, array('id' => $id));
                if (!$act) {
                    $this->_result_msg('danger', 'Gagal menyimpan data');
                } else {
                    $this->_result_msg('success', ucfirst($data['uri']) . ' berhasil diubah');
                }
                redirect('manage/bank_soal/update/' . $id);
            }
        } else {
            $this->adminview('manage/bank_soal/edit', $data);
        }
    }

    public function delete($uri = NULL, $id = NULL)
    {
        if (!$this->base_model->get_item('row', 'bank_soal', 'id', array('id' => $id))) {
            $this->_result_msg('danger', 'Gagal menghapus data');
        } else {
            $result = $this->base_model->delete_item('bank_soal', array('id' => $id));
            if ($result) {
                $this->_result_msg('success', 'data telah dihapus');
            } else {
                $this->_result_msg('danger', 'Gagal menghapus data');
            }
        }
        redirect('manage/bank_soal/show');
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

    public function _assets()
    {
        $data['assets_header'] = array(
            'asset_2' => '<link href="' . base_url() . 'res/assets/blueimp/css/jquery.fileupload.css" rel="stylesheet">',
            'asset_3' => '<link href="' . base_url() . 'res/assets/blueimp/css/jquery.fileupload-ui.css" rel="stylesheet">',
        );
        $data['assets_footer'] = array(
            'asset_1' => '<script src="' . base_url() . 'res/assets/blueimp/js/vendor/jquery.ui.widget.js"></script>',
            'asset_2' => '<script src="' . base_url() . 'res/assets/blueimp/js/blueimp/tmpl.min.js"></script>',
            'asset_3' => '<script src="' . base_url() . 'res/assets/blueimp/js/blueimp/load-image.all.min.js"></script>',
            'asset_4' => '<script src="' . base_url() . 'res/assets/blueimp/js/blueimp/canvas-to-blob.min.js"></script>',
            'asset_5' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.iframe-transport.js"></script>',
            'asset_6' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.fileupload.js"></script>',
            'asset_7' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.fileupload-process.js"></script>',
            'asset_8' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.fileupload-image.js"></script>',
            'asset_9' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.fileupload-validate.js"></script>',
            'asset_10' => '<script src="' . base_url() . 'res/assets/blueimp/js/jquery.fileupload-ui.js"></script>',
            'asset_11' => '<script src="' . base_url() . 'res/assets/blueimp/js/main.js"></script>',
            'asset_12' => '<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>',
            'asset_14' => '<script>CKEDITOR.replace(\'ck_description_field\', {height:300});</script>',
        );
        return $data;
    }
}
