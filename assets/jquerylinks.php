<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src='//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<!-- Morris.js charts -->
<!-- <script src='<?php echo base_url("resource/bower_components/raphael/raphael.min.js"); ?>'></script>
<script src='<?php echo base_url("resource/bower_components/morris.js/morris.min.js"); ?>'></script> -->
<!-- Sparkline -->
<script src='<?php echo base_url("resource/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"); ?>'></script>
<!-- jvectormap -->
<script src='<?php echo base_url("resource/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"); ?>'></script>
<script src='<?php echo base_url("resource/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>'></script>
<!-- jQuery Knob Chart -->
<script src='<?php echo base_url("resource/bower_components/jquery-knob/dist/jquery.knob.min.js"); ?>'></script>
<!-- daterangepicker -->
<script src='<?php echo base_url("resource/bower_components/moment/min/moment.min.js"); ?>'></script>
<script src='<?php echo base_url("resource/bower_components/bootstrap-daterangepicker/daterangepicker.js"); ?>'></script>
<!-- datepicker -->
<script src='<?php echo base_url("resource/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"); ?>'></script>
<!-- Bootstrap WYSIHTML5 -->
<script src='<?php echo base_url("resource/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"); ?>'></script>
<!-- Slimscroll -->
<script src='<?php echo base_url("resource/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"); ?>'></script>
<!-- FastClick -->
<script src='<?php echo base_url("resource/bower_components/fastclick/lib/fastclick.js"); ?>'></script>
<!-- iCheck -->
<script src='<?php echo base_url("resource/plugins/iCheck/icheck.min.js"); ?>'></script>
<!-- AdminLTE App -->
<script src='<?php echo base_url("resource/dist/js/adminlte.min.js"); ?>'></script>
<!-- Custom JS -->
<script src='<?php echo base_url("cosmetics/js/my-custom.js?v=0.1"); ?>'></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>