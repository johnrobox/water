
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="">
                    <i class="fa fa-user"></i>
                  <?php echo ucwords(strtolower($this->session->userdata('AdminFirstname').' '.$this->session->userdata('AdminLastname')));;?>  
                </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>index.php/AdminLogoutController"> Logout</a>
            </li>
          </ul>
        </div>
      </div>
</nav>