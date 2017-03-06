
<html>	
    <head>
        <title>
            <?php echo isset($page_title) ? $page_title : 'Water'; ?>
        </title>
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>css/admin/admin-login.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>js/common-script.js"></script> 
        <script src="<?php echo base_url();?>js/admin-login.js"></script>
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
    </head>
    <body>
        <div class="login-form">
            <div class="head">
                <img src="<?php echo base_url(); ?>img/admin/login/login-header-logo1.png" alt="" style="width: 120px; height: 120px;"/>
            </div>
            <form id="loginForm" style="text-align: center">
                <img src="<?php echo base_url();?>img/admin/loading/admin-loading4.gif" id="loginLoading" style="width: 100px; height: 100px;display: block; margin-top: -70px !important; margin: 0 auto;"/>
                <small style="color: red; display: block; margin-left: auto; margin-right: auto;" id="emailError"></small>
                <li>
                    
                    <?php
                    $username_field = array(
                        'type' => 'text',
                        'class' => 'text',
                        'onfocus' => "this.value = '';",
                        'onblur' => "if (this.value == '') {this.value = 'EMAIL';}",
                        'name' => 'email'
                    );
                    echo form_input($username_field);
                    ?>
                    <a href="#" class=" icon user"></a>
                </li>
                <span style="color: red" id="passwordError"></span>
                <li>
                    <?php 
                    $password_field = array(
                        'type' => 'password',
                        'onfocus' => "this.value = '';",
                        'onblur' => "if (this.value == '') {this.value = 'Password';}",
                        'name' => 'password'
                    );
                    echo form_input($password_field);
                    ?>
                    <a href="#" class=" icon lock"></a>
                </li>
                <div class="p-container">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Remember Me</label>
                    <?php echo form_button(array('type' => 'button', 'id' => 'loginSubmit', 'content' => 'SIGN IN')); ?>
                    <div class="clear"> </div>
                </div>
            </form>
        </div>		
    </body>
</html>