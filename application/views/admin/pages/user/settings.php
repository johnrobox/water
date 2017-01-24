
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Settings
          </h1>
          <?php 
          echo $this->session->flashdata('error');
          echo $this->session->flashdata('success');
          echo form_open(base_url().'index.php/admin/AccountController/updateExec'); 
          ?>
          <div class="form-group">
              <?php
              echo form_label('Firstname', 'firstname');
              echo form_error('firstname', '<span class="text-red">', '</span>');
              $firstname = array(
                  'type' => 'text',
                  'name' => 'firstname',
                  'id' => 'firstname',
                  'value' => $account[0]->admin_firstname,
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
                  'value' => $account[0]->admin_lastname,
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
                  'value' => $account[0]->admin_email,
                  'class' => 'form-control'
              );
              echo form_input($email);
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
              echo form_dropdown('gender', $gender, $account[0]->admin_gender, array('id' => 'gender', 'class' => 'form-control'));
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
                  'value' => $account[0]->admin_birthdate,
                  'class' => 'form-control'
              );
              echo form_input($birthdate);
              ?>
          </div>
          
          <?php
          $add_button = array(
              'class' => 'btn btn-primary center-block',
              'type' => 'submit',
              'content' => 'Update'
          );
          echo form_button($add_button);
          ?>
          
          <?php echo form_close(); ?>
      </div><!--/row-->
	</div>
</div><!--/.container-->