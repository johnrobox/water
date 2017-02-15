
<div class="modal fade" id="addNoticeModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-pencil"></i> ADD NOTICE
                <img style="height: 30px; width:30px; display: none" src="<?php echo base_url().'img/admin/loading/loading6.gif';?>" class="center-block loading_image">
            </div>
            <div class="modal-body">
                <div class="errorContainerModal text-red"></div>
                <div class="form-group">
                    <?php 
                    echo form_label('Note', 'note'); 
                    echo form_textarea(array(
                        'class' => 'form-control',
                        'id' => 'note',
                        'name' => 'note'
                    ));
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php 
                $delete_button = array(
                    'class' =>  'btn btn-primary',
                    'content' => 'Okay',
                    'id' => 'addButtonModal'
                );
                echo form_button($delete_button);
                
                $cancel_btn = array(
                    'class' => 'btn btn-default',
                    'content' => 'Cancel',
                    'data-dismiss' => 'modal'
                );
                echo form_button($cancel_btn);
                ?>
            </div>
        </div>
    </div>
</div>