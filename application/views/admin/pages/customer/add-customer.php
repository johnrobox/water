
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><span class="fa fa-pencil"></span> Add Customer </h1>
            <?php echo $this->session->flashdata('okay'); ?>
              <?php echo form_open(base_url().'index.php/AdminCustomerController/addExec'); ?>
              <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label for="firstname">Firstname</label>
                          <span class="text-red"><?php echo form_error('firstname');?></span>
                          <input type="text" name="firstname" id="firstname" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="middlename">Middlename</label>
                          <input type="text" name="middlename" id="middlename" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="lastname">Lastname</label>
                          <span class="text-red"><?php echo form_error('lastname');?></span>
                          <input type="text" name="lastname" id="lastname" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="meterNo">Meter Serial No</label>
                          <span class="text-red"><?php echo form_error('meterNo');?></span>
                          <input type="text" name="meterNo" id="meterNo" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="address">Address</label>
                          <span class="text-red"><?php echo form_error('address');?></span>
                          <input type="text" name="address" id="address" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="contact">Contact No.</label>
                          <span class="text-red"><?php echo form_error('contact');?></span>
                          <input type="text" name="contact" id="contact" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="birthdate">Birthdate</label>
                          <span class="text-red"><?php echo form_error('birthdate');?></span>
                          <input type="text" name="birthdate" id="example1" class="form-control"/>
                      </div>
                      <button class="btn btn-primary" type="submit">Add Customer</button>
                      <button class="btn btn-default" type="reset">Clear Fields</button>
                  </div>
              </div>
              <?php echo form_close();?>
        </div><!--/row-->
    </div>
</div><!--/.container-->
