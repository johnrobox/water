<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo (isset($page_title)) ? $page_title : "Administrator"; ?></title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/bootstrap-datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url();?>fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
        <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    </head>       
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        <?php echo ucwords(strtolower($customer->customer_firstname. ' ' .  $customer->customer_lastname)); ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Reading Month Covered</td>
                            <td>Reading Amount</td>
                            <td>Reading Date</td>
                            <td>Status</td>
                            <td>Paid Amount</td>
                            <td>Paid Date</td>
                        </tr>
                        <?php 
                        if (isset($billing)) {
                            foreach ($billing as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->customer_reading_month_cover;?></td>
                            <td><?php echo $row->customer_reading_amount;?></td>
                            <td><?php echo $row->customer_reading_date;?></td>
                            <td><?php echo ($row->customer_billing_flag) ? "Paid" : "Unpaid"?></td>
                            <td><?php echo $row->customer_billing_amount;?></td>
                            <td><?php echo $row->customer_billing_date;?></td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
                <div class="panel-footer">Panel Footer</div>
            </div>
        </div>
    </body>
</html>