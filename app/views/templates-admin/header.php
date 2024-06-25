<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Aplikasi Pembayaran SPP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="<?= BASEURL ?>/css/app.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="">
                    <span class="align-middle">Data Pembayaran Mahasiswa</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item active" data-page="dashboard">
                        <a class="sidebar-link" href="<?= BASEURL ?>/dashboard">
                            <i class="align-middle" data-feather="dashboard"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
                    ?>

                        <li class="sidebar-item" data-page="kelas">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/kelas">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item" data-page="siswa">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/siswa">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="guru">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/guru">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="parent">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/parent">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Orang Tua</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="semesters">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/semesters">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Semester</span>
                            </a>
                        </li>

                        <li class="sidebar-item" data-page="users">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/users">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Data Users</span>
                            </a>
                        </li>
                    <?php
                    elseif (!isset($_SESSION['role'])) :

                    ?>


                        <li class="sidebar-item" data-page="pembayaran">
                            <a class="sidebar-link" href="<?= BASEURL ?>/siswa/pembayaran">
                                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Pembayaran</span>
                            </a>
                        </li>

                    <?php
                    endif;
                    ?>
                    <li class="sidebar-item" data-page="history">
                        <a class="sidebar-link" href="<?= BASEURL ?>/history">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Histori Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <span class="text-dark"><?= $_SESSION['name']
                                                        ?></span>
                                <span class="text-dark"><? //= $_SESSION['user']['nama'] 
                                                        ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> <?= $_SESSION['username'] ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= BASEURL ?>/setting">Setting</a>
                                <a class="dropdown-item" href="<?= BASEURL ?>/auth/authLogout">Log out</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                    </svg>
                                    <span class="indicator" id="notificationCount">0</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header" id="notificationHeader">
                                    0 New Notifications
                                </div>
                                <div class="list-group" id="notificationList">
                                    <!-- Notifikasi akan dimuat di sini -->
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <div>
                        <?php Flasher::flash(); ?>
                    </div>