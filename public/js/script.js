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
                $("#name").val(data.full_name);
                $("#role").val(data.role);
            },
        });
    });

    // semester
    $(".modalAddSemester").on("click", function () {
        $("#forModalSemester").html("Tambah Data Semester");
        $(".modal-footer button[type=submit]").html("Save Data");
        $("#semester").val("");
        $("#due_date").val("");
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
                $("#semester").val(data.semester);
                $("#due_date").val(data.tenggat_waktu);
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
    $(".modalParent").on("click", function () {
        const id = $(this).data("id");
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/admin/getUpdtParent",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#user_id").val(data.id_user);
                $("#alamat_update").val(data.alamat);
                $("#telp_update").val(data.no_telp);
                $("#id_student").val(data.id_student);
                $("#id_parents").val(data.id_parents);
            },
        });
    });

    $(document).ready(function () {
        // Memuat notifikasi saat halaman dimuat
        $.ajax({
            url: "http://localhost/pembayaran-spp/public/notification/getnotif", // File PHP yang akan menangani permintaan
            type: "GET",
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                var notificationCount = data.data.length;
                $("#notificationCount").text(notificationCount);
                $("#notificationHeader").text(
                    notificationCount + " New Notifications"
                );

                var notificationList = $("#notificationList");
                notificationList.empty();

                if (notificationCount > 0) {
                    data.data.forEach(function (notif) {
                        if (notif.days_remaining != 0) {
                            notificationList.append(
                                '<a href="#" class="list-group-item">' +
                                    '<div class="row g-0 align-items-center">' +
                                    '<div class="col-2">' +
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">\
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>\
                                    </svg>' +
                                    "</div>" +
                                    '<div class="col-10">' +
                                    '<div class="text-dark">Pembayaran SPP: ' +
                                    notif.semester +
                                    "</div>" +
                                    '<div class="text-muted small mt-1">Tenggat Waktu: ' +
                                    notif.days_remaining +
                                    " hari lagi</div>" +
                                    '<div class="text-muted small mt-1">Silahkan Lakukan Pembayaran' +
                                    " </div>" +
                                    "</div>" +
                                    "</div>" +
                                    "</a>"
                            );
                        }
                    });
                } else {
                    notificationList.append(
                        '<a href="#" class="list-group-item">' +
                            '<div class="text-dark">Tidak ada Notifikasi</div>' +
                            "</a>"
                    );
                }
            },
            error: function () {
                $("#notificationContainer").html(
                    "Failed to load notifications."
                );
            },
        });
    });

    $("#tombolPay").on("click", function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "http://localhost/pembayaran-spp/public/siswa/paySpp",
            data: {
                student_id: $("#student_id").val(),
                nama: $("#name").val(),
                id_class: $("#id_class").val(),
                id_teacher: $("#id_teacher").val(),
                semester: $("#semester").val(),
                spp: $("#jumlahBayar").val(),
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "error") {
                    alert("Error: " + res.message);
                } else if (res.snapToken) {
                    snap.pay(res.snapToken, {
                        onSuccess: function (result) {
                            let dataResult = JSON.stringify(result, null, 2);
                            let dataObj = JSON.parse(dataResult);
                            console.log(dataObj);
                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pembayaran-spp/public/siswa/addPembayaran",
                                data: {
                                    student_id: res.student_id,
                                    nama: res.name,
                                    id_class: res.id_class,
                                    id_teacher: res.id_teacher,
                                    semester: res.semester,
                                    spp: res.spp,
                                    amount_paid: dataObj.gross_amount,
                                    payment_date: dataObj.transaction_time,
                                    transaction_status:
                                        dataObj.transaction_status,
                                    payment_type: dataObj.payment_type,
                                    va_number: dataObj.va_numbers[0].va_number,
                                    bank: dataObj.va_numbers[0].bank,
                                    order_id: dataObj.order_id,
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.status === "success") {
                                        alert(response.message);
                                        window.location.reload();
                                    } else {
                                        alert(response.message);
                                    }
                                },
                                error: function (xhr, status, error) {
                                    alert("Terjadi kesalahan: " + error);
                                },
                            });

                            console.log(JSON.stringify(result, null, 2));
                        },
                        onPending: function (result) {
                            let dataResult = JSON.stringify(result, null, 2);
                            let dataObj = JSON.parse(dataResult);

                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pembayaran-spp/public/siswa/addPembayaran",
                                data: {
                                    student_id: res.student_id,
                                    nama: res.name,
                                    id_class: res.id_class,
                                    id_teacher: res.id_teacher,
                                    semester: res.semester,
                                    spp: res.spp,
                                    amount_paid: dataObj.gross_amount,
                                    payment_date: dataObj.transaction_time,
                                    transaction_status:
                                        dataObj.transaction_status,
                                    payment_type: dataObj.payment_type,
                                    va_number: dataObj.va_numbers[0].va_number,
                                    bank: dataObj.va_numbers[0].bank,
                                    order_id: dataObj.order_id,
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.status === "success") {
                                        alert(response.message);
                                        window.location.reload();
                                    } else {
                                        alert(response.message);
                                    }
                                },
                                error: function (xhr, status, error) {
                                    alert("Terjadi kesalahan: " + error);
                                },
                            });
                            console.log(JSON.stringify(result, null, 2));
                        },
                        onError: function (result) {
                            let dataResult = JSON.stringify(result, null, 2);
                            let dataObj = JSON.parse(dataResult);

                            $.ajax({
                                type: "POST",
                                url: "http://localhost/pembayaran-spp/public/siswa/addPembayaran",
                                data: {
                                    student_id: res.student_id,
                                    nama: res.name,
                                    id_class: res.id_class,
                                    id_teacher: res.id_teacher,
                                    semester: res.semester,
                                    spp: res.spp,
                                    amount_paid: dataObj.gross_amount,
                                    payment_date: dataObj.transaction_time,
                                    transaction_status:
                                        dataObj.transaction_status,
                                    payment_type: dataObj.payment_type,
                                    va_number: dataObj.va_numbers[0].va_number,
                                    bank: dataObj.va_numbers[0].bank,
                                    order_id: dataObj.order_id,
                                },
                                dataType: "json",
                                success: function (response) {
                                    if (response.status === "success") {
                                        alert(response.message);
                                        window.location.reload();
                                    } else {
                                        alert(response.message);
                                    }
                                },
                                error: function (xhr, status, error) {
                                    alert("Terjadi kesalahan: " + error);
                                },
                            });
                            console.log(JSON.stringify(result, null, 2));
                        },
                    });
                } else {
                    alert("Snap Token tidak ditemukan.");
                }
            },
            error: function (xhr, status, error) {
                alert("AJAX request failed: " + error);
            },
        });
    });
});
