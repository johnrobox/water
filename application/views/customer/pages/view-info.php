
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Your Latest Reading Status
                    </div>
                    <div class="panel-body">
                        <?php $notPay = false; ?>
                        <?php foreach ($latestReadingData->result() as $row): ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>Date</td>
                                <td>
                                    <?php $getDate = explode('-', $row->customer_reading_date);
                                    $monthNum  = $getDate[0];
                                    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); ?>
                                    <?php echo $monthName.' '.$getDate[1];?>
                                </td>
                            </tr>
                            <tr>
                                <td>Reading Amount</td>
                                <td><?php echo number_format($row->customer_reading_amount, 2);?></td>
                            </tr>
                            
                            <?php $this->db->where('customer_reading_id', $row->id);?>
                            <?php $checkBilling = $this->db->get('customer_billing'); ?>
                            <?php if ($checkBilling->num_rows() == 0) { ?>
                            <tr>
                                    <?php $this->db->where('customer_id', $row->customer_id) ?>
                                    <?php $query = $this->db->get('balance'); ?>
                                    <?php if ($query->num_rows() > 0) { ?>
                                    <?php $balance = $query->row(); ?>
                                    <?php $balanceAmount = $balance->balance_amount;?>
                                        <?php if ($balanceAmount > 0) { ?>
                                <td>Balance</td>
                                <td><?php echo $balanceAmount;?></td>
                                        <?php } else { ?>
                                <td>Deposit</td>
                                <td><?php echo abs($balanceAmount);?></td>
                                        <?php } ?>
                                    <?php } ?>
                            </tr>
                            <?php $notPay = true; ?>
                            <?php } else { ?>
                            <?php $notPay = false; ?>
                            <?php $balanceAmount = 0; ?>
                            <?php } ?>
                            <tr>
                                <td>Amount To Pay</td>
                                <td style="background-color: #eee; font-weight: bold">
                                    <?php echo number_format($row->customer_reading_amount + $balanceAmount, 2); ?>
                                </td>
                            </tr>
                            <?php if (!$notPay) { ?>
                            <?php $this->db->where('customer_id', $row->customer_id) ?>
                            <?php $query = $this->db->get('balance'); ?>
                            <?php if ($query->num_rows() > 0) { ?>
                            <tr>
                                <td></td>
                                <td style="background-color:#ccc">
                                    <?php $myBalance = $query->row();?>
                                    <?php $balance = $myBalance->balance_amount;?>
                                    Status : 
                                    <span style="color:green">
                                        <i class="fa fa-check"></i>
                                        Paid
                                    </span>
                                    <br>
                                    <?php if ($balance > 0) { ?>
                                    Balance : <?php echo number_format(abs($balance), 2); ?>
                                    <?php } else { ?>
                                    Deposit : <?php echo number_format(abs($balance), 2); ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </table>
                        <?php endforeach; ?>
                        <div class="text-center"><?php echo ($notPay) ? 'Need to pay before 15 days of this month.' : ''; ?></div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                </div>
            </div>
