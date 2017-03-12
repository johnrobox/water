
<!-- update cubic modal -->

<div class="modal fade" id="updateCubicModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-pencil"></i> UPDATE CUBIC AMOUNT
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img id="updateCubicLoadingImage" style="height: 60px; width:60px;" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <div class="text-red" id="udpateCubicErrorDisplay"></div>
                <div class="form-group">
                    <label for="AmountValue">Amount</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'perCubicValue',
                        'class' => 'form-control'
                    );
                    echo form_input($AmountValue);
                    ?>
                </div>
                <?php 
                $updateSubmit = array(
                    'class' => 'btn btn-primary',
                    'id' => 'updatePerCubicButtonModal',
                    'content' => '<i class="glyphicon glyphicon-pencil"></i> Update'
                );
                echo form_button($updateSubmit);
                ?>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
