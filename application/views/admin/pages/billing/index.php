
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Billing Information
          </h1>
          
          <div class="breadcrumb" style="border: 1px solid #428bca">
            <?php echo form_open(base_url().'index.php/AdminBillingController/setBillingDate');?>
                <table class="table">
                    <tr>
                        <td class="pull-right">Billing Information of</td>
                        <td>
                            <select class="form-control" name="billingMonth" id="month">
                                <option value="<?php echo $this->session->userdata('setBillingMonthValue');?>"><?php echo $this->session->userdata('setBillingMonth');?></option>
                                <?php for($i = 1 ; $i <= 12 ; $i++) { ?>
                                <?php $monthName = date("F", mktime(0, 0, 0, $i, 10)); ?>
                                <?php if ($this->session->userdata('setBillingMonth') != $monthName) { ?>
                                <option value="<?php echo $i;?>"><?php echo $monthName;?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="billingYear" id="year">
                                <option><?php echo $this->session->userdata('setBillingYear') ?></option>
                                <?php $current = date('Y');?>
                                <?php $from = $current - 3;?>
                                <?php for($current; $current >= $from; $current--) { ?>
                                    <?php if ($this->session->userdata('setBillingYear') != $current) { ?>
                                    <option value="<?php echo $current;?>"><?php echo $current;?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary" type="submit">View all</button>
                        </td>
                    </tr>
                </table>
            <?php echo form_close();?>
          </div>
          
          <table class="table table-bordered table-hover" id="billing-datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Meter No.</th>
                        <th>Reading Amount</th>
                        <th>Last Balance</th>
                        <th>Total Amount to Pay</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                if ($results) {
                foreach($results as $row): ?>
                <tr>
                    <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                    <td><?php echo $row->customer_meter_no;?></td>
                    <td class="text-center">
                        <?php 
                        $this->db->where('customer_id', $row->id); 
                        $this->db->where('customer_reading_date', $this->session->userdata('setBillingMonthValue').'-'.$this->session->userdata('setBillingYear')); 
                        $query = $this->db->get('customer_reading');
                        if ($query->num_rows() > 0) { 
                           $amount = $query->row(); 
                           $readingAmount = $amount->customer_reading_amount;
                           $readingId = $amount->id;
                           echo number_format($readingAmount, 2); 
                        } else { 
                            $readingAmount = 0; 
                            $readingId = 0; 
                        } ?>
                    </td>

                    <?php $this->db->where('customer_reading_id', $readingId); ?>
                    <?php $checkPay = $this->db->get('customer_billing'); ?>

                    <td class="text-center">
                        <?php if ($readingAmount != 0) { 
                                 $this->db->where('customer_id', $row->id);
                                 $getBalance = $this->db->get('balance'); 
                                 if ($getBalance->num_rows() > 0) { 
                                     $balance = $getBalance->row();
                                     $balanceAmount = $balance->balance_amount;
                                     $balanceId = $balance->id;
                                     if ($balanceAmount > 0) {
                                         echo 'Customer Balance :';  
                                         echo number_format($balanceAmount, 2);
                                     } else if($balanceAmount < 0) { 
                                         echo 'Company Balance :';
                                         echo number_format(abs($balanceAmount), 2); 
                                     } else { 
                                         echo number_format(0, 2); 
                                     } 
                                 } else { 
                                     $balanceAmount = 0; 
                                 } 
                              } ?>
                    </td>

                    <td style="background-color: #eee;">
                        <?php if($readingAmount != 0) { ?>
                            <?php if ($checkPay->num_rows() == 0) { ?>
                                <?php $totalToPay = $readingAmount + $balanceAmount; ?>
                                <?php echo number_format($totalToPay, 2); ?>
                            <?php } else { ?>
                              <span style="color: green" class="fa fa-check"></span>
                              Already paid in this month.
                            <?php } ?>
                        <?php } ?>
                    </td>
                    <td class="text-center">

                        <?php if ($checkPay->num_rows() == 0) { ?>
                            <?php if ($readingAmount != 0) { ?>
                            <?php echo form_open(base_url().'index.php/AdminBillingController/calculateBilling');?>
                            <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="customer" class="form-control" value="<?php echo $row->id;?>"/>
                                        <input type="hidden" name="amount" class="form-control" value="<?php echo $totalToPay;?>"/>
                                        <input type="hidden" name="readingId" class="form-control" value="<?php echo $readingId;?>"/>
                                        <input type="text" name="money" class="form-control" style="height:25px;"/>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" type="submit">Pay</button>
                                    </td>
                                </tr>
                            </table>
                            <?php echo form_close(); ?>
                            <?php } else { ?>
                            <span style="background-color:orange;padding: 5px;">
                            No Reading Amount
                            </span>
                            <?php  } ?>
                        <?php } else { ?>
                              <?php if ($balanceAmount != 0 && $balanceAmount < 0) { ?>
                                  Deposit <?php echo number_format(abs($balanceAmount), 2); ?>
                              <?php } else if($balanceAmount == 0) { ?>
                              <?php } else { ?>
                                  Costumer Balance : <?php echo number_format($balanceAmount, 2); ?>
                                  <a class="btn btn-success btn-xs" onclick="payBalance(<?php echo $balanceId;?>, <?php echo $balanceAmount;?>)">Pay current balance</a>
                              <?php } ?>
                        <?php } ?>

                    </td>
                </tr>
              <?php endforeach; 
              // end of if
              } ?>
              <tbody>
          </table>
      </div><!--/row-->
      
	</div>
</div><!--/.container-->

<script>
    $(document).ready(function(){
        $('#billing-datatable').DataTable({
            responsive: true
        });
    });
</script>