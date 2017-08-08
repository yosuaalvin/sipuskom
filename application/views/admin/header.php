<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelatihan UPT Puskom UNDIP</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/gundar.jpg" />
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url();?>assets/admin/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
        <!-- Custom Styles-->
    <link href="<?php echo base_url();?>assets/admin/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url();?>assets/admin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img style="margin-top:10px" width="300" src="<?php echo base_url(); ?>assets/images/logo-undip.png"></img>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <i class="fa fa-user fa-fw"></i>  <?php echo $pengguna->nama; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url().'admin/welcome/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?php echo base_url() ?>admin/welcome"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/welcome/kursus"><i class="fa fa-sitemap fa-fw"></i> Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/laboratorium"><i class="fa fa-sitemap fa-fw"></i> Laboratorium</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/kursus"><i class="fa fa-sitemap fa-fw"></i> Pelatihan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/akun_sosial"><i class="fa fa-sitemap fa-fw"></i> Akun Sosial</a>
                    </li>
                </ul>
                </li>
                     <li>
                        <a href="<?php echo base_url(); ?>admin/welcome/peserta"><i class="fa fa-table fa-fw"></i> Data Peserta<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/peserta"><i class="fa fa-sitemap fa-fw"></i> Pelatihan </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/peserta_custom"><i class="fa fa-sitemap fa-fw"></i> Pelatihan Custom </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>admin/welcome/cek_pembayaran"><i class="fa fa-sitemap fa-fw"></i> Cek Pembayaran </a>
                    </li>
                </ul>

            </div>

        </nav>
