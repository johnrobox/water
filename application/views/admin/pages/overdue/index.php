
        <div class="col-sm-9 col-md-10 main">

          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Customer with Overdue
          </h1>
          <div class="panel panel-default">
              
              <table class="table table-bordered">
                  <tr>
                      <th>
                          Name
                      </th>
                      <th>Meter No.</th>
                      <th>Due Information</th>
                  </tr>
              
              <?php foreach($overdue as $row) { ?>
                  <tr>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['meterno'];?></td>
                      <td>
                          
                          <?php foreach($row['overdue'] as $due) { 
                              $getDate = explode('-', $due['customer_reading_date']);
                              $monthNum  = $getDate[0];
                              $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
                          ?>
                          Date : <?php echo $monthName.' '.$getDate[1]; ?>
                          <br>
                          <?php 
                          echo 'Amount : ' + number_format($due['customer_reading_amount'], 2); 
                          $this->db->where('customer_id', $row['id']); 
                          $getBalance = $this->db->get('balance'); ?>
                          <br>
                          <?php 
                          if ($getBalance->num_rows() > 0) { 
                             $balance = $getBalance->row(); 
                             $currentBalance = $balance->balance_amount;
                             if ($currentBalance > 0) { 
                                 $totalAmountToPay = $currentBalance + $due['customer_reading_amount']; 
                                 echo 'Balance :';
                                 echo number_format($currentBalance, 2); 
                             } else { 
                                 echo 'Deposit :';
                                 echo number_format(abs($currentBalance), 2); 
                                 $totalAmountToPay = $due['customer_reading_amount'] - abs($currentBalance); 
                             ?>
                          <a class="btn btn-success btn-xs" onClick="ChangeDeposite()">Change</a>
                             <?php 
                             } 
                           } ?>
                          <br><br>
                          <?php if($totalAmountToPay > 0) { ?>
                              <span style="padding:5px; font-weight: bold; background-color: skyblue"> Total Amount : <?php echo number_format($totalAmountToPay, 2); ?> </span>
                              <?php echo form_open(base_url().'index.php/AdminBillingController/calculateBilling/'.$row['id']);?>
                               <input type="hidden" name="customer" class="form-control" value="<?php echo $row['id'];?>"/>
                               <input type="hidden" name="amount" class="form-control" value="<?php echo $totalAmountToPay;?>"/>
                               <input type="hidden" name="readingId" class="form-control" value="<?php echo $due['customer_reading_id'];?>"/>
                               <div class="form-inline" style="margin-top: 5px;">
                                    <input type="text" name="money" class="form-control" style="height:25px;"/>
                                    <button class="btn btn-primary btn-xs" type="submit">Pay</button>
                               </div>
                                <?php } ?>
                          <hr>
                          <?php } ?>
                          
                      </td>
                  </tr> 
              <?php } ?>
              </table>
          </div>
        </div><!--/row-->
    </div>
</div><!--/.container-->