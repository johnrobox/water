
<!-- mark as unpaid modal -->

<div class="modal fade" id="mark_as_unpaid_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                UNPAID
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img id="loading_image_unpaid_billing_customer" style="height: 60px; width:60px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <div class="text-red error_display"></div>
                Unpaid this billing ?
            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'mark_as_unpaid_submit_button',
                    'content' => '<i class="glyphicon glyphicon-thumbs-up"></i> Mark As UNPAID ?'
                );
                echo form_button($refresh_button);
                
                $updateSubmit = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => '<i class="glyphicon glyphicon-thumbs-down"></i> Cancel'
                );
                echo form_button($updateSubmit);
                ?>
            </div>
        </div>
    </div>
</div>
