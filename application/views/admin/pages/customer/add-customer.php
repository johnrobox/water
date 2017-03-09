
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><i class="glyphicon glyphicon-plus"></i> Add Customer </h1>
            <?php echo $this->session->flashdata("success"); ?>
            <?php echo $this->session->flashdata("error"); ?>
            <?php 
                echo $this->session->flashdata('okay'); 
                echo form_open(base_url().'index.php/admin/CustomerController/addExec'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Firstname', 'firstname');
                            echo form_error('firstname', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'firstname',
                                'id' => 'firstname',
                                'class' => 'form-control',
                                'value' => set_value('firstname')
                            ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Middlename', 'middlename');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'middlename',
                                'id' => 'middlename',
                                'class' => 'form-control',
                                'value' => set_value('middlename')
                            ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Lastname', 'lastname');
                            echo form_error('lastname', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'lastname',
                                'id' => 'lastname',
                                'class' => 'form-control',
                                'value' => set_value('lastname')
                            ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Meter Serial No', 'meterNo');
                            echo form_error('meterNo', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'meterNo',
                                'id' => 'meterNo',
                                'class' => 'form-control',
                                'value' => set_value('meterNo')
                            )); 
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Address', 'address');
                            echo form_error('address', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'address',
                                'id' => 'address',
                                'class' => 'form-control',
                                'value' => set_value('address')
                            ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Contact No.', 'contact');
                            echo form_error('contact', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'contact',
                                'id' => 'contact',
                                'class' => 'form-control',
                                'value' => set_value('contact')
                            ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Birthdate', 'birthdate');
                            echo form_error('birthdate', '<span class="text-red">', '</span>');
                            echo form_input(array(
                                'type' => 'text',
                                'name' => 'birthdate',
                                'id' => 'example1',
                                'class' => 'form-control',
                                'value' => set_value('birthdate')
                            ));
                            ?>
                        </div>
                        <?php
                        echo form_button(array(
                            'class' => 'btn btn-primary',
                            'type' => 'submit',
                            'content' => 'Add Customer'
                        ));
                        
                        echo form_button(array(
                            'class' => 'btn btn-default',
                            'type' => 'reset',
                            'content' => 'Clear Fields'
                        ));
                        ?>
                  </div>
              </div>
              <?php echo form_close();?>
        </div><!--/row-->
    </div>
</div><!--/.container-->
