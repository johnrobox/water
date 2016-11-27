<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">Request Form</div>
        <div class="panel-body">
            <?php echo $this->session->flashdata('okay'); ?>
            <?php echo $this->session->flashdata('error'); ?>
            <?php echo form_open(base_url().'index.php/HomepageController/requestExec'); ?>
            <div class="form-group">
                <label for="request">Request</label>
                <textarea name="request" id="request" class="form-control" rows="10"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Send</button>
            <button class="btn btn-default" type="reset">Clear</button>
            <?php echo form_close();?>
        </div>
        <div class="panel-footer">
            
        </div>
    </div>
</div>