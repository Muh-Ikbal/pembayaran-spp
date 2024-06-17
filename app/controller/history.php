<?php

class History extends Controller{
    public function __construct()
    {
        Midleware::checkLogin();
    }
    public function index()
    {
        // $data['pembayaran']
        if(isset($_SESSION['role'])){
            if($_SESSION['role']=='admin'){
                $data['pembayaran'] = $this->model('pembayaran_model')->getAllBills();
            }else{
                $data['guru'] = $this->model('guru_model')->getGuruByUserId($_SESSION['id_user']);
                $data['pembayaran'] = $this->model('pembayaran_model')->getAllBillsByIdTeacher($data['guru']['id_teacher']);
            }
        }else{
            $data['pembayaran'] = $this->model('pembayaran_model')->getAllBillsByNis($_SESSION['nis']);
        }        
        $this->view('templates-admin/header');
        $this->view('history/index', $data);
        $this->view('templates-admin/footer');
    }
    public function cekStatus($id_pembayaran)
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-v21xFDI2lYQrqFiuO5uDOb4M';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $result = $this->model('pembayaran_model')->cekPembayaran($id_pembayaran);
        $status = \Midtrans\Transaction::status($result['order_id']);
        if ($this->model('pembayaran_model')->updateStatus($id_pembayaran, $status->transaction_status)) {
            Flasher::setFlasher('berhasil', 'status ', ' diupdate', 'success', 'pembyaran');
            header('Location:' . BASEURL . '/history');
            exit;
        } else {
            Flasher::setFlasher('sudah', 'status ', ' paling update', 'warning', 'pembayaran');
            header('Location:' . BASEURL . '/history');
        }
    }
    

}