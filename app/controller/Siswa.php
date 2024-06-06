<?php

class Siswa extends Controller{
    public function __construct()
    {
        Midleware::checkLogin();
        Midleware::checkSiswa();
    }
    public function index(){
        $this->view('templates-admin/header');
        $this->view('siswa/dashboard');
        $this->view('templates-admin/footer');
    }
    public function pembayaran(){
        $this->view('templates-admin/header');
        $this->view('siswa/pembayaran');
        $this->view('templates-admin/footer');
    }
}