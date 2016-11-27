
<!-- update reading modal -->

<div class="modal fade" id="UpdateReadingModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Update reading amount.</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'index.php/AdminReadingController/editReading');?>
                <div class="form-group">
                    <label for="AmountValue">Amount</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'text',
                        'name' => 'amountValue',
                        'id' => 'AmountValue',
                        'class' => 'form-control'
                    );
                    echo form_input($AmountValue);
                    
                    $customerId = array(
                        'type' => 'hidden',
                        'name' => 'customerId',
                        'id' => 'CustomerId'
                    );
                    echo form_input($customerId);
                    ?>
                </div>
                <?php 
                $updateSubmit = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'content' => 'Update'
                );
                echo form_button($updateSubmit);
                ?>
                <?php echo form_close();?>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>