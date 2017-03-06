

<div class="modal fade" id="adminLogoutModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                Are you sure want to logout this time ?
            </div>
            <div class="modal-body">
                <div class="text-center" id="loadingImageLogout">
                    processing request.....
                    <img style="height: 100px; width:100px;" src="<?php echo base_url().'img/admin/loading/admin-loading4.gif';?>" class="center-block">
                </div>
                <div class="text-center" style="color: red" id="logoutConfirmError">Cannot process request! Please refresh the page and try the action again!</div>
            </div>
            <div class="modal-footer">
                <?php
                $cancel_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'content' => 'Cancel'
                );
                echo form_button($cancel_button);
                
                $submit_button = array(
                    'class' => 'btn btn-primary',
                    'content' => 'Continue',
                    'id' => 'confirm'
                );
                echo form_button($submit_button);
                ?>
            </div>
        </div>
    </div>
</div>