<?php

class Dashboard extends Controller{
    public function __construct()
    {
        Midleware::checkLogin();
    }
    public function index(){
        if(isset($_SESSION['role'])){
            $data['user'] = $this->model('user_model')->getUsers($_SESSION['username']);
        }else{
            $data['user'] = $this->model('siswa_model')->getUserSiswa($_SESSION['username']);
        }
        $this->view('templates-admin/header');
        $this->view('dashboard/index',$data['user']);
        $this->view('templates-admin/footer');
    }
}