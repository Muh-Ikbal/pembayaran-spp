<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        Midleware::checkLogin();
    }
    public function index()
    {
        $data['user'] = $this->model('user_model')->getUsers($_SESSION['username']);
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
            $data['guru'] = $this->model('guru_model')->getGuruByUserId($_SESSION['id_user']);
            $data['kelas'] = $this->model('kelas_model')->getKelas($data['guru']['class_id']);
        } elseif (!isset($_SESSION['role'])) {
            $data['user'] = $this->model('siswa_model')->getUserSiswa($_SESSION['username']);
            $data['kelas'] = $this->model('kelas_model')->getKelas($data['user']['class_id']);
        } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'parents') {
            $data['parents'] = $this->model('parents_model')->getParentsByUserId($_SESSION['id_user']);
            $data['siswa'] = $this->model('siswa_model')->getSiswa($data['parents']['id_student']);
        }
        $this->view('templates-admin/header');
        $this->view('dashboard/index', $data);
        $this->view('templates-admin/footer');
    }
}
