<!-- Main content -->
<section class="content">
    <style type="text/css">
        .imgVal {
            color:red;
            font-weight: bold;
        }
    </style>
    <div class="box box-primary">
        <div class="box-header with-border">
            <div id="photos-preview">
                <img src="<?php echo !empty($prodData['product_photo']) ? base_url($prodData['product_photo']) : base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg'); ?>" class="img-circle prod-user-image" alt="<?php echo $this->lang->line('PRODUCT_IMAGE_ALT'); ?>" style="width: 100px; height: 100px;">
            </div>
        </div>
        <!-- form start -->
        <!-- <form role="form" action="<?= base_url('admin/product/submit/'.@$this->uriSegments[4]); ?>" method="POST" enctype="multipart/form-data"> -->
        <form role="form" action="" id="buyingSupplier" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="search-group">
                    <label for="user_id"><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></label>
                    <select class="form-control" id="user_id" name="user_id" onchange="showAddProduct(this.value,0);">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach($supplierlist as $supp){ ?>
                            <option value="<?= $supp->id ?>"><?= $supp->firstname.' '.$supp->lastname; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="box-body buyingContainer">
                <!-- <input type="hidden" value="<?= @$request_id ?>" name="request_id"> -->
                <div class="classrepetative">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="sku_label"><?php echo $this->lang->line('SKU_LABEL'); ?></label>
                            <input name="product[0][sku_label]" data-skuid="0" id="sku_label" class="form-control sku_label">
                            <span class="help-block"><?php echo form_error('sku_label'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="category"><?php echo $this->lang->line('CATEGORY_LABEL'); ?></label>
                            <select name="product[0][category]" id="category" class="form-control category_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productCategory() as $pck => $pcv) { ?>
                                    <option value="<?= $pck ?>" <?php echo ($pck == $prodData['category']) ? 'selected' : ''; ?>><?= $pcv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('category'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="ktav"><?php echo $this->lang->line('KTAV_LABEL'); ?></label>
                            <select name="product[0][ktav]" id="ktav" class="form-control ktav_label" required="" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productKtav() as $pktk => $pktv) { ?>
                                    <option value="<?= $pktk ?>" <?php echo ($pktk == $prodData['ktav']) ? 'selected' : ''; ?>><?= $pktv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('ktav'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="product_type"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></label>
                            <select name="product[0][product_type]" id="product_type" class="form-control product_type_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productType() as $ptk => $ptv) { ?>
                                    <option value="<?= $ptk ?>" <?php echo ($ptk == $prodData['product_type']) ? 'selected' : ''; ?>><?= $ptv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('product_type'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="ktav_size"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></label>
                            <select name="product[0][ktav_size]" id="ktav_size" class="form-control ktav_size_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productKtavSize() as $pktsk => $pktsv) { ?>
                                    <option value="<?= $pktsk ?>" <?php echo ($pktsk == $prodData['ktav_size']) ? 'selected' : ''; ?>><?= $pktsv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('ktav_size'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="plines"><?php echo $this->lang->line('LINES_LABEL'); ?></label>
                            <select name="product[0][plines]" id="plines" class="form-control lines_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productLines() as $plk => $plv) { ?>
                                    <option value="<?= $plk ?>" <?php echo ($plk == $prodData['plines']) ? 'selected' : ''; ?>><?= $plv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('plines'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="line_size"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></label>
                            <select name="product[0][line_size]" id="line_size" class="form-control lines_size_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productLineSize() as $plzk => $plzv) { ?>
                                    <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['line_size']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('line_size'); ?></span>
                        </div>

                        

                        <div class="form-group col-md-2">
                            <label for="quantity"><?php echo $this->lang->line('QUANTITY_LABEL'); ?></label>
                            <input type="number" class="form-control individual_price quantity_label" id="quantity" name="product[0][quantity]" placeholder="<?php echo $this->lang->line('QUANTITY_LABEL'); ?>" value="0" required>
                            <span class="help-block"><?php echo form_error('quantity'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="ktav_price"><?php echo $this->lang->line('KTAV_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price ktav_price" id="ktav_price" name="product[0][ktav_price]" placeholder="<?php echo $this->lang->line('KTAV_PRICE'); ?>" value="0" min="0" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tyug_price"><?php echo $this->lang->line('TYUG_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price tyug_price" id="tyug_price" name="product[0][tyug_price]" placeholder="<?php echo $this->lang->line('TYUG_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="klaf_price"><?php echo $this->lang->line('KLAF_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price klaf_price" id="klaf_price" name="product[0][klaf_price]" placeholder="<?php echo $this->lang->line('KLAF_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="hgha_price"><?php echo $this->lang->line('HGHA_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price hgha_price" id="hgha_price" name="product[0][hgha_price]" placeholder="<?php echo $this->lang->line('HGHA_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cost_price_subtotal"><?php echo $this->lang->line('COST_PRICE_SUBTOTAL'); ?></label>
                            <input type="number" class="form-control cost_price_subtotal"  name="product[0][cost_price_subtotal]" placeholder="<?php echo $this->lang->line('COST_PRICE_SUBTOTAL'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>

                        <!-- <div class="form-group col-md-2">
                            <label for="cost_price_total"><?php echo $this->lang->line('COST_PRICE_TOTAL'); ?></label>
                            <input type="number" data-other="USD" data-key="0" data-request="convert-rate" data-target="#priceindollar_0" class="form-control cost_price_total" name="product[0][cost_price_total]" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div> -->
                        <div class="form-group col-md-2">
                            <label for="priceindollar_0"><?php echo $this->lang->line('COST_PRICE_TOTAL'); ?></label>
                            <input type="number" class="form-control cost_price_total" data-key="0" name="product[0][priceindollar]" id="priceindollar_0" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>

                </div>
                
                <!-- <div class="form-group">
                    <label for="priceinshekel"><?php echo $this->lang->line('PRICE_IN_ILS_LABEL'); ?></label>
                    <input data-target="#priceindollar" data-iam="ILS" data-other="USD" data-request="convert-rate" type="text" class="form-control decimalNumber" id="priceinshekel" name="priceinshekel" placeholder="<?php echo $this->lang->line('PRICE_IN_ILS_LABEL'); ?>" value="<?= round($prodData['priceinshekel'],2) ?>" required>
                    <span class="help-block"><?php echo form_error('priceinshekel'); ?></span>
                </div>
        
                <div class="form-group">
                    <label for="priceindollar"><?php echo $this->lang->line('PRICE_IN_DOLLARS_LABEL'); ?></label>
                    <input data-target="#priceinshekel" data-iam="USD" data-other="ILS" data-request="convert-rate"  type="text" class="form-control decimalNumber" id="priceindollar" name="priceindollar" placeholder="<?php echo $this->lang->line('PRICE_IN_DOLLARS_LABEL'); ?>" value="<?= round($prodData['priceindollar'],2) ?>" required>
                    <span class="help-block"><?php echo form_error('priceindollar'); ?></span>
                </div> -->

            </div>
            <input type="button" value="<?php echo $this->lang->line('ADD_LABEL'); ?>" class="btn btn-primary addMore">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('FINAL_PRICE_USD'); ?></label>
                        <input type="number" class="form-control" id="final_price" name="product[final_price]" placeholder="<?php echo $this->lang->line('FINAL_PRICE_USD'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('FINAL_PRICE_ISL'); ?></label>
                        <input type="number" class="form-control" id="final_price_isl" placeholder="<?php echo $this->lang->line('FINAL_PRICE_ISL'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('PAID_PRICE_USD'); ?></label>
                        <input type="number" class="form-control"  data-iam="USD" data-other="ILS" data-request="convert-rate" data-target="#paid_price_isl" id="paid_price_usd"  name="product[paid_price]"  placeholder="<?php echo $this->lang->line('PAID_PRICE_USD'); ?>" min="0" value="0">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('PAID_PRICE_ISL'); ?></label>
                        <input type="number" class="form-control" data-target="#paid_price_usd" data-iam="ILS" data-other="USD" data-request="convert-rate" id="paid_price_isl" placeholder="<?php echo $this->lang->line('PAID_PRICE_ISL'); ?>" min="0" value="0">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_USD'); ?></label>
                        <input type="number" class="form-control" id="own_price"  name="product[own_price]" placeholder="<?php echo $this->lang->line('OWN_PRICE_USD'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_ISL'); ?></label>
                        <input type="number" class="form-control" id="own_price_isl" placeholder="<?php echo $this->lang->line('OWN_PRICE_ISL'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <input type="button" data-type="button" value="<?php echo $this->lang->line('SUBMIT_LABEL'); ?>" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
    companyList = '';
    function showAddProduct(id,val=0)
    {
        var base_url = "<?= base_url('admin/get-supplier-product')?>";
        $.ajax({
            url: base_url,
            method: "POST",
            data:{
                id:id
            },
            success: function(s) {
              var json = JSON.parse(s);
                if (json.status == "success") {
                   var companyList = $('.classrepetative').find( '[name="product['+val+'][sku_label]"]' ).autocomplete({
                        source: json.data,
                        change: function( event, ui ) {
                            getSkuLabel(val,ui.item.value);
                        }
                    });
                }
            }
        })
    }

    $(document).on('change','.sku_label',function(){
        var skuid = $(this).attr('data-skuid');
        var skuName = $(this).val();
        getSkuLabel(skuid,skuName);
    })

    function getSkuLabel(val,sku=''){

        var base_url = "<?= base_url('admin/get-skuproduct')?>";
        $.ajax({
            url: base_url,
            method: "POST",
            data:{
                sku:sku
            },
            success: function(s) {
              var json = JSON.parse(s);
                if (json.status == "success") {
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#category').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#category').val(json.data.category);

                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#ktav').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#ktav').val(json.data.ktav);

                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#product_type').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#product_type').val(json.data.product_type);

                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#ktav_size').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#ktav_size').val(json.data.ktav_size);

                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#plines').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#plines').val(json.data.plines);

                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#line_size').attr("disabled", true);
                    $('[name="product['+val+'][sku_label]"]').parent().parent().parent('.classrepetative').find('#line_size').val(json.data.line_size);
                }
            }
        })
    }

    $(document).on('keyup','.sku_label',function(){

        $(this).parent().parent().parent('.classrepetative').find('#category').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#category').val('');

        $(this).parent().parent().parent('.classrepetative').find('#ktav').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#ktav').val('');

        $(this).parent().parent().parent('.classrepetative').find('#product_type').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#product_type').val('');

        $(this).parent().parent().parent('.classrepetative').find('#ktav_size').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#ktav_size').val('');

        $(this).parent().parent().parent('.classrepetative').find('#plines').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#plines').val('');

        $(this).parent().parent().parent('.classrepetative').find('#line_size').attr("disabled", false);
        $(this).parent().parent().parent('.classrepetative').find('#line_size').val('');

    })

    // $(document).on('keypress','#sku_label',function(){
    //     console.log("asd"); 
    //     $(this).parent().find(".get_value").val(1);
    // });

    $(document).on('click','.addMore',function(){
        var index = eval($('.classrepetative').length);
        var html =`<div class="classrepetative">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <input type="hidden" name="get_value" class="get_value" value="1">
                            <label for="sku_label"><?php echo $this->lang->line('SKU_LABEL'); ?></label>
                            <input name="product[`+index+`][sku_label]" data-skuid="`+index+`" id="sku_label" class="form-control sku_label">
                            
                            <span class="help-block"><?php echo form_error('sku_label'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="category"><?php echo $this->lang->line('CATEGORY_LABEL'); ?></label>
                            <select name="product[`+index+`][category]" id="category" class="form-control category_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productCategory() as $pck => $pcv) { ?>
                                    <option value="<?= $pck ?>" <?php echo ($pck == $prodData['category']) ? 'selected' : ''; ?>><?= $pcv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('category'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="ktav"><?php echo $this->lang->line('KTAV_LABEL'); ?></label>
                            <select name="product[`+index+`][ktav]" id="ktav" class="form-control ktav_label" required="" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productKtav() as $pktk => $pktv) { ?>
                                    <option value="<?= $pktk ?>" <?php echo ($pktk == $prodData['ktav']) ? 'selected' : ''; ?>><?= $pktv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('ktav'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="product_type"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></label>
                            <select name="product[`+index+`][product_type]" id="product_type" class="form-control product_type_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productType() as $ptk => $ptv) { ?>
                                    <option value="<?= $ptk ?>" <?php echo ($ptk == $prodData['product_type']) ? 'selected' : ''; ?>><?= $ptv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('product_type'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="ktav_size"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></label>
                            <select name="product[`+index+`][ktav_size]" id="ktav_size" class="form-control ktav_size_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productKtavSize() as $pktsk => $pktsv) { ?>
                                    <option value="<?= $pktsk ?>" <?php echo ($pktsk == $prodData['ktav_size']) ? 'selected' : ''; ?>><?= $pktsv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('ktav_size'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="plines"><?php echo $this->lang->line('LINES_LABEL'); ?></label>
                            <select name="product[`+index+`][plines]" id="plines" class="form-control lines_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productLines() as $plk => $plv) { ?>
                                    <option value="<?= $plk ?>" <?php echo ($plk == $prodData['plines']) ? 'selected' : ''; ?>><?= $plv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('plines'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="line_size"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></label>
                            <select name="product[`+index+`][line_size]" id="line_size" class="form-control lines_size_label" onchange="getSkuLabel(this)">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach (productLineSize() as $plzk => $plzv) { ?>
                                    <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['line_size']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                                <?php } ?>
                            </select>
                            <span class="help-block"><?php echo form_error('line_size'); ?></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="quantity"><?php echo $this->lang->line('QUANTITY_LABEL'); ?></label>
                            <input type="number" class="form-control individual_price quantity_label" id="quantity" name="product[`+index+`][quantity]" placeholder="<?php echo $this->lang->line('QUANTITY_LABEL'); ?>" value="0" required>
                            <span class="help-block"><?php echo form_error('quantity'); ?></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="ktav_price"><?php echo $this->lang->line('KTAV_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price ktav_price" id="ktav_price" name="product[`+index+`][ktav_price]" placeholder="<?php echo $this->lang->line('KTAV_PRICE'); ?>" value="0" min="0" required>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="tyug_price"><?php echo $this->lang->line('TYUG_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price tyug_price" id="tyug_price" name="product[`+index+`][tyug_price]" placeholder="<?php echo $this->lang->line('TYUG_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="klaf_price"><?php echo $this->lang->line('KLAF_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price klaf_price" id="klaf_price" name="product[`+index+`][klaf_price]" placeholder="<?php echo $this->lang->line('KLAF_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="hgha_price"><?php echo $this->lang->line('HGHA_PRICE'); ?></label>
                            <input type="number" class="form-control quantity_price individual_price hgha_price" id="hgha_price" name="product[`+index+`][hgha_price]" placeholder="<?php echo $this->lang->line('HGHA_PRICE'); ?>" min="0" value="0">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cost_price_subtotal"><?php echo $this->lang->line('COST_PRICE_SUBTOTAL'); ?></label>
                            <input type="number" class="form-control cost_price_subtotal"  name="product[`+index+`][cost_price_subtotal]" placeholder="<?php echo $this->lang->line('COST_PRICE_SUBTOTAL'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="priceindollar_`+index+`"><?php echo $this->lang->line('COST_PRICE_TOTAL'); ?></label>
                            <input type="number" class="form-control cost_price_total" data-key="`+index+`" name="product[`+index+`][priceindollar]" id="priceindollar_`+index+`" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <input type="button" value="<?php echo $this->lang->line('REMOVE_LABEL'); ?>" class="btn btn-primary removeMore">
                </div>`;
        $('.buyingContainer').append(html);
        var supplierId = $('#user_id').val();
        showAddProduct(supplierId,index)
    })

    $(document).on('click','.removeMore',function(){

        $(this).parent('.classrepetative').remove();
        var finalTotal = 0;
        $('.cost_price_total').each(function(index) {
            var getTotal = $(this).val();
            finalTotal =  parseFloat(getTotal) +  parseFloat(finalTotal)
        });

        $('#final_price').val(finalTotal);
        convertRateToISL(finalTotal.toFixed(2),'#final_price_isl');
        $('#own_price').val(finalTotal);
        convertRateToISL(finalTotal.toFixed(2),'#own_price_isl');
    })

    $(document).ready(function(){
        /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });*/

        //$('#sku_label').select2();

    $('#finishDate').datepicker({
        "format": "dd-mm-yyyy",
        todayHighlight:true
    });



    /*To delete Image*/
        $(document).on("click", ".imgDelete", function(e) {
            var id = $(this).attr('data-id');
            url = $(this).attr('url');
            e.preventDefault();
            Swal.fire({
                  title: 'Are you sure?',
                  text: "Once You Delete You can not Get an File Again!",
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if(willDelete.value) {
                    $.ajax({
                        url: url+id,
                        method: "POST",
                        success: response => {
                          var json = JSON.parse(response);
                            if (json.status == "success") {
                                swal(json.msg).then(done => {
                                  if (done) {
                                    setTimeout(function() {
                                      location.reload();
                                    }, 100);
                                  }
                                });
                            }
                        }
                    })
                }
                else {
                    Swal.fire("Your File is Safe!!")
                }
            })
        })
    });

    $(document).on('keyup','.individual_price', function (event) {
        var ktav_price = $(this).parent().parent().parent('.classrepetative').find('#ktav_price').val();
        var tyug_price = $(this).parent().parent().parent('.classrepetative').find('#tyug_price').val();
        var klaf_price = $(this).parent().parent().parent('.classrepetative').find('#klaf_price').val();
        var hgha_price = $(this).parent().parent().parent('.classrepetative').find('#hgha_price').val();
        var quantity = $(this).parent().parent().parent('.classrepetative').find('#quantity').val();

        if(ktav_price == ''){
            ktav_price = 0;
        }
        if(tyug_price == ''){
            tyug_price = 0;
        }
        if(klaf_price == ''){
            klaf_price = 0;
        }
        if(hgha_price == ''){
            hgha_price = 0;
        }
        if(quantity == ''){
            quantity = 0;
        }

        var subtotal = parseFloat(ktav_price) + parseFloat(tyug_price) + parseFloat(klaf_price) + parseFloat(hgha_price);

        var total = subtotal.toFixed(2) * quantity;

        $(this).parent().parent().parent('.classrepetative').find('.cost_price_subtotal').val(subtotal.toFixed(2));
        $(this).parent().parent().parent('.classrepetative').find('.cost_price_total').val(total.toFixed(2));
        var getdataKey = $(this).parent().parent().parent('.classrepetative').find('.cost_price_total').attr('data-key');
        //convertRateToISL(total.toFixed(2),'#priceindollar_'+getdataKey);

        var finalTotal = 0;
        $('.cost_price_total').each(function(index) {
            var getTotal = $(this).val();
            finalTotal =  parseFloat(getTotal) +  parseFloat(finalTotal)
        });

        $('#final_price').val(finalTotal);
        convertRateToISL(finalTotal.toFixed(2),'#final_price_isl');
        $('#own_price').val(finalTotal);
        convertRateToISL(finalTotal.toFixed(2),'#own_price_isl');
        //alert(finalTotal);

        //$('[data-request="convert-rate"]').trigger( "keyup" );
        //convertRate($(this));
    });

    $(document).on('keyup','[data-request="convert-rate"]', function (event) {
        convertRate($(this));
    });

    $(document).on('keyup','#paid_price_isl',function(){
        var paid_isl = $(this).val() == '' ? 0 : parseFloat($(this).val());
        var final_price = parseFloat($('#final_price_isl').val());

        if(paid_isl > final_price){
            $(this).next('.help-block').html(`<?php echo $this->lang->line('MAX_PAID'); ?>`);
            $('[data-type="button"]').attr("disabled", true);
        } else {
            var own_amt = final_price - paid_isl;
            $('#own_price_isl').val(own_amt.toFixed(2));
            convertRateToUsd(own_amt.toFixed(2),'#own_price');
            $('[data-type="button"]').removeAttr("disabled");
            $(this).next('.help-block').html('');
        }
    })

    $(document).on('keyup','#paid_price_usd',function(){
        var paid_usd = $(this).val() == '' ? 0 : parseFloat($(this).val());
        var final_price = parseFloat($('#final_price').val());

        if(paid_usd > final_price){
            $(this).next('.help-block').html(`<?php echo $this->lang->line('MAX_PAID'); ?>`);
            $('[data-type="button"]').attr("disabled", true);
        } else {
            var own_amt = final_price - paid_usd;
            $('#own_price').val(own_amt.toFixed(2));
            convertRateToISL(own_amt.toFixed(2),'#own_price_isl');
            $('[data-type="button"]').removeAttr("disabled");
            $(this).next('.help-block').html('');
        }
    })

    $(document).on('blur','[data-request="convert-rate"]', function (event) {
        /*var price = parseFloat($(this).val());
        if(!isNaN(price)) {
            price = Math.round(price);
            $(this).val(price);
        }*/
    });

    $(document).ready(function(){
        let count = 0;
      $(".addimage").click(function(){
        count++;
            $("#loadimage").append(`<div style="margin-left:1px;" class="row removeImage"><input  type="file" required class="addMoreImages" name="moreimg[`+count+`]"><a class="removeinput btn btn-danger btn-xm" href="javascript:void(0);" style="float:right;margin-right:500px;margin-top:-20px;" >X</a></div><p></p>`);
        });
        $(document).on('click','.removeinput',function(){
            count--;
            $(this).parents('.removeImage').remove();
            
        });

        $(document).on("change" , ".addMoreImages" , function() {
            var file=(this.files[0].size);
            
            if(file >2000000) {
                 $('.imgVal').text("File is below than 2 mb")
                 return false;
            }
            switch(file.substring(file.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jifi':
                $('.imgVal').text("")
                    break;
                case 'mp4' : case '3gp' : case 'avi':
                   $('.imgVal').text("")
                    break;
                default:
                    $(this).val('');
                     $('.imgVal').text("Please select Video Or Image")
                    return false;
                    break;
            }   
        });

    });
    
    $(document).on('click','[data-type="button"]',function(){
        var finalTotal = 0;
        var err = 0;
        $('.category_label').each(function(index) {

            var category_label = $(this).val();
            if(category_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('CAT_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.ktav_label').each(function(index) {

            var ktav_label = $(this).val();
            if(ktav_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('KTAV_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.product_type_label').each(function(index) {

            var product_type_label = $(this).val();
            if(product_type_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRODUCT_TYPE_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.ktav_size_label').each(function(index) {

            var ktav_size_label = $(this).val();
            if(ktav_size_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('KTAV_SIZE_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.lines_label').each(function(index) {

            var lines_label = $(this).val();
            if(lines_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('LINES_LABEL_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.lines_size_label').each(function(index) {

            var lines_size_label = $(this).val();
            if(lines_size_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('LINES_SIZE_LABEL_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.sku_label').each(function(index) {

            var sku_label = $(this).val();
            if(sku_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('SKU_LABEL_REQUIRED'); ?>`);
                err = 1;
            } else {
                $(this).next('.help-block').html('');
            }
        });

        
        $('.classrepetative').each(function(index) {
            var ktav_price = $('[name="product['+index+'][ktav_price]"]').val();
            var tyug_price = $('[name="product['+index+'][tyug_price]"]').val();
            var klaf_price = $('[name="product['+index+'][klaf_price]"]').val();
            var hgha_price = $('[name="product['+index+'][hgha_price]"]').val();
            console.log(ktav_price);
            console.log(tyug_price);
            console.log(klaf_price);
            console.log(hgha_price);
            if(ktav_price == '' && tyug_price == '' && klaf_price == '' && hgha_price == ''){
                $('[name="product['+index+'][ktav_price]"]').next('.help-block').html(`<?php echo $this->lang->line('KTAV_PRICE_REQUIRED'); ?>`);
                err = 1;
            } else if (ktav_price <= 0 && tyug_price <= 0 && klaf_price <= 0 && hgha_price <= 0){
                $(this).children('.row').children('.col-md-2').children('#ktav_price').next('.help-block').html(`<?php echo $this->lang->line('KTAV_PRICE_REQUIRED'); ?>`)
                err = 1;
            } else {
                $('[name="product['+index+'][ktav_price]"]').next('.help-block').html('');
            }
        });

        $('.ktav_price').each(function(index) {

            var ktav_price = $(this).val();
            if(typeof(ktav_price) === 'number'){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_NUMBER_VALID'); ?>`);
            } else {
                $(this).next('.help-block').html('');
            }
        });

        // $('.ktav_price').each(function(index) {

        //     var ktav_price = $(this).val();
        //     if(ktav_price == ''){
        //         $(this).next('.help-block').html(`<?php echo $this->lang->line('KTAV_PRICE_REQUIRED'); ?>`);
        //         err = 1;
        //     } else if(ktav_price <= 0){
        //         $(this).next('.help-block').html(`<?php echo $this->lang->line('KTAV_PRICE_GREATER_VALID'); ?>`);
        //         err = 1;
        //     } else if(typeof(ktav_price) === 'number'){
        //         err = 1;
        //         $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_NUMBER_VALID'); ?>`);
        //     } else {
        //         $(this).next('.help-block').html('');
        //     }
        // });

        $('.tyug_price').each(function(index) {

            var tyug_price = $(this).val();
            if(typeof(tyug_price) === 'number'){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_NUMBER_VALID'); ?>`);
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.klaf_price').each(function(index) {

            var klaf_price = $(this).val();
            if(typeof(klaf_price) === 'number'){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_NUMBER_VALID'); ?>`);
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.hgha_price').each(function(index) {
            var hgha_price = $(this).val();
            if(typeof(hgha_price) === 'number'){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_NUMBER_VALID'); ?>`);
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.quantity_label').each(function(index) {

            var quantity_label = $(this).val();
            if(quantity_label == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('QUANTITY_REQUIRED'); ?>`);
                err = 1;
            } else if(quantity_label <= 0){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('QUANTITY_GREATER_VALID'); ?>`);
            } else if(Number.isInteger(quantity_label)){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('QUANTITY_NUMBER_VALID'); ?>`);
            } else {
                $(this).next('.help-block').html('');
            }
        });

        $('.cost_price_subtotal').each(function(index) {

            var cost_price_subtotal = $(this).val();
            if(cost_price_subtotal == ''){
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_REQUIRED'); ?>`);
                err = 1;
            } else if(cost_price_subtotal <= 0){
                err = 1;
                $(this).next('.help-block').html(`<?php echo $this->lang->line('PRICE_REQUIRED'); ?>`);
            }  else {
                $(this).next('.help-block').html('');
            }
        });

        if(err == 1){
            swal(`<?php echo $this->lang->line('FIX_ERROR'); ?>`);
        } else {
            $('#buyingSupplier').submit();
        }

    })

    function convertRateToUsd(pricerate,IdType="") {

        var convertRate = '<?php echo json_encode($currencyRate); ?>';
        var curp = pricerate;

        if(convertRate != "null") {
            var price = 0.0;
            var o = JSON.parse(convertRate);
            price = (1/o.rate)*curp;
            price = price.toFixed(2);
            $(IdType).val(price);
        }

    }

    function convertRateToISL(pricerate,IdType="") {

        var convertRate = '<?php echo json_encode($currencyRate); ?>';
        var curp = pricerate;

        if(convertRate != "null") {
            var price = 0.0;
            var o = JSON.parse(convertRate);
            price = (o.rate)*curp;
            price = price.toFixed(2);
            $(IdType).val(price);;
        }

    }
    

    function convertRate(obj) {
        var to = $(obj).attr('data-other');
        var from = $(obj).attr('data-iam');
        var target = $(obj).attr('data-target');
        var convertRate = '<?php echo json_encode($currencyRate); ?>';
        var curp = $(obj).val();

        if(convertRate != "null") {
            var price = 0.0;
            var o = JSON.parse(convertRate);
            switch(to) {
                case 'USD':
                    price = (1/o.rate)*curp;
                    break;
                case 'ILS':
                    price = (o.rate)*curp;
                    break;
            }
            price = price.toFixed(2);

            $(target).val(price);
        }

    }
    
</script>