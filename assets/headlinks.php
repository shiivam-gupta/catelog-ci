<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>'>

<!-- Font Awesome -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/font-awesome/css/font-awesome.min.css"); ?>'>
<!-- Ionicons -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/Ionicons/css/ionicons.min.css"); ?>'>
<!-- Theme style -->
<?php if(@$this->siteLang == 'he') { ?>
	<link rel="stylesheet" href="<?php echo base_url('cosmetics/css/AdminLTE-rtl.css?v=0.1'); ?>">
<?php } else { ?>
	<link rel="stylesheet" href='<?php echo base_url("resource/dist/css/AdminLTE.min.css"); ?>'>
<?php } ?>

<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<?php if(@$this->siteLang == 'he') { ?>
	<link rel="stylesheet" href="<?php echo base_url('cosmetics/css/_all-skins-rtl.css?v=0.1'); ?>">
<?php } else { ?>
	<link rel="stylesheet" href='<?php echo base_url("resource/dist/css/skins/_all-skins.min.css"); ?>'>
<?php } ?>

<!-- iCheck -->
<link rel="stylesheet" href='<?php echo base_url("resource/plugins/iCheck/all.css"); ?>'>
<!-- Morris chart -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/morris.js/morris.css"); ?>'>
<!-- jvectormap -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/jvectormap/jquery-jvectormap.css"); ?>'>
<!-- Date Picker -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"); ?>'>
<!-- Daterange picker -->
<link rel="stylesheet" href='<?php echo base_url("resource/bower_components/bootstrap-daterangepicker/daterangepicker.css"); ?>'>

<!-- DataTable JS -->
<link rel="stylesheet" href='<?php echo base_url("cosmetics/css/datatables.css"); ?>'>

<!-- SweetAlert2 css for alerts -->
<link rel="stylesheet" href='<?php echo base_url("cosmetics/css/sweetalert2.css"); ?>'>

<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href='<?php echo base_url("resource/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>'>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


<!-- Inverse Content -->
<?php if(@$this->siteLang == 'he') { ?>
	<!-- <link rel="stylesheet" href="<?php echo base_url('cosmetics/css/inverse-all.css?v=0.1'); ?>"> -->
	<!-- <link rel="stylesheet" href="http://gofactz.com/testingApp/public/vendors/goreto/css/_all-skins-rtl.css"> -->
<?php } ?>

<link rel="stylesheet" href='<?php echo base_url("cosmetics/css/custom.css").'?v=0.1'; ?>'>

<!-- jQuery 3 -->
<script src='<?php echo base_url("resource/bower_components/jquery/dist/jquery.min.js"); ?>'></script>
<!-- jQuery UI 1.11.4 -->
<script src='<?php echo base_url("resource/bower_components/jquery-ui/jquery-ui.min.js"); ?>'></script>
<!-- Bootstrap 3.3.7 -->
<script src='<?php echo base_url("resource/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>'></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src='<?php echo base_url("cosmetics/js/promise-polyfill.js"); ?>'></script>

<!-- DataTable JS -->
<script src='<?php echo base_url("cosmetics/js/datatables.js"); ?>'></script>

<!-- SweetAlert2 js for alerts -->
<script src='<?php echo base_url("cosmetics/js/sweetalert2.js"); ?>'></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
	var _URL = window.URL || window.webkitURL;
	var $processingLoadMore = false;
	var $base_url = '<?= base_url('/'); ?>';
	var websiteDirection = $('html').attr('dir');
</script>