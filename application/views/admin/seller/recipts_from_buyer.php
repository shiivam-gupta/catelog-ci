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
               <h3>Recipts From Buyer Form</h3>
            </div>
        </div>
        <!-- form start -->
        <!-- <form role="form" action="<?= base_url('admin/product/submit/'.@$this->uriSegments[4]); ?>" method="POST" enctype="multipart/form-data"> -->
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="recipts" name="type"/>
            <div class="row">
                <div class="col-md-3" >
                    <div class="form-group">
                    	 <label for="priceindollar"><?php echo $this->lang->line('BUYER_LABEL'); ?></label>
                        <select class="form-control" id="user_id" name="user_id" required="">
                                <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                                <?php foreach($supplierlist as $supp){ ?>
                                    <option value="<?= $supp->id ?>" <?php echo ($supp->id == @$user_id) ? 'selected' : ''; ?>><?= $supp->firstname.' '.$supp->lastname; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_USD'); ?></label>
                        <input type="text" class="form-control" data-target="#paid_price_isl" data-iam="USD" data-other="ILS" data-request="convert-rate" id="paid_price_usd" placeholder="<?php echo $this->lang->line('PAID_PRICE_USD'); ?>" min="0" name="paid_price_usd"value="0">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                       <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_ISL'); ?></label>
                        <input type="text" class="form-control"  data-iam="ILS" data-other="USD" data-request="convert-rate" data-target="#paid_price_usd" id="paid_price_isl"  name="paid_price_isl"  placeholder="<?php echo $this->lang->line('PAID_PRICE_ISL'); ?>" min="0" value="0">
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="col-md-3" style="margin-top: 12px;">
                	<div class="box-footer">
		                <input type="submit" value="<?php echo $this->lang->line('SUBMIT_LABEL'); ?>" class="btn btn-primary">
		            </div>
                </div>

            </div>
            
            
          
   
            <!-- /.box-body -->
            
        </form>
    </div>
</section>
<script type="text/javascript">
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