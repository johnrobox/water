
<div class="modal fade" id="customerChangeStatus" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<i class="pull-right fa fa-times" data-dismiss="modal"></i>
			</div>
			<div class="modal-body">
				<div id="statusMessageText"></div>
				<img id="statusCustomerLoadingImage" style="height: 60px; width:60px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-primary" id="statusCustomerSubBtn">Ok</button>
			</div>
		</div>
	</div>
</div>