<!DOCTYPE html>
<html lang="en">
<head>
  <title>
      <?php echo isset($pageTitle) ? $pageTitle : 'Water'; ?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>fonts/font-awesome-4.4.0/css/font-awesome.min.css">
  <style>
      body {
	background: url('<?php echo base_url();?>img/page/9.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	color:#fff;
  	background-color:#333;
  	font-family: 'Open Sans',Arial,Helvetica,Sans-Serif;
    }
    .panel {
        opacity: 0.8;
    }
  </style>
</head>
<body>
    <div class="row" style="margin-top:100px;">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-7 col-lg-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer Login
                </div>
                <?php echo form_open(base_url().'');?>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Username" aria-describedby="basic-addon1"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary justify">Login</button>
                    <button type="reset" class="btn btn-default">Clear</button>
                </div>
                <div class="panel-footer">
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>
</html>
