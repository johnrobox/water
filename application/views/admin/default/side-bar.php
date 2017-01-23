

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
              <li <?php echo ($page_number == 1)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/DashboardController/index">Dashboard</a>
              </li>
              <hr>
              <li <?php echo ($page_number == 2)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/CustomerController/viewCustomer">All Customer</a>
              </li>
              <li <?php echo ($page_number == 3)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/CustomerController/addField">Add Customer</a>
              </li>
              <li <?php echo ($page_number == 4)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/ReadingController/index">Reading</a>
              </li>
              <li <?php echo ($page_number == 5)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/BillingController/index">Billing</a>
              </li>
              <li <?php echo ($page_number == 6) ? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/OverdueController/index">Overdue</a>
              </li>
              <li <?php echo ($page_number == 7)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/ReportController/index">Report</a>
              </li>
              <li <?php echo ($page_number == 8)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/RequestController/index">Customer Request</a>
              </li>
              <li <?php echo ($page_number == 9)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/NoticeController/index">Notice to Customer</a>
              </li>
              <li <?php echo ($page_number == 10)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/AdminUserController/index">Add Admin</a>
              </li>
              <li <?php echo ($page_number == 11)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/AdminUserController/viewUsers">View Admin</a>
              </li>
              <li <?php echo ($page_number == 12)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/AccountController/settings">Account Settings</a>
              </li>
              
            </ul>
          
        </div><!--/span-->