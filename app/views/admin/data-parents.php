<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Orang Tua Siswa</h5>
            </div>
            <div class="card-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Orang Tua</th>
                            <th>Alamat</th>
                            <th>No.Telpon</th>
                            <th>Nama Anak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $i = 0;
                        foreach ($data['parent'] as $parent) :
                        ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $parent['full_name'] ?></td>
                                <td><?= $parent['alamat'] ?></td>
                                <td><?= $parent['no_telp'] ?></td>
                                <td><?= $parent['name'] ?></td>
                                <td>
                                    <div class="action px-2 d-flex gap-2">

                                        <a class="modalParent" id="#updtParents" href="<?= BASEURL ?>/admin/getUpdtParents/<?= $parent['id_parents'] ?>" data-bs-toggle="modal" data-bs-target="#updateParent" data-id="<?= $parent['id_parents'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1797AA" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg> Edit</a>
                                        <a onclick="return confirm('yakin?')" class="" href="<?= BASEURL ?>/admin/delParents/<?= $parent['id_parents'] ?>" id="delete"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FF4141" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>hapus</a>
                                    </div>
                                </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
            <div class="btn-tambah d-flex justify-content-end p-3">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success p-2 modalAddParent" data-bs-toggle="modal" data-bs-target="#tambahParents">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                    </svg>
                    Tambah Data Orang Tua
                </button>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahParents" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-guru">
            <div class="modal-header">
                <h5 class="modal-title" id="forModalGuru">Tambah Data Orang Tua</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL ?>/admin/addparents" method="post">
                <input type="hidden" name="id_kelas" id="id_kelas">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td width='100'>orang tua</td>
                                            <td width='1'>:</td>
                                            <td>
                                                <select class="form-control" name="id_user" id="id_user">
                                                    <option value="pil">Pilih Orang Tua Siswa</option>
                                                    <?php
                                                    $data['parent_ids'] = array_column($data['parent'], 'id_user');
                                                    foreach ($data['users'] as $user) :
                                                        if (!in_array($user['id_user'], $data['parent_ids']) && $user['role'] == 'parents') :
                                                    ?>
                                                            <option value="<?= $user['id_user'] ?>"><?= $user['full_name'] ?></option>
                                                    <?php

                                                        endif;
                                                    endforeach ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100'>Alamat</td>
                                            <td width='1'>:</td>
                                            <td><input type="text" class="form-control" name="alamat" id="alamat" value=""></td>
                                        </tr>
                                        <tr>
                                            <td width='100'>Telepon</td>
                                            <td width='1'>:</td>
                                            <td><input type="text" class="form-control" name="telepon" id="telepon" value=""></td>
                                        </tr>
                                        <tr>
                                            <td width='100'>siswa</td>
                                            <td width='1'>:</td>
                                            <td>
                                                <select class="form-control" name="student_id" id="student_id">
                                                    <option value="pil">Pilih Siswa</option>
                                                    <?php
                                                    $data['parent_ids'] = array_column($data['parent'], 'id_student');
                                                    foreach ($data['siswa'] as $siswa) :
                                                        if (!in_array($siswa['id_student'], $data['parent_ids'])) :
                                                    ?>
                                                            <option value="<?= $siswa['id_student'] ?>"><?= $siswa['name'] ?></option>
                                                    <?php
                                                        endif;
                                                    endforeach ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade" id="updateParent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-guru">
            <div class="modal-header">
                <h5 class="modal-title" id="forModalGuru">Update Data Orang Tua</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL ?>/admin/updtparents" method="post">
                <input type="hidden" name="id_parents" id="id_parents">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td width='100'>Orang Tua</td>
                                            <td width='1'>:</td>
                                            <td>
                                                <select class="form-control" name="id_user" id="user_id">
                                                    <option value="pil">Pilih Orang Tua Siswa</option>
                                                    <?php
                                                    $data['parent'] = array_column($data['parent'], 'id_user');
                                                    foreach ($data['users'] as $user) :
                                                        if ($user['role'] == 'parents') :
                                                    ?>
                                                            <option value="<?= $user['id_user'] ?>"><?= $user['full_name'] ?></option>
                                                    <?php

                                                        endif;
                                                    endforeach ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='100'>Alamat</td>
                                            <td width='1'>:</td>
                                            <td><input type="text" class="form-control" name="alamat" id="alamat_update" value=""></td>
                                        </tr>
                                        <tr>
                                            <td width='100'>Telepon</td>
                                            <td width='1'>:</td>
                                            <td><input type="text" class="form-control" name="telpon" id="telp_update" required maxlength="16" value=""></td>
                                        </tr>
                                        <tr>
                                            <td width='100'>siswa</td>
                                            <td width='1'>:</td>
                                            <td>
                                                <select class="form-control" name="id_student" id="id_student">
                                                    <option value="pil">Pilih Siswa</option>
                                                    <?php
                                                    foreach ($data['siswa'] as $siswa) :
                                                    ?>
                                                        <option value="<?= $siswa['id_student'] ?>"><?= $siswa['name'] ?></option>
                                                    <?php
                                                    endforeach ?>
                                                </select>
                                            </td>
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