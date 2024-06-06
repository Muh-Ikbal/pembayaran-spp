<?php
class Auth extends Controller
{
    public function index()
    {
        $this->view('auth/login');
    }
    public function authLogin()
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $siswaUser = $this->model('siswa_model')->getUserSiswa($username);
        $adminUser = $this->model('user_model')->getUsers($username);

        if (sizeof($siswaUser) > 0) {
            if (password_verify($password, $siswaUser['password'])) {
                session_start();
                $_SESSION['username'] = $siswaUser['name'];
                Flasher::setFlasher('berhasil', 'user ', ' login', 'success', '');
                header('Location:' . BASEURL . '/siswa/dashboard');
            } else {
                Flasher::setFlasher('salah', 'password ', ' gagal login', 'danger', '');
                header('Location:' . BASEURL . '/auth');
            }
        } else if (sizeof($adminUser) > 0) {
            if (password_verify($password, $adminUser['password'])) {
                session_start();
                $_SESSION['username'] = $adminUser['name'];
                $_SESSION['role'] = $adminUser['role'];
                Flasher::setFlasher('berhasil', 'user ', ' login', 'success', '');
                header('Location:' . BASEURL . '/admin');
            } else {
                Flasher::setFlasher('salah', 'password ', ' gagal login', 'danger', '');
                header('Location:' . BASEURL . '/auth');
            }
        } else {
            Flasher::setFlasher('salah', 'username ', ' gagal login', 'danger', '');
            header('Location:' . BASEURL . '/auth');
        }
    }

    public function authLogout(){
        session_start();
        session_unset();
        session_destroy();
        header('location:'.BASEURL.'/auth');
    }
}
