
<div class="modal fade" id="deleteNoticeConfirmModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-trash"></i> DELETE
                <img style="height: 30px; width:30px; display: none" src="<?php echo base_url().'img/admin/loading/loading6.gif';?>" class="center-block loading_image">
            </div>
            <div class="modal-body">
                Delete this item ?
            </div>
            <div class="modal-footer">
                <?php 
                $delete_button = array(
                    'class' =>  'btn btn-primary',
                    'content' => '<i class="glyphicon glyphicon-thumbs-up"></i> Okay',
                    'id' => 'deleteButtonModal'
                );
                echo form_button($delete_button);
                
                $cancel_btn = array(
                    'class' => 'btn btn-default',
                    'content' => '<i class="glyphicon glyphicon-thumbs-down"></i> Cancel',
                    'data-dismiss' => 'modal'
                );
                echo form_button($cancel_btn);
                ?>
            </div>
        </div>
    </div>
</div>