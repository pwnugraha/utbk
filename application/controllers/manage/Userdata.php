<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Userdata extends AdminBase
{
    public function __construct()
    {
        parent::__construct();
        $this->data['title'] = "User data";
    }

    public function index($id = NULL)
    {
        $this->data['user'] = $this->base_model->get_item('row', 'users', '*', ['id' => $id]);
        $this->data['item'] = $this->base_model->get_item('result', 'users', '*', ['id !=' => 1]);
        $this->data['ticket'] = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $id]);
        $this->adminview('admin/userdata/userdata', $this->data);
    }

    public function add_ticket()
    {
        $this->form_validation->set_rules('type', 'Produk', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Jumlah Tiket', 'trim|numeric|required');

        if ($this->form_validation->run() === FALSE) {
            $this->_result_msg('danger', validation_errors());
            redirect('manage/userdata/index/' . $this->input->post('user_id'));
        } else {
            $ticket = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $this->input->post('user_id')]);
            if (!$ticket) {
                $params = array(
                    'user_id' => $this->input->post('user_id'),
                    $this->input->post('type') => $this->input->post('quantity'),
                    'tps' => $this->input->post('quantity'),
                );
                $this->base_model->insert_item('ticket', $params, 'id');
            } else {
                $params = array(
                    $this->input->post('type') => $ticket[$this->input->post('type')] + $this->input->post('quantity'),
                    'tps' => $ticket['tps'] + $this->input->post('quantity'),
                );
                $this->base_model->update_item('ticket', $params, array('user_id' => $this->input->post('user_id')));
            }
            $this->_result_msg('danger', 'Tiket berhasil ditambahkan');
            redirect('manage/userdata/index/' . $this->input->post('user_id'));
        }
    }
}
