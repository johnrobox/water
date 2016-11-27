

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li <?php echo ($pageTitle == 'Admin - homepage')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminHomepageController/index">Dashboard</a>
              </li>
              <hr>
              <li <?php echo ($pageTitle == 'Admin - view customer')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminCustomerController/viewCustomer">All Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - add customer')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminCustomerController/addField">Add Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - reading')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminReadingController/index">Reading</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - billing')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminBillingController/index">Billing</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - overdue') ? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminOverdueController/index">Overdue</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - report')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminReportController/index">Report</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - request')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminRequestController/index">Customer Request</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - notice')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminNoticeController/index">Notice to Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - add user')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminAdduserController/index">Add Admin</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - view user')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/AdminViewuserController/index">View Admin</a>
              </li>
              
            </ul>
          
        </div><!--/span-->