<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Kütüphane Yönetim Sistemi">
    <meta name="author" content="NobleUI">
    <meta name="keywords"
          content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Kütüphane Yönetim Sistemi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo1/style.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="assets/images/favicon.png"/>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                Kitap<span>Yönetim</span>
            </a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Anasayfa</li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Anasayfa</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Üye Yönetim Sistemi</li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"-->
<!--                       aria-controls="emails">-->
<!--                        <i class="link-icon" data-feather="mail"></i>-->
<!--                        <span class="link-title">Email</span>-->
<!--                        <i class="link-arrow" data-feather="chevron-down"></i>-->
<!--                    </a>-->
<!--                    <div class="collapse" id="emails">-->
<!--                        <ul class="nav sub-menu">-->
<!--                            <li class="nav-item">-->
<!--                                <a href="pages/email/inbox.html" class="nav-link">Inbox</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a href="pages/email/read.html" class="nav-link">Read</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a href="pages/email/compose.html" class="nav-link">Compose</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </li>-->
                <li class="nav-item">
                    <a href="uyeler.php" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Üyeler</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Kitap Yönetim Sistemi</li>
                <li class="nav-item">
                    <a href="yayinevleri.php" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">Yayınevleri</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kategoriler.php" class="nav-link">
                        <i class="link-icon" data-feather="layers"></i>
                        <span class="link-title">Kategoriler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="yazarlar.php" class="nav-link">
                        <i class="link-icon" data-feather="edit-3"></i>
                        <span class="link-title">Yazarlar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kitaplar.php" class="nav-link">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Kitaplar</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Kütüphane Yönetim Sistemi</li>
                <li class="nav-item">
                    <a href="kutuphaneler.php" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Kütüphaneler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="arsiv.php" class="nav-link">
                        <i class="link-icon" data-feather="archive"></i>
                        <span class="link-title">Kütüphane Kitap Arşivi</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="assets/images/user.png"
                                 alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="assets/images/user.png"
                                         alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">Admin</p>
                                    <p class="tx-12 text-muted">admin@kutuphane.com</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <a href="pages/general/profile.html" class="text-body ms-0" style="cursor:pointer">
                                    <li class="dropdown-item py-2">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </li>
                                </a>
                                <a href="javascript:;" class="text-body ms-0" style="cursor:pointer">
                                    <li class="dropdown-item py-2">
                                        <i class="me-2 icon-md" data-feather="edit"></i>
                                        <span>Edit Profile</span>
                                    </li>
                                </a>
                                <a href="logout.php" class="text-body ms-0" style="cursor:pointer">
                                    <li class="dropdown-item py-2">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Çıkış Yap</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

			