	
	<!-- checkout Products -->	
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span><i class="fas fa-shopping-bag"></i> </span><?php echo $this->lang->line('ORDER_DETAILS_LABEL'); ?>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<div class="table-responsive">
						<?php foreach($orderDetail as $odmk => $odmv){ ?>
						<div class="card mb-3">
							<div class="col-md-12 card-header">
						  		<h5 class="pullLeft"><?= ___idFormatGenerator($this->lang->line('ORDER_NUMBER'),'5',$odmk); ?></h5>
						  		<h6 class="pullRight" style="color: <?= orderStatus($odmv[0]['status'])['color']; ?>"><?= orderStatus($odmv[0]['status'])['title']; ?></h6>
						  	</div>
							  <div class="card-body">
							  	<ul class="ordershow">
									<?php 
									$totalPrice=0;
									foreach($odmv as $odik => $data){ ?>
								  		<li><div class="image-container"><img class="" src="<?php echo base_url($data['product_photo']); ?>" id="productImg"></div>
								  		</li>
								  		<li>
								  			<h5 class="card-title" title="<?= $this->lang->line('SKU_LABEL'); ?>"><?php echo $data['sku']; ?></h5>
								  			<h6 class="card-subtitle text-muted">
								  				<p><?php echo $data['category']; ?></p>
								  				<p><?php echo $data['remark']; ?></p>
								  			</h6>
								  		</li>
										<li><?php echo $this->lang->line('QUANTITY_LABEL')." : <strong>".$data['quantity']."</strong>";?></li>
										<li title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?php echo $this->lang->line('PRICE_LABEL')." : <strong>".get_language($this->siteLang,'currencySymbol').number_format(convertCurrency(get_language($this->siteLang,'currency'),$data['price']),0)."</strong>";?></li>
										<li title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?php echo $this->lang->line('TOTAL_AMOUNT_LABEL')." : <strong>".get_language($this->siteLang,'currencySymbol').number_format(convertCurrency(get_language($this->siteLang,'currency'),$data['totalPrice']),0)."</strong>";?></li><br>
									<?php
										$totalPrice += $data['totalPrice'];
									} ?>
							  	</ul>
							  </div>
						  <div class="card-body">
					    	<div class="card-text pullLeft col-md-4 customalign"><span><?php echo $this->lang->line('ORDERED_ON_LABEL'); ?> : <?php echo "<strong>".date('d-m-Y',strtotime($data['orderDate']))."</strong>"; ?></span></div>
					    	<span class="card-text pullRight col-md-4 customalign" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?php echo $this->lang->line('ORDERS_TOTAL_LABEL').get_language($this->siteLang,'currencySymbol')."<strong>".number_format(convertCurrency(get_language($this->siteLang,'currency'),$totalPrice),0)."</strong>"; ?></span>
						  </div>
						</div>
						<?php } if(empty($orderDetail)) { ?>
							<h3 class="heading-tittle text-center font-italic"><?php echo $this->lang->line('NO_PRODUCT_FOUND_LABEL'); ?>.</h3>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>