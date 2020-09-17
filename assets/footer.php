<footer class="main-footer">
	<div class="pull-right hidden-xs">
	</div>
	<strong>© <?php echo $this->lang->line('FOOTER_MESSAGE_LABEL'); ?> <a href="<?= base_url('/'); ?>"><?= $this->siteTitle; ?></a>.</strong> 

</footer>
<?php 
    $flashMessage = $this->session->flashdata('flash_message');
    $this->session->set_flashdata('flash_message', null);
?>

<?php if(get_language($this->siteLang,'dir') == 'rtl') { ?>
	<style type="text/css">
		table.dataTable thead .sorting_asc {
		  	background: url("http://cdn.datatables.net/1.10.0/images/sort_asc.png") no-repeat center left;
		}
		table.dataTable thead .sorting_desc {
		  	background: url("http://cdn.datatables.net/1.10.0/images/sort_desc.png") no-repeat center left;
		}
		table.dataTable thead .sorting {
		  	background: url("http://cdn.datatables.net/1.10.0/images/sort_both.png") no-repeat center left;
		}

		table.dataTable thead .sorting::after, table.dataTable thead .sorting_asc::after, table.dataTable thead .sorting_desc::after {
		    content: "";
		}
	</style>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function(){
		if(websiteDirection == 'rtl') {
			$('.dataTables_info').addClass('pull-left');
			$('.dataTables_length').addClass('pull-left');
			$('.pullLeft').addClass('pull-right');
			$('.pullRight').addClass('pull-left');
		} else {
			$('.dataTables_length').addClass('pull-left');
			$('.dataTables_filter').addClass('pull-right');
			$('.pullLeft').addClass('pull-left');
			$('.pullRight').addClass('pull-right');
		}
	})
	var flashMessage ='<?php echo json_encode($flashMessage); ?>';
	if(flashMessage != "null") {
		flashMessage = JSON.parse(flashMessage);
		swal(flashMessage);
	}
</script>