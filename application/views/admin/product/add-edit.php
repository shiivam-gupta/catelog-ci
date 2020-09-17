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
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" value="<?= @$request_id ?>" name="request_id">
                <!-- <div class="form-group">
                    <label for="name"><?php echo $this->lang->line('PRODUCT_NAME_LABEL'); ?></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $this->lang->line('PRODUCT_NAME_LABEL'); ?>" value="<?= $prodData['name'] ?>" required>
                    <span class="help-block"><?php echo form_error('name'); ?></span>
                </div> -->

                <div class="form-group">
                    <label for="category"><?php echo $this->lang->line('CATEGORY_LABEL'); ?></label>
                    <select name="category" id="category" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productCategory() as $pck => $pcv) { ?>
                            <option value="<?= $pck ?>" <?php echo ($pck == $prodData['category']) ? 'selected' : ''; ?>><?= $pcv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('category'); ?></span>
                </div>

                <div class="form-group">
                    <label for="ktav"><?php echo $this->lang->line('KTAV_LABEL'); ?></label>
                    <select name="ktav" id="ktav" class="form-control" required="">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productKtav() as $pktk => $pktv) { ?>
                            <option value="<?= $pktk ?>" <?php echo ($pktk == $prodData['ktav']) ? 'selected' : ''; ?>><?= $pktv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('ktav'); ?></span>
                </div>

                <div class="form-group">
                    <label for="product_type"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></label>
                    <select name="product_type" id="product_type" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productType() as $ptk => $ptv) { ?>
                            <option value="<?= $ptk ?>" <?php echo ($ptk == $prodData['product_type']) ? 'selected' : ''; ?>><?= $ptv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('product_type'); ?></span>
                </div>

                <div class="form-group">
                    <label for="ktav_size"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></label>
                    <select name="ktav_size" id="ktav_size" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productKtavSize() as $pktsk => $pktsv) { ?>
                            <option value="<?= $pktsk ?>" <?php echo ($pktsk == $prodData['ktav_size']) ? 'selected' : ''; ?>><?= $pktsv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('ktav_size'); ?></span>
                </div>

                <div class="form-group">
                    <label for="plines"><?php echo $this->lang->line('LINES_LABEL'); ?></label>
                    <select name="plines" id="plines" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productLines() as $plk => $plv) { ?>
                            <option value="<?= $plk ?>" <?php echo ($plk == $prodData['plines']) ? 'selected' : ''; ?>><?= $plv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('plines'); ?></span>
                </div>

                <div class="form-group">
                    <label for="line_size"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></label>
                    <select name="line_size" id="line_size" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (productLineSize() as $plzk => $plzv) { ?>
                            <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['line_size']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('line_size'); ?></span>
                </div>

                <div class="form-group">
                    <label for="priceinshekel"><?php echo $this->lang->line('PRICE_IN_ILS_LABEL'); ?></label>
                    <input data-target="#priceindollar" data-iam="ILS" data-other="USD" data-request="convert-rate" type="text" class="form-control decimalNumber" id="priceinshekel" name="priceinshekel" placeholder="<?php echo $this->lang->line('PRICE_IN_ILS_LABEL'); ?>" value="<?= round($prodData['priceinshekel'],2) ?>" required>
                    <span class="help-block"><?php echo form_error('priceinshekel'); ?></span>
                </div>
        
                <div class="form-group">
                    <label for="priceindollar"><?php echo $this->lang->line('PRICE_IN_DOLLARS_LABEL'); ?></label>
                    <input data-target="#priceinshekel" data-iam="USD" data-other="ILS" data-request="convert-rate"  type="text" class="form-control decimalNumber" id="priceindollar" name="priceindollar" placeholder="<?php echo $this->lang->line('PRICE_IN_DOLLARS_LABEL'); ?>" value="<?= round($prodData['priceindollar'],2) ?>" required>
                    <span class="help-block"><?php echo form_error('priceindollar'); ?></span>
                </div>

                <div class="form-group">
                    <label for="finishDate"><?php echo $this->lang->line('FINISH_DATE_LABEL'); ?></label>
                    <input type="text" class="form-control" autocomplete="off"  id="finishDate" name="finishDate" placeholder="<?php echo $this->lang->line('FINISH_DATE_LABEL'); ?>" value="<?php echo !empty($prodData['finishDate']) ? date('m-d-Y',strtotime($prodData['finishDate'])) : ''; ?>">
                    <span class="help-block"><?php echo form_error('finishDate'); ?></span>
                </div>

               <!--  <div class="form-group">
                    <label><?php echo $this->lang->line('KALF_INCLUDED_LABEL'); ?></label>&nbsp;&nbsp;
                    <?php foreach (_yn() as $ynk => $ynv) { ?>
                            <label>
                                <input type="radio" class="minimal" value="<?= $ynk ?>" name="klaf_included" <?php echo ($ynk == $prodData['klaf_included']) ? 'checked' : ''; ?> required="">
                                    <?= $ynv ?>
                            </label>
                    <?php } ?>
                    <span class="help-block"><?php echo form_error('klaf_included'); ?></span>
                </div> -->

                <!-- <div class="form-group">
                    <label for="tag_included"><?php echo $this->lang->line('TAG_INCLUDED_LABEL'); ?></label><br />
                    <?php foreach (_yn() as $ynk => $ynv) { ?>
                        <label><?= $ynv ?></label>
                        <label>
                            <input type="radio" class="minimal" value="<?= $ynk ?>" name="tag_included" <?php echo ($ynk == $tag_included) ? 'selected' : ''; ?>>
                        </label>    
                    <?php } ?>
                </div> -->
<!-- 
                <div class="form-group">
                    <label><?php echo $this->lang->line('TAG_INCLUDED_LABEL'); ?></label>&nbsp;&nbsp;
                    <?php foreach (_yn() as $ynk => $ynv) { ?> -->
                        <!-- <div class="radio"> -->
                           <!--  <label>
                                <input type="radio" class="minimal" value="<?= $ynk ?>" name="tag_included" <?php echo ($ynk == $prodData['tag_included']) ? 'checked' : ''; ?> required="">
                                    <?= $ynv ?>
                            </label> -->
                        <!-- </div> -->
                 <!--    <?php } ?> -->
                    <span class="help-block"><?php echo form_error('tag_included'); ?></span>
                </div>

                <div class="form-group">
                    <label for="remark"><?php echo $this->lang->line('REMARK_LABEL'); ?></label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="<?php echo $this->lang->line('REMARK_LABEL'); ?>"><?= $prodData['remark'] ?></textarea>
                </div>
                 <span class="imgVal"></span>
                <div class="form-group" id="loadimage">
                    <label><?php echo $this->lang->line('PRODUCT_PHOTO_LABEL'); ?></label><br/>
                    <?php if(count($prodImages) > 0) {
                        foreach ($prodImages as $key => $value) { ?>
                            <?php if($value['type'] == 'image') { ?>
                        <img src="<?= base_url($value['product_img'])?>" class="delImg" style="width:80px;height: 80px;margin:5px;display: inline;" />
                        <span class="btn btn-danger btn-xm imgDelete" data-id="<?php echo $value['id'] ?>" url="<?= base_url('admin/products/image/delete/')?>">X</span><br/>
                    <?php } else if($value['type'] == 'video'){ ?>
                        <video src="<?= base_url($value['product_img'])?>"  class="delImg" width="150px" height="150px" controls autoplay style="display:inline;"></video>
                        <span class="btn btn-danger btn-xm imgDelete" data-id="<?php echo $value['id']?>" url="<?= base_url('admin/products/image/delete/')?>" style="margin-left:14px;margin-top: -142px;">X</span><br/>
                <?php }}
                } else { ?>

                   
                         <input type='file' id="imgInp" class="addMoreImages"name='moreimg[0]' required />
                <?php } ?>
                  
                    <?php if(!empty($prodData['product_photo'])) {?>    
                        <img id="product_photo" height="100" width="100" src="<?php echo base_url($prodData['product_photo']); ?>" alt="<?php echo $this->lang->line('PRODUCT_IMAGE_ALT'); ?>" />
                    <?php } ?>
                <a style="float: right;margin-right: 500px;margin-top: -40px;" href="javascript:void(0);" class="addimage btn btn-warning"><?php echo $this->lang->line('ADD_MORE_IMAGES') ?></a><br>
                </div>
                <hr>
                <div class="form-group col-lg-12" style="background-color:#E1E4E7; height: 30px; font-size: 16px; border-radius: 10px; padding: 6px;">
                    <label for="mezuzot"><?php echo $this->lang->line('INVENTORY_LABEL'); ?></label>
                </div>

                <div class="form-group">
                    <label for="quantity"><?php echo $this->lang->line('QUANTITY_LABEL'); ?></label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="<?php echo $this->lang->line('QUANTITY_LABEL'); ?>" value="<?= $prodData['quantity'] ?>" required>
                    <span class="help-block"><?php echo form_error('quantity'); ?></span>
                </div>

                <hr>
                <div class="form-group col-lg-12" style="background-color:#E1E4E7; height: 30px; font-size: 16px; border-radius: 10px; padding: 6px;">
                    <label for="mezuzot"><?php echo $this->lang->line('PRODUCTION_DAY_LABEL'); ?></label>
                </div>

                <div class="form-group">
                    <label for="mezuzot"><?php echo $this->lang->line('MEZUZOT_LABEL'); ?></label>
                    <select name="mezuzot" id="mezuzot" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (__mezuzot() as $plzk => $plzv) { ?>
                            <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['mezuzot']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('mezuzot'); ?></span>
                </div>

                <div class="form-group">
                    <label for="parshiot"><?php echo $this->lang->line('PARSHIOT_LABEL'); ?></label>
                    <select name="parshiot" id="parshiot" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (__parshiot() as $plzk => $plzv) { ?>
                            <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['parshiot']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('parshiot'); ?></span>
                </div>

                <div class="form-group">
                    <label for="amudim"><?php echo $this->lang->line('AMUDIM_LABEL'); ?></label>
                    <select name="amudim" id="amudim" class="form-control">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (__amudim() as $plzk => $plzv) { ?>
                            <option value="<?= $plzk ?>" <?php echo ($plzk == $prodData['amudim']) ? 'selected' : ''; ?>><?= $plzv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('amudim'); ?></span>
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
    
    //http://data.fixer.io/api/latest?access_key=31265aa40200e26aa44236b0549b3780&format=1&from=GBP&to=JPY&amount=10

    $(document).ready(function(){
        /*$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });*/
        
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

    $(document).on('keyup','[data-request="convert-rate"]', function (event) {
        convertRate($(this));
    });

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