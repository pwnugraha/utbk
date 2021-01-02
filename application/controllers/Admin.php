<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->load->model('base_model');
        $this->_is_logged_in();
        $this->_is_doing_exam();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['item'] = $this->base_model->get_join_item('result', 'users_ticket.*, a.first_name, a.phone, a.company, b.first_name as reseller', NULL, 'users_ticket', ['users a', 'users b'], ['a.id=users_ticket.user_id', 'b.id=users_ticket.reseller_id'], ['inner', 'inner'], ['users_ticket.status' => 0]);
        $data['tryout'] = $this->base_model->count_result_item('exam', ['status !=' => 0]);

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    public function add_ticket($id = NULL)
    {
        $ticket = $this->base_model->get_item('row', 'users_ticket', '*', ['id' => $id]);
        if (!empty($ticket)) {
            $current_ticket = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $ticket['user_id']]);
            if (!$current_ticket) {
                $params = array(
                    'user_id' => $ticket['user_id'],
                    $ticket['category'] => $ticket['quantity'],
                    'tps' => $ticket['quantity'],
                );
                $this->base_model->insert_item('ticket', $params, 'id');
            } else {
                $params = array(
                    $ticket['category'] => $current_ticket[$ticket['category']] + $ticket['quantity'],
                    'tps' => $current_ticket['tps'] + $ticket['quantity'],
                );
                $this->base_model->update_item('ticket', $params, ['user_id' => $ticket['user_id']]);
            }
            $this->base_model->update_item('users_ticket', ['status' => 1], ['id' => $id]);
            $this->session->set_flashdata('message', 'Tiket telah ditambahkan');
        }
        redirect('admin', 'refresh');
    }

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

    public function _is_doing_exam()
    {
        $exam_data = $this->base_model->get_item('result', 'exam', '*', ['status !=' => 0]);
        if (!empty($exam_data)) {
            foreach ($exam_data as $v) {
                if (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($v['end_date']))) {
                    //redirect('exm/start');
                } else {
                    $params = array(
                        'status' => 0,
                        'end_date' => NULL,
                    );
                    switch ($v['status']) {
                        case 1:
                        case 2:
                        case 3:
                            $params['tka'] = 1;
                            break;
                        case 4:
                            $params['tps'] = 1;
                            break;
                    }
                    $this->base_model->update_item('exam', $params, array('id' => $v['id'], 'status' => $v['status']));
                }
            }
        }
    }
}
