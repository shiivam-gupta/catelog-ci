<!DOCTYPE html>
<html dir="<?php echo empty($this->siteLang) ? 'ltr' : get_language($this->siteLang,'dir') ?>" lang="<?php echo empty($this->siteLang) ? 'en' : $this->siteLang; ?>">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->siteTitle.' | '.$this->pageTitle; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <?php require_once('assets/frontheadlinks.php'); ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0879c9;">
            <a class="navbar-brand" href="<?= base_url('/home'); ?>"><?= $this->lang->line('HEADER_HOME'); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav" style="width: 100%">
                    <a class="nav-item nav-link" href="<?php echo base_url('front/language/change/en'); ?>"><img src="<?php echo base_url('/cosmetics/images/usa.jpg'); ?>" class="z-depth-0" alt="avatar image" height="15"></a>
                    <a class="nav-item nav-link" href="<?php echo base_url('front/language/change/he'); ?>"><img src="<?php echo base_url('/cosmetics/images/israel.jpg'); ?>" class="z-depth-0" alt="avatar image" height="15"></a>  
                </div>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php if(!empty((array)$this->sessionData)) { ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('order/list'); ?>" class="nav-link" style="width: 100px;">
                                <i class="fas fa-truck"></i><?= $this->lang->line('ORDERS_LABEL'); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('cart'); ?>"  class="nav-link" style="width: 100px;">
                                <i class="fas fa-cart-arrow-down"></i>
                                <?= $this->lang->line('CART_LABEL'); ?>
                                <span class="cartCount" id="cartCountId"><?= @$this->cart->total_items(); ?></span>
                            </a>
                        </li>    
                    <?php } ?>
                    <?php if(empty((array)$this->sessionData)) { ?>
                        <li class="nav-item">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal" class="nav-link" style="width: 100px;">
                                <i class="fas fa-sign-in-alt"></i><?= $this->lang->line('LOG_IN_LABEL'); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#registartionModal" class="nav-link" style="width: 100px;">
                                <i class="fas fa-sign-out-alt"></i><?= $this->lang->line('REGISTER_LABEL'); ?> 
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="<?= base_url('logout'); ?>" class="nav-link" style="width: 100px;">
                                <i class="fas fa-sign-out-alt"></i><?= $this->lang->line('LOGOUT_LABEL'); ?> 
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>