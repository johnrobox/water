
<!-- update cubic modal -->

<div class="modal fade" id="updateMinimumModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Update Minimum Amount
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img id="updateMinimumLoadingImage" style="height: 60px; width:60px;" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <div class="text-red" id="udpateMinimumErrorDisplay"></div>
                <div class="form-group">
                    <label for="AmountValue">Amount</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'minimumValueField',
                        'class' => 'form-control'
                    );
                    echo form_input($AmountValue);
                    ?>
                </div>
                <?php 
                $updateSubmit = array(
                    'class' => 'btn btn-primary',
                    'id' => 'updateMinimumButtonModal',
                    'content' => 'Update'
                );
                echo form_button($updateSubmit);
                ?>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
