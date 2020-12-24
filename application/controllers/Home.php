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

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }
}
