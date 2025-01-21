<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'poppins', sans-serif;
        }

        thead tr {
            border-bottom: 2px solid black;
        }

        span {
            font-size: 1.2rem !important;
        }

        @media screen and (max-width: 600px) {
            h3 {
                font-size: 1rem !important;
            }

            span {
                font-size: 1rem !important;
            }

            .confirm strong {
                font-size: 1rem !important;
            }

            td {
                font-size: 0.8rem;
            }

            .main-content {
                overflow: auto;
            }

            .quote {
                font-size: 1rem !important;
            }
        }
    </style>
    <title>Laporan Pembyaran</title>
</head>

<body>
    <div class="container my-3" id="invoice">
        <!-- header content -->
        <header>
            <div class="nav">
                <div class="logo ">
                    <h3 class="fw-bold">Pembayaran <br>SPP</h3>
                </div>
            </div>
            <hr class="bg-black" style="height: 2px; border: none; background-color: black;">
            <?php
            // var_dump($data['pembayaran']);
            // var_dump($data['teacher']);
            ?>
            <div class="desc-bill mt-1">
                <table class="fw-bold" style="font-size: 1.1em;">
                    <tr>
                        <td width="200">Guru </td>
                        <td>:</td>
                        <td><?= $data['teacher']['full_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Nip </td>
                        <td>:</td>
                        <td><?= $data['nip']['nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Kelas </td>
                        <td>:</td>
                        <td><?=$data['kelas']['class_name'] ?></td>
                    </tr>
                </table>
            </div>
        </header>
        <!-- main content -->
        <main class="my-3 main-content">
            <table class="table table-bordered">
                <thead style="border-bottom: 2px;" class="text-center">
                    <tr class="p-0" style="font-size: 0.9rem;">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Nominal SPP</th>
                        <th scope="col">Jumlah Bayar</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider" style="font-size: 0.8rem;">
                    <?php
                    $no = 1;
                    foreach ($data['pembayaran'] as $bill) :
                        if ($bill['transaction_status'] == 'settlement') :
                    ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $bill['name'] ?></td>
                                <td><?= $bill['student_id'] ?></td>
                                <td><?= $bill['class_name'] ?></td>
                                <td><?= $bill['semester'] ?></td>
                                <td><?= $bill['SPP'] ?></td>
                                <td><?= $bill['amount_paid'] ?></td>

                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </main>
        <!-- footer -->
        <footer>
            <div class="quote fw-bold">
                Terimakasih telah melakukan pembayaran SPP. <br>
                “Tepat Waktu Bayar SPP, Sekolah Penuh Motivasi!”
            </div>
            <div class="copyright mt-5 d-flex justify-content-between">
                <div class="webname">
                    <div>@SMAN2Kendari</div>
                    <div>www.pembayaranSPP.co.id</div>
                </div>
            </div>
        </footer>
    </div>
    <div class="container d-flex justify-content-between">
        <div class="hidden"></div>
        <div class="action my-5">
            <a href="<?=BASEURL?>/history" class="btn btn-primary"> kembali </a>
            <button class="btn btn-success" onclick="unduh()"> unduh</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function unduh() {
            const element = document.getElementById('invoice');

            // Konfigurasi opsi untuk html2pdf
            const options = {
                margin: 1,
                filename: 'laporan pembayaran.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            // Menggunakan html2pdf untuk mengonversi elemen menjadi PDF
            html2pdf().set(options).from(element).save();
        }
    </script>

</body>

</html>s