<!DOCTYPE html>
<html lang="en">
<head>
  <title>
      <?php echo isset($pageTitle) ? $pageTitle : 'Water'; ?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>fonts/font-awesome-4.4.0/css/font-awesome.min.css">
  
</head>
<body>
    <div class="row" style="margin-top:100px;">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Admin
                </div>
                <?php echo form_open(base_url().'index.php/AdminLoginController/loginExec');?>
                <div class="panel-body">
                    <span class="text-red"><?php echo $this->session->flashdata('error');?></span>
                    <div class="form-group">
                        <span class="text-red"><?php echo form_error('email');?></span>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <?php 
                            $email_login = array(
                                'type' => 'text',
                                'name' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'Email',
                                'aria-describedby' => 'basic-addon1'
                            );
                            echo form_input($email_login);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <span class="text-red"><?php echo form_error('password'); ?></span>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <?php 
                            $password_login = array(
                                'type' => 'password',
                                'name' => 'password',
                                'class' => 'form-control',
                                'placeholder' => 'Password',
                                'aria-describedby' => 'basic-addon1'
                            );
                            echo form_input($password_login);
                            ?>
                        </div>
                    </div>
                    <?php
                    $login_button = array(
                        'type' => 'submit',
                        'class' => 'btn btn-primary justify',
                        'content' => 'Login'
                    );
                    echo form_button($login_button);
                    
                    $clear_button = array(
                        'type' => 'reset',
                        'class' => 'btn btn-default',
                        'content' => 'Clear'
                    );
                    echo form_button($clear_button);
                    ?>
                </div>
                <div class="panel-footer">
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>
</html>
