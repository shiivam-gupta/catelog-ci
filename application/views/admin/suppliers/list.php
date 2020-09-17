<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title col-md-6 pullLeft"><b><?php echo $this->lang->line('USER_LISTING_LABEL'); ?></b></h1>
                    <a href="<?= base_url('admin/supplier/add'); ?>" class="btn bg-green pullRight"><?= $this->lang->line('ADD_USER'); ?></a>
                </div>
                <!-- /.box-header -->
                <!--adding filter code start from here-->
                <form action="<?php echo base_url('admin/supplier/list');?>" method="post">
                    <div class="search-group">
                        <label for="scope"><?php echo $this->lang->line('SCOPE_LABEL'); ?></label>
                        <select class="form-control" id="scope" name="scope">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (userTypes() as $utk => $utv) { ?>
                                <option value="<?= $utk ?>" <?php echo ($utv == @$scope) ? 'selected' : ''; ?>><?= $utv ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="search-group">
                        <label for="certificate"><?php echo $this->lang->line('CERTIFICATE_LABEL'); ?></label>
                        <select class="form-control" id="certificate" name="certificate">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (_yn() as $ynk => $ynv) { ?>
                                <option value="<?= $ynk ?>" <?php echo ($ynk == @$certificate) ? 'selected' : ''; ?>><?= $ynv ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="search-group">
                        <label for="valid"><?php echo $this->lang->line('VALID_LABEL'); ?></label>
                        <select class="form-control" id="valid" name="valid">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (_yn() as $ynk => $ynv) { ?>
                                <option value="<?= $ynk ?>" <?php echo ($ynk == @$valid) ? 'selected' : ''; ?>><?= $ynv ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="search-group" style="width: 120px;">
                        <label for="country"><?php echo $this->lang->line('COUNTRY_LABEL'); ?></label>
                        <select class="form-control" id="country" name="country">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach($countrylist as $clk => $clv) { ?>
                                <option value="<?= $clv->countrycode ?>" <?php echo ($clv->countryname == @$country) ? 'selected' : '' ?>><?= $clv->countryname ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--this is for media query for mobile responsive button-->
                    <span class="example"></span>
                    <div class="search-group">
                        <button type="submit" class="btn btn-info"><?= $this->lang->line('GO_LABEL'); ?></button>
                    </div>
                    <div class="search-group">
                        <a type="button" class="btn btn-info" href="<?php echo base_url('admin/supplier/list');?>"><?= $this->lang->line('RESET_LABEL'); ?></a>
                    </div>
               
                </form>
                <div class="form-group col-lg-12"></div>
                <!--adding filter code end here-->
                <div class="box-body table-responsive">
                    <table id="supplierTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo $this->lang->line('NAME_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('EMAIL_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('PHONE_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('MOBILE_LABEL'); ?></th>
                                <!-- <th><?php echo $this->lang->line('ADDRESS_LABEL'); ?></th> -->
                                <th><?php echo $this->lang->line('CITY_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('COUNTRY_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('CERTIFICATE_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('VALID_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('SCOPE_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('ACTION_LABEL'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($supplierlist as $sl) { ?>
                            <tr>
                                <td>
                                    <div class="pull-left image">
                                        <img src="<?php echo !empty($sl->userimgpath) ? base_url($sl->userimgpath) : base_url('resource/dist/img/avatar04.png'); ?>" class="img-circle" alt="<?= $this->lang->line('USER_IMAGE_ALT'); ?>" style="width:50px; height: 50px">
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/supplier/edit/'.$sl->id); ?>"><?= $sl->firstname.' '.$sl->lastname ?></a> 
                                </td>
                                <td><?= $sl->email ?></td>
                                <td><?= $sl->phone ?></td>
                                <td><?= $sl->mobile ?></td>
                                <!-- <td><?= $sl->address ?></td> -->
                                <td><?= $sl->city ?></td>
                                <td><?= $sl->country ?></td>
                                <td><?= ($sl->certificate)? _yn($sl->certificate):'' ?></td>
                                <td><?= ($sl->valid)? _yn($sl->valid): '' ?></td>
                                <td><?= userTypes($sl->scope) ?></td>
                                <td>
                                <?php if($sl->scope != 'Admin') { ?>
                                    <a class="deleteData" href="javascript:void(0);" data-href="<?php echo base_url('admin/supplier/delete/'.$sl->id); ?>" data-text="<?= $this->lang->line('DELETE_USER_CONFIRMATION'); ?>"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                                <?php if($sl->scope == 'Supplier') { ?>
                                    | 
                                    <a href="<?php echo base_url('admin/products/list/'.$sl->id); ?>"><?php echo $this->lang->line('PRODUCT_PAGE_TITLE'); ?></a>
                                <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody> 

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<script type="text/javascript">
    var listDataTable = '';
    $(document).ready(function() {

        listDataTable = $("#supplierTable").DataTable({
            pageResize: true,
            //bStateSave: true,
            processing: true,
            language: {processing: "loading.."},
            columnDefs: [
               { orderable: false, targets: 0 },
               { orderable: false, targets: -1 },
            ],
            order: [[9, 'asc']],
            "language": {
                "sEmptyTable":     "<?php echo $this->lang->line('EMPTY_TABLE_LABEL'); ?>",
                "sInfo":           "<?php echo $this->lang->line('INFO_LABEL'); ?>",
                "sInfoEmpty":      "<?php echo $this->lang->line('INFO_EMPTY_LABEL'); ?>",
                "sInfoFiltered":   "(<?php echo $this->lang->line('INFO_FILTERED_LABEL'); ?>)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "<?php echo $this->lang->line('LENGTH_MENT_LABEL'); ?>",
                "sLoadingRecords": "<?php echo $this->lang->line('LOADING_RECORDS_LABEL'); ?>",
                "sProcessing":     "<?php echo $this->lang->line('PROCESSING_LABEL'); ?>",
                "sSearch":         "<?php echo $this->lang->line('SEARCH_LABEL'); ?>",
                "sZeroRecords":    "<?php echo $this->lang->line('ZERO_RECORD_LABEL'); ?>",
                "oPaginate": {
                    "sFirst":    "<?php echo $this->lang->line('FIRST_TABLE_LABEL'); ?>",
                    "sLast":     "<?php echo $this->lang->line('LAST_TABLE_LABEL'); ?>",
                    "sNext":     "<?php echo $this->lang->line('NEXT_TABLE_LABEL'); ?>",
                    "sPrevious": "<?php echo $this->lang->line('PREVIOUS_TABLE_LABEL'); ?>"
                },
                "oAria": {
                    "sSortAscending":  "<?php echo $this->lang->line('SORT_ASCENDING_LABEL'); ?>",
                    "sSortDescending": "<?php echo $this->lang->line('SORT_DESCENDING_LABEL'); ?>"
                }
            }
        });

    });

    // $(function(){
    //     $('#supplierTable_length label').after('<a href="'+"<?= base_url('admin/supplier/add'); ?>"+'" style="margin-left: 10px;">'+
    //         '<small class="btn bg-green">'+"<?= $this->lang->line('ADD_USER'); ?>"+'</small>'+
    //     '</a>');
    // });

    $(document).on('click','.deleteData',function(e){
        e.stopPropagation();
        var titleText = $(this).attr('data-text');
        var newLocation = $(this).attr('data-href');
        preconfirmSwal('question','',titleText,newLocation);
    });

</script>