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
                    <span class="align-middle">Sistem Pembayaran SPP Siswa</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item active" data-page="dashboard">
                        <a class="sidebar-link" href="<?= BASEURL ?>/dashboard">
                            <span class="align-middle"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#e65f2b" class="bi bi-house-door" viewBox="0 0 16 16">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" stroke="#e65f2b" stroke-width="0.5" />
                                </svg>
                                Home</span>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
                    ?>
                        <li class="sidebar-item" data-page="kelas">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/kelas">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i>
                                <span class="align-middle">Data Kelas</span>
                            </a>
                        </li>

                        <li class="sidebar-item" data-page="siswa">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/siswa">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i> <span class="align-middle">Data Siswa</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="guru">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/guru">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i> <span class="align-middle">Data Guru</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="parent">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/parent">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i> <span class="align-middle">Data Orang Tua</span>
                            </a>
                        </li>
                        <li class="sidebar-item" data-page="semesters">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/semesters">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i> <span class="align-middle">Data Semester</span>
                            </a>
                        </li>

                        <li class="sidebar-item" data-page="users">
                            <a class="sidebar-link" href="<?= BASEURL ?>/admin/users">
                                <i class="align-middle" style="color: #e65f2b;" data-feather="book"></i> <span class="align-middle">Data Users</span>
                            </a>
                        </li>
                    <?php
                    elseif (!isset($_SESSION['role'])) :

                    ?>


                        <li class="sidebar-item" data-page="pembayaran">
                            <a class="sidebar-link" href="<?= BASEURL ?>/siswa/pembayaran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#e65f2b" class="bi bi-credit-card" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" stroke="#e65f2b" stroke-width="1" />
                                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" stroke="#e65f2b" stroke-width="1" />
                                </svg>
                                <span class="align-middle">Pembayaran</span>
                            </a>
                        </li>

                    <?php
                    endif;
                    ?>
                    <li class="sidebar-item" data-page="history">
                        <a class="sidebar-link" href="<?= BASEURL ?>/history">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#e65f2b" class="bi bi-clock-history" viewBox="0 0 16 16">
                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" stroke="#e65f2b" stroke-width="1" />
                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" stroke="#e65f2b" stroke-width="1" />
                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" stroke="#e65f2b" stroke-width="1" />
                            </svg><span class="align-middle">Histori Pembayaran</span>
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
                            <?php 
                            if(!isset($_SESSION['role']) || ($_SESSION['role'] != 'teacher' && $_SESSION['role'] != 'admin')):
                            ?>
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
                            <?php endif?>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <div>
                        <?php Flasher::flash(); ?>
                    </div>