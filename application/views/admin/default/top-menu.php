
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
<!--            <a class="navbar-brand" href="#"> </a>-->
<image src="<?php echo base_url();?>img/capai.jpg" style="height: 50px; margin-left: 30px !important" class="pull-left"/>
<a class="navbar-brand" href="#">CAPAI</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?php echo base_url();?>index.php/admin/AccountController/settings">
                    <i class="fa fa-user"></i>
                  <?php echo ucwords(strtolower($this->session->userdata('AdminFirstname').' '.$this->session->userdata('AdminLastname')));;?>  
                </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/admin/AuthController/logoutExec"> Logout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>