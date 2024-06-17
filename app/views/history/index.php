<h1 class="h3 mb-3">History Pembayaran</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Siswa</h5>
            </div>
            <div class="card-body">
                <div class="head-table">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['role']) && $_SESSION['role']=='teacher') :
                            ?>
                                <a class="btn btn-success mb-2" target="_blank" href="laporan.php">Generate Laporan</a>
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
                                    <div class="d-flex align-items-center gap-2">

                                        <div class="badge <?= $att ?>"><?= $status ?></div>
                                    </div>
                                </td>

                                <td class="d-flex align-items-center">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- header-start -->
                <div class="text-center">
                    <h1>ikbal</h1>
                </div>
                <!-- header-end -->
                <!-- content-start -->
                <div>
                    <table>
                        <tr>
                            <td>nis</td>
                            <td>:</td>
                            <td>2234</td>
                        </tr>
                        <tr>
                            <td>tanggal bayar</td>
                            <td>:</td>
                            <td>12/08/2024</td>
                        </tr>
                        <tr>
                            <td>SPP</td>
                            <td>:</td>
                            <td>250000</td>
                        </tr>
                        <tr>
                            <td>Jumlah Bayar</td>
                            <td>:</td>
                            <td>250000</td>
                        </tr>
                    </table>
                </div>
                <!-- content-end -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </div>
</div>