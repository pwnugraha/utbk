<?php

use function Complex\theta;

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/controllers/manage/Base.php';

class Userdata extends AdminBase
{
    public function __construct()
    {
        parent::__construct();
        if ($this->base_model->get_join_item('row', '*', NULL, 'users', ['users_groups'], ['users.id=users_groups.user_id'], ['inner'], ['users.id' => $this->session->userdata('user_id'), 'group_id' => 2])) {
            $this->_is_logged_in();
        }
        $this->data['title'] = "User data";
    }

    public function index($id = NULL)
    {
        $this->data['reseller'] = FALSE;
        $this->data['item'] = $this->base_model->get_item('result', 'users', '*', ['id !=' => 1]);
        if ($this->base_model->get_join_item('row', '*', NULL, 'users', ['users_groups'], ['users.id=users_groups.user_id'], ['inner'], ['users.id' => $this->session->userdata('user_id'), 'group_id' => 3])) {
            if (!is_null($id) && !$this->base_model->get_item('row', ['users_resellers'], '*', ['user_id' => $id, 'reseller_id' => $this->session->userdata('user_id')])) {
                show_404();
            }
            $this->data['item'] = $this->base_model->get_join_item('result', 'users.*', NULL, 'users', ['users_resellers'], ['users.id=users_resellers.user_id'], ['inner'], ['reseller_id' => $this->session->userdata('user_id')]);
            $this->data['users_ticket'] = $this->base_model->get_join_item('result', 'users.*, users_ticket.id as ticket_id, users_ticket.category, users_ticket.quantity, users_ticket.status,users_ticket.created', NULL, 'users', ['users_ticket'], ['users.id=users_ticket.user_id'], ['inner'], ['reseller_id' => $this->session->userdata('user_id')]);
            $this->data['reseller'] = TRUE;
        }
        $this->data['user'] = $this->base_model->get_item('row', 'users', '*', ['id' => $id]);
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
            if (!$this->base_model->get_item('row', 'users', '*', ['id' => $this->input->post('user_id')])) {
                $this->_result_msg('success', 'Pilih user yang akan ditambahkan tiket');
                redirect('manage/userdata/index/' . $this->input->post('user_id'));
            }
            if ($this->base_model->get_join_item('row', '*', NULL, 'users', ['users_groups'], ['users.id=users_groups.user_id'], ['inner'], ['users.id' => $this->session->userdata('user_id'), 'group_id' => 3])) {
                $params = array(
                    'user_id' => $this->input->post('user_id'),
                    'reseller_id' => $this->session->userdata('user_id'),
                    'category' => $this->input->post('type'),
                    'quantity' => $this->input->post('quantity'),
                    'status' => 0,
                    'created' => time()
                );
                $this->_result_msg('success', 'Tiket berhasil ditambahkan. Menunggu disetujui.');
                $this->base_model->insert_item('users_ticket', $params);
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
                $this->_result_msg('success', 'Tiket berhasil ditambahkan. Menunggu disetujui.');
            }
            redirect('manage/userdata/index/' . $this->input->post('user_id'));
        }
    }

    public function delete_ticket($id = NULL)
    {
        $ticket = $this->base_model->get_item('row', 'users_ticket', '*', ['id' => $id, 'status' => 0]);
        if (!empty($ticket)) {
            $this->base_model->delete_item('users_ticket', ['id' => $id]);
            $this->_result_msg('success', 'Pengajuan tiket telah dibatalkan.');
        }
        redirect('manage/userdata/index/');
    }

    public function create_user()
    {
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;
        $this->config->set_item('ion_auth', FALSE, 'email_activation');

        // validate form input
        $this->form_validation->set_rules('first_name', 'Nama', 'trim|required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', 'Username', 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required');
        $this->form_validation->set_rules('company', 'Sekolah', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']');
        //$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
        //$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() === TRUE) {
            $email = strtolower($this->input->post('email'));
            $identity = $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = [
                'first_name' => $this->input->post('first_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            ];
        }
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data, [2])) {

            // check to see if we are creating the user
            // redirect them back to the admin page
            $user_id = $this->base_model->get_item('row', 'users', 'id', ['username' => $identity]);
            if (!$this->base_model->get_item('row', 'users_resellers', '*', ['user_id' => $user_id['id']])) {
                $this->base_model->insert_item('users_resellers', ['user_id' => $user_id['id'], 'reseller_id' => $this->session->userdata('user_id')]);
            }
            $this->session->set_flashdata('msg', $this->ion_auth->messages());
            redirect("manage/userdata", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = [
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('first_name'),
                'class' => 'form-control',
                'placeholder' => 'Nama'
            ];
            $this->data['identity'] = [
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
                'class' => 'form-control',
                'placeholder' => 'Username'
            ];
            $this->data['email'] = [
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
                'class' => 'form-control',
                'placeholder' => 'Email'
            ];
            $this->data['company'] = [
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'value' => $this->form_validation->set_value('company'),
                'class' => 'form-control',
                'placeholder' => 'Sekolah'
            ];
            $this->data['phone'] = [
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'value' => $this->form_validation->set_value('phone'),
                'class' => 'form-control',
                'placeholder' => 'No Telp/WA'
            ];
            $this->data['password'] = [
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password'),
                'class' => 'form-control',
                'placeholder' => 'Password'
            ];
            $this->data['password_confirm'] = [
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            ];
            $this->adminview('admin/reseller/create_user', $this->data);
        }
    }
}
