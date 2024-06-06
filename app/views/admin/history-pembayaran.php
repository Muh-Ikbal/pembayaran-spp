<h1 class="h3 mb-3">History Pembayaran</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Siswa</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-success mb-2" target="_blank" href="laporan.php">Generate Laporan</a>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nis</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Jumlah SPP</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($data['pembayaran'] as $res):
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$res['student_id']?></td>
                            <td><?=$res['name']?></td>
                            <td><?=$res['class_name']?></td>
                            <td><?=$res['semester_name']?></td>
                            <td><?=$res['years']?></td>
                            <td><?=$res['SPP']?></td>
                            <td><?=$res['amount_paid']?></td>
                            <?php 
                            $status = 'belum lunas';
                            if($res['SPP']==$res['amount_paid']){
                                $status = 'lunas';
                            }
                            ?>
                            <td><?=$status?></td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Bukti Pembayaran
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
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