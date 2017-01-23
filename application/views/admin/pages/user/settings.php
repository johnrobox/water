
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Settings
          </h1>
          <?php echo form_open(base_url().'index.php/admin/AccountController/updateExec'); ?>
          <div class="form-group">
              <?php
              echo form_label('Firstname', 'firstname');
              echo form_error('firstname', '<span class="text-red">', '</span>');
              $firstname = array(
                  'type' => 'text',
                  'name' => 'fistname',
                  'id' => 'firstname',
                  'value' => $account[0]->admin_firstname,
                  'class' => 'form-control'
              );
              echo form_input($firstname);
              ?>
          </div>
          <?php echo form_close(); ?>
      </div><!--/row-->
	</div>
</div><!--/.container-->