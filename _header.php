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
                Küt<span>Yön</span>
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
                <li class="nav-item nav-category">web apps</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                       aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Email</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Read</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Compose</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="pages/apps/chat.html" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Chat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/apps/calendar.html" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Calendar</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Components</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                       aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">UI Kit</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/badges.html" class="nav-link">Badges</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/breadcrumbs.html" class="nav-link">Breadcrumbs</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/buttons.html" class="nav-link">Buttons</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/button-group.html" class="nav-link">Button group</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/cards.html" class="nav-link">Cards</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/carousel.html" class="nav-link">Carousel</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/tabs.html" class="nav-link">Tabs</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                       aria-controls="advancedUI">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">Advanced UI</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="advancedUI">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">Sweet Alert</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false"
                       aria-controls="forms">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Forms</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/forms/basic-elements.html" class="nav-link">Basic Elements</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/advanced-elements.html" class="nav-link">Advanced Elements</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/editors.html" class="nav-link">Editors</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/forms/wizard.html" class="nav-link">Wizard</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false"
                       aria-controls="charts">
                        <i class="link-icon" data-feather="pie-chart"></i>
                        <span class="link-title">Charts</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/charts/apex.html" class="nav-link">Apex</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">ChartJs</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">Flot</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/morrisjs.html" class="nav-link">Morris</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/peity.html" class="nav-link">Peity</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/sparkline.html" class="nav-link">Sparkline</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false"
                       aria-controls="tables">
                        <i class="link-icon" data-feather="layout"></i>
                        <span class="link-title">Table</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/tables/basic-table.html" class="nav-link">Basic Tables</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/tables/data-table.html" class="nav-link">Data Table</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false"
                       aria-controls="icons">
                        <i class="link-icon" data-feather="smile"></i>
                        <span class="link-title">Icons</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="icons">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Pages</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                       aria-expanded="false" aria-controls="general-pages">
                        <i class="link-icon" data-feather="book"></i>
                        <span class="link-title">Special pages</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="general-pages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/general/faq.html" class="nav-link">Faq</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/general/profile.html" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false"
                       aria-controls="authPages">
                        <i class="link-icon" data-feather="unlock"></i>
                        <span class="link-title">Authentication</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="authPages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/auth/login.html" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/auth/register.html" class="nav-link">Register</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false"
                       aria-controls="errorPages">
                        <i class="link-icon" data-feather="cloud-off"></i>
                        <span class="link-title">Error</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="errorPages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/error/404.html" class="nav-link">404</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/error/500.html" class="nav-link">500</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Docs</li>
                <li class="nav-item">
                    <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                        <i class="link-icon" data-feather="hash"></i>
                        <span class="link-title">Documentation</span>
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
                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                 alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80"
                                         alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">Amiah Burton</p>
                                    <p class="tx-12 text-muted">amiahburton@gmail.com</p>
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
                                        <span>Log Out</span>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->

			