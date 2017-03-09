

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
                    <img src="<?php echo base_url().'img/admin/users/' . $account_image?>" style="height: 80px; width: 100px; border: 1px solid black" class="img-circle img-responsive changeProfile"/>
                </div>
                <div class="col-xs-4 text-center" style="padding: 35px 0px 0px 0px;">
                    <?php echo ucwords(strtolower($account[0]->admin_firstname. ' '. $account[0]->admin_lastname )); ?>
                    <br>
                    <span class="glyphicon glyphicon-ok-circle" style="color: green"></span>
                    <small>Online</small>
                </div>
            </div>
                <hr>
                <li <?php echo ($page_number == 1)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/DashboardController/index">
                        <i class="glyphicon glyphicon-dashboard"></i> Dashboard
                    </a>
                </li>
                <li <?php echo ($page_number == 2)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/CustomerController/viewCustomer">
                        <i class="glyphicon glyphicon-th-list"></i> All Customer
                    </a>
                </li>
                <li <?php echo ($page_number == 3)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/CustomerController/addField">
                        <i class="glyphicon glyphicon-plus"></i> Add Customer
                    </a>
                </li>
                <li <?php echo ($page_number == 4)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/ReadingController/index">
                        <i class="glyphicon glyphicon-pencil"></i> Reading
                    </a>
                </li>
                <li <?php echo ($page_number == 5)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/BillingController/index">
                        <i class="glyphicon glyphicon-shopping-cart"></i> Billing
                    </a>
                </li>
                <li <?php echo ($page_number == 6) ? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/OverdueController/index">
                        <i class="glyphicon glyphicon-thumbs-down"></i> Overdue
                    </a>
                </li>
                <li <?php echo ($page_number == 8)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/RequestController/index">
                        <i class="glyphicon glyphicon-envelope"></i> Customer Request
                    </a>
                </li>
                <li <?php echo ($page_number == 9)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/NoticeController/index">
                        <i class="glyphicon glyphicon-paperclip"></i> Notice to Customer
                    </a>
                </li>
                <li <?php echo ($page_number == 10)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/AdminUserController/index">
                        <i class="glyphicon glyphicon-plus"></i> Add Admin
                    </a>
                </li>
                <li <?php echo ($page_number == 11)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/AdminUserController/viewUsers">
                        <i class="glyphicon glyphicon-th-list"></i> View Admin
                    </a>
                </li>
                <li <?php echo ($page_number == 12)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/AccountController/settings">
                        <i class="glyphicon glyphicon-user"></i> Account Settings
                    </a>
                </li>
                <li <?php echo ($page_number == 13)? 'class="active"' : ''?> >
                    <a href="<?php echo base_url();?>index.php/admin/SystemSettingsController/index">
                        <i class="glyphicon glyphicon-cog"></i> System Settings
                    </a>
                </li>
            </ul>
        </div><!--/span-->