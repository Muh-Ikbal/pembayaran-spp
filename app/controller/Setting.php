<?php

class Setting extends Controller
{
    public function __construct()
    {
        Midleware::checkLogin();
    }
    public function index()
    {
        if (isset($_SESSION['role'])) {
            $data['user'] = $this->model('user_model')->getUsers($_SESSION['username']);
        } else {
            $data['user'] = $this->model('siswa_model')->getUserSiswa($_SESSION['username']);
        }
        $this->view('setting/index', $data);
    }


    public function getData($model, $method)
    {
        echo json_encode($this->model("$model")->$method($_POST['id']));
    }
    public function getUpdtAvatar()
    {
        $model = 'siswa_model';
        $method = 'getSiswa';
        if (isset($_SESSION['role'])) {
            $model = 'user_model';
            $method = 'getUser';
        }
        $this->getData($model, $method);
    }

    public function updtAvatar()
    {
        // var_dump($_POST);
        // var_dump($_FILES);
        if (isset($_SESSION['role'])) {
            $result = $this->model('user_model')->updtAvatar($_POST, $_FILES);
        } else {
            $result = $this->model('siswa_model')->updtAvatar($_POST, $_FILES);
        }
        if (is_numeric($result) && $result > 0) {
            Flasher::setFlasher('berhasil', '', ' diupdate', 'success', ' Avatar');
            header('Location:' . BASEURL . '/setting');
            exit;
        } else {
            Flasher::setFlasher('gagal', '', ' diupdate' . $result, 'success', ' Avatar');
            header('Location:' . BASEURL . '/setting');
            exit;
        }
    }
    public function updtPassword()
    {
        
        if (isset($_SESSION['role'])) {
            $data = $this->model('user_model')->getUser($_POST['id']);
        } else {
            $data = $this->model('siswa_model')->getSiswa($_POST['id']);
        }
        if (password_verify($_POST['old'], $data['password'])) {
            if ($_POST['new'] == $_POST['confirm']) {
                // echo"helloWordl";
                if (isset($_SESSION['role'])) {
                    $result = $this->model('user_model')->updtPassword($_POST);
                } else {
                    $result = $this->model('siswa_model')->updtPassword($_POST);
                }
                if (is_numeric($result) && $result > 0) {
                    Flasher::setFlasher('berhasil', '', ' diupdate', 'success', ' Password');
                    header('Location:' . BASEURL . '/setting');
                    exit;
                } else {
                    Flasher::setFlasher('gagal', '', ' diupdate:' . $result, 'danger', ' Password');
                    header('Location:' . BASEURL . '/setting');
                    exit;
                }
            }else{
                Flasher::setFlasher('gagal', '', ' diupdate:confirmasi password tidak sama', 'danger', ' Password');
                header('Location:' . BASEURL . '/setting');
            }
        }else{
            Flasher::setFlasher('gagal', '', ' diupdate:password lama salah', 'danger', ' Password');
            header('Location:' . BASEURL . '/setting');
        }
    }
}
