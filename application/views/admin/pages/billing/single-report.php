        <div class="col-sm-9 col-md-10 main">
            <div class="breadcrumb">
                <h2>(<?php echo $customer->customer_meter_no; ?>)</h2>
            </div>
            
            <style>
                .table td , th {
                    text-align: center;   
                 }
            </style>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="<?php echo base_url();?>index.php/admin/ReportController/generateReport/<?php echo $customer->id;?>" target="_blank" class="btn btn-primary pull-right">Generate Report</a>
                    <b>Name : </b>  <?php echo ucwords(strtolower($customer->customer_firstname. ' ' .  $customer->customer_lastname)); ?>
                    <br>
                    <b>Meter No : </b><?php echo $customer->customer_meter_no; ?>
                    <br>
                    <b>Address : </b> <?php echo $customer->customer_address; ?>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info" id="success_text_content"></div>
                    <table class="table table-bordered" id="customer-report-datatable">
                        <thead>
                            <tr>
                                <th>Reading Month Covered</th>
                                <th>Reading Amount</th>
                                <th>Reading Date</th>
                                <th>Status</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
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
                            <td style="background: #eee">
                                <b><?php echo $row->customer_reading_amount;?></b>
                            </td>
                            <td>
                                <?php $date = date_create($row->customer_reading_date);?>
                                <?php echo date_format($date, 'm-d-Y'); ?>
                            </td>
                            <td id="status_td<?php echo $row->id; ?>" style="background-color: <?php echo $tr_style;?>">
                                <?php echo ($row->customer_billing_flag) ? "Paid" : "Unpaid"?>
                            </td>
                            <td id="paid_amount_td<?php echo $row->id; ?>">
                                <?php echo ($row->customer_billing_amount != '0.00') ? $row->customer_billing_amount : '';?>
                            </td>
                            <td id="paid_date_td<?php echo $row->id; ?>">
                                <?php echo ($row->customer_billing_date != '0000-00-00 00:00:00') ? $row->customer_billing_date : "";?>
                            </td>
                            <td id="option_td<?php echo $row->id;?>">
                                <?php if (!$row->customer_billing_flag) { ?>
                                <button id="reading_button_id<?php echo $row->id; ?>" class="btn btn-primary btn-xs single_mark_as_paid_button" reading_id="<?php echo $row->id;?>" reading_amount="<?php echo $row->customer_reading_amount?>">Mark as Paid</button>
                                <?php } else { ?>
                                <small style="color: green"><i>No Action</i></small>
                                <?php } ?>
                            </td>
                        </tr>
                            <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    
                </div>
            </div>
        </div>

<script>
    $(document).ready(function(){
        $('#customer-report-datatable').DataTable({
            responsive: true
        });
    });
</script>