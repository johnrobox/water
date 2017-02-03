
        
        <div class="col-sm-9 col-md-10 main">
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Dashboard
          </h1>
          <div class="panel panel-warning">
              <div class="panel-heading">
                  Overdue in the month
              </div>
              <div class="panel-body">
                  <?php
                  if (isset($overdue)) {
                  ?>
                  <table class="table table-bordered">
                      <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Meter No</th>
                          <th>Amount</th>
                          <th>Reading Date</th>
                          <th></th>
                      </tr>
                      <?php 
                      $counter = 1;
                      foreach($overdue as $row) {
                          $this->db->where('id', $row->customer_id);
                          $query = $this->db->get('customers');
                          $customer = $query->row();
                      ?>
                      <tr>
                          <td><?php echo $counter++; ?></td>
                          <td>
                              <?php echo ucwords(strtolower($customer->customer_firstname.' '.$customer->customer_lastname));?>
                          </td>
                          <td>
                              <?php echo $customer->customer_meter_no; ?>
                          </td>
                          <td>
                              <?php echo $row->customer_reading_amount; ?>
                          </td>
                          <td>
                              <?php echo $row->customer_reading_date;?>
                          </td>
                          <td>
                              <a href="<?php echo base_url();?>index.php/admin/BillingController/singleReport/<?php echo $customer->id;?>" target="blank">View Reports</a>
                          </td>
                      </tr>
                      <?php } ?>
                  </table>
                  <?php } ?>
              </div>
              <div class="panel-footer">
                  
              </div>
          </div>
          
        </div><!--/row-->
    </div>
</div><!--/.container-->