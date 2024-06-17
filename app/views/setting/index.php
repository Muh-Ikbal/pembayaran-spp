<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>setting</title>
</head>

<body style="background-color: #CDB8A5;">
    <?php Flasher::flash(); ?>
    <div class="container">
        <div class="nav my-3">
            <a href="<?= BASEURL ?>/dashboard" style="text-decoration:none; color:black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blues" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
                Kembali
            </a>
        </div>
        <div class="head">
            <h3>Settings</h3>
        </div>
        <div class="content">
            <div class="profile border bg-white p-3 card">
                <h4>Avatar</h4>
                <div class="d-flex justify-content-between">
                    <img src="<?= BASEURL ?>/img/avatars/<?= $data['user']['gambar'] ?>" width="80" alt="">
                    <div class="d-flex gap-3">
                        <?php
                        $id = 'id_user';
                        if (!isset($_SESSION['role'])) {
                            $id = 'id_student';
                        }
                        ?>
                        <a class="color-primary modalUpdtAvatar" data-id="<?= $data['user']["$id"] ?>" data-bs-toggle="modal" data-bs-target="#updtProfile" style="text-decoration:none; cursor:pointer;">update avatar</a>
                    </div>
                </div>

            </div>
            <div class="profile border bg-white my-3 p-3 card">
                <h4>Password</h4>
                <div class="d-flex justify-content-between">
                    <form action="<?= BASEURL ?>/setting/updtPassword" method="post">
                        <?php
                        $id = 'id_user';
                        if (!isset($_SESSION['role'])) {
                            $id = 'id_student';
                        }
                        ?>
                        <input type="hidden" name="id" value="<?= $data['user']["$id"] ?>">
                        <div class="mb-3">
                            <label for="passwordOld" class="form-label">Password Lama</label>
                            <input type="password" name="old" class="form-control" required autocomplete="off" id="passwordOld">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Sekarang</label>
                            <input type="password" name="new" class="form-control" required id="newPassword">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirmasi Password</label>
                            <input type="password" class="form-control" required name="confirm" id="confirmPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="updtProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content user-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="forModalUser">Tambah Data Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASEURL ?>/setting/updtAvatar" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($data['user']['role'])) {
                        $id = $data['user']['id_user'];
                    } else {
                        $id = $data['user']['id_student'];
                    }
                    ?>
                    <input type="hidden" name="id_user" id="id_user" value="<?= $id ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <td width='100'>Profile</td>
                                                <td width='1'>:</td>
                                                <td><input type="file" required accept="image/png, image/gif, image/jpeg" class="form-control" name="profile" id="profile" value=""></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= BASEURL ?>/js/app.js"></script>
    <script src="<?= BASEURL ?>/js/index.js"></script>
    <script src="<?= BASEURL ?>/js/script.js"></script>
</body>

</html>