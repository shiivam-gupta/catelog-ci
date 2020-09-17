<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <br><br>  
                <!-- /.box-body -->
                <div class="checkout-right">
                    <div class="table-responsive">
                        <?php foreach($orderviewlist as $odmk => $odmv){ ?>
                        <div class="card mb-3">
                            <div class="form-group col-lg-12">
                                <div class="col-lg-6">
                                <h3 class="card-header" style="float: left;"><?= ___idFormatGenerator($this->lang->line('ORDER_NUMBER'),'5',$odmk); ?>
                                </h3>
                                </div>
                                <div class="col-lg-6">
                                    <form action="<?php echo base_url('admin/change/status'); ?>" method="post" id="statusForm">
                                        <div class="card-header" style="float: right;">
                                            <input type="hidden" name="id" value="<?= $odmk; ?>">
                                            <select style="color: <?= orderStatus($status)['color']; ?>" name="status" class="form-control" onchange="document.getElementById('statusForm').submit();">
                                                <?php foreach(orderStatus() as $key => $sta) { ?>
                                                <option style="color: <?= orderStatus($key)['color']; ?>" value="<?= $key; ?>" <?php if($key === $status){ echo "selected"; } ?>><?= orderStatus($key)['title']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                
                            <div class="form-group">
                               <table id="orderTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            <th><?php echo $this->lang->line('PRODUCT_IMAGE_ALT'); ?></th>   
                                            <th><?php echo $this->lang->line('SKU_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('CATEGORY_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('KTAV_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('PRODUCT_TYPE_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('KTAV_SIZE_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('LINES_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('LINE_SIZE_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('QUANTITY_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('PRICE_LABEL'); ?></th>
                                            <th><?php echo $this->lang->line('TOTAL_AMOUNT_LABEL'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            $totalPrice=0;
                                            foreach($odmv as $odik => $data) { $savedProductData = json_decode($data['productData']); ?>

                                                <tr>
                                                    <td>
                                                        <div class="image-container">
                                                            <img class="" src="<?php echo !empty($data['product_photo']) ? base_url($data['product_photo']) : base_url('cosmetics/images/PRODUCTJPG-1547109737.jpg'); ?>" id="productImg" style="width: 100px; height: 100px;">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('SKU_LABEL'); ?>">
                                                            <?php echo $data['sku']; ?></div></td>
                                                    <td><?php echo $data['fullname']; ?></td>

                                                    <td><?= ($data['category'])? productCategory($data['category']): '' ?></td>
                                                    <td><?= ($data['ktav'])? productKtav($data['ktav']) : '' ?></td>
                                                    <td><?= ($data['product_type'])? productType($data['product_type']) : '' ?></td>
                                                    <td><?= ($data['ktav_size'])? productKtavSize($data['ktav_size']) : '' ?></td>
                                                    <td><?= ($data['plines'])? productLines($data['plines']) : '' ?></td>
                                                    <td><?= ($data['line_size'])? productLineSize($data['line_size']) : '' ?></td>


                                                    <td><?php echo " <strong>".$data['quantity']."</strong>";?></td>
                                                    <td>
                                                        <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
                                                    <?php echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format(@$savedProductData->{get_language($this->siteLang,'currencyColumn')},2)."</strong>";?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div data-toggle="tooltip" data-placement="left" title="<?= $this->lang->line('PRICE_LABEL'); ?>">
                                                        <?php echo get_language($this->siteLang,'currencySymbol')."<strong>".number_format((@$savedProductData->{get_language($this->siteLang,'currencyColumn')}*$data['quantity']),2)."</strong>";?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $totalPrice +=(($savedProductData->{get_language($this->siteLang,'currencyColumn')}*$data['quantity'])); } ?>
                                        </tbody> 
                                        </tfoot>
                                </table>
                          
                          <div class="card-body">
                            <br><br>
                            <h4>
                                <span class="card-text pullLeft" style="float:left;">
                                <?php echo $this->lang->line('ORDERED_ON_LABEL');?>: <?php echo "<strong>".date('d-m-Y',strtotime($data['orderDate']))."</strong>"; ?></span>
                            </h4>
                            <h4>
								<!-- <span class="card-text pullRight" style="float:right;" data-toggle="tooltip" data-placement="left"  title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?php echo $this->lang->line('ORDERS_TOTAL_LABEL').get_language($this->siteLang,'currencySymbol')."<strong>".number_format(convertCurrency(get_language($this->siteLang,'currency'),$totalPrice),2)."</strong>"; ?></span> -->
								<span class="card-text pullRight" style="float:right;" data-toggle="tooltip" data-placement="left"  title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?php echo $this->lang->line('ORDERS_TOTAL_LABEL').get_language($this->siteLang,'currencySymbol')."<strong>".number_format($totalPrice,2)."</strong>"; ?></span>
                             </h4>
                          </div>
                     
                        <?php } ?>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</section>


<!-- /.box-header -->
<!-- <div class="box-body">
    <table id="orderTable" class="table table-bordered table-hover">
        <thead>
            <tr>
            <th><?php echo $this->lang->line('ORDER_NUMBER'); ?></th>   
            <th><?php echo $this->lang->line('BUYER_LABEL'); ?></th>
            <th><?php echo $this->lang->line('REMARK_LABEL'); ?></th>
            <th><?php echo $this->lang->line('STATUS_LABEL'); ?></th>
            <th><?php echo $this->lang->line('ORDER_DATE_LABEL'); ?></th>
            <th><?php echo $this->lang->line('ACTION_LABEL'); ?></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody> 
        </tfoot>
    </table>
</div> -->
<!-- /.box-body -->

<script type="text/javascript">

    var listDataTable = '';
    $(document).ready(function() {
        listDataTable = $("#orderTable").DataTable({
            pageResize: true,
            bStateSave: true,
            processing: true,
            language: {processing: "loading.."},
            columnDefs: [
               { orderable: false, targets: -1 }
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
