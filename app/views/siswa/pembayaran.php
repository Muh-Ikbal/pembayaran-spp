<h1 class="h3 mb-3">Entire Data Pembayaran</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <table class="table ">
                        <tr>
                            <td width='200'>Wali Kelas</td>
                            <td width='1'>:</td>
                            <td>
                                <input type="text" class="form-control" name="wakel" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Nama</td>
                            <td width='1'>:</td>
                            <td>
                                <input type="text" readonly class="form-control" name="siswa">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Tanggal Bayar</td>
                            <td width='1'>:</td>
                            <td>
                                <input class="form-control" type="date" name="tgl_bayar" id="">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Tahun Bayar</td>
                            <td width='1'>:</td>
                            <td>
                                <input class="form-control" type="number" name="tahun_bayar" id="">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>semester</td>
                            <td width='1'>:</td>
                            <td>
                                <select class="form-select" name="semester" id="sppSelect">
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width='200'>Jumlah bayar</td>
                            <td width='1'>:</td>
                            <td>
                                <input class="form-control" type="number" name="jumlah_bayar" id="jumlahBayar" readonly value="">
                            </td>
                        </tr>
                        <tr>
                            <td width='200'></td>
                            <td width='1'></td>
                            <td class="text-end"><button class="btn btn-primary" name="simpan" value="simpan" type="submit">Simpan</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>