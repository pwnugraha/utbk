<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/third_party/midtrans/Midtrans.php';

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = "";

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/index');
        $this->load->view('homepage/footer');
    }

    public function tentang()
    {
        $data['title'] = "Tentang -";
        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/tentang');
        $this->load->view('homepage/footer');
    }

    public function testimoni()
    {
        $data['title'] = "Testimoni -";

        $this->load->view('homepage/header', $data);
        $this->load->view('homepage/testimoni');
        $this->load->view('homepage/footer');
    }

    public function notifhandler()
    {

        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LeUCYpw_pv89q-NPJ8ovRHB7';
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $log_params = [
            'order_id' => $order_id,
            'payment' => $type,
            'status' => $transaction,
            'created' => date('Y-m-d H:i:s'),
            'status_code' => $notif->status_code
        ];

        $data_order = $this->base_model->get_item('row', 'orders', '*', ['id' => $order_id]);
        if ($data_order['status'] == 'pending' || is_null($data_order['status'])) {
            $this->base_model->update_item('orders', ['payment' => $type, 'status' => $transaction, 'modified' => $notif->transaction_time], ['id' => $order_id]);
        }
        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $log_params['msg'] = "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    $log_params['msg'] = "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            $log_params['msg'] = "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            $log_params['msg'] = "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            $log_params['msg'] = "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            $log_params['msg'] = "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            $log_params['msg'] = "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
        $this->base_model->insert_item('order_notif', $log_params);
    }
}
