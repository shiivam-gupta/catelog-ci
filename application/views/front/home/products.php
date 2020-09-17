<?php if(!empty($allProducts)){?>	
	<?php foreach ($allProducts as $pdk => $pdv) {
	 ?>
	
		<div class="col-md-3 product-men mt-5 singleProductElement">
			<input type="hidden" name="dontGetProduct[]" value="<?= $pdv->id; ?>">
			<div class="card text-center">
				<div class="card-body">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item text-center">
							<?php $defaultImg = base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg'); ?>
							<?php $productImage = !empty($pdv->product_img) ? base_url($pdv->product_img) : base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg'); ?>
							<?php if($pdv->type == 'image'){?>
								<img src="<?= $productImage; ?>" alt="<?= $pdv->name;?>">
							<?php }else if($pdv->type == 'video'){?>
								<video src="<?=$productImage; ?>" controls style="width:100%;height:100%;"></video>
							<?php }else{?>
								<img src="<?= $defaultImg; ?>" alt="<?= $pdv->name;?>">
							<?php }?>
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="<?= base_url('product/details/').$pdv->id; ?>" class="link-product-add-cart"><?= $this->lang->line('PRODUCT_DETAIL_LABEL'); ?></a>
								</div>
							</div>
						</div>
						<div class="item-info-product text-center border-top mt-4">
							<h4 class="pt-1">								
								<a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('SKU_LABEL'); ?>"><strong><?= $this->lang->line('SKU_LABEL'); ?>:</strong><?= $pdv->sku; ?></a>
							</h4>
							<div class="info-product-price my-2">
								<?php if(___config('show_product_price','value') == 'Yes') { ?>
									<span class="item_price" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>" ><strong><?= $this->lang->line('PRICE_LABEL'); ?></strong><?= get_language($this->siteLang,'currencySymbol'); ?><?= number_format($pdv->{get_language($this->siteLang,'currencyColumn')},0); ?></span>
								<?php } ?>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<fieldset>
									<input type="hidden" id="pdt_price_<?= $pdv->id; ?>" value="<?= $pdv->{get_language($this->siteLang,'currencyColumn')}; ?>"/>
                                    <input type="hidden" id="pdt_name_<?= $pdv->id; ?>" value="<?= $pdv->sku; ?>"/>
                                    <input type="hidden" id="pdt_image_<?= $pdv->id; ?>" value="<?= $productImage; ?>"/>
                                    <input type="hidden" id="pdt_supplier_<?= $pdv->id; ?>" value="<?= $pdv->user_id; ?>"/>
                                    <input type="hidden" id="pdt_maxqty_<?= $pdv->id; ?>" value="<?= $pdv->quantity; ?>"/>
									<input type="button" onclick="<?php echo empty($this->sessionData) ? 'triggerLogin();' : 'addProductToCart('.$pdv->id.',1);'; ?>" value="<?php echo $this->lang->line('ADD_TO_CART_LABEL'); ?>" class="button btn" />
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } else { ?>
	<h3 class="heading-tittle text-center font-italic"><?php echo $this->lang->line('NO_PRODUCT_FOUND_LABEL'); ?>.</h3>
<?php } ?>