<?php $i=1; foreach($cartItems as $cik => $civ){ ?>
	<tr id="<?= 'row_'.$cik ?>">
		<td class="invert"><?= $i; ?></td>
		<td class="invert-image">
			<a href="JavaScript:Void(0);">
				<img src="<?= urldecode($civ['image']); ?>" alt=" " class="img-responsive" style="width: 100px;">
			</a>
		</td>
		<td class="invert" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('SKU_LABEL'); ?>"><?= $civ['name']; ?></td>
		<td class="invert">
			<div class="quantity">
				<div class="quantity-select">
					<div class="entry value-minus" onclick="decreaseCount('<?= $cik ?>',1,1);">&nbsp;</div>
					<div class="entry value">
						<span id="<?= 'quantity_'.$cik ?>"><?= $civ['qty'];?></span>
					</div>
					<div class="entry value-plus" onclick="increaseCount('<?= $cik ?>',1,'<?= $civ['maxqty'] ?>');">&nbsp;</div>
				</div>
			</div>
		</td>
		<?php if(___config('show_product_price','value') == 'Yes') { ?>
			<!-- <td class="invert" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= get_language($this->siteLang,'currencySymbol'); ?><?= number_format(convertCurrency(get_language($this->siteLang,'currency'),$civ['subtotal']),0); ?></td> -->
			<td class="invert" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= get_language($this->siteLang,'currencySymbol'); ?><?= number_format($civ['subtotal'],0); ?></td>
		<?php } ?>
		<td class="invert">
			<!-- <div class="rem">
				<div class="close"></div>
			</div> -->
			<span style="cursor: pointer;" onclick="removeCartItem('<?= $cik ?>');" data-rowid="<?= $cik ?>"><?php echo $this->lang->line('REMOVE_LABEL');?></span>
		</td>
	</tr>
<?php $i++;} ?>

<?php if(!empty($cartItems)) { ?>
	<tr id="<?= 'row_'.$cik ?>">
		<td class="invert" colspan="4"></td>
		<td class="invert" colspan="2" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
			<span class="center pullLeft"><b><?php echo $this->lang->line('TOTAL_ITEMS_LABEL'); ?> :&nbsp;</b></span><span class="pullLeft"> <?= $totalItems; ?></span><br />
			<?php if(___config('show_product_price','value') == 'Yes') { ?>
				<!-- <span class="center pullLeft"><b><?php echo $this->lang->line('TOTAL_AMOUNT_LABEL'); ?> :&nbsp; </b></span><span class="pullLeft"> <?= get_language($this->siteLang,'currencySymbol'); ?><?= number_format(convertCurrency(get_language($this->siteLang,'currency'),$totalAmount),0); ?></span> -->
				<span class="center pullLeft"><b><?php echo $this->lang->line('TOTAL_AMOUNT_LABEL'); ?> :&nbsp; </b></span><span class="pullLeft"> <?= get_language($this->siteLang,'currencySymbol'); ?><?= number_format($totalAmount,0); ?></span>
			<?php } ?>
		</td>
	</tr>
<?php } ?>