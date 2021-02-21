<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SCLEAN Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css">
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo-lg">
                    <a href="<?php echo base_url(); ?>Dashboard"><img src="
                <?php echo base_url(); ?>assets/images/icon/logo.png" alt="logo"></a>
                    <!--                <a href="--><?php //echo base_url(); 
                                                    ?>
                    <!--Dashboard" class="logo"><h4><span class="logo-lg text-white"><b>Ikebana Florist</b></span></h4></a>-->
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li <?php if ($this->uri->segment(1) == "Dashboard") {
                                    echo 'class="active"';
                                } ?>><a href="<?php echo base_url(); ?>Dashboard"><i class="ti-dashboard"></i><span>dashboard</span></a></li>
                            <li <?php if ($this->uri->segment(1) == "Admin" or $this->uri->segment(1) == "Pengguna" or $this->uri->segment(1) == "Laundry" or $this->uri->segment(1) == "Promosi") {
                                    echo 'class="active"';
                                } ?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-archive"></i><span>Master Data </span></a>
                                <ul class="collapse">
                                    <li <?php if ($this->uri->segment(1) === "Laundry") {
                                            echo 'class="active"';
                                        } ?>><a href="<?php echo base_url(); ?>Laundry"><i class="ti-package"></i><span>Laundry</span></a></li>
                                    <?php
                                    $isLoggedIn = $this->session->userdata('status');

                                    if ($isLoggedIn === "Admin") {
                                    ?>
                                        <li <?php if ($this->uri->segment(1) == "Admin") {
                                                echo 'class="active"';
                                            } ?>><a href="<?php echo base_url(); ?>Admin"><i class="ti-star"></i><span>Admin</span></a></li>
                                        <li <?php if ($this->uri->segment(1) == "Pengguna") {
                                                echo 'class="active"';
                                            } ?>><a href="<?php echo base_url(); ?>Pengguna"><i class="ti-user"></i><span>Pengguna</span></a></li>
                                        <li <?php if ($this->uri->segment(1) === "Promosi") {
                                                echo 'class="active"';
                                            } ?>><a href="<?php echo base_url(); ?>Promosi"><i class="ti-gift"></i><span>Promosi</span></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li <?php if ($this->uri->segment(1) == "Pemesanan" or $this->uri->segment(1) == "") {
                                    echo 'class="active"';
                                } ?>>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-shopping-cart-full"></i><span>Transaksi</span></a>
                                <ul class="collapse">
                                    <li <?php if ($this->uri->segment(1) == "Pemesanan") {
                                            echo 'class="active"';
                                        } ?>><a href="<?php echo base_url() ?>Pemesanan"><i class="ti-shopping-cart"></i><span>Pemesanan Laundry</span></a></li>
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-bar-chart"></i><span>Laporan</span></a>
                            <ul class="collapse">
                                <li><a href="<?php echo base_url() ?>Laporan">Semua Transaksi</a></li>
                                <?php
                                $isLoggedIn = $this->session->userdata('status');

                                if ($isLoggedIn === "Admin") {
                                ?>
                                    <li><a href="<?php echo base_url() ?>Laporan/Laporan_admin">Transaksi by Laundry</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left"><?php echo $pagetitle; ?></h4>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="<?php echo base_url(); ?>assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('nama_admin') ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->