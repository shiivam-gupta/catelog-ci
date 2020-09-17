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
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="user_id"><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></label>
                        <select class="form-control" id="user_id" name="user_id" onchange="showAddProduct(this.value,0);">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach($supplierlist as $supp){ ?>
                                <option value="<?= $supp->id ?>"><?= $supp->firstname.' '.$supp->lastname; ?></option>
                            <?php } ?>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_USD'); ?></label>
                        <input type="number" class="form-control"  data-iam="USD" data-other="ILS" data-request="convert-rate" data-target="#paid_price_isl" id="paid_price_usd"  name="product[paid_price]"  placeholder="<?php echo $this->lang->line('PAID_PRICE_USD'); ?>" min="0" value="0">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="priceindollar"><?php echo $this->lang->line('OWN_PRICE_ISL'); ?></label>
                        <input type="number" class="form-control" data-target="#paid_price_usd" data-iam="ILS" data-other="USD" data-request="convert-rate" id="paid_price_isl" placeholder="<?php echo $this->lang->line('PAID_PRICE_ISL'); ?>" min="0" value="0">
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

    $(document).on('keyup','[data-request="convert-rate"]', function (event) {
        convertRate($(this));
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

    $(document).on('click','[data-type="button"]',function(){
        var finalTotal = 0;
        var err = 0;
        var user_id = $('#user_id').val();
        var paid_price_usd = $('#paid_price_usd').val();

        if(user_id == ''){
            $('#user_id').next('.help-block').html(`<?php echo $this->lang->line('SUPPLIER_REQUIRED'); ?>`);
            err = 1;
        } else {
            $('#user_id').next('.help-block').html('');
        }   
        
        if(paid_price_usd == ''){
            $('#paid_price_usd').next('.help-block').html(`<?php echo $this->lang->line('OWN_GREATER_VALID'); ?>`);
            err = 1;
        } else if(paid_price_usd <= 0){
            err = 1;
            $('#paid_price_usd').next('.help-block').html(`<?php echo $this->lang->line('OWN_GREATER_VALID'); ?>`);
        } else if(Number.isInteger(paid_price_usd)) {
            err = 1;
            $('#paid_price_usd').next('.help-block').html(`<?php echo $this->lang->line('OWN_NUMBER_VALID'); ?>`);
        } else {
            $('#paid_price_usd').next('.help-block').html('');
        }   

        if(err == 1){
            swal(`<?php echo $this->lang->line('FIX_ERROR'); ?>`);
        } else {
            $('#buyingSupplier').submit();
        }

    })
    
</script>