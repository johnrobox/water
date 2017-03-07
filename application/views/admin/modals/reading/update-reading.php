
<!-- update reading modal -->

<div class="modal fade" id="update_reading_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Update reading amount.
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img id="loading_image_update_customer" style="height: 60px; width:60px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <div class="text-red error_display"></div>
                <div class="form-group">
                    <label for="AmountValue">CU</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'reading_amount_value',
                        'class' => 'form-control'
                    );
                    echo form_input($AmountValue);
                    ?>
                </div>
                <div class="form-group">
                    <label for="AmountValue">Minimum Amount</label>
                    <?php
                    $minimum_field = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'minimum_field_modal',
                        'class' => 'form-control'
                    );
                    echo form_input($minimum_field);
                    ?>
                </div>
                <div class="form-group">
                    <label for="AmountValue">Per Cubic</label>
                    <?php
                    $per_cubic_field = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'per_cubic_field_modal',
                        'class' => 'form-control'
                    );
                    echo form_input($per_cubic_field);
                    ?>
                </div>
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'id' => 'refresh_reading_button',
                    'content' => 'Refresh'
                );
                echo form_button($refresh_button);
                
                $updateSubmit = array(
                    'class' => 'btn btn-primary',
                    'id' => 'update_reading_button',
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
