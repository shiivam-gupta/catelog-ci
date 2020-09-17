	
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
							  	<div class="table-responsive">
								  	<table class="table table-bordered">
									  <thead>
									    <tr>
											<th><?php echo $this->lang->line('PRODUCT_IMAGE_ALT'); ?></th>   
											<th><?php echo $this->lang->line('SKU_LABEL'); ?></th>
											<!-- <th><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></th> -->
											<th><?php echo $this->lang->line('CATEGORY_LABEL'); ?></th>
											<th><?php echo $this->lang->line('KTAV_LABEL'); ?></th>
											<th><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></th>
											<th><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></th>
											<th><?php echo $this->lang->line('LINES_LABEL'); ?></th>
											<th><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></th>
											<th><?php echo $this->lang->line('QUANTITY_LABEL'); ?></th>
											<?php if(___config('show_product_price','value') == 'Yes') { ?>
												<th><?php echo $this->lang->line('PRICE_LABEL'); ?></th>
												<th><?php echo $this->lang->line('TOTAL_AMOUNT_LABEL'); ?></th>
											<?php } ?>
									    </tr>
									  </thead>
									  <tbody>
									    <?php
									    $totalPrice=0;
	                                   foreach($odmv as $odik => $data){ $savedProductData = json_decode($data['productData']); ?>
	                                    <tr>
	                                        <td>
	                                        	<div class="image-container">
	                                        		<img class="" src="<?php echo !empty($data['product_photo']) ? base_url($data['product_photo']) : base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg');; ?>" id="productImg" style="width: 100px; height: 100px;">
	                                        	</div>
	                                        </td>
	                                        <td>
	                                            <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('SKU_LABEL'); ?>">
	                                                <?php echo $data['sku']; ?></div></td>
	                                        <!-- <td><?php echo $data['fullname']; ?></td> -->

	                                        <td><?= ($data['category'])? productCategory($data['category']): '' ?></td>
	                                        <td><?= ($data['ktav'])? productKtav($data['ktav']) : '' ?></td>
	                                        <td><?= ($data['product_type'])? productType($data['product_type']) : '' ?></td>
	                                        <td><?= ($data['ktav_size'])? productKtavSize($data['ktav_size']) : '' ?></td>
	                                        <td><?= ($data['plines'])? productLines($data['plines']) : '' ?></td>
	                                        <td><?= ($data['line_size'])? productLineSize($data['line_size']) : '' ?></td>


	                                        <td><?php echo " <strong>".$data['quantity']."</strong>";?></td>
	                                        <?php if(___config('show_product_price','value') == 'Yes') { ?>
		                                        <td>
		                                            <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
		                                        		<?php //echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format(convertCurrency(get_language($this->siteLang,'currency'),$data['price']),2)."</strong>";?>
		                                        		<?php echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format(@$savedProductData->{get_language($this->siteLang,'currencyColumn')},0)."</strong>";?>
		                                            </div>
		                                        </td>
		                                        <td>
		                                            <div data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
		                                            	<?php //echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format(convertCurrency(get_language($this->siteLang,'currency'),$data['totalPrice']),2)."</strong>";?>
		                                            	<?php echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format((@$savedProductData->{get_language($this->siteLang,'currencyColumn')}*$data['quantity']),0)."</strong>";?>
		                                            </div>
		                                        </td>
		                                    <?php } ?>
	                                    </tr>
	                                    <?php $totalPrice +=(($savedProductData->{get_language($this->siteLang,'currencyColumn')}*$data['quantity'])); } ?>
									  </tbody>
									</table>
								</div>
							  	<!--show order in table format-->
							  </div>
						  <div class="card-body">
					    	<div class="card-text pullLeft col-md-4 customalign"><span><?php echo $this->lang->line('ORDERED_ON_LABEL'); ?> : <?php echo "<strong>".date('d-m-Y',strtotime($data['orderDate']))."</strong>"; ?></span></div>
					    	<?php if(___config('show_product_price','value') == 'Yes') { ?>
					    		<!-- <span class="card-text pullRight col-md-4 customalign" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('PRICE_LABEL'); ?>"> -->
					    			<?php //echo $this->lang->line('ORDERS_TOTAL_LABEL').get_language($this->siteLang,'currencySymbol')."<strong>".number_format(convertCurrency(get_language($this->siteLang,'currency'),$totalPrice),2)."</strong>"; ?>
					    		<!-- </span> -->
					    		<span class="card-text pullRight col-md-4 customalign" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
					    			<?php echo $this->lang->line('ORDERS_TOTAL_LABEL').get_language($this->siteLang,'currencySymbol')."<strong>".number_format($totalPrice,0)."</strong>"; ?>
				    			</span>
					    	<?php } ?>
						  </div>
						</div>
						<?php } if(empty($orderDetail)) { ?>
							<h3 class="heading-tittle text-center font-italic"><?php echo $this->lang->line('NO_PRODUCT_FOUND_LABEL'); ?>.</h3>
						<?php } ?>
				</div>
			</div>
		</div>
	</div>