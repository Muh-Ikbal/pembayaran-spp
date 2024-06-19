<?php
class Guru extends Controller{
    public function __construct()
    {
        Midleware::checkLogin();
        Midleware::checkGuru();
    }
    public function index(){
        header('Location:' . BASEURL . '/dashboard');
    }

    public function laporan($id){
        $data['pembayaran'] = $this->model('pembayaran_model')->getAllBillsByIdTeacher($id);
        $data['teacher'] = $this->model('user_model')->getUser($_SESSION['id_user']);
        $data['nip'] = $this->model('guru_model')->getGuruByUserId($_SESSION['id_user']);
        $this->view('laporan/index', $data);
    }
}