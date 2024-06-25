<h1 class="h3 mb-3">History Pembayaran</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="head-table">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') :
                            ?>
                                <a class="btn btn-success mb-2" href="<?= BASEURL ?>/guru/laporan/<?= $data['guru']['id_teacher'] ?>">Generate Laporan</a>
                            <?php endif ?>
                        </div>
                        <?php if (isset($_SESSION['role'])) : ?>
                            <div class="col-md-6">
                                <form action="<?= BASEURL ?>/history" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" name="keyword" class="form-control" placeholder="cari history pembayaran" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">cari</button>

                                    </div>
                                </form>
                            </div>
                        <?php endif ?>
                    </div>
                </div>

                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nis</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Nomor VA</th>
                            <th>Jumlah SPP</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data['pembayaran'] as $res) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $res['student_id'] ?></td>
                                <td><?= $res['name'] ?></td>
                                <td><?= $res['class_name'] ?></td>
                                <td><?= $res['semester'] ?></td>
                                <td><?= $res['va_number'] ?></td>
                                <td><?= $res['SPP'] ?></td>
                                <td><?= $res['amount_paid'] ?></td>
                                <?php
                                if ($res['transaction_status'] == 'settlement') {
                                    $att = "text-bg-success";
                                    $status = 'success';
                                } else if ($res['transaction_status'] == 'pending') {
                                    $att =  "text-bg-secondary";
                                    $status = 'pending';
                                } else {
                                    $att =  "text-bg-danger";
                                    $status = 'expired';
                                }
                                ?>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <div class="badge <?= $att ?>"><?= $status ?></div>
                                    </div>
                                </td>

                                <td class="d-flex py-4 align-items-center gap-2">
                                    <?php
                                    if (!isset($_SESSION['role'])) :
                                        if ($status == 'success') :
                                    ?>
                                            <a style="font-size: 0.6rem ;" href="<?= BASEURL ?>/siswa/laporan/<?= $res['id_pembayaran'] ?>" class="btn btn-primary me-md-2">
                                                Cetak
                                            </a>
                                    <?php
                                        endif;
                                    endif ?>
                                    <?php
                                    if ($status == 'expired') :
                                    ?>
                                        <a style="font-size: 0.6rem;" href="<?= BASEURL ?>/history/hapus/<?= $res['id_pembayaran'] ?>" class="btn btn-danger">
                                            hapus
                                        </a>
                                    <?php endif ?>
                                    <a style="font-size: 0.6rem;" href="<?= BASEURL ?>/history/cekStatus/<?= $res['id_pembayaran'] ?>" class="btn btn-warning">
                                        status
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>