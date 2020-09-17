<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $this->siteTitle.' | '.$this->pageTitle; ?></title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href='<?php echo base_url("resource/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href='<?php echo base_url("resource/bower_components/font-awesome/css/font-awesome.min.css"); ?>'>
      <!-- Ionicons -->
      <link rel="stylesheet" href='<?php echo base_url("resource/bower_components/Ionicons/css/ionicons.min.css"); ?>'>
    <!-- Theme style -->
    <link rel="stylesheet" href='<?php echo base_url("resource/dist/css/AdminLTE.min.css"); ?>'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href='<?php echo base_url("resource/dist/css/skins/_all-skins.min.css"); ?>'>
    <!-- iCheck -->
    <link rel="stylesheet" href='<?php echo base_url("resource/plugins/iCheck/square/blue.css"); ?>'>

    <link rel="stylesheet" href='<?php echo base_url("cosmetics/css/custom.css").'?v=0.0'; ?>'>

    <link href="<?php echo base_url('resource/front_panel/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition login-page">
    <div class="container" style="width: 100%; height: 650px ;">
      <div class="login-box">
          <div class="login-logo">
            <a href="<?php base_url('/'); ?>"><b><?php echo $this->siteTitle; ?></b></a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg"><?php echo $this->lang->line('START_YOUR_SESSION_LABEL');?></p>

          <?php echo form_open(); ?>
              <div class="form-group has-feedback">
                  <input type="email" class="form-control" placeholder='<?php echo $this->lang->line('EMAIL_LABEL'); ?>' name="email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  <span class="form_error"><?php echo form_error('email'); ?></span>
              </div>
              <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="<?php echo $this->lang->line('PASSWORD_LABEL'); ?>" name="password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  <span class="form_error"><?php echo form_error('password'); ?></span>
              </div>
              <div class="form_error" style="font-size: 15px;">
                    <?php 
                        echo $this->session->flashdata('message_name');
                        $this->session->set_flashdata('message_name', '');
                    ?>
                </div>
              <div class="row">
                  <!-- <div class="col-xs-8">
                      <div class="checkbox icheck">
                          <label>
                              <input type="checkbox"> Remember Me
                          </label>
                      </div>
                  </div> -->
                  <!-- /.col -->
                  <div class="col-xs-4 pull-right">
                      <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo $this->lang->line('HEADER_LOGIN'); ?></button>
                  </div>
                  <!-- <div class="col-xs-4 pull-right">
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#registartionModal" class="text-white" style="font-size: 16px;">
                        <button type="button" class="btn btn-primary btn-block btn-flat"><?= $this->lang->line('REGISTER_LABEL'); ?> </button>
                    </a>                      
                  </div> -->
                  <!-- /.col -->
              </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box -->

      <!-- jQuery 3 -->
      <script src='<?php echo base_url("resource/bower_components/jquery/dist/jquery.min.js"); ?>'></script>
      <!-- Bootstrap 3.3.7 -->
      <script src='<?php echo base_url("resource/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>'></script>
      <!-- iCheck -->
      <!-- <script src='<?php echo base_url("resource/plugins/iCheck/icheck.min.js"); ?>'></script>
      <script>
          $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
          });
      </script> -->

  </div>
</body>
</html>
