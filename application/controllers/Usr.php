<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/third_party/midtrans/Midtrans.php';

class Usr extends CI_Controller
{
    private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['ion_auth']);
        $this->load->model('base_model');
        $this->_is_logged_in();
        $this->data['user'] = $this->ion_auth->user($this->session->userdata('user_id'))->row();
        $this->_is_doing_exam();
    }

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['ticket'] = $this->base_model->get_item('row', 'ticket', '*', ['user_id' => $this->session->userdata('user_id')]);
        $this->data['tryout'] = $this->base_model->get_item('result', 'tryout', '*', ['status' => 1], NULL, 'active_month DESC');
        $this->data['exam'] = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id')]);

        foreach ($this->data['tryout'] as $sesi) {
            if ($sesi['type'] == 1) {
                $this->data['active_room'][$sesi['active_month']]['tka_saintek'] = 0;
            }
            if ($sesi['type'] == 2) {
                $this->data['active_room'][$sesi['active_month']]['tka_soshum'] = 0;
            }
            if ($sesi['type'] == 3) {
                $this->data['active_room'][$sesi['active_month']]['tka_campuran'] = 0;
            }
            if ($sesi['type'] == 4) {
                $this->data['active_room'][$sesi['active_month']]['tps'] = 0;
            }
            $doing_exam = $this->base_model->get_item('row', 'exam', 'month, status, COUNT(*) as active_exam', ['month' => $sesi['active_month'], 'status' => $sesi['type']]);

            if (!empty($doing_exam)) {
                if ($doing_exam['status'] == 1) {
                    $this->data['active_room'][$sesi['active_month']]['tka_saintek'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 2) {
                    $this->data['active_room'][$sesi['active_month']]['tka_soshum'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 3) {
                    $this->data['active_room'][$sesi['active_month']]['tka_campuran'] = $doing_exam['active_exam'];
                }
                if ($doing_exam['status'] == 4) {
                    $this->data['active_room'][$sesi['active_month']]['tps'] = $doing_exam['active_exam'];
                }
            }
        }

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/index');
        $this->load->view('user/template/footer');
    }

    public function statistik()
    {
        $this->data['exam_history'] = $this->base_model->get_join_item('result', 'exam_history.*, score', 'exam_id ASC', 'exam_history', ['exam'], ['exam.id=exam_history.exam_id'], ['inner'], ['exam.user_id' => $this->session->userdata('user_id')]);
        $this->data['orders'] = $this->base_model->get_item('result', 'orders', '*', ['user_id' => $this->session->userdata('user_id')]);
        $this->data['title'] = "Statistik";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/statistik');
        $this->load->view('user/template/footer');
    }

    public function product()
    {
        $this->data['title'] = "Product";

        $this->data['product'] = $this->base_model->get_join_item('result', 'product.*', NULL, 'product', ['product_item'], ['product.id=product_item.product_id'], ['inner']);

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/product/product');
        $this->load->view('user/template/footer');
    }

    public function order($id)
    {
        $this->data['title'] = "Product";
        $this->data['product'] = $this->base_model->get_item('row', 'product', '*', ['id' => $id]);
        if (!$this->data['product']) {
            show_404();
        }
        $this->data['product_item'] = $this->base_model->get_item('result', 'product_item', '*', ['product_id' => $id]);

        if ($this->input->post('ticket')) {
            $this->form_validation->set_rules('ticket', 'Tiket', 'trim|numeric|required');

            if ($this->form_validation->run() === TRUE) {
                $item = $this->base_model->get_item('row', 'product_item', '*', ['id' => $this->input->post('ticket')]);
                if (!$item) {
                    show_404();
                }
                $params = [
                    'product_id' => $item['product_id'],
                    'product_name' => $this->data['product']['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'user_id' => $this->session->userdata('user_id'),
                    'category' => $this->input->post('category'),
                    'created' => date('Y-m-d H:i:s')
                ];
                $order = $this->base_model->insert_item('orders', $params, 'id');
                if ($order) {
                    $order_item = $this->base_model->get_item('row', 'orders', '*', ['id' => $order]);
                    //$this->session->set_flashdata('message_sa', 'Kamu memesan ' . $order_item['quantity'] . ' Tiket ' . $order_item['product_name'] . ' Harga ' . number_format($order_item['price'], 0, '', '.') . '. Kamu akan diarahkan ke WA untuk menyelesaikan pesananmu.');
                    //$this->session->set_flashdata('message_wa', 'Halo kak saya telah pesan ' . $order_item['quantity'] . ' Tiket ' . $order_item['product_name'] . ' Harga ' . number_format($order_item['price'], 0, '', '.'));
                    redirect('usr/transaction/' . $order);
                }
            }
        }
        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/product/product_item');
        $this->load->view('user/template/footer');
    }

    public function order_history($id)
    {
    }

    public function profile()
    {
        $this->data['title'] = "Profile";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/template/sidebar');
        $this->load->view('user/template/topbar');
        $this->load->view('user/profile');
        $this->load->view('user/template/footer');
    }

    public function _is_logged_in()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
    }

    public function _is_doing_exam()
    {

        $exam_data = $this->base_model->get_item('row', 'exam', '*', ['user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status !=' => 0]);
        if ($exam_data) {
            if (date('Y-m-d H:i:s') <= date('Y-m-d H:i:s', strtotime($exam_data['end_date']))) {
                redirect('exm/start');
            } else {
                $params = array(
                    'status' => 0,
                    'end_date' => NULL,
                );
                switch ($exam_data['status']) {
                    case 1:
                    case 2:
                    case 3:
                        $params['tka'] = 1;
                        break;
                    case 4:
                        $params['tps'] = 1;
                        break;
                }
                $this->base_model->update_item('exam', $params, array('user_id' => $this->session->userdata('user_id'), 'month' => date('n'), 'status' => $exam_data['status']));
                $this->session->set_flashdata('message_sa', 'Selamat kamu telah menyelesaikan TPS/TKA');
                redirect('usr');
            }
        }
    }

    //Transaction Handling
    public function transaction($id)
    {
        $this->data['orders'] = $this->base_model->get_join_item('row', 'orders.*, users.first_name, users.email, users.phone', NULL, ['orders'], ['users'], ['orders.user_id = users.id'], ['inner'], ['orders.id' => $id]);
        if (empty($this->data['orders'])) {
            show_404();
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LeUCYpw_pv89q-NPJ8ovRHB7';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $this->data['clientKey'] = 'SB-Mid-client-_MbfciIfUsdrBIKp';
        $this->data['snapToken'] = $this->data['orders']['snaptoken'];

        if (is_null($this->data['orders']['snaptoken'])) {

            $params = array(
                'transaction_details' => array(
                    'order_id' => $this->data['orders']['id'],
                    'gross_amount' => $this->data['orders']['price'],
                ),
                'item_details' => [array(
                    'id' => $this->data['orders']['product_id'],
                    'price' => $this->data['orders']['price'],
                    'quantity' => $this->data['orders']['quantity'],
                    'name' => $this->data['orders']['product_name'],
                    'category' => $this->data['orders']['category'],
                )],
                'customer_details' => array(
                    'first_name' => $this->data['orders']['first_name'],
                    'email' => $this->data['orders']['email'],
                    'phone' => $this->data['orders']['phone'],
                ),
            );

            $this->data['snapToken'] = \Midtrans\Snap::getSnapToken($params);
        }

        if ($this->data['orders']['payment'] == 'gopay' && $this->data['orders']['status'] == 'pending') {
            $status = get_object_vars(\Midtrans\Transaction::status($this->data['orders']['id']));
            if ($status['transaction_status'] == 'pending') {
                $cancel = \Midtrans\Transaction::cancel($this->data['orders']['id']);
                $this->base_model->update_item('orders', ['status' => 'cancel'], ['id' => $this->data['orders']['id']]);
                $this->data['orders']['status'] = 'cancel';
            }
        }
        $this->data['title'] = "Pembayaran";

        $this->load->view('user/template/header', $this->data);
        $this->load->view('user/product/detail_pembayaran');
        $this->load->view('user/template/footer');
    }

    public function update_transaction()
    {
        if ($this->base_model->get_item('row', 'orders', '*', ['id' => $this->input->post('id')])) {

            $params = [
                'payment' => $this->input->post('payment'),
                'status' => $this->input->post('status'),
                'modified' => $this->input->post('modified'),
            ];
            $this->base_model->update_item('orders', $params, ['id' => $this->input->post('id')]);
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }

    public function update_snaptoken()
    {
        $data = $this->base_model->get_item('row', 'orders', '*', ['id' => $this->input->post('id')]);
        if ($data) {
            if (is_null($data['snaptoken'])) {
                $this->base_model->update_item('orders', ['snaptoken' => $this->input->post('snaptoken')], ['id' => $this->input->post('id')]);
            }
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }

    public function get_transaction()
    {
        $data = $this->base_model->get_item('row', 'orders', 'product_name, payment, status', ['id' => $this->input->post('id')]);
        if ($data) {
            echo json_encode(['status' => TRUE, 'data' => $data]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
