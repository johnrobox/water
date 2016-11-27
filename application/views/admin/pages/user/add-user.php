        <div class="col-sm-9 col-md-10 main">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Add Admin
          </h1>
          <?php echo $this->session->flashdata('okay'); ?>
          <?php echo form_open(base_url().'index.php/AdminAdduserController/addExec'); ?>
          <div class="form-group">
              <label for="firstname">Firstname</label>
              <span class="text-red"><?php echo form_error('firstname');?></span>
              <input type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname');?>" class="form-control"/>
          </div>
          <div class="form-group">
              <label for="lastname">Lastname</label>
              <span class="text-red"><?php echo form_error('lastname');?></span>
              <input type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname');?>" class="form-control"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <span class="text-red"><?php echo form_error('email');?></span>
              <input type="email" name="email" id="email" value="<?php echo set_value('email');?>" class="form-control"/>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <span class="text-red"><?php echo form_error('password');?></span>
              <input type="password" name="password" id="password" class="form-control"/>
          </div>
          <div class="form-group">
              <label for="repeat_password">Repeat Password</label>
              <span class="text-red"><?php echo form_error('repeat_password');?></span>
              <input type="password" name="repeat_password" id="repeat_password" class="form-control"/>
          </div>
          <div class="form-group">
              <label for="gender">Gender</label>
              <span class="text-red"><?php echo form_error('gender');?></span>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-default">
                    <input type="radio" name="gender" id="gender" value="1"> Male
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="gender" id="gender" value="2"> Female
                  </label>
              </div>
          </div>
          <div class="form-group">
              <label for="birthdate">Birthdate</label>
              <span class="text-red"><?php echo form_error('birthdate');?></span>
              <input type="text" name="birthdate" id="example1" value="<?php echo set_value('birthdate'); ?>" class="form-control"/>
          </div>
          <button class="btn btn-default pull-right" type="reset">Clear</button>
          <button class="btn btn-primary pull-right" type="submit">Add</button>
          <?php echo form_close(); ?>
        </div>
    </div>
</div>