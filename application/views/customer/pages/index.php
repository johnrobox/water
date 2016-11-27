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
<body>
    <div class="row" style="margin-top:100px;">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-7 col-lg-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Customer Input
                </div>
                <?php echo form_open(base_url().'index.php/CustomerController/index');?>
                <div class="panel-body">
                    <span style="color : red"><?php echo $this->session->flashdata('error'); ?></span>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Meter No.</span>
                            <input type="text" class="form-control" name="meterNo" placeholder="Meter Number" aria-describedby="basic-addon1"/>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary justify">View</button>
                    <button type="reset" class="btn btn-default">Clear</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</body>