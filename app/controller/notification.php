<?php
class Notification extends Controller
{
    public function getNotif()
    {
        $response = [
            'status' => 'success',
            'message' => 'Tidak ada Notifikasi',
            'data' => []
        ];

        if (isset($_SESSION['nis'])) {
            $semester = $this->model('semester_model')->getAllSemester();
            $unpaidSemesters = [];

            foreach ($semester as $sem) {
                $checkexisting = $this->model('pembayaran_model')->checkExistingPayment($_SESSION['nis'], $sem['id_semester']);
                if (!$checkexisting) {
                    $dueDate = new DateTime($sem['tenggat_waktu']);
                    $currentDate = new DateTime();
                    $daysRemaining = $currentDate->diff($dueDate)->days;
                    $unpaidSemesters[] = [
                        'semester' => $sem['semester'],
                        'days_remaining' => $daysRemaining
                    ];
                }
            }

            if (!empty($unpaidSemesters)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Silahkan lakukan pembayaran untuk semester berikut:',
                    'data' => $unpaidSemesters
                ];
            }
        } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'parents') {
            $semester = $this->model('semester_model')->getAllSemester();
            $parents = $this->model('parents_model')->getParentsByUserId($_SESSION['id_user']);
            $siswa = $this->model('siswa_model')->getSiswa($parents['id_student']);
            $unpaidSemesters = [];

            foreach ($semester as $sem) {
                $checkexisting = $this->model('pembayaran_model')->checkExistingPayment($siswa['nis'], $sem['id_semester']);
                if (!$checkexisting) {
                    $dueDate = new DateTime($sem['tenggat_waktu']);
                    $currentDate = new DateTime();
                    $daysRemaining = $currentDate->diff($dueDate)->days;
                    $unpaidSemesters[] = [
                        'semester' => $sem['semester'],
                        'days_remaining' => $daysRemaining
                    ];
                }
            }

            if (!empty($unpaidSemesters)) {
                $response = [
                    'status' => 'success',
                    'message' => 'Silahkan lakukan pembayaran untuk semester berikut:',
                    'data' => $unpaidSemesters
                ];
            }
        }

        echo json_encode($response);
        return;
    }
}
