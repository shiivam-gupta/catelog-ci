				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<form role="filter-form" action="<?= base_url('product/filter'); ?>" method="POST" id="productFilterForm" data-button="#productFilterButton">
						<div class="side-bar p-sm-4 p-3">

							<?php if(___config('show_product_price','value') == 'Yes') { ?>
							<div class="search-hotel py-2">
								<label class="col-md-5"><?= $this->lang->line('MIN_LABEL');?></label>
								<input type="search" placeholder="<?= $this->lang->line('MIN_LABEL');?>" name="minimum" id="minimum" class="decimalNumber" style="width: 100px;" autocomplete="off">
							</div>
							<div class="search-hotel border-bottom py-2">
								<label class="col-md-5"><?= $this->lang->line('MAX_LABEL');?></label>
								<input type="search" class="decimalNumber" placeholder="<?= $this->lang->line('MAX_LABEL');?>" name="maximum" id="maximum" style="width: 100px;" autocomplete="off">
								<button type="button" class="btn btn-info" onclick="checkPrice();">
									<i class="fa fa-chevron-circle-right"></i>
									<?php //echo $this->lang->line('SEARCH_LABEL'); ?></button>
							</div>
							<?php } ?>

							<!-- <div class="search-hotel border-bottom py-2">
								<h3 class="agileits-sear-head mb-3"><?php echo $this->lang->line('SEARCH_HERE_LABEL'); ?></h3>
								<input type="search" placeholder="<?php echo $this->lang->line('PRODUCT_NAME_LABEL'); ?>" name="productKeywordSearch" autocomplete="off">
								<button type="submit" id="productFilterButton" class="btn btn-info">
									<i class="fa fa-chevron-circle-right"></i>
									<?php //echo $this->lang->line('SEARCH_LABEL'); ?></button>
							</div> -->
							<br>
														
							<div class="">
								<form action="javascript:void(0);" method="post">
									<!--For category-->
									<label for="category"><?php echo $this->lang->line('CATEGORY_LABEL'); ?></label>
									<select class="form-control" id="category" name="category" onchange="frontsearch();">
										<option value=""><?php echo $this->lang->line('CATEGORY_LABEL'); ?></option>
										<?php foreach (productCategory() as $pck => $pcv) { ?>
			                                <option value="<?= $pck ?>" <?php echo ($pck == @$category) ? 'selected' : ''; ?>><?= $pcv; ?></option>
			                            <?php } ?>
									</select>
									<!--For ktav-->
									<label for="ktav"><?php echo $this->lang->line('KTAV_LABEL'); ?></label>
									<select class="form-control" id="ktav" name="ktav" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach (productKtav() as $pktk => $pktv) { ?>
			                                <option value="<?= $pktk ?>" <?php echo ($pktk == @$ktav) ? 'selected' : ''; ?>><?= $pktv; ?></option>
			                            <?php } ?>
			                        </select>
			                        <!--For product type-->
			                        <label for="product_type"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></label>
			                        <select class="form-control" id="product_type" name="product_type" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach (productType() as $ptk => $ptv) { ?>
			                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$product_type) ? 'selected' : ''; ?>><?= $ptv; ?></option>
			                            <?php } ?>
			                        </select>
			                        <!--For Ktav Size -->
			                        <label for="ktav_size"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></label>
			                        <select class="form-control" id="ktav_size" name="ktav_size" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach (productKtavSize() as $ptk => $ptv) { ?>
			                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$ktav_size) ? 'selected' : ''; ?>><?= $ptv; ?></option>
			                            <?php } ?>
			                        </select>
			                        <!--For Pline -->
			                        <label for="plines"><?php echo $this->lang->line('LINES_LABEL'); ?></label>
			                        <select class="form-control" id="plines" name="plines" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach (productLines() as $ptk => $ptv) { ?>
			                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$plines) ? 'selected' : ''; ?>><?= $ptv; ?></option>
			                            <?php } ?>
			                        </select>
			                        <!--For line size -->
			                        <label for="line_size"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></label>
			                        <select class="form-control" id="line_size" name="line_size" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach (productLineSize() as $ptk => $ptv) { ?>
			                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$line_size) ? 'selected' : ''; ?>><?= $ptv; ?></option>
			                            <?php } ?>
			                        </select>
			                        <!--For Supplier -->
			                        <!-- <label for="user_id"><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></label>
			                        <select class="form-control" id="user_id" name="user_id" onchange="frontsearch();">
			                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
			                            <?php foreach ($supplierList as $val) { ?>
			                                <option value="<?= $val->id ?>" <?php echo ($val->id == @$user_id) ? 'selected' : ''; ?>><?= $val->firstname.' '.$val->lastname; ?></option>
			                            <?php } ?>
			                        </select> -->
								</form>
							</div>							
							<!--
							<br>
							<?php if(___config('show_product_price','value') == 'Yes') { ?>
								<div class="range border-bottom py-2">
									<h3 class="agileits-sear-head mb-3"><?php echo $this->lang->line('PRICE_LABEL'); ?></h3>
									<div class="w3l-range">	
										<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
										<div id="slider-range"></div>
										<input type="hidden" name="minimum" id="minimum" />
										<input type="hidden" name="maximum" id="maximum" />
									</div>
								</div>
							<?php } ?>
							-->

						</div>
					</form>
				</div>
			
				<script type="text/javascript">
					$( function() {
						$( "#slider-range" ).slider({
							range: true,
							min: 1,
							max: <?= $maximum_price; ?>,
							values: [  1 , <?= $maximum_price; ?> ],
							slide: function( event, ui ) {
								$( "#amount" ).val( "<?= get_language($this->siteLang,'currencySymbol'); ?>" + ui.values[0] + " - <?= get_language($this->siteLang,'currencySymbol'); ?>" + ui.values[1] );
								$("#minimum").val(ui.values[0]);
								$("#maximum").val(ui.values[1]);
							},
							stop: function( event, ui) {
								frontsearch();
							}
						});

						if(websiteDirection == 'rtl') {
							$( "#amount" ).val( "<?= get_language($this->siteLang,'currencySymbol'); ?>" + $( "#slider-range" ).slider( "values", 1 ) + " - <?= get_language($this->siteLang,'currencySymbol'); ?>" + $( "#slider-range" ).slider( "values", 0 ) );
						} else {
							$( "#amount" ).val( "<?= get_language($this->siteLang,'currencySymbol'); ?>" + $( "#slider-range" ).slider( "values", 0 ) + " - <?= get_language($this->siteLang,'currencySymbol'); ?>" + $( "#slider-range" ).slider( "values", 1 ) );
						}
						
					});

					function frontsearch(){
						$('#productFilterForm').submit();
					}
					
					$(document).on('click', '[name="pricefilter[]"]', function(e){
						$('#productFilterForm').submit();
					});

					$(document).on('submit', '[role="filter-form"]', function(e) {
						e.preventDefault();
						$processingLoadMore = false;
						var $url = $(this).attr('action');
						var $method = $(this).attr('method');
						var $btnObj = $($(this).attr('data-button'));
						var checkedPriceFilter = ($('.priceFilter:checked').length > 0);
						var keyWordCheck = $.trim($('[name="productKeywordSearch"]').val()) ? true : false;
						//if(checkedPriceFilter || keyWordCheck) {
							$btnObj.attr('disabled',true);
							var $data = new FormData($(this)[0]);
							$data.append('target','.productSection');
							$('.priceFilter').prop('disabled',true);
							submitForm($url,$method,$data,$btnObj);
							setTimeout(function() {
								$('.priceFilter').prop('disabled',false);
							},200);
						//}
					});

					function checkPrice() {
						var min = parseInt($("#minimum").val());
						var max = parseInt($("#maximum").val());

						if(max < min){
							$("#minimum").val('');
							swal("Min price can't be greater than max price.")
						}else{
							frontsearch();
						}
					}

				</script>