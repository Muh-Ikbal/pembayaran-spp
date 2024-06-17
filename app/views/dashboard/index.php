<h1 class="h3 mb-3">Dashboard</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header mb-3">
                <div class="profile d-flex justify-content-center">
                    <?php
                    $gambar = 'profile.jpg';
                    if ($data['gambar'] != '') {
                        $gambar = $data['gambar'];
                    }
                    ?>
                    <img src="<?= BASEURL ?>/img/avatars/<?= $gambar ?>" alt="profile" class="rounded-circle shadow-lg" width="100">
                </div>
            </div>
            <div class="card-body">

                <div class="table-desc">
                    <table class="table ">

                        <tr>
                            <td width='200'>Nama User</td>
                            <td width='1'>:</td>
                            <td><?= $_SESSION['name'] ?></td>
                        </tr>
                        <?php
                        if (!isset($_SESSION['role'])) :
                        ?>

                            <tr>
                                <td width='200'>nis</td>
                                <td width='1'>:</td>
                                <td><?= $_SESSION['nis'] ?></td>
                            </tr>
                            <tr>
                                <td width='200'>Status</td>
                                <td width='1'>:</td>
                                <td>Siswa</td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td width='200'>Status</td>
                                <td width='1'>:</td>
                                <td><?= $_SESSION['role'] ?></td>
                            </tr>
                        <?php endif ?>

                        <tr>
                            <td width='200'>Tanggal Login</td>
                            <td width='1'>:</td>
                            <td><?= date('d-m-Y H:i:s') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>