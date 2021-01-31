<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ikebana Florist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">


    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_user/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

</head>
<body>

<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="<?php echo base_url()?>CariProduk" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" name="pencarian" class="form-control border-0" placeholder="Search">
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="index.html" class="js-logo-clone">ikebana florist</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <?php
                                if ($this->session->userdata('status_user') != "User") {
                                    ?>
                                    <li><a href="<?php echo base_url(); ?>login"><span class="icon icon-person"></span></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <a href="<?php echo base_url(); ?>login"><?php echo $this->session->userdata('nama_user') ?>
                                            <span class="icon icon-person"></span></a>
                                    </li>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="<?php echo base_url() ?>user">Ubah Profile</a>
                                        <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <li>
                                    <a href="<?php echo base_url() ?>Cart" class="site-cart">
                                        <span class="icon icon-shopping_cart"></span>
                                        <span class="count"><p id="countItem"></p></span>
                                    </a>
                                </li>
                                <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                                                                class="site-menu-toggle js-menu-toggle"><span
                                                class="icon-menu"></span></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <nav class="site-navigation text-lg-center" role="navigation">
            <div class="container">
                <ul class="site-menu js-clone-nav d-none d-md-block">
                    <li <?php if ($this->uri->segment(1) == "") {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url() ?>">Beranda</a></li>
                    <li <?php if ($this->uri->segment(1) == "Product") {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url() ?>Product">Produk</a></li>
                    <li <?php if ($this->uri->segment(1) == "About") {
                        echo 'class="active"';
                    } ?>><a href="<?php echo base_url() ?>About">Tentang</a></li>
                    <?php if ($this->session->userdata('status_user') != "") {
                        ?>
                        <li <?php if ($this->uri->segment(1) == "DaftarPesanan") {
                            echo 'class="active"';
                        } ?>><a href="<?php echo base_url() ?>DaftarPesanan">Daftar Pesanan</a></li>
                        <?php
                    } ?>


                    <!--                    <li><a href="about.html">Konfirmasi Pembayaran</a></li>-->
                </ul>
            </div>
        </nav>
    </header>