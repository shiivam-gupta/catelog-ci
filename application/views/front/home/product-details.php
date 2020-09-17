<style>
	* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;

}
.mySlides {
  display: none;
}
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.left {
  left: 0;
  border-radius: 3px 0 0 3px;
}
/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3" style="border-radius: 10px; background-color: gray;">
			<?php echo $this->lang->line('PRODUCT_INFO_LABEL'); ?></h3>
		<!-- //tittle heading -->
		<div class="row">
			<div class="col-lg-4 col-md-8 single-right-left ">
				<div class="grid images_3_of_2 customalign" style="position: relative;">
					<?php foreach ($images as $key => $value) {?>
						<?php if($value['type'] == 'image'){?>
							<div class="mySlides">
							    <img src="<?php echo base_url().$value['product_img'] ?>" style="width:100%">
							</div>
						<?php } else if($value['type'] == 'video'){?>
							<div class="mySlides">
							   <video src="<?php echo base_url().$value['product_img'] ?>" style="width:100%" controls ></video>
							</div>
						<?php }?>
					<a class="prev" style="left:0" onclick="plusSlides(-1)">❮</a>
  					<a class="next" style="right:0" onclick="plusSlides(1)">❯</a>
					<?php } ?>
					<div class="row mt-3">
						<?php foreach ($images as $key => $value) {?>
							<?php if($value['type'] == 'image'){?>
								<div class="column">
							      <img class="demo cursor" src="<?php echo base_url().$value['product_img'] ?>" style="width:100%" onclick="currentSlide('<?php echo $key+1 ?>')">
							    </div>
							<?php } else if($value['type'] == 'video'){?>
								<div class="column">
							      <video class="demo cursor" src="<?php echo base_url().$value['product_img'] ?>" style="width:100%" onclick="currentSlide('<?php echo $key+1 ?>')"></video>
							    </div>
					    <?php }} ?>
					</div>

				</div>
			</div>
			<div class="col-lg-8 single-right-left simpleCart_shelfItem">
				<div class="single-infoagile col-md-6" style="padding: 10px;">
					<h3 class="mb-3 customalign" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('SKU_LABEL'); ?>"><strong><?= $this->lang->line('SKU_LABEL'); ?> : </strong><?php echo $allProducts['sku'];?></h3>
					<?php if(___config('show_product_price','value') == 'Yes') { ?>
						<p class="mb-3 customalign">
							<span class="item_price" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><strong><?= $this->lang->line('PRICE_LABEL'); ?></strong><?= get_language($this->siteLang,'currencySymbol'); ?><?php echo number_format($allProducts[get_language($this->siteLang,'currencyColumn')],0);?></span>
							<!-- <del class="mx-2 font-weight-light">$280.00</del>
							<label>Free delivery</label> -->
						</p>
					<?php } ?>
				</div>
				
				<div class="single-infoagile col-md-6">
					<table class="customalign table table-hover">
						<?php if($allProducts['category']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('CATEGORY_LABEL'); ?> :</span> </td>
							<td><?php echo productCategory($allProducts['category']);?></td>
						<tr>
						<?php }if($allProducts['ktav']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('KTAV_LABEL'); ?> :</span></td>
							<td><?php echo productKtav($allProducts['ktav']);?></td>
						</tr>
						<?php }if($allProducts['product_type']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?> :</span></td>
							<td><?php echo productType($allProducts['product_type']);?></td>
						</tr>
						<?php }if($allProducts['ktav_size']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?> :</span></td>
							<td><?php echo productKtavSize($allProducts['ktav_size']);?></td>
						</tr>
						<?php }if($allProducts['plines']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('LINES_LABEL'); ?> :</span></td>
							<td><?php echo productLines($allProducts['plines']);?></td>
						</tr>
						<?php }if($allProducts['line_size']){ ?>
						<tr>
							<td><span class="singleProductLabel pullRight"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?> :</span></td>
							<td><?php echo productLineSize($allProducts['line_size']);?></td>
						</tr>
						<?php } ?>
					</table>
				</div>
				<div class="single-infoagile col-md-8" style="text-align: center;">
					<!-- <div><?php echo $allProducts['remark'];?></div> -->
				</div>
		
				<br>
				<div class="col-md-6 occasion-cart customalign" style="display: flex;justify-content: center">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" id="pdt_price_<?= $allProducts['id']; ?>" value="<?= $allProducts[get_language($this->siteLang,'currencyColumn')]; ?>"/>
								<input type="hidden" id="pdt_name_<?= $allProducts['id']; ?>" value="<?= $allProducts['sku']; ?>"/>
								<input type="hidden" id="pdt_image_<?= $allProducts['id']; ?>" value="<?= $allProducts['product_photo']; ?>"/>
								<input type="hidden" id="pdt_supplier_<?= $allProducts['id']; ?>" value="<?= $allProducts['user_id']; ?>"/>
								<input type="hidden" id="pdt_maxqty_<?= $allProducts['id']; ?>" value="<?= $allProducts['quantity']; ?>"/>
								<input type="button" onclick="<?php echo empty($this->sessionData) ? 'triggerLogin();' : 'addProductToCart('.$allProducts['id'].',1);'; ?>" value="<?php echo $this->lang->line('ADD_TO_CART_LABEL');?>" class="button btn"  />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>