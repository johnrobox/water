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
        <style>
            .table td , th {
                text-align: center;   
             }
        </style>
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
                            <th>Reading Month Covered</th>
                            <th>Reading Amount</th>
                            <th>Reading Date</th>
                            <th>Status</th>
                            <th>Paid Amount</th>
                            <th>Paid Date</th>
                        </tr>
                        <?php 
                        if (isset($billing)) {
                            foreach ($billing as $row) {
                               $tr_style = ($row->customer_billing_flag) ? 'green' : 'red';
                        ?>
                        <tr>
                            <td>
                                <?php 
                                $date_cover = $row->customer_reading_month_cover;
                                $cover = explode("-", $date_cover);
                                $monthName = date('F', mktime(0, 0, 0, $cover[0], 10));
                                echo $cover[1] . ', ' . $monthName;
                                ?>
                            </td>
                            <td>
                                <i class="glyphicon glyphicon-ruble"></i>
                                <?php echo $row->customer_reading_amount;?>
                            </td>
                            <td>
                                <?php echo $row->customer_reading_date;?>
                            </td>
                            <td style="background-color: <?php echo $tr_style;?>">
                                <?php echo ($row->customer_billing_flag) ? "Paid" : "Unpaid"?>
                            </td>
                            <td>
                                <?php echo ($row->customer_billing_amount != '0.00') ? $row->customer_billing_amount : '';?>
                            </td>
                            <td>
                                <?php echo ($row->customer_billing_date != '0000-00-00 00:00:00') ? $row->customer_billing_date : "";?>
                            </td>
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