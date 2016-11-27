<!DOCTYPE html>
<html lang="en">
<head>
  <title>
      <?php echo isset($pageTitle) ? $pageTitle : 'Water'; ?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <link href="<?php echo base_url();?>css/bootstrap-datepicker3.css" rel="stylesheet">
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>fonts/font-awesome-4.4.0/css/font-awesome.min.css">
  
</head>

<body>
    
    <?php if ($this->session->has_userdata('id')) { ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Steve Water Project</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
              <li>
                  <a>
                    <?php echo ucwords(strtolower($this->session->userdata('name')));?>
                  </a>
              </li>
            <li class="dropdown">
              <a href="<?php echo base_url().'index.php/HomepageController/logout';?>" >Logout</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <?php } ?>