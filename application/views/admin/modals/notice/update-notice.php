
<div class="modal fade" id="updateNoticeModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-pencil"></i> UPDATE NOTICE
                <img style="height: 30px; width:30px; display: none" src="<?php echo base_url().'img/admin/loading/loading6.gif';?>" class="center-block loading_image">
            </div>
            <div class="modal-body">
                <div class="errorContainerModal text-red"></div>
                <div class="form-group">
                    <?php 
                    echo form_label('Note', 'note'); 
                    echo form_textarea(array(
                        'class' => 'form-control note_field',
                        'id' => 'note',
                        'name' => 'note'
                    ));
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'content' => '<i class="glyphicon glyphicon-refresh"></i> Refresh',
                    'id' => 'refreshButton'
                );
                echo form_button($refresh_button);
                
                $delete_button = array(
                    'class' =>  'btn btn-primary',
                    'content' => '<i class="glyphicon glyphicon-pencil"></i> Update',
                    'id' => 'updateButtonModal'
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