	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2" style="max-width:95%;">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $this->lang->line('OUR_PRODUCT_LABEL'); ?></h3>
			<!-- //tittle heading -->

			
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
								<!-- <h3 class="heading-tittle text-center font-italic">New Brand Mobiles</h3> -->
							<form id="productListForm">
								<div class="row productSection">
									<?php include_once(sprintf('%sviews%sfront%shome%sproducts.php', APPPATH,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR)); ?>
								</div>
							</form>
						</div>
							<button style="display: none;" type="button" class="load-more-content" data-request="load-moredata" data-url="<?= base_url('product/filter'); ?>" data-form="#productListForm" data-filterform="#productFilterForm" data-target=".singleProductElement"><?php echo $this->lang->line('LOAD_MORE_LABEL'); ?></button>
					</div>
				</div>
				<!-- //product left -->

		        <?php include_once(sprintf('%sviews%sfront%shome%ssearch-area.php', APPPATH,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR)); ?>
			</div>
		</div>
	</div>
	<!-- //top products -->