<div class="container"> 
	<div class="row" style="margin:15px;">
		<a href="<?= base_url('admin/supplier/list');?>">
			<div class="col-lg-4 text-center">
				<div class="knob-label text-center" style="margin-bottom: 5px; color: black;"><strong><?= $this->lang->line('TOTAL_USERS_LABEL'); ?></strong></div>
				<div style="width: 200px; height: 200px; border-radius: 50%; border: 50px solid #00c0ef; text-align: center; line-height: 100px; font-size: 32px;margin: 0 auto 20px;"><?= $userCount;?></div>
			</div>
		</a>
		<a href="<?= base_url('admin/products/list');?>">
			<div class="col-lg-4 text-center">
				<div class="knob-label text-center" style="margin-bottom: 5px; color: black;"><strong><?= $this->lang->line('TOTAL_PRODUCTS_LABEL'); ?></strong></div>
				<div style="width: 200px; height: 200px; border-radius: 50%; border: 50px solid #00a65a; text-align: center; line-height: 100px; font-size: 32px;margin: 0 auto 20px;"><?= $productCount;?></div>
			</div>
		</a>
		<a href="<?= base_url('admin/orders/list');?>">
			<div class="col-lg-4 text-center">
				<div class="knob-label text-center" style="margin-bottom: 5px; color: black;"><strong><?= $this->lang->line('TOTAL_ORDERS_LABEL'); ?></strong></div>
				<div style="width: 200px; height: 200px; border-radius: 50%; border: 50px solid #f39c12; text-align: center; line-height: 100px; font-size: 32px;margin: 0 auto 20px;"><?= $orderCount;?></div>
			</div>
		</a>
	</div>
</div>