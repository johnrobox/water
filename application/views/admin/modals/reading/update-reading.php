
<!-- update reading modal -->

<div class="modal fade" id="update_reading_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Update reading amount.</div>
            <div class="modal-body">
                <?php echo form_open(base_url().'index.php/AdminReadingController/editReading');?>
                <div class="form-group">
                    <label for="AmountValue">Amount</label>
                    <?php
                    $AmountValue = array(
                        'type' => 'number',
                        'step' => '0.01',
                        'name' => 'amountValue',
                        'id' => 'AmountValue',
                        'class' => 'form-control reading_amount_value'
                    );
                    echo form_input($AmountValue);
                    ?>
                </div>
                <?php 
                $updateSubmit = array(
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
