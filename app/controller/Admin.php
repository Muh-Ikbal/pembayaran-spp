<?php
class Admin extends Controller
{
    public function __construct()
    {
        Midleware::checkLogin();
        Midleware::checkAdmin();
    }
    public function index()
    {
        header('Location:' . BASEURL . '/dashboard');
    }
    public function kelas()
    {
        $data['kelas'] = $this->model('kelas_model')->getAllClass();
        $data['wakel'] = $this->model('guru_model')->getAllGuru();
        $this->view('templates-admin/header');
        $this->view('admin/data-kelas', $data);
        $this->view('templates-admin/footer');
    }
    public function siswa()
    {
        $data['siswa'] = $this->model('siswa_model')->getAllSiswa();
        $data['kelas'] = $this->model('kelas_model')->getAllClass();
        $this->view('templates-admin/header');
        $this->view('admin/data-siswa', $data);
        $this->view('templates-admin/footer');
    }
       public function users()
    {
        $data['users'] = $this->model('user_model')->getAllUser();
        $this->view('templates-admin/header');
        $this->view('admin/data-user', $data);
        $this->view('templates-admin/footer');
    }
    public function semesters()
    {
        $data['semesters'] = $this->model('semester_model')->getAllSemester();$data['users'] = $this->model('user_model')->getAllUser();
        
        $this->view('templates-admin/header');
        $this->view('admin/data-semester', $data);
        $this->view('templates-admin/footer');
    }
    public function guru()
    {
        $data['guru'] = $this->model('guru_model')->getAllGuru();
        $data['kelas'] = $this->model('kelas_model')->getAllClass();
        $data['users'] = $this->model('user_model')->getAllUser();
        
        $this->view('templates-admin/header');
        $this->view('admin/data-guru', $data);
        $this->view('templates-admin/footer');
    }
    // function get data for ajax
    public function getData($model, $method)
    {
        echo json_encode($this->model("$model")->$method($_POST['id']));
    }

    // Add Items
    public function addSiswa()
    {
        if ($this->model('siswa_model')->addSiswa($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'Siswa');
            header('Location:' . BASEURL . '/admin/siswa');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' ditambahkan', 'danger', 'Siswa');
            header('Location:' . BASEURL . '/admin/siswa');
        }
    }

    public function addKelas()
    {
        if ($this->model('kelas_model')->addKelas($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'Kelas');
            header('Location:' . BASEURL . '/admin/kelas');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' ditambahkan', 'danger', 'Kelas');
            header('Location:' . BASEURL . '/admin/kelas');
        }
    }
    public function addUser()
    {
        if ($this->model('user_model')->addUser($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'User');
            header('Location:' . BASEURL . '/admin/users');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' ditambahkan', 'danger', 'User');
            header('Location:' . BASEURL . '/admin/users');
        }
    }
    public function addSemester()
    {
        if ($this->model('semester_model')->addSemester($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' ditambahkan', 'danger', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
        }
    }
    public function addGuru()
    {
        $result = $this->model('guru_model')->addGuru($_POST);
        if (is_numeric($result) && $result > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'Guru');
            header('Location:' . BASEURL . '/admin/guru');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' ditambahkan:'.$result, 'danger', 'Guru');
            header('Location:' . BASEURL . '/admin/guru');
        }
    }

    // Delete Items
    public function delSiswa($id)
    {
        if ($this->model('siswa_model')->delSiswa($id) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' dihapus', 'success', 'siswa');
            header('Location:' . BASEURL . '/admin/siswa');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' dihapus', 'danger', 'siswa');
            header('Location:' . BASEURL . '/admin/siswa');
        }
    }
    public function delKelas($id)
    {
        $result = $this->model('kelas_model')->delKelas($id) ;
        if (is_numeric($result)&&$result>0) {
            Flasher::setFlasher('berhasil', 'data ', ' dihapus', 'success', 'kelas');
            header('Location:' . BASEURL . '/admin/kelas');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' dihapus : '.$result, 'danger', 'kelas');
            header('Location:' . BASEURL . '/admin/kelas');
        }
    }
    public function delUser($id)
    {
        if ($this->model('user_model')->delUser($id) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' dihapus', 'success', 'users');
            header('Location:' . BASEURL . '/admin/users');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' dihapus', 'danger', 'users');
            header('Location:' . BASEURL . '/admin/users');
        }
    }
    public function delSemester($id)
    {
        if ($this->model('semester_model')->delSemester($id) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' dihapus', 'success', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' dihapus', 'danger', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
        }
    }
    public function delGuru($id)
    {
        if ($this->model('guru_model')->delGuru($id) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' dihapus', 'success', 'guru');
            header('Location:' . BASEURL . '/admin/guru');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' dihapus', 'danger', 'guru');
            header('Location:' . BASEURL . '/admin/guru');
        }
    }

    // update items
    public function getUpdtSiswa()
    {
        $this->getData('siswa_model', 'getSiswa');
    }
    public function updtSiswa()
    {
        if ($this->model('siswa_model')->updtSiswa($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' diubah', 'success', 'siswa');
            header('Location:' . BASEURL . '/admin/siswa');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' diubah', 'danger', 'siswa');
            header('Location:' . BASEURL . '/admin/siswa');
        }
    }

    public function getUpdtKelas()
    {
        $this->getData('kelas_model', 'getKelas');
    }
    
    public function updtKelas()
    {
        if ($this->model('kelas_model')->updtKelas($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' diubah', 'success', 'kelas');
            header('Location:' . BASEURL . '/admin/kelas');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' diubah', 'danger', 'kelas');
            header('Location:' . BASEURL . '/admin/kelas');
        }
    }
    public function getUpdtUser()
    {
        $this->getData('user_model', 'getUser');
    }
    
    public function updtUser()
    {
        if ($this->model('user_model')->updtUser($_POST) > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' diubah', 'success', 'user');
            header('Location:' . BASEURL . '/admin/users');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' diubah', 'danger', 'user');
            header('Location:' . BASEURL . '/admin/users');
        }
    }

    public function getUpdtSemester()
    {
        $this->getData('semester_model', 'getSemester');
    }
    
    public function updtSemester(){
        $result = $this->model('semester_model')->updtSemester($_POST);
        if (is_numeric($result) && $result > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' diubah', 'success', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' diubah : '.$result, 'danger', 'semester');
            header('Location:' . BASEURL . '/admin/semesters');
        }
    }
    public function getUpdtGuru()
    {
        $this->getData('guru_model', 'getGuru');
    }
    public function updtGuru(){
        // var_dump($_POST);
        $result = $this->model('guru_model')->updtGuru($_POST);
        if (is_numeric($result) && $result > 0) {
            Flasher::setFlasher('berhasil', 'data ', ' diubah', 'success', 'guru');
            header('Location:' . BASEURL . '/admin/guru');
            exit;
        } else {
            Flasher::setFlasher('gagal', 'data ', ' diubah : '.$result, 'danger', 'guru');
            header('Location:' . BASEURL . '/admin/guru');
        }
    }
}
