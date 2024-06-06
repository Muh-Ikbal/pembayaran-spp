$(function () {
    $(".tampilModalAdd").on("click", function () {
        $("#forModalLabel").html("Tambah Data Siswa");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#nis").val("");
        $("#nama").val("");
        $("#id_kelas").val("pilih");
        $("#no_telp").val("");
        $("#spp").val("");
        $("#username").val("");
        $("#password").val("");
        $(".siswa-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/addSiswa"
        );
    });
    $(".tampilModalUpdt").on("click", function () {
        $("#forModalLabel").html("Update Data Siswa");
        $(".modal-footer button[type=submit]").html("Save Change");
        $(".siswa-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/updtSiswa"
        );

        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtSiswa",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#id_student").val(data.id_student);
                $("#nis").val(data.nis);
                $("#nama").val(data.name);
                $("#id_kelas").val(data.class_id);
                $("#no_telp").val(data.no_telp);
                $("#spp").val(data.SPP);
                $("#username").val(data.username);
                $("#password").val(data.password);
            },
        });
    });
    $(".modalAddKelas").on("click", function () {
        $("#kelasModalLabel").html("Tambah Data Kelas");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#nama_kelas").val("");
        $(".modal-kelas form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/addKelas"
        );
    });
    $(".modalUpdtKelas").on("click", function () {
        $("#kelasModalLabel").html("Update Data Kelas");
        $(".modal-footer button[type=submit]").html("Save Change");
        $(".modal-kelas form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/updtKelas"
        );
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtKelas",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#id_kelas").val(data.id);
                $("#nama_kelas").val(data.class_name);
            },
        });
    });

    $(".modalAddUser").on("click", function () {
        $("#forModalUser").html("Tambah Data User");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#username").val("");
        $("#password").val("");
        $("#name").val("");
        $("#role").val("");
        $(".user-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/adduser"
        );
    });

    // updt user
    $(".modalUpdtUser").on("click", function () {
        $("#forModalUser").html("Update Data User");
        $(".modal-footer button[type=submit]").html("Save Change");
        $(".user-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/updtUser"
        );
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtUser",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#id_user").val(data.id_user);
                $("#username").val(data.username);
                $("#password").val(data.password);
                $("#name").val(data.name);
                $("#role").val(data.role);
            },
        });
    });

    // semester
    $(".modalAddSemester").on("click", function () {
        $("#forModalSemester").html("Tambah Data Semester");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#tahun_ajaran").val("");
        $("#semester").val("");
        $(".semester-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/addsemester"
        );
    });

    $(".modalUpdtSemester").on("click", function () {
        $("#forModalSemester").html("Update Data Semester");
        $(".modal-footer button[type=submit]").html("Save Change");
        $(".semester-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/updtSemester"
        );
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtSemester",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#id_semester").val(data.id_semester);
                $("#tahun_ajaran").val(data.years);
                $("#semester").val(data.semester_name);
            },
        });
    });
    // semester
    $(".modalAddGuru").on("click", function () {
        $("#forModalGuru").html("Tambah Data Guru");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#id_user").val("pil");
        $("#nip").val("");
        $("#id_class").val("pil");
        $(".semester-modal form").attr(
            "action",
            "http://localhost/pembayaran-spp/public/admin/addsemester"
        );
    });

    $(".modalUpdtGuru").on("click", function () {
        
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtGuru",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#user_id").val(data.id_user);
                $("#nip_update").val(data.nip);
                $("#class_id").val(data.class_id);
                $("#id_teacher").val(data.id_teacher);
            },
        });
    });
});
