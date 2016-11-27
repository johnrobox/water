
        <div class="col-sm-9 col-md-10 main">
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Overdue
          </h1>
          
          <div class="panel panel-default">
              <div class="panel-heading">
                  <?php echo ucwords(strtolower($overdue[0]['name'])); ?>
              </div>
              <div class="panel-body">
                  <?php foreach($overdue[0]['overdue'] as $due): ?>
                  <table class="table table-bordered">
                      <tr>
                          <td>Reading Date</td>
                          <td>
                              <?php $getDate = explode('-', $due['customer_reading_date']);
                              $monthNum  = $getDate[0];
                              $monthName = date('F', mktime(0, 0, 0, $monthNum, 10)); ?>
                              <?php echo $monthName.' '.$getDate[1];?>
                          </td>
                      </tr>
                      <tr>
                          <td>Reading Amount</td>
                          <td><?php echo number_format($due['customer_reading_amount'], 2);?></td>
                      </tr>
                      <?php $this->db->where('customer_id', $overdue[0]['id']); ?>
                      <?php $getBalance = $this->db->get('balance'); ?>
                      <?php if ($getBalance->num_rows() > 0) { ?>
                      <tr>
                          <td>Balance</td>
                          <td>
                          <?php $balance = $getBalance->row(); 
                                $currentBalance = $balance->balance_amount;
                                if ($currentBalance > 0) { 
                                    $totalAmountToPay = $currentBalance + $due['customer_reading_amount']; 
                                    echo 'Balance :'; 
                                    echo number_format($currentBalance, 2); 
                                } else { 
                                    echo 'Deposit :';
                                    echo number_format(abs($currentBalance), 2); 
                                    $totalAmountToPay = $due['customer_reading_amount'] - abs($currentBalance); 
                                } ?>
                          </td>
                      <?php } ?>
                      </tr>
                      <tr>
                          <td></td>
                          <td>
                              <span style="padding:5px; font-weight: bold; background-color: skyblue"> Total Amount : <?php echo number_format($totalAmountToPay, 2); ?> </span>
                              <?php //echo 'ID : '.$due['customer_reading_id'];?>

                              <?php echo form_open(base_url().'index.php/AdminBillingController/calculateBilling/'.$overdue[0]['id']);?>
                               <input type="hidden" name="customer" class="form-control" value="<?php echo $overdue[0]['id'];?>"/>
                               <input type="hidden" name="amount" class="form-control" value="<?php echo $totalAmountToPay;?>"/>
                               <input type="hidden" name="readingId" class="form-control" value="<?php echo $due['customer_reading_id'];?>"/>
                               <div class="form-inline" style="margin-top: 5px;">
                                    <input type="text" name="money" class="form-control" style="height:25px;"/>
                                    <button class="btn btn-primary btn-xs" type="submit">Pay</button>
                               </div>
                              <?php echo form_close(); ?>
                          </td>
                      </tr>
                  </table>
                  <?php endforeach; ?>
              </div>
              <div class="panel-footer">
                  
              </div>
          </div>
        </div><!--/row-->
    </div>
</div><!--/.container-->