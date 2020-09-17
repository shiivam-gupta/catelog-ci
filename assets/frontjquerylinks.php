

<script src="<?php echo base_url().'resource/front_panel//js/monetization.js';?>" type="text/javascript"></script>

<!-- cart-js -->
<script src="<?php echo base_url().'resource/front_panel/js/minicart.js';?>"></script>

<script type="text/javascript">
	/*var minicartConfig = {
		action: "<?= base_url('cart'); ?>"
	} 
	paypals.minicarts.render(minicartConfig); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

	paypals.minicarts.cart.on('checkout', function (evt) {
		var items = this.items(),
			len = items.length,
			total = 0,
			i;

		// Count the number of each item in the cart
		for (i = 0; i < len; i++) {
			total += items[i].get('quantity');
		}

		if (total < 3) {
			alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
			evt.preventDefault();
		}
	});*/
</script>
<!-- //cart-js -->

<!-- Custom JS -->
<script src='<?php echo base_url("cosmetics/js/my-custom.js?v=0.1"); ?>'></script>
<!-- scroll seller -->
<script src="<?php echo base_url().'resource/front_panel/js/scroll.js';?>"></script>
<!-- //scroll seller -->



<!-- smoothscroll -->
<script src="<?php echo base_url().'resource/front_panel/js/SmoothScroll.min.js';?>"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="<?php echo base_url().'resource/front_panel/js/move-top.js';?>"></script>
<script src="<?php echo base_url().'resource/front_panel/js/easing.js';?>"></script>

<!-- AdminLTE App -->
<script src='<?php echo base_url("resource/dist/js/adminlte.min.js"); ?>'></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>