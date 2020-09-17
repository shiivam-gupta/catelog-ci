<!-- Main content -->
<section class="content">
    <style type="text/css">
        .imgVal {
            color:red;
            font-weight: bold;
        }
        .bold{
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
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="postData" name="postData"/>
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="form-group">
                        <select class="form-control" id="user_id" name="user_id" required="">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach($supplierlist as $supp){ ?>
                                    <option value="<?= $supp->id ?>" <?php echo ($supp->id == @$user_id) ? 'selected' : ''; ?>><?= $supp->firstname.' '.$supp->lastname; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="appnendRecord">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" id="url" value="<?=base_url('admin/get-product-price/')?>">
                             <label for="Product_lable"><?php echo $this->lang->line('OUR_PRODUCT_LABEL'); ?></label>
                            <select class="form-control getProductPrice" name="product[0][productName]" required="">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach ($productlist as $key => $value) {
                                    if($value['sku'] != ''){?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['sku'] ?></option>
                                        <?php }?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="quantity"><?php echo $this->lang->line('QUANTITY_LABEL'); ?></label>
                            <input type="text" class="form-control individual_price quantity" name="product[0][quantity]" placeholder="<?php echo $this->lang->line('QUANTITY_LABEL'); ?>" value="0" required>
                            <span class="text-danger bold quantityError"></span>
                        </div>
                    </div>
                     <div class="col-md-2">
                       <div class="form-group">
                            <label for="sell_price"><?php echo $this->lang->line('SELL_PRICE_USD'); ?></label>
                            <input type="text" class="form-control usd_price" name="product[0][usd_price]" placeholder="<?php echo $this->lang->line('SELL_PRICE'); ?>" value="" min="0" required>
                            <span class="text-danger bold sellPriceError"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <div class="form-group">
                            <label for="sell_price"><?php echo $this->lang->line('SELL_PRICE_ISR'); ?></label>
                            <input type="text" class="form-control  isr_price" name="product[0][isr_price]" placeholder="<?php echo $this->lang->line('SELL_PRICE'); ?>" value="0" min="0" required>
                            <span class="text-danger bold sellPriceError"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cost_price_total"><?php echo $this->lang->line('COST_PRICE_TOTAL_USD'); ?></label>
                            <input type="text" class="form-control cost_price_total usdTotal" name="product[0][total_price_usd]" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL_USD'); ?>" value="0" min="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                     <div class="col-md-2">
                        <div class="form-group">
                            <label for="cost_price_total"><?php echo $this->lang->line('COST_PRICE_TOTAL_ISR'); ?></label>
                            <input type="text" data-other="ISD" data-key="0" data-request="convert-rate data-target="#priceinisr" class="form-control cost_price_total isrTotal"  name="product[0][total_price_isr]" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL_ISR'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" class="btn btn-primary addMoreRow" style="float:right;margin-bottom: 0px;" value="Add More">
            
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6" style="margin-top:14px;">
                    <div class="form-group">
                        <label for="Total Amount Usd"><?php echo $this->lang->line('TOTAL_AMOUNT_USD'); ?></label>
                        <input type="text" data-other="USD" class="form-control" id="totalAmountUsd" name="totalPriceUsd" placeholder="<?php echo $this->lang->line('PAID'); ?>" min="0" readonly>
                        <span class="text-danger bold paidError"></span>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group">
                        <label for="Total Amount Isr"><?php echo $this->lang->line('TOTAL_AMOUNT_ISR'); ?></label>
                        <input type="text" data-other="USD" class="form-control " id="totalAmountIsr" name="totalPriceIsr" placeholder="<?php echo $this->lang->line('PAID'); ?>" min="0" readonly>
                        <span class="text-danger bold paidError"></span>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="priceindollar"><?php echo $this->lang->line('PAID_PRICE_USD'); ?></label>
                        <input type="text" class="form-control" data-target="#paid_price_isl" data-iam="USD" data-other="ILS" data-request="convert-rate" id="paid_price_usd" placeholder="<?php echo $this->lang->line('PAID_PRICE_USD'); ?>" min="0" name="paid_price_usd"value="0">
                        <span class="help-block"></span>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="form-group">
                       <label for="priceindollar"><?php echo $this->lang->line('PAID_PRICE_ISL'); ?></label>
                        <input type="text" class="form-control"  data-iam="ILS" data-other="USD" data-request="convert-rate" data-target="#paid_price_usd" id="paid_price_isl"  name="paid_price_isl"  placeholder="<?php echo $this->lang->line('PAID_PRICE_ISL'); ?>" min="0" value="0">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-3">
                     <div class="form-group">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_USD'); ?></label>
                        <input type="text" class="form-control" name="own_price_usd" id="own_price_usd" placeholder="<?php echo $this->lang->line('OWN_PRICE_USD'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                </div>
                 <div class="col-md-3">
                     <div class="form-group">
                       <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_ISL'); ?></label>
                        <input type="text" class="form-control" id="own_price"  name="own_price_isr" placeholder="<?php echo $this->lang->line('OWN_PRICE_ISL'); ?>" min="0" value="0" readonly>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" value="<?php echo $this->lang->line('SUBMIT_LABEL'); ?>" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
    // for Appned Record
    $(document).ready(function(){
        var count = 0 ;
        $('.addMoreRow').click(function() {
            count++;
            $('.appnendRecord').append(`<div class="row removeData">
                    <div class="col-md-2">
                        <div class="form-group">
                             <label for="quantity"><?php echo $this->lang->line('OUR_PRODUCT_LABEL'); ?></label>
                            <select class="form-control getProductPrice" name="product[`+count+`][productName]">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach ($productlist as $key => $value) {
                                    if($value['sku'] != ''){?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['sku'] ?></option>
                                        <?php }?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="quantity"><?php echo $this->lang->line('QUANTITY_LABEL'); ?></label>
                            <input type="text" class="form-control individual_price quantity" name="product[`+count+`][quantity]" placeholder="<?php echo $this->lang->line('QUANTITY_LABEL'); ?>" value="0" required>
                            <span class="text-danger bold quantityError"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <div class="form-group">
                            <label for="sell_price"><?php echo $this->lang->line('SELL_PRICE_USD'); ?></label>
                            <input type="text" class="form-control  usd_price" name="product[`+count+`][usd_price]" placeholder="<?php echo $this->lang->line('SELL_PRICE'); ?>" value="" min="0" required>
                            <span class="text-danger bold sellPriceError"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <div class="form-group">
                            <label for="sell_price"><?php echo $this->lang->line('SELL_PRICE_ISR'); ?></label>
                            <input type="text" class="form-control  isr_price" name="product[`+count+`][isr_price]" placeholder="<?php echo $this->lang->line('SELL_PRICE'); ?>" value="0" min="0" required>
                            <span class="text-danger bold sellPriceError"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cost_price_total"><?php echo $this->lang->line('COST_PRICE_TOTAL_USD'); ?></label>
                            <input type="text" class="form-control cost_price_total usdTotal"  name="product[`+count+`][total_price_usd]" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL_USD'); ?>" value="0" min="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cost_price_total"><?php echo $this->lang->line('COST_PRICE_TOTAL_ISR'); ?></label>
                            <input type="text" data-other="ISD" data-key="0" data-request="convert-rate data-target="#priceinisr" class="form-control cost_price_total isrTotal"  name="product[`+count+`][total_price_isr]" placeholder="<?php echo $this->lang->line('COST_PRICE_TOTAL_ISR'); ?>" min="0" value="0" readonly>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                         <input type="button" class="btn btn-danger btn-sm removeRow" value="X" style="margin-top: 24px;" />
                        </div>
                    </div>
                </div>`)
        })
        
        $(document).on('click' , '.removeRow' , function(){
            count--;
            $(this).parents('.removeData').remove();
            var finalTotal = 0;
            $('.totalAmountIsr').each(function(index) {
                var getTotal = $(this).val();
                finalTotal =  parseFloat(getTotal) +  parseFloat(finalTotal)
            });

            $('#totalAmountUsd').val(finalTotal);
            convertRateToISL(finalTotal.toFixed(2),'#own_price');
            $('#totalAmountIsr').val(finalTotal);
            convertRateToISL(finalTotal.toFixed(2),'#own_price_usd');
            })


    })
    //for Ajax To get Product Price
    $(document).on('change' , '.getProductPrice' , function() {
        var prodId = $(this).val();
        var url = $('#url').val();
         $.ajax({
                url: url+prodId,
                method: "POST",
                success: response => {
                  var json = JSON.parse(response);
                    if (json.status == "success") {
                        $(this).parent().parent().parent('.row').find('.isr_price').val(json.isr);
                        $(this).parent().parent().parent('.row').find('.usd_price').val(json.usd);
                    }
                }
            })
    })
    // For Validation
    function validation() {
        var valid = true;
        var quantity = $('#quantity').val();
        var sell = $('#sell_price').val();
        var paid = $('#paid').val();
         $('.quantityError').text("");
         $('.sellPriceError').text("");
          $('.paidError').text(" ");

        if(quantity == 0){
            $('.quantityError').text("Quantity should be greater than 0");
            valid = false;
        }
        if(sell == 0) {
              $('.sellPriceError').text("Selling Price should be greater than 0");
            valid = false;
        }
        if(paid == undefined || paid == '') {
            $('.paidError').text("This Field is required");
            valid = false;
        }
        
        return valid;


    }

     /*For Own Amount*/
    $(document).on('keyup' , '.cost_price_total' , function(e){
        
            var totalPrice = $('#total').val();
            var paid = $('#paid').val();
            if(parseFloat(paid) > totalPrice) {
            $('.paidError').text('Paid Value must be less than total amount');
             $('#own').val(0);
            return false;
            }
            else {
                var ownPrice = totalPrice - paid;
                $('#own').val(ownPrice); 
                 $('.paidError').text(' ');
            }
    })
    $(document).on('keyup','.individual_price', function (event) {
        var grandSumIsr = 0 , grandSumUsd = 0;
        var quantity = $(this).val();
        var isrPrice = $(this).parent().parent().parent('.row').find('.isr_price').val();
        var usdPrice = $(this).parent().parent().parent('.row').find('.usd_price').val();
       
        // console.log(quantity)
        $('.paidError').text('');
        if(quantity == 0){
            quantity = 1;
        }     
        var totalIrs = quantity * isrPrice;
        var totalUsd = quantity * usdPrice;
        var x =  $('.isrTotal').val();
            $(this).parent().parent().parent('.row').find('.isrTotal').val(parseFloat(totalIrs));
            $(this).parent().parent().parent('.row').find('.usdTotal').val(parseFloat(totalUsd));
        
        $('.usdTotal').each(function(index) {
            var sumIsr = $(this).val();
            grandSumIsr = parseFloat(grandSumIsr) + parseFloat(sumIsr);
        })
        $('.isrTotal').each(function(index) {
            var sumIsr = $(this).val();
            grandSumUsd = parseFloat(grandSumUsd) + parseFloat(sumIsr);
        })
        $('#totalAmountUsd').val(grandSumIsr)
         $('#totalAmountIsr').val(grandSumUsd)
       
    });

    $(document).on('keyup','[data-request="convert-rate"]', function (event) {
        convertRate($(this));
    });

     $(document).on('keyup','#paid_price_isl',function(){
        var paid_isl = $(this).val() == '' ? 0 : parseFloat($(this).val());
        var final_price = parseFloat($('#totalAmountIsr').val());

        if(paid_isl > final_price){
            $(this).next('.help-block').html(`<?php echo $this->lang->line('MAX_PAID'); ?>`);
            $('[data-type="button"]').attr("disabled", true);
        } else {
            var own_amt = final_price - paid_isl;
            $('#own_price').val(own_amt.toFixed(2));
            convertRateToUsd(own_amt.toFixed(2),'#own_price_usd');
            $('[data-type="button"]').removeAttr("disabled");
            $(this).next('.help-block').html('');
        }
    })

    $(document).on('keyup','#paid_price_usd',function(){
        var paid_usd = $(this).val() == '' ? 0 : parseFloat($(this).val());
        var final_price = parseFloat($('#totalAmountUsd').val());

        if(paid_usd > final_price){
            $(this).next('.help-block').html(`<?php echo $this->lang->line('MAX_PAID'); ?>`);
            $('[data-type="button"]').attr("disabled", true);
        } else {
            var own_amt = final_price - paid_usd;
            $('#own_price_usd').val(own_amt.toFixed(2));
            convertRateToISL(own_amt.toFixed(2),'#own_price');
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
    function convertRateToUsd(pricerate,IdType="") {
        // console.log("Price" +pricerate)
        // console.log("Id" +IdType)
        var convertRate = '<?php echo json_encode($currencyRate); ?>';
        console.log("Convert Rate" + convertRate);
        var curp = pricerate;

        if(convertRate != "null") {
            var price = 0.0;
            var o = JSON.parse(convertRate);
            price = (1/o.rate)*curp;
            price = price.toFixed(2);
            console.log("usd Price" + price);
            $(IdType).val(price);;
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

    
</script>