<section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="box box-primary">
        <div class="box-header with-border">
           
            <div id="photos-preview">
                <img src="<?php echo !empty($userData['userimgpath']) ? base_url($userData['userimgpath']) : base_url('resource/dist/img/avatar04.png'); ?>" alt="<?php echo $this->lang->line('USER_IMAGE_ALT'); ?>" class="img-circle prod-user-image" style="width: 100px; height: 100px;">
            

                <?php if(!empty($userData['certificatephotopath'])) {?>
                    <img src="<?php echo !empty($userData['certificatephotopath']) ? base_url($userData['certificatephotopath']) : base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg'); ?>" alt="<?= $this->lang->line('CERTIFICATE_IMAGE_ALT'); ?>" class="img-circle prod-user-image" style="width: 100px; height: 100px;">
                <?php } ?>
                <?php if(!empty($userData['id'])) { ?>
                    <?php if($productlist > 0) { ?>
                    <a class="btn btn-primary pullRight" href="<?php echo base_url('admin/products/list/'.$userData['id']); ?>"><?php echo $this->lang->line('PRODUCT_PAGE_TITLE'); ?></a>
                <?php } } ?>
            </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <!-- <form role="form" action="<?= base_url('admin/supplier/submit/'.@$this->uriSegments[4]); ?>" method="POST" enctype="multipart/form-data"> -->
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label for="firstname"><?php echo $this->lang->line('FIRST_NAME_LABEL'); ?></label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?php echo $this->lang->line('FIRST_NAME_LABEL'); ?>" value="<?= $userData['firstname'] ?>">
                    <span class="help-block"><?php echo form_error('firstname'); ?></span>
                </div>
                <div class="form-group">
                    <label for="lastname"><?php echo $this->lang->line('LAST_NAME_LABEL'); ?></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php echo $this->lang->line('LAST_NAME_LABEL'); ?>" value="<?= $userData['lastname'] ?>">
                    <span class="help-block"><?php echo form_error('lastname'); ?></span>
                </div>
                <div class="form-group">
                    <label for="email"><?php echo $this->lang->line('EMAIL_LABEL'); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder='<?php echo $this->lang->line('EMAIL_LABEL'); ?>' value="<?= $userData['email'] ?>" autocomplete="off">
                    <span class="help-block"><?php echo form_error('email'); ?></span>
                </div>
                <div class="form-group nonSupplierBlock">
                    <label for="password"><?php echo $this->lang->line('PASSWORD_LABEL'); ?></label>
                    <input type="password" pattern=".{6}|.{6,15}" class="form-control" id="password" name="password" placeholder="<?php echo $this->lang->line('PASSWORD_LABEL'); ?>" autocomplete="off" title="Either 6 OR (6 to 15 chars)">
                    <span class="help-block"><?php echo form_error('password'); ?></span>
                </div>
                <div class="form-group">
                    <label for="phone"><?php echo $this->lang->line('PHONE_LABEL'); ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $this->lang->line('PHONE_LABEL'); ?>" value="<?= $userData['phone'] ?>">
                    <span class="help-block"><?php echo form_error('phone'); ?></span>
                </div>
                <div class="form-group">
                    <label for="mobile"><?php echo $this->lang->line('MOBILE_LABEL'); ?></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $this->lang->line('MOBILE_LABEL'); ?>" value="<?= $userData['mobile'] ?>">
                    <span class="help-block"><?php echo form_error('mobile'); ?></span>
                </div>
                <div class="form-group">
                    <label for="address"><?php echo $this->lang->line('ADDRESS_LABEL'); ?></label>
                    <input type="text" class="form-control" id="address" name="address" rows="3" placeholder="<?php echo $this->lang->line('ADDRESS_LABEL'); ?>" value="<?= $userData['address'] ?>" />
                </div>
                <div class="form-group">
                    <label for="city"><?php echo $this->lang->line('CITY_LABEL'); ?></label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $userData['city'] ?>" placeholder="<?php echo $this->lang->line('CITY_LABEL'); ?>">
                </div>
                <div class="form-group">
                    <label for="country"><?php echo $this->lang->line('COUNTRY_LABEL'); ?></label>
                    <select class="form-control" id="country" name="country">
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach($countrylist as $row) { ?>
                            <option value="<?= $row->countryname ?>" <?php echo ($row->countryname == $userData['country']) ? 'selected' : '' ?>><?= $row->countryname ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="country"><?php echo $this->lang->line('SCOPE_LABEL'); ?></label>
                    <select class="form-control" id="scope" name="scope" required>
                        <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                        <?php foreach (userTypes() as $utk => $utv) { ?>
                            <option value="<?= $utk ?>" <?php echo ($utk == $userData['scope']) ? 'selected' : ''; ?>><?= $utv ?></option>
                        <?php } ?>
                    </select>
                    <span class="help-block"><?php echo form_error('scope'); ?></span>
                </div>
                <div class="form-group">
                    <label for="remark"><?php echo $this->lang->line('REMARK_LABEL'); ?></label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="<?php echo $this->lang->line('REMARK_LABEL'); ?>"><?= $userData['remark'] ?></textarea>
                </div>
                <div class="form-group supplierOnlyBlock">
                    <label><?php echo $this->lang->line('CERTIFICATE_LABEL'); ?></label>&nbsp;&nbsp;
                    <!-- <div class="radio"> -->
                        <label>
                            <input type="radio" name="certificate" value="Yes" <?php echo ($userData['certificate'] == 'Yes') ? 'checked' : ''; ?>>
                            <?php echo $this->lang->line('YES_LABEL'); ?>
                        </label>
                    <!-- </div> -->
                    <!-- <div class="radio"> -->
                        <label>
                            <input type="radio" name="certificate" value="No"  <?php echo ($userData['certificate'] == 'No') ? 'checked' : ''; ?>>
                            <?php echo $this->lang->line('NO_LABEL'); ?>
                        </label>
                    <!-- </div> -->
                </div>
                
                <div class="form-group supplierOnlyBlock">
                    <label><?php echo $this->lang->line('VALID_LABEL'); ?></label>&nbsp;&nbsp;

                    <!-- <div class="radio"> -->
                        <label>
                            <input type="radio" name="valid" value="Yes" <?php echo ($userData['valid'] == 'Yes') ? 'checked' : ''; ?>>
                            <?php echo $this->lang->line('YES_LABEL'); ?>
                        </label>
                    <!-- </div> -->
                    <!-- <div class="radio"> -->
                        <label>
                            <input type="radio" name="valid" value="No" <?php echo ($userData['valid'] == 'No') ? 'checked' : ''; ?>>
                            <?php echo $this->lang->line('NO_LABEL'); ?>
                        </label>
                    <!-- </div> -->
                </div>
                
                <div class="form-group">
                    <label><?php echo $this->lang->line('USER_PHOTO_LABEL'); ?></label>
                    <input type="file" name="userimgpath">
                    <?php if(!empty($userData['userimgpath'])) {?>
                        <img id="userimgpath" height="100" width="100" src="<?php echo base_url($userData['userimgpath']); ?>" alt="<?php echo $this->lang->line('USER_IMAGE_ALT'); ?>" />
                    <?php } ?>
                    <span class="help-block"></span>
                </div>
                <div class="form-group supplierOnlyBlock">
                    <label><?php echo $this->lang->line('CERTIFICATE_PHOTO_LABEL'); ?></label>
                    <input type="file" name="certificatephotopath">
                    <?php if(!empty($userData['certificatephotopath'])) {?>
                        <img id="certificatephotopath" height="100" width="100" src="<?php echo base_url($userData['certificatephotopath']); ?>" alt="<?= $this->lang->line('CERTIFICATE_IMAGE_ALT'); ?>" />
                    <?php } ?>
                    <span class="help-block"></span>
                </div>
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer">
                <input type="submit" value="<?php echo $this->lang->line('SUBMIT_LABEL'); ?>" class="btn btn-primary pull-left">
               <a class="btn btn-primary pull-right" href="<?php echo base_url('admin/products/list/'.$userData['id']); ?>"><?php echo $this->lang->line('PRODUCT_PAGE_TITLE'); ?></a>
            </div> -->
            <div class="box-footer">
                <input type="submit" value="<?php echo $this->lang->line('SUBMIT_LABEL'); ?>" class="btn btn-primary">
            </div>
        </form>
    </div>
</section>
<!-- /.content -->

<script type="text/javascript">
    $(document).ready(function(){
        manageScope("<?= $userData['scope'] ?>");
    })

    $(document).on('change','#scope',function(e){
        manageScope($(this).val());
    });

    function manageScope(val) {
        if(val == 'Supplier'){
            $('.supplierOnlyBlock').show();
            $('.nonSupplierBlock').hide();
        } else {
            $('.supplierOnlyBlock').hide();
            $('.nonSupplierBlock').show();
        }
    }

</script>