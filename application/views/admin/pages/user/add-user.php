        <div class="col-sm-9 col-md-10 main">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                <i class="glyphicon glyphicon-plus"></i> Add Admin
          </h1>
          <?php echo form_open(base_url().'index.php/admin/AdminUserController/addExec'); ?>
          <div class="form-group">
              <?php 
              echo form_label('Firstname', 'firstname');
              echo form_error('firstname', '<span class="text-red">', '</span>');
              $firstname = array(
                  'type' => 'text',
                  'name' => 'firstname',
                  'id' => 'firstname',
                  'value' => set_value('firstname'),
                  'class' => 'form-control'
              );
              echo form_input($firstname);
              ?>
          </div>
          <div class="form-group">
              <?php
              echo form_label('Lastname', 'lastname');
              echo form_error('lastname', '<span class="text-red">', '</span>');
              $lastname = array(
                  'type' => 'text',
                  'name' => 'lastname',
                  'id' => 'lastname',
                  'value' => set_value('lastname'),
                  'class' => 'form-control'
              );
              echo form_input($lastname);
              ?>
          </div>
          <div class="form-group">
              <?php
              echo form_label('Email', 'email');
              echo form_error('email', '<span class="text-red">', '</span>');
              $email = array(
                  'type' => 'text',
                  'name' => 'email',
                  'id' => 'email',
                  'value' => set_value('email'),
                  'class' => 'form-control'
              );
              echo form_input($email);
              ?>
          </div>
          <div class="form-group">
              <?php
              echo form_label('Password', 'password');
              echo form_error('password', '<span class="text-red">', '</span>');
              $password = array(
                  'type' => 'password',
                  'name' => 'password',
                  'id' => 'password',
                  'class' => 'form-control'
              );
              echo form_input($password);
              ?>
          </div>
          <div class="form-group">
              <?php
              echo form_label('Repeat Password', 'repeat_password');
              echo form_error('repeat_password', '<span class="text-red">', '</span>');
              $repeat_password = array(
                  'type' => 'password',
                  'name' => 'repeat_password',
                  'id' => 'repeat_password',
                  'class' => 'form-control'
              );
              echo form_input($repeat_password);
              ?>
          </div>
          <div class="form-group">
              
              <?php 
              echo form_label('Gender', 'gender');
              echo form_error('gender', '<span class="text-red">', '</span>');
              $gender = array(
                  '' => 'Select Gender',
                  '1' => 'Male',
                  '2' => 'Female'
              );
              echo form_dropdown('gender', $gender, set_value('gender'), array('id' => 'gender', 'class' => 'form-control'));
              ?>
          </div>
          
          <div class="form-group">
              <?php
              echo form_label('Birthdate', 'birthdate');
              echo form_error('birthdate', '<span class="text-red">', '</span>');
              $birthdate = array(
                  'type' => 'text',
                  'name' => 'birthdate',
                  'id' => 'example1',
                  'value' => set_value('birthdate'),
                  'class' => 'form-control'
              );
              echo form_input($birthdate);
              ?>
          </div>
          <?php
          $clear_button = array(
              'class' => 'btn btn-default',
              'type' => 'reset',
              'content' => 'Clear'
          );
          echo form_button($clear_button);
          
          $add_button = array(
              'class' => 'btn btn-primary',
              'type' => 'submit',
              'content' => 'Add'
          );
          echo form_button($add_button);
          ?>
          <?php echo form_close(); ?>
        </div>
    </div>
</div>