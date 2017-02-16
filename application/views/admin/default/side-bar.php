

<div class="container-fluid">
      
      <div class="row row-offcanvas row-offcanvas-left">
        
         <div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
           
            <ul class="nav nav-sidebar">
            <div style="" class="row">
                <div class="col-xs-6" style="padding: 8px 8px 8px 35px">
                    <?php 
                    if ($account[0]->admin_image == "") {
                        $account_image = "github img.png";
                    } else {
                        $account_image = $account[0]->admin_image;
                    }
                    ?>
                    <img src="<?php echo base_url().'img/admin/users/' . $account_image?>" style="height: 100px; width: 100px; border: 1px solid black" class="img-circle img-responsive changeProfile"/>
                </div>
                <div class="col-xs-4 text-center" style="padding: 35px 0px 0px 0px;">
                    <?php echo ucwords(strtolower($account[0]->admin_firstname. ' '. $account[0]->admin_lastname )); ?>
                    <br>
                    <span class="glyphicon glyphicon-ok-circle" style="color: green"></span>
                    <small>Online</small>
                </div>
            </div>
              <li <?php echo ($page_number == 1)? 'class="active"' : ''?> >
                  <a href="<?php echo base_url();?>index.php/admin/DashboardController/index">Dashboard</a>
              </li>
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