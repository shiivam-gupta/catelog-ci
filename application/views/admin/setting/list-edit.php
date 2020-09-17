<?php //pp($settings,false); ?>
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <!-- <div class="box-header with-border"> -->
        <div class="box-header">
           <h3><?php echo $this->pageTitle ?></h3>
            <div class="form_error"><?php //echo _showMessage(); ?></div>
            <?php echo form_open(); ?>
                <div class="form-group"></div>
                <?php 
                // echo "<pre>";
                // print_r($settings);
                // exit;
                foreach ($settings as $sK => $sV) { ?>
                    <div class="form-group col-md-12">
                        <label for="label"><?php echo $this->lang->line($sV['label']); ?></label><br>
                        <?php if( in_array($sV['variable_name'], ['show_product_price','temp_login'])) { ?>
                            <?php foreach (_yn() as $ynk => $ynv) { ?>
                                <label>
                                    &nbsp;&nbsp;
                                    <input type="radio" class="minimal" value="<?= $ynk ?>" name="setting[<?php echo $sK; ?>][value]" <?php echo ($ynk == $sV['value']) ? 'checked' : ''; ?> required="">
                                        <?= $ynv ?>
                                </label>
                            <?php } ?>
                        <?php } else { ?>
                            <input type="number" name="setting[<?php echo $sK; ?>][value]" value="<?php echo $sV['value']; ?>" class="form-control" min="0">
                        <?php } ?>
                        <input type="hidden" name="setting[<?php echo $sK; ?>][label]" value="<?php echo $sV['label']; ?>">
                        <input type="hidden" name="setting[<?php echo $sK; ?>][variable_name]" value="<?php echo $sV['variable_name']; ?>">
                        <span class="help-block"><?php echo form_error('setting['.$sK.'][value]'); ?></span>
                    </div>
                    
                <?php } ?>
                <!-- <div class="form-group">
                    <label for="percent_cost_price"><?php echo $this->lang->line('PERCENT_COST_PRICE'); ?></label>
                    <input type="number" class="form-control"  name="setting[percent_cost_price]" placeholder="<?php echo $this->lang->line('PERCENT_COST_PRICE'); ?>" min="0" value="0">
                    <span class="help-block"><?php echo form_error('percent_cost_price'); ?></span>
                </div> -->
                <div class="formButtons">
                    <button type="submit" class="btn btn-info pullLeft"><?php echo $this->lang->line('APPLY_SETTING');?></button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>

<script type="text/javascript">

    $(document).ready(function() {

    });

</script>