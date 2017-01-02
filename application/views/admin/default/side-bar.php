

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li <?php echo ($pageTitle == 'Admin - homepage')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/HomepageController/index">Dashboard</a>
              </li>
              <hr>
              <li <?php echo ($pageTitle == 'Admin - view customer')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/CustomerController/viewCustomer">All Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - add customer')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/CustomerController/addField">Add Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - reading')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/ReadingController/index">Reading</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - billing')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/BillingController/index">Billing</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - overdue') ? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/OverdueController/index">Overdue</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - report')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/ReportController/index">Report</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - request')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/RequestController/index">Customer Request</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - notice')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/NoticeController/index">Notice to Customer</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - add user')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/AdduserController/index">Add Admin</a>
              </li>
              <li <?php echo ($pageTitle == 'Admin - view user')? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/ViewuserController/index">View Admin</a>
              </li>
              
            </ul>
          
        </div><!--/span-->