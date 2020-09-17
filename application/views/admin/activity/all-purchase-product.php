<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title pullLeft"><b><?php echo $this->lang->line('PRODUCTS_PAYMENT_LABEL'); ?></b></h1>
                    <div class="box-title pullRight">
                        <div class="search-group" id="addButtonDiv">
                            <a href="<?= base_url('admin/new-payment/add') ?>" id="addbutton">
                            <button type="button" class="btn btn-success"><?= $this->lang->line('NEW_PAYMENT_TITLE'); ?></button></a>
                        </div>
                    </div>
                </div>

                <!--adding filter code End here-->
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="productTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('SUPPLIER_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('OWN_PRICE_DOLLARS_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('OWN_PRICE_ISL_LABEL'); ?></th>
                                <th><?php echo $this->lang->line('CREATED_AT_LABEL'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($productlist as $sl) {  
                                $ownInIsl = ($currencyRate['rate']) * $sl->amount;
                                ?>
                                <tr>
                                    <!-- <td><?= $sl->name; ?></td> -->
                                    <td><?= $sl->fullname ?></td>
                                    <td><?= ($sl->amount)? number_format($sl->amount,2): '' ?></td>
                                    <td><?= number_format($ownInIsl,2)?></td>
                                    <td><?= $sl->created_at?></td>
                                    <!-- <td>
                                        <div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= number_format($sl->priceindollar,2) ?></div></td>
                                    <td><div data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('PRICE_LABEL'); ?>"><?= number_format($sl->priceinshekel,2) ?></div></td>
                                    <td><?= $sl->quantity ?></td> -->
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
            //bStateSave: true,
            processing: true,
            language: {processing: "loading.."},
            columnDefs: [
               { orderable: false, targets: 0 },
               { orderable: false, targets: -1 }
            ],
            order: [[1, 'asc']],
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

        

        /*For Category Filter*/
        // $.fn.dataTable.ext.search.push(
        //     function( settings, data, dataIndex ) {
        //         var age = data[3];
        //         var category = $('#category').val();
        //             return true;
        //     }
        // );

        $('#category').change(function() {
            if (!!this.value) {
                listDataTable.column(3).search(this.value).draw();
            } else {
                listDataTable.column(3).search(this.value).draw();
            }
        });

        $('#ktav').change(function() {
            if (!!this.value) {
                listDataTable.column(4).search(this.value).draw();
            } else {
                listDataTable.column(4).search(this.value).draw();
            }
        });

        $('#product_type').change(function() {
            if (!!this.value) {
                listDataTable.column(5).search(this.value).draw();
            } else {
                listDataTable.column(5).search(this.value).draw();
            };
        });

        $('#ktav_size').change(function() {
            if (!!this.value) {
                listDataTable.column(6).search(this.value).draw();
            } else {
                listDataTable.column(6).search(this.value).draw();
            };
        });

        $('#plines').change(function() {
            if (!!this.value) {
                listDataTable.column(7).search(this.value).draw();
            } else {
                listDataTable.column(7).search(this.value).draw();
            };
        });
        $('#line_size').change(function() {
            if (!!this.value) {
                listDataTable.column(8).search(this.value).draw();
            } else {
                listDataTable.column(8).search(this.value).draw();
            };
        });

        $('#certificate').change(function() {
            if (!!this.value) {
                listDataTable.column(8).search(this.value).draw();
            } else {
                listDataTable.column(8).search(this.value).draw();
            };
        });

        $('#min, #max').keyup( function() {
            listDataTable.draw();
        } );

    });

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var price = parseFloat( data[9] ) || 0;
            
            if ( ( isNaN( min ) && isNaN( max ) ) ||
                 ( isNaN( min ) && price <= max ) ||
                 ( min <= price   && isNaN( max ) ) ||
                 ( min <= price   && price <= max ) )
            {
                return true;
            }
            return false;
        }
    );

    $(document).on('click','.deleteData',function(e){
        e.stopPropagation();
        var titleText = $(this).attr('data-text');
        var newLocation = $(this).attr('data-href');
        preconfirmSwal('question','',titleText,newLocation);
    });

    /*$(function(){
        $('#productTable_length label').after('<a href="'+"<?= base_url('admin/products/add'); ?>"+'" style="margin-left: 10px;">'+
            '<small class="btn bg-green">'+"<?= $this->lang->line('ADD_PRODUCT'); ?>"+'</small>'+
        '</a>');
    });*/

    // $(document).ready(function(){
    //     $("#addButtonDiv").hide();
    // });
    function showAddProduct(id)
    {
        if(id!='') {
           $("#addButtonDiv").show();
            var link = $base_url+'admin/manufacturer-products/add/'+id;
            $("#addbutton").attr("href", link); 
        }else{ $("#addButtonDiv").hide(); }
        
    }
</script>