
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
                          Amount : <?php echo $due['customer_reading_amount']; ?>
                          <?php $this->db->where('customer_id', $row['id']); ?>
                          <?php $getBalance = $this->db->get('balance'); ?>
                          <br>
                          <?php if ($getBalance->num_rows() > 0) { ?>
                                <?php $balance = $getBalance->row(); ?>
                                <?php $currentBalance = $balance->balance_amount;?>
                                <?php if ($currentBalance > 0) { ?>
                                <?php $totalAmountToPay = $currentBalance + $due['customer_reading_amount']; ?>
                                Balance : 
                                <?php echo $currentBalance; ?>
                                <?php } else { ?>
                                Deposit :
                                <?php echo abs($currentBalance); ?>
                                <?php $totalAmountToPay = $due['customer_reading_amount'] - abs($currentBalance); ?>
                                <?php } ?>
                                
                          <?php } ?>
                          <br>
                          <span style="padding:5px; font-weight: bold; background-color: skyblue"> Total Amount : <?php echo $totalAmountToPay; ?> </span>
                          <?php //echo 'ID : '.$due['customer_reading_id'];?>
                          <div class="form-inline" rol="form" style="margin-top: 5px;">
                          <input type="text" name="payOverDue" id="payOverDue" class="form-control" style="height: 25px;"/>
                          <input type="submit" class="btn btn-primary btn-xs" value="Pay"/>
                          </div>
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