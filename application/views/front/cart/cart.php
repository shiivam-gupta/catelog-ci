
	<!-- checkout Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span><i class="fas fa-cart-arrow-down"></i> </span><?php echo $this->lang->line('CART_LABEL'); ?>
			</h3>
			<!-- //tittle heading -->

			<div class="checkout-right">

				<div class="table-responsive">
					
					<table class="timetable_sub">
						<thead>
							<tr>
								<th><?php echo $this->lang->line('SNO_LABEL'); ?></th>
								<th><?php echo $this->lang->line('PRODUCT_IMAGE_ALT'); ?></th>
								<th><?php echo $this->lang->line('SKU_LABEL'); ?></th>
								<th><?php echo $this->lang->line('QUANTITY_LABEL'); ?></th>
								<?php if(___config('show_product_price','value') == 'Yes') { ?>
									<th><?php echo $this->lang->line('PRICE_LABEL'); ?></th>
								<?php } ?>
								<th><?php echo $this->lang->line('REMOVE_LABEL'); ?></th>
							</tr>
						</thead>
						<tbody class="cart-items">
							<?php include(sprintf('%sviews%sfront%scart%scart-item.php', APPPATH,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR)); ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3"><?php echo $this->lang->line('ADD_DETAILS_LABEL'); ?></h4>
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
								<form role="order-form" action="<?php echo base_url('order/confirm'); ?>" method="POST" id="orderForm" data-button="#orderFormButton">

									<!-- <div class="controls form-group">
										<input class="billing-address-name form-control" type="text"  placeholder="<?php echo $this->lang->line('BUYER_LABEL'); ?>" value="<?php echo strtoupper($this->sessionData->fullname); ?>" readonly >
									</div> -->
									<div class="controls form-group">
										<textarea class="form-control" placeholder="<?php echo $this->lang->line('REMARK_LABEL'); ?>" name="remark" required autocomplete="off"></textarea>										
									</div>
									

									<button data-request="form-submit" data-target="[role='order-form']" data-url="<?= base_url('order/confirm'); ?>" id="orderFormButton" type="button" class="submit check_out btn"> <?php echo $this->lang->line('DELIVERY_BUTTON_LABEL'); ?></button>
								</form>
								</div>
							</div>
						</div>					
				</div>
			</div>
		</div>
	</div>

	<!-- //checkout products -->

	<!--quantity-->
	<!-- <script>
		$(document).ready(function (c) {
			$('.close<?= $civ['id'];?>').on('click', function (c) {
				$('.rem<?= $civ['id'];?>').fadeOut('slow', function (c) {
					$('.rem<?= $civ['id'];?>').remove();
				});
			});
		});
	</script> -->
	<!-- //quantity -->