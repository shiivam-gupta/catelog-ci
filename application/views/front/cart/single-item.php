	<tr id="<?= 'row_'.$cik ?>">
		<td class="invert"><?= $i; ?></td>
		<td class="invert-image">
			<a href="JavaScript:Void(0);">
				<img src="<?= urldecode($civ['image']); ?>" alt=" " class="img-responsive" style="width: 100px; height: 150px;">
			</a>
		</td>
		<td class="invert">
			<div class="quantity">
				<div class="quantity-select">
					<div class="entry value-minus" onclick="decreaseCount('<?= $cik ?>',1,1);">&nbsp;</div>
					<div class="entry value">
						<span id="<?= 'quantity_'.$cik ?>"><?= $civ['qty'];?></span>
					</div>
					<div class="entry value-plus active" onclick="increaseCount('<?= $cik ?>',1,'<?= $civ['maxqty'] ?>');">&nbsp;</div>
				</div>
			</div>
		</td>
		<td class="invert"><?= $civ['name']; ?></td>
		<td class="invert"><?= get_language($this->siteLang,'currencySymbol'); ?><?= $civ['subtotal']; ?></td>
		<td class="invert">
			<!-- <div class="rem">
				<div class="close"></div>
			</div> -->
			<span style="cursor: pointer;" onclick="removeCartItem('<?= $cik ?>');" data-rowid="<?= $cik ?>"><?php echo $this->lang->line('REMOVE_LABEL'); ?></span>
		</td>
	</tr>