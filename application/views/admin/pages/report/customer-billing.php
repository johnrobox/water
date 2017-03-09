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
        <style>
            .table td , th {
                text-align: center;   
             }
        </style>
        <div class="container">
            <button onclick="printReport()" class="btn btn-primary btn-xs pull-right">Print Report</button>
            <table class="table table-bordered">
                <tr>
                    <td>ACT NAME : <?php echo $customer->customer_firstname." ".$customer->customer_lastname; ?></td>
                </tr>
                <tr style="background: #ccc">
                    <td><b class="pull-left">Name : </b> <?php echo $customer->customer_firstname.' '.$customer->customer_lastname;?></td>
                </tr>
                <tr style="background: #ccc">
                    <td><b class="pull-left">Meter No : </b> <?php echo $customer->customer_meter_no;?></td>
                </tr>
                <tr style="background: #ccc">
                    <td><b class="pull-left">Contact No : </b> <?php echo $customer->customer_contact;?></td>
                </tr>
                <tr style="background: #ccc">
                    <td><b class="pull-left">Address : </b> <?php echo $customer->customer_address;?></td>
                </tr>
                <tr style="background: black"><td></td></tr>
                <tr style="background: #ccc">
                    <th style="color: green">Reading Month Covered</th>
                    <th style="color: green">Cubic Used</th>
                    <th style="color: green">Per Cubic</th>
                    <th style="color: green">Minimum Amount</th>
                    <th style="color: green">Reading Amount</th>
                    <th style="color: green">Reading Date</th>
                    <th style="color: green">Status</th>
                    <th style="color: green">Paid Amount</th>
                    <th style="color: green">Paid Date</th>
                </tr>
                <?php 
                        if (isset($billing)) {
                            foreach ($billing as $row) {
                        ?>
                        <tr style="background : <?php echo ($row->customer_billing_flag != 0)? "#eee" : ""; ?>">
                            <td>
                                <?php 
                                $date_cover = $row->customer_reading_month_cover;
                                $cover = explode("-", $date_cover);
                                $monthName = date('F', mktime(0, 0, 0, $cover[0], 10));
                                echo $cover[1] . ', ' . $monthName;
                                ?>
                            </td>
                            <td>
                                <?php echo $row->customer_reading_cubic; ?>
                            </td>
                            <td>
                                <?php echo $row->customer_reading_per_cubic; ?>
                            </td>
                            <td>
                                <?php echo $row->customer_reading_minimum; ?>
                            </td>
                            <td>
                                <b><?php echo $row->customer_reading_amount;?></b>
                            </td>
                            <td>
                                <?php $date = date_create($row->customer_reading_date);?>
                                <?php echo date_format($date, 'm-d-Y'); ?>
                            </td>
                            <td style="color : <?php echo ($row->customer_billing_flag != 0)? "green" : "orange"; ?>">
                                <?php echo ($row->customer_billing_flag) ? "Paid" : "Unpaid"?>
                            </td>
                            <td>
                                <?php echo ($row->customer_billing_amount != '0.00') ? $row->customer_billing_amount : '';?>
                            </td>
                            <td>
                                <?php if ($row->customer_billing_flag != 0) { ?>
                                <?php echo ($row->customer_billing_date != '0000-00-00 00:00:00') ? $row->customer_billing_date : "";?>
                                <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
            </table>
        </div>
        <script>
        function printReport() {
            window.print();
        }
        </script>
    </body>
</html>