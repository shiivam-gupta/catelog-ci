<script>
	addEventListener("load", function () {
		setTimeout(hideURLbar, 0);
	}, false);

	function hideURLbar() {
		window.scrollTo(0, 1);
	}
</script>

<?php if(@$this->siteLang == 'he') { ?>
	<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css" integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
<?php } else { ?>
	<link href="<?php echo base_url('resource/front_panel/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<?php } ?> 

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Bootstrap css -->
<!-- <link href="<?php echo base_url('resource/front_panel/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css" media="all" /> -->

<link href="<?php echo base_url('resource/front_panel/css/style.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<!-- Main css -->
<link rel="stylesheet" href="<?php echo base_url('resource/front_panel/css/fontawesome-all.css') ;?>">
<!-- Font-Awesome-Icons-CSS -->
<link href="<?php echo base_url('resource/front_panel/css/popuo-box.css'); ?>" rel="stylesheet" type="text/css" media="all" />
<!-- pop-up-box -->
<link href="<?php echo base_url('resource/front_panel/css/menu.css'); ?>" rel="stylesheet" type="text/css" media="all" />

<!-- Theme style -->
<?php if(@$this->siteLang == 'he') { ?>
	
<?php } else { ?>
	
<?php } ?>

<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<?php if(@$this->siteLang == 'he') { ?>
	<link rel="stylesheet" href="<?php echo base_url('cosmetics/css/_all-skins-rtl.css?v=0.1'); ?>">
<?php } else { ?>
	<link rel="stylesheet" href='<?php echo base_url("resource/dist/css/skins/_all-skins.min.css"); ?>'>
<?php } ?>

<!-- SweetAlert2 css for alerts -->
<link rel="stylesheet" href='<?php echo base_url("cosmetics/css/sweetalert2.css"); ?>'>

<!-- DataTable JS -->
<link rel="stylesheet" href='<?php echo base_url("cosmetics/css/datatables.css"); ?>'>

<!-- jQuery 3 -->
<script src='<?php echo base_url("resource/bower_components/jquery/dist/jquery.min.js"); ?>'></script>
<!-- jQuery UI 1.11.4 -->
<script src='<?php echo base_url("resource/bower_components/jquery-ui/jquery-ui.min.js"); ?>'></script>

<!-- menu style -->
<!-- //Custom-Files -->

<!-- web fonts -->
<link href="http://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
<!-- //web fonts -->


<link href="<?= base_url("cosmetics/css/my-custom.css?v=0.1"); ?>" rel="stylesheet" type="text/css" media="all" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<!-- Bootstrap 4.0 -->
<?php if(@$this->session->userdata['userData']['site_lang'] == 'he') { ?>
	<script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js" integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH" crossorigin="anonymous"></script>
<?php } else { ?>
	<script src="<?= base_url('resource/front_panel/js/bootstrap.js'); ?>"></script>
<?php } ?>

<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src='<?php echo base_url("cosmetics/js/promise-polyfill.js"); ?>'></script>

<!-- DataTable JS -->
<script src='<?php echo base_url("cosmetics/js/datatables.js"); ?>'></script>


<!-- SweetAlert2 js for alerts -->
<script src='<?php echo base_url("cosmetics/js/sweetalert2.js"); ?>'></script>

<script type="text/javascript">
	var _URL = window.URL || window.webkitURL;
	var $processingLoadMore = false;
	var $base_url = '<?= base_url('/'); ?>';

	var websiteDirection = $('html').attr('dir');
</script>