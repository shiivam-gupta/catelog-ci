<meta charset="utf-8">
<div class="col-md-2 col-sm-4 col-xs-12">
    <span class="label-type">AREA OF OPERATION: <?php echo $area['area_of_operation'] ? $area['area_of_operation'] : 'NIL' ?></span>
</div>
<br>
<div class="col-md-2 col-sm-4 col-xs-12">
<?php $i=1; foreach ($phone as $key => $value) { ?>
    <?php $phoneTemp = $value['description'] ? '  ('.$value['description'].')' : ''; ?>
        <span class="label-type">PHONE<?php echo ' '.$i; ?>: <?php echo $value['details'].$phoneTemp; ?></span><br>
<?php $i++; } ?>
</div>
<br>
<div class="col-md-2 col-sm-4 col-xs-12">
<?php $i=1; foreach ($email as $key => $value) { ?>
    <?php $emailTemp = $value['description'] ? '  ('.$value['description'].')' : ''; ?>
        <span class="label-type">EMAIL<?php echo ' '.$i; ?>: <?php echo $value['details'].$emailTemp; ?></span><br>
<?php $i++; } ?>
</div>
<br>
<div class="col-md-2 col-sm-4 col-xs-12">
    <span class="label-type">
        HSQE PIC: <?php echo $emergency_contact ? $emergency_contact : 'N/A' ?>
    </span>
    <br>
    <span class="label-type">
        OPERATIONS PIC: <?php echo $operation_pic ? $operation_pic : 'N/A' ?>
    </span>
    <br>
    <span class="label-type">
        TECHNICAL PIC: <?php echo $technical_pic ? $technical_pic : 'N/A' ?>
    </span>
    <br>
    <span class="label-type">
        CREWING PIC: <?php echo $crewing_pic ? $crewing_pic : 'N/A' ?>
    </span>
    <br>
    <span class="label-type">
        DPA / CSO: <?php echo $dpa_cso ? $dpa_cso : 'N/A' ?>
    </span>
    <br>
    <span class="label-type">
        SCM PIC: <?php echo $scm_pic ? $scm_pic : 'N/A' ?>
    </span>
    <br>
</div>

