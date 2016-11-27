
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Reading Information
          </h1>
          
          
          <?php echo $this->session->flashdata('success'); ?>
          <?php echo $this->session->flashdata('error'); ?>
          
          <div class="pull-right">
              <?php echo form_open(base_url().'index.php/AdminReadingController/setReadingDate');?>
              <table class="table">
                  <tr>
                      <td>As of </td>
                      <td>
                          <select class="form-control" name="readingMonth" id="month">
                              <option value="<?php echo $this->session->userdata('setReadingMonthValue');?>"><?php echo $this->session->userdata('setReadingMonth');?></option>
                              <?php for($i = 1 ; $i <= 12 ; $i++) { ?>
                              <?php $monthName = date("F", mktime(0, 0, 0, $i, 10)); ?>
                              <?php if ($this->session->userdata('setReadingMonth') != $monthName) { ?>
                              <option value="<?php echo $i;?>"><?php echo $monthName;?></option>
                              <?php } ?>
                              <?php } ?>
                          </select>
                      </td>
                      <td>
                          <select class="form-control" name="readingYear" id="year">
                              <option><?php echo $this->session->userdata('setReadingYear') ?></option>
                              <?php $current = date('Y');?>
                              <?php $from = $current - 3;?>
                              <?php for($current; $current >= $from; $current--) { ?>
                                  <?php if ($this->session->userdata('setReadingYear') != $current) { ?>
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
          
          <div class="panel panel-default">
              <div class="panel-body">
                  <table class="table table-bordered table-hover">
                      <tr style="background-color: #eee">
                          <th>Name</th>
                          <th>Meter No.</th>
                          <th>Reading Amount</th>
                          <th>Action</th>
                      </tr>
                      <?php foreach($results as $row): ?>
                      <tr>
                          <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                          <td><?php echo $row->customer_meter_no;?></td>

                          <?php $this->db->where('customer_id', $row->id); ?>
                          <?php $this->db->where('customer_reading_date', $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear')); ?>
                          <?php $query = $this->db->get('customer_reading');?>
                          <?php if ($query->num_rows() > 0) { ?>
                          <?php $amount = $query->row(); ?>
                          <td class="rows<?php echo $amount->id;?>"style="color:orange; text-align: center">
                              <?php echo number_format($amount->customer_reading_amount, 2); ?>
                          </td>
                          <td>
                              <button class="btn btn-success btn-xs" onclick="updateReading(<?php echo $amount->id;?>,'<?php echo $amount->customer_reading_amount;?>')">Update</button>
                          </td>
                          <?php } else { ?>
                          <td></td>
                          <td>
                              <?php echo form_open(base_url().'index.php/AdminReadingController/addReading'); ?>
                              <table>
                                  <tr>
                                      <td>
                                          <input type="hidden" name="customer_id" value="<?php echo $row->id;?>"/>
                                          <input type="text" name="reading_amount" required="" class="form-control" style="height:25px;"/>
                                      </td>
                                      <td>
                                          <button class="btn btn-primary btn-xs" type="submit">Submit</button>
                                      </td>
                                  </tr>
                              </table>
                             <?php echo form_close(); ?>


                          </td>
                          <?php } ?>


                      </tr>
                      <?php endforeach; ?>
                  </table>
                  </div>
              <div class="panel-footer"></div>
          </div>
          
      </div><!--/row-->
      
	</div>
</div><!--/.container-->