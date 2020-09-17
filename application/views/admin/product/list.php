<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div id="photos-preview">
                        <img src="<?php echo !empty($userData['userimgpath']) ? base_url($userData['userimgpath']) : base_url('resource/dist/img/avatar04.png'); ?>" class="img-circle prod-user-image" alt="<?= $this->lang->line('USER_IMAGE_ALT'); ?>" style="width: 100px; height: 100px;">
                      
                        <div class="search-group pullRight" style="margin-top: 25px;">
                            <a type="button" href="<?= base_url('admin/products/add/'.$userData['id']); ?>" class="btn btn-success" type="button"><?= $this->lang->line('PRODUCT_ADD_PAGE_TITLE'); ?></a>
                        </div>
                    </div>
                    <!-- <h3 class="box-title"><?php echo $this->lang->line('PRODUCTS_LISTING_LABEL'); ?></h3> -->
                </div>
                <!--adding filter code start from here-->
                <form action="" method="post">
                    <!--for supplier-->
                    <!-- <div class="search-group">
                        <label for="user_id"><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></label>
                        <select class="form-control" id="user_id" name="user_id">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach($supplierlist as $supp){ ?>
                                <option value="<?= $supp->id ?>" <?php echo ($supp->id == @$user_id) ? 'selected' : ''; ?>><?= $supp->firstname.' '.$supp->lastname; ?></option>
                            <?php } ?>
                        </select>
                    </div> -->
                    <!--for category-->
                    <div class="search-group">
                        <label for="category"><?php echo $this->lang->line('CATEGORY_LABEL'); ?></label>
                        <select class="form-control" id="category" name="category">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productCategory() as $pck => $pcv) { ?>
                                <option value="<?= $pck ?>" <?php echo ($pck == @$category) ? 'selected' : ''; ?>><?= $pcv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for ktav-->
                    <div class="search-group">
                        <label for="ktav"><?php echo $this->lang->line('KTAV_LABEL'); ?></label>
                        <select class="form-control" id="ktav" name="ktav">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productKtav() as $pktk => $pktv) { ?>
                                <option value="<?= $pktk ?>" <?php echo ($pktk == @$ktav) ? 'selected' : ''; ?>><?= $pktv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for product type-->
                    <div class="search-group">
                        <label for="product_type"><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></label>
                        <select class="form-control" id="product_type" name="product_type">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productType() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$product_type) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for ktav size-->
                    <div class="search-group">
                        <label for="product_type"><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></label>
                        <select class="form-control" id="ktav_size" name="ktav_size">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productKtavSize() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$ktav_size) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for plines-->
                    <div class="search-group">
                        <label for="product_type"><?php echo $this->lang->line('LINES_LABEL'); ?></label>
                        <select class="form-control" id="plines" name="plines">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productLines() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$plines) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for line size-->
                    <div class="search-group">
                        <label for="product_type"><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></label>
                        <select class="form-control" id="line_size" name="line_size">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (productLineSize() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$line_size) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for certificate-->
                    <div class="search-group">
                        <label for="certificate"><?php echo $this->lang->line('CERTIFICATE_LABEL'); ?></label>
                        <select class="form-control" id="certificate" name="certificate">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (_yn() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$certificate) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--for valid-->
                    <div class="search-group">
                        <label for="valid"><?php echo $this->lang->line('VALID_LABEL'); ?></label>
                        <select class="form-control" id="valid" name="valid">
                            <option value=""><?php echo $this->lang->line('DEFAULT_SELECT_OPTION'); ?></option>
                            <?php foreach (_yn() as $ptk => $ptv) { ?>
                                <option value="<?= $ptk ?>" <?php echo ($ptk == @$valid) ? 'selected' : ''; ?>><?= $ptv; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--this is for media query for mobile responsive button-->
                    <span class="example"></span>
                    <div class="search-group" style="margin-top: 25px;">
                        <button type="submit" class="btn btn-info"><?= $this->lang->line('GO_LABEL'); ?></button>
                    </div>
                    <div class="search-group" style="margin-top: 25px;">
                        <a type="button" class="btn btn-info" href="<?php echo base_url('admin/products/list');?>"><?= $this->lang->line('RESET_LABEL'); ?></a>
                    </div>
                    <!-- <div class="search-group" style="margin-top: 25px;">
                        <a type="button" href="<?= base_url('admin/products/add/'.$userData['id']); ?>" class="btn btn-success" type="button"><?= $this->lang->line('PRODUCT_ADD_PAGE_TITLE'); ?></a>
                    </div> -->
                </form>
                <div class="form-group col-lg-12"></div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="productTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th><?php echo $this->lang->line('SKU_LABEL'); ?></th>
                            <!-- <th><?php echo $this->lang->line('NAME_LABEL'); ?></th> -->
                            <th><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('CATEGORY_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('KTAV_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('LINES_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('PRICE_IN_DOLLARS_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('PRICE_IN_ILS_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('QUANTITY_LABEL'); ?></th>
                            <th><?php echo $this->lang->line('ACTION_LABEL'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($productlist as $sl) {  ?>
                                <tr>
                                    <td>
                                        <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('SKU_LABEL'); ?>"><a href="<?php echo base_url('admin/products/edit/'.$userData['id'].'/'.$sl->id); ?>"><?= $sl->sku; ?></a></div></td>
                                    <!-- <td><?= $sl->name; ?></td> -->
                                    <td><?= $sl->fullname ?></td>
                                    <td><?= ($sl->category)? productCategory($sl->category): '' ?></td>
                                    <td><?= ($sl->ktav)? productKtav($sl->ktav) : '' ?></td>
                                    <td><?= ($sl->product_type)? productType($sl->product_type) : '' ?></td>
                                    <td><?= ($sl->ktav_size)? productKtavSize($sl->ktav_size) : '' ?></td>
                                    <td><?= ($sl->plines)? productLines($sl->plines) : '' ?></td>
                                    <td><?= ($sl->line_size)? productLineSize($sl->line_size) : '' ?></td>
                                    <td>
                                        <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= number_format($sl->priceindollar,2) ?>
                                        </div></td>
                                    <td>
                                    <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= number_format($sl->priceinshekel,2) ?></div>
                                    </td>
                                    <td><?= $sl->quantity ?></td>
                                    <td>
                                        <a class="deleteData" href="javascript:void(0);" data-href="<?php echo base_url('admin/products/delete/'.$userData['id'].'/'.$sl->id); ?>" data-text="<?= $this->lang->line('DELETE_PRODUCT_CONFIRMATION'); ?>"><i class="fa fa-trash"></i></a>
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

<script type="text/javascript">

    var listDataTable = '';
    $(document).ready(function() {

        listDataTable = $("#productTable").DataTable({
            pageResize: true,
            bStateSave: false,
            processing: true,
            language: {processing: "loading.."},
            columnDefs: [
               { orderable: false, targets: -1 },
               { orderable: false, targets: 0 },
            ],
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

    $(document).on('click','.deleteData',function(e){
        e.stopPropagation();
        var titleText = $(this).attr('data-text');
        var newLocation = $(this).attr('data-href');
        preconfirmSwal('question','',titleText,newLocation);
    });

</script>