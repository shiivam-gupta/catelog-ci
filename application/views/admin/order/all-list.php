<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h1 class="box-title"><b><?php echo $this->lang->line('ORDER_LISTING_LABEL'); ?></b></h1>
                </div>
                <!-- /.box-header -->
                <div class="table-responsive">
                    <table id="orderTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
								<th><?php echo $this->lang->line('ORDER_NUMBER'); ?></th>   
								<th><?php echo $this->lang->line('BUYER_LABEL'); ?></th>
								<th><?php echo $this->lang->line('REMARK_LABEL'); ?></th>
								<th><?php echo $this->lang->line('STATUS_LABEL'); ?></th>
								<th><?php echo $this->lang->line('ORDER_DATE_LABEL'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orderlist as $odr) { ?>
                                <tr>
                                    <td>
										<a href="<?= base_url('admin/order/view/').$odr->id; ?>"> <?= ___idFormatGenerator('','5',$odr->id); ?></a>
                                    </td>
                                    <td><?= $odr->fullname; ?></td>
                                    <td><?= $odr->remark; ?></td>
                                    <td style="background-color: <?= orderStatus($odr->status)['color']; ?>"><?= orderStatus($odr->status)['title']; ?></td>
                                    <td><?= date('d-m-Y',strtotime($odr->orderDate)); ?></td>                                    
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
        listDataTable = $("#orderTable").DataTable({
            pageResize: true,
            bStateSave: false,
            processing: true,
            language: {processing: "loading.."},
            columnDefs: [
               { orderable: false, targets: -1 }
            ],
            order: [[0, 'desc']],
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