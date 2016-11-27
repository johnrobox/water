<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Account
        </div>
        <?php echo form_open(base_url().'index.php/HomepageController/editExec');?>
        <div class="panel-body">
            <?php echo $this->session->flashdata('okay'); ?>
            <div class="form-group">
                <label for="contact">Contact No.</label>
                <input type="text" name="contact" id="contact" value="<?php echo $info['contact'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $info['email'];?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="birthdate">Birth date</label>
                <input type="text" name="birthdate" id="birthdate" value="<?php echo $info['birthdate'];?>" class="form-control"/>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary" type="submit">Update</button>
            <button class="btn btn-default" type="reset">Clear</button>
        </div>
        <?php echo form_close();?>
    </div>
</div>

<script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {

        $('#birthdate').datepicker({
            format: "yyyy-mm-dd"
        });  

    });
</script>
