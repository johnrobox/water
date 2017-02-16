
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--            <a class="navbar-brand" href="#"> </a>-->
<!--<image src="<?php echo base_url();?>img/capai.jpg" style="height: 50px; margin-left: 30px !important" class="pull-left"/>-->
        <a class="navbar-brand" href="#">CAPAI</a>
        </div>
        <div class="navbar-collapse collapse">
             <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo ucwords(strtolower($this->session->userdata('AdminFirstname').' '.$this->session->userdata('AdminLastname')));;?>  
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/AccountController/settings"><i class="glyphicon glyphicon-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a class="changeProfile"><i class="glyphicon glyphicon-user"></i> Change Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/admin/AuthController/logoutExec"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
      </div>
</nav>