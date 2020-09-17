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
        <!-- Content Wrapper. Contains page content -->
       
            <nav class="navbar navbar-expand-lg navbar-light bg-light">                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <?= $this->lang->line('HEADER_HOME'); ?>
                </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div style="width:100%;">
                         <div class="row main-top-w3l py-2">
                            <div class="col-lg-3 header-most-top">
                                <p class="text-white text-lg-left text-center">
                                    <div class="logo_agile">
                                        <a href="<?= base_url('/home'); ?>" class="font-weight-bold font-italic">
                                           <!--  <img src="<?= base_url('cosmetics/images/logo.png'); ?>" alt=" " class="img-fluid"> -->
                                            <h1 class="text-center site-name"><?= $this->lang->line('HEADER_HOME'); ?></h1>
                                        </a>
                                    </div>
                                </p>
                            </div>
                            <div class="col-lg-3 pull-left">
                                <ul class="nav navbar-nav">
                                    <li style="color: white; margin-top: 45px;">
                                        <span>
                                           <div class="dropdown">
                                                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white" aria-expanded="false">
                                                  <?php echo get_language($this->siteLang,'name'); ?>
                                                  <img src="<?php echo base_url().get_language($this->siteLang,'flag'); ?>" style="width: 25px; height: 25px;"> <span class="caret"></span>
                                                </a> -->

                                                <!--usa flag-->
                                                <a href="<?php echo base_url('front/language/change/en'); ?>"><?= $lnv['name']; ?><img src="<?php echo base_url('/cosmetics/images/usa.jpg'); ?>" style="width: 30px;"></a>&nbsp;&nbsp;
                                                <!--israel flag-->
                                                <a href="<?php echo base_url('front/language/change/he'); ?>"><?= $lnv['name']; ?><img src="<?php echo base_url('/cosmetics/images/israel.jpg'); ?>" style="width: 30px;"></a>

                                                <!-- <ul class="dropdown-menu">
                                                    <?php foreach (get_language() as $lnk => $lnv) { 
                                                        $this->session->set_userdata('frontcurrentUrl',current_url());
                                                        ?>
                                                        <li style="<?php echo (get_language($this->siteLang,'dir') == 'rtl') ? 'padding-right:10px;' : 'padding-left:10px;';  ?>">
                                                            <a href="<?php echo base_url('front/language/change/').$lnk; ?>"><?= $lnv['name']; ?>&nbsp;
                                                                <img src="<?php echo base_url().$lnv['flag']; ?>" style="width: 25px; height: 25px;">
                                                            </a>
                                                            
                                                        </li>
                                                    <?php } ?>
                                                </ul> -->
                                            </div>
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-6 header-right mt-lg-0 mt-2" >
                                <ul style="float:right;">
                                    <?php if(empty((array)$this->sessionData)) { ?>
                                        <?php if(@$this->siteLang == 'he') { ?>
                                            <li class="text-center text-white" style="width: 150px; margin-top: 40px;"></li>
                                            <li class="text-center text-white" style="width: 150px; margin-top: 40px;"></li>
                                        <?php } ?>
                                        <li class="text-center border-right text-white" style="width: 150px; margin-top: 40px;">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal" class="text-white" style="font-size: 16px;">
                                                <i class="fas fa-sign-in-alt mr-2 fa-2x"></i><?= $this->lang->line('LOG_IN_LABEL'); ?>
                                            </a>
                                        </li>

                                        <li class="text-center text-white" style="width: 150px; margin-top: 40px;">
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#registartionModal" class="text-white" style="font-size: 16px;">
                                                <i class="fas fa-sign-out-alt mr-2 fa-2x"></i><?= $this->lang->line('REGISTER_LABEL'); ?> 
                                            </a>
                                        </li>
                                    <?php } else { ?>
                                        <li></li>
                                        <li class="text-center border-right text-white" style="width: 150px; margin-top: 20px;">
                                            <a href="<?= base_url('logout'); ?>" class="text-white" style="font-size: 16px;">
                                                <i class="fas fa-sign-out-alt mr-2 fa-2x"></i><?= $this->lang->line('LOGOUT_LABEL'); ?> 
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <?php if(!empty((array)$this->sessionData)) { ?>
                                            
                                        <li class="text-center border-right text-white" style="width: 150px; margin-top: 40px;">
                                            <a href="<?php echo base_url('order/list'); ?>"  class="text-white">
                                                <i class="fas fa-truck mr-2"></i><?= $this->lang->line('ORDERS_LABEL'); ?>
                                            </a>
                                        </li>

                                        <li class="text-center text-white" style="width: 150px; margin-top: 40px;">
                                            <!-- <a href="<?php echo base_url('cart');?>">
                                                <button class="btn btn-info" type="submit">
                                                    <i class="fas fa-cart-arrow-down"></i>
                                                    <?= $this->lang->line('CART_LABEL'); ?> 
                                                    <span class="cartCount" id="cartCountId"><?= @$this->cart->total_items(); ?></span>
                                                </button>
                                            </a> -->
                                            <a href="<?php echo base_url('cart'); ?>"  class="text-white">
                                                <i class="fas fa-cart-arrow-down"></i>
                                                    <?= $this->lang->line('CART_LABEL'); ?> 
                                                    <span class="cartCount" id="cartCountId"><?= @$this->cart->total_items(); ?></span>
                                            </a>
                                        </li>

                                        <li class="text-center text-white" style="width: 150px; ">
                                        </li>
                                    <?php } ?>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
               </div>
            </nav>
    </div>