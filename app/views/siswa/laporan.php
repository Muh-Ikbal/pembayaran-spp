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

        span {
            font-size: 1.2rem !important;
        }
    </style>
    <title>Laporan Pembyaran</title>
</head>

<body>
    <div class="container my-3" id="invoice">
        <!-- header content -->
        <header>
            <div class="nav d-flex justify-content-between align-items-center">
                <div class="logo ">
                    <h3 class="fw-bold">Pembayaran <br>SPP</h3>
                </div>
                <div class="confirm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#699BF7" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                    <strong>LUNAS</strong>
                </div>
            </div>
            <hr class="bg-black" style="height: 2px; border: none; background-color: black;">
            <div class="information d-flex justify-content-between align-items-center">
                <div class="billTo">
                    
                    <h4 class="fw-bold">Bill To</h4>
                    <Span class="fw-bold"><?= $data['pembayaran']['name'] ?></Span> <br>
                    <Span class="" style="font-size: 1rem !important;"><?= $data['pembayaran']['nis'] ?></Span>
                </div>
                <div class="payTo text-end">
                    <h4 class="fw-bold">Pay To</h4>
                    <Span class="fw-bold">SMAN 2 KENDARI</Span> <br>
                    <Span class="text-sm" style="font-size: 1rem !important;">@pembayaranSPP</Span>
                </div>
            </div>
            <hr class="bg-black" style="height: 2px; border: none; background-color: black;">
            <div class="desc-bill mt-5">
                <table class="fw-bold" style="font-size: 1.1em;">
                    <tr>
                        <td width="300">Va Number </td>
                        <td>:</td>
                        <td><?= $data['pembayaran']['va_number'] ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Pembayaran </td>
                        <td>:</td>
                        <td><?= $data['pembayaran']['payment_date'] ?></td>
                    </tr>
                </table>
            </div>
        </header>
        <!-- main content -->
        <main class="my-5">
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
                    <tr height="200">
                        <th scope="row"></th>
                        <td><?= $data['pembayaran']['name'] ?></td>
                        <td><?= $data['pembayaran']['nis'] ?></td>
                        <td><?= $data['pembayaran']['class_name'] ?></td>
                        <td><?= $data['pembayaran']['semester'] ?></td>
                        <td><?= $data['pembayaran']['SPP'] ?></td>
                        <td><?= $data['pembayaran']['amount_paid'] ?></td>
                    </tr>
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
    <div class="container">
        <div class="action my-5">
            <button class="btn btn-primary"> kembali </button>
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
                filename: 'invoice.pdf',
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

</html>