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
                $_SESSION['username'] = $siswaUser['username'];
                $_SESSION['name'] = $siswaUser['name'];
                $_SESSION['gambar'] = $siswaUser['gambar'];
                $_SESSION['nis'] = $siswaUser['nis'];
                $_SESSION['id_students'] = $siswaUser['id_students'];
                Flasher::setFlasher('berhasil', 'user ', ' login', 'success', '');
                header('Location:' . BASEURL . '/dashboard');
            } else {
                Flasher::setFlasher('salah', 'password ', ' gagal login', 'danger', '');
                header('Location:' . BASEURL . '/auth');
            }
        } else if (sizeof($adminUser) > 0) {
            if (password_verify($password, $adminUser['password'])) {
                session_start();
                $_SESSION['username'] = $adminUser['username'];
                $_SESSION['name'] = $adminUser['full_name'];
                $_SESSION['role'] = $adminUser['role'];
                $_SESSION['gambar'] = $adminUser['gambar'];
                $_SESSION['id_user'] = $adminUser['id_user'];
                Flasher::setFlasher('berhasil', 'user ', ' login', 'success', '');
                header('Location:' . BASEURL . '/dashboard');
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
