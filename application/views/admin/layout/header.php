<!DOCTYPE html>
<!-- <html dir="<?php echo empty($this->siteLang) ? 'ltr' : get_language($this->siteLang,'dir') ?>" lang="<?php echo empty($this->siteLang) ? 'en' : $this->siteLang; ?>"> -->

<html dir="<?php echo empty($this->siteLang) ? 'rtl' : get_language($this->siteLang,'dir') ?>" lang="<?php echo empty($this->siteLang) ? 'he' : $this->siteLang; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->siteTitle.' | '.$this->pageTitle; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <?php require_once('assets/headlinks.php'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php require_once('assets/top_menu.php'); ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php require_once('assets/l_sidemenu.php'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <!-- <section class="content-header">
                    <h1>
                        <?= $this->pageTitle; ?> -->
                        <!-- <small>Control panel</small> -->
                        <!-- <button class="backButton btn btn-primary pull-right" onclick="return window.history.back();">Back</button> -->
                    <!-- </h1> -->
                    <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol> -->
                <!-- </section> -->
                <!-- Main content -->
