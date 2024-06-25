<h1 class="h3 mb-3">Entire Data Pembayaran</h1>
<?php ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="pembayaranForm" method="post">
                    <input type="hidden" name="student_id" id="student_id" value="<?= $data['siswa']['nis'] ?>">
                    <table class="table">
                        <tr>
                            <td width='200'>Nama Lengkap</td>
                            <td width='1'>:</td>
                            <td>
                                <input type="text" name="name" id="name" class="form-control" readonly value="<?= $data['siswa']['name'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Kelas</td>
                            <td width='1'>:</td>
                            <td>
                                <select class="form-control" name="id_class" id="id_class">
                                    <option value="<?= $data['siswa']['class_id'] ?>" selected><?= $data['kelas']['class_name'] ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Wali Kelas</td>
                            <td width='1'>:</td>
                            <td>
                                <select class="form-control" name="id_teacher" id="id_teacher">
                                    <option value="<?= $data['guru']['id_teacher'] ?>" selected><?= $data['guru']['full_name'] ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Semester</td>
                            <td width='1'>:</td>
                            <td>
                                <select class="form-select" name="semester" id="semester">
                                    <?php foreach ($data['semester'] as $semester) : ?>
                                        <option value="<?= $semester['id_semester'] ?>"><?= $semester['semester'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Jumlah Bayar</td>
                            <td width='1'>:</td>
                            <td>
                                <input class="form-control" type="number" name="jumlah_bayar" id="jumlahBayar" readonly value="<?= $data['siswa']['SPP'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'></td>
                            <td width='1'></td>
                            <td class="text-end">
                                <button id="tombolPay" class="btn btn-primary" type="button">Tambah Bayar</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>