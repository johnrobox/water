       
        <?php if ($this->session->has_userdata('id')) { ?>
                <div class="col-sm-4">
                    <div class="list-group">
                      <a href="#" class="list-group-item <?php echo ($pageTitle == 'Homepage') ? 'active' :'';?>">Home</a>
                      <a href="<?php echo base_url().'index.php/CustomerController/paymentInfo';?>" class="list-group-item <?php echo ($pageTitle=='Payment Info') ? 'active' : '';?>">Billing and Payment</a> 
                      <a href="<?php echo base_url().'index.php/CustomerController/notice';?>" class="list-group-item <?php echo ($pageTitle == 'Notice') ? 'active' :'';?>">Notice</a>
                      <a href="<?php echo base_url().'index.php/CustomerController/request';?>" class="list-group-item <?php echo ($pageTitle == 'Request') ? 'active' :'';?>" >Send Request / Complaining</a>
                      <a href="<?php echo base_url().'index.php/CustomerController/readingStatistic';?>" class="list-group-item <?php echo ($pageTitle == 'Reading Statistics') ? 'active' : '';?>">Reading Statistic</a>
                      <a href="<?php echo base_url().'index.php/CustomerController/edit';?>" class="list-group-item <?php echo ($pageTitle == 'My Information') ? 'active' : '';?>">Edit My Information</a>
                      <a href="<?php echo base_url().'index.php/CustomerController/logout';?>" class="list-group-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
       <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
       <script src="<?php echo base_url();?>js/bootbox.min.js"></script>
       <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
		


    </body>
</html>