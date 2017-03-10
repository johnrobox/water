
<!-- mark as paid modal -->

<div class="modal fade" id="mark_as_paid_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                PAID
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img id="loading_image_billing_customer" style="height: 60px; width:60px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <div class="text-red error_display"></div>
                <div class="form-group">
                    <label for="AmountValue">Amount to Pay</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'number',
                        'name' => 'amountValue',
                        'id' => 'amount_to_pay',
                        'class' => 'form-control amount_to_pay',
                        'disabled' => ''
                    );
                    echo form_input($AmountValue);
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'mark_as_paid_submit_button',
                    'content' => '<i class="glyphicon glyphicon-thumbs-up"></i> Mark As PAID ?'
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
