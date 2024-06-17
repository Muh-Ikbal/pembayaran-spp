<?php

class Siswa extends Controller
{
    public function __construct()
    {
        Midleware::checkLogin();
        Midleware::checkSiswa();
    }
    public function pembayaran()
    {
        $user = $_SESSION['username'];
        $nis = $_SESSION['nis'];
        // var_dump($user);
        $data['siswa'] = $this->model('siswa_model')->getUserSiswa($user);
        $data['semester'] = $this->model('semester_model')->getAllSemester();
        $data['pembayaran'] = $this->model('pembayaran_model')->getAllBillsByNis($nis);
        $data['kelas'] = $this->model('kelas_model')->getKelas($data['siswa']['class_id']);
        $data['guru'] = $this->model('guru_model')->getGuruByClassId($data['siswa']['class_id']);

        // $data['guru'] = $this->model('guru_model')->getAllGuru();
        $this->view('templates-admin/header');
        $this->view('siswa/pembayaran', $data);
        $this->view('templates-admin/footer');
    }
    // public function addPembayaran()
    // {
    //     $result = $this->model('pembayaran_model')->addPembayaran($_POST);
    //     if (is_numeric($result) && $result > 0) {
    //         Flasher::setFlasher('berhasil', 'data ', ' ditambahkan', 'success', 'Pembayaran');
    //         header('Location:' . BASEURL . '/siswa/pembayaran');
    //         exit;
    //     } else {
    //         Flasher::setFlasher('gagal', 'data ', ' ditambahkan:' . $result, 'danger', 'Pembayaran');
    //         header('Location:' . BASEURL . '/siswa/pembayaran');
    //     }
    // }
    private function isAjaxRequest()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    public function paySpp()
    {
        if ($this->isAjaxRequest()) {
            $data = [
                'student_id' => $_POST['student_id'],
                'name' => $_POST['nama'],
                'id_class' => $_POST['id_class'],
                'id_teacher' => $_POST['id_teacher'],
                'semester' => $_POST['semester'],
                'spp' => $_POST['spp']
            ];
            $checkexisting = $this->model('pembayaran_model')->checkExistingPayment($data['student_id'], $data['semester']);
            if ($checkexisting > 0) {
                $response = [
                    'status' => 'error',
                    'message' => 'Pembayaran gagal ditambahkan: semester ini sudah dibayar'
                ];
            } else {
                $result = $this->model('siswa_model')->getSiswaForBill($data['student_id']);

                if ($result > 0) {
                    \Midtrans\Config::$serverKey = 'SB-Mid-server-v21xFDI2lYQrqFiuO5uDOb4M';
                    \Midtrans\Config::$isProduction = false;
                    \Midtrans\Config::$isSanitized = true;
                    \Midtrans\Config::$is3ds = true;

                    $items = [
                        [
                            'id'       => "SPP_{$data['student_id']}_{$data['semester']}",
                            'price'    => $data['spp'],
                            'quantity' => 1,
                            'name'     => 'SPP Semester ' . $data['semester']
                        ]
                    ];

                    $billing_address = [
                        'first_name'   => $data['name'],
                        'last_name'    => '',
                        'address'      => '',
                        'city'         => '',
                        'postal_code'  => '',
                        'phone'        => '',
                        'country_code' => 'IDN'
                    ];

                    $shipping_address = $billing_address;

                    $customer_details = [
                        'first_name'       => $data['name'],
                        'last_name'        => '',
                        'phone'            => '',
                        'billing_address'  => $billing_address,
                        'shipping_address' => $shipping_address
                    ];

                    $params = [
                        'transaction_details' => [
                            'order_id' => rand(),
                            'gross_amount' => $data['spp'],
                        ],
                        'item_details'        => $items,
                        'customer_details'    => $customer_details
                    ];

                    try {
                        $snapToken = \Midtrans\Snap::getSnapToken($params);
                        $response = [
                            'status' => 'success',
                            'message' => 'Pembayaran berhasil ditambahkan',
                            'student_id' => $data['student_id'],
                            'name' => $data['name'],
                            'id_class' => $data['id_class'],
                            'id_teacher' => $data['id_teacher'],
                            'semester' => $data['semester'],
                            'spp' => $data['spp'],
                            'snapToken' => $snapToken
                        ];
                    } catch (Exception $e) {
                        $response = [
                            'status' => 'error',
                            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                        ];
                    }
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Pembayaran gagal ditambahkan: siswa tidak terdaftar'
                    ];
                }
            }

            echo json_encode($response);
            return;
        }

        $this->show_404();
    }

    private function show_404()
    {
        header("HTTP/1.0 404 Not Found");
        include 'path_to_404_page/404.php';
        exit();
    }

    public function addPembayaran()
    {
        if ($this->isAjaxRequest()) {
            $data = [
                'student_id' => $_POST['student_id'],
                'nama' => $_POST['nama'],
                'id_class' => $_POST['id_class'],
                'id_teacher' => $_POST['id_teacher'],
                'semester' => $_POST['semester'],
                'spp' => $_POST['spp'],
                'amount_paid' => $_POST['amount_paid'],
                'payment_date' => $_POST['payment_date'],
                'transaction_status' => $_POST['transaction_status'],
                'payment_type' => $_POST['payment_type'],
                'va_number' => $_POST['va_number'],
                'bank' => $_POST['bank'],
                'order_id' => $_POST['order_id'],
            ];
            $result = $this->model('pembayaran_model')->addPembayaran($data);

            if ($result) {
                $response = [
                    'status' => 'success',
                    'message' => 'Silahkan lakukan pembayaran'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan pembayaran'
                ];
            }

            echo json_encode($response);
            return;
        }

        $this->show_404();
    }

    public function laporan($id)
    {

        $data['pembayaran'] = $this->model('pembayaran_model')->getAllBillsById($id);
        $this->view('siswa/laporan', $data);
    }

   
}
