
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
          
          <div class="breadcrumb" style="border: 1px solid #428bca">
              <?php echo form_open(base_url().'index.php/admin/ReadingController/setReadingDate');?>
              <table class="table">
                  <tr>
                      <td class="pull-right">As of </td>
                      <td>
                          <select class="form-control" name="readingMonth" id="month">
                              <option value="<?php echo $this->session->userdata('setReadingMonthValue');?>"><?php echo $this->session->userdata('setReadingMonth');?></option>
                              <?php for($i = 1 ; $i <= 12 ; $i++) { 
                              $monthName = date("F", mktime(0, 0, 0, $i, 10)); 
                               if ($this->session->userdata('setReadingMonth') != $monthName) { ?>
                              <option value="<?php echo $i;?>"><?php echo $monthName;?></option>
                              <?php } 
                              } ?>
                          </select>
                      </td>
                        <td>
                            <select class="form-control" name="readingYear" id="year">
                                <option><?php echo $this->session->userdata('setReadingYear') ?></option>
                                <?php 
                                $current = date('Y');
                                $from = $current - 3;
                                for($current; $current >= $from; $current--) { 
                                     if ($this->session->userdata('setReadingYear') != $current) { ?>
                                    <option value="<?php echo $current;?>"><?php echo $current;?></option>
                               <?php  
                                     } 
                                } ?>
                            </select>
                        </td>
                        <td>
                            <?php echo form_button(array('class' => 'btn btn-primary', 'type' => 'sumbit', 'content' => 'View All')); ?>
                        </td>
                  </tr>
              </table>
              <?php echo form_close();?>
          </div>
          <div class="alert alert-success alert-dismissable" id="success_display_text">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <span class="success_text_content"></span>
          </div>
          <div class="panel panel-default">
              <div class="panel-body">
                  <table class="table table-bordered table-hover" id="reading-datatable">
                      <thead>
                        <tr style="background-color: #eee">
                            <th>Name</th>
                            <th>Meter No.</th>
                            <th>Reading Amount</th>
                            <th>Reading Date</th>
                            <th>Status</th>
                            <th>Action
                            </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($results as $row): ?>
                        <tr>
                            <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                            <td><?php echo $row->customer_meter_no;?></td>
                            <?php 
                                $this->db->where('customer_id', $row->id); 
                                $this->db->where('customer_reading_month_cover', $this->session->userdata('setReadingMonthValue').'-'.$this->session->userdata('setReadingYear')); 
                                $query = $this->db->get('customer_readings');
                                if ($query->num_rows() > 0) { 
                                $amount = $query->row(); 
                            ?>
                            
                            <td id="amount_row<?php echo $row->id;?>" style="color:orange; text-align: center">
                                <?php echo number_format($amount->customer_reading_amount, 2); ?>
                            </td>
                            <td>
                                <?php echo date('M d, Y', strtotime($amount->customer_reading_date)); ?>
                            </td>
                            <td>
                                <?php echo ($amount->customer_billing_flag) ? "Paid" : "Unpaid"; ?>
                            </td>
                            <td id="update_button_row<?php echo $row->id;?>">
                                <button class="btn btn-success btn-xs update_reading_amount_button" id="update_button_ID<?php echo $row->id;?>" reading_id="<?php echo $amount->id; ?>" customer_id="<?php echo $row->id; ?>" amount="<?php echo $amount->customer_reading_amount; ?>">Update</button>
                            </td>
                            <?php } else { ?>
                            <td id="amount_row<?php echo $row->id;?>" style="color:orange; text-align: center"></td>
                            <td id="date_row<?php echo $row->id;?>"></td>
                            <td id="status_row<?php echo $row->id;?>"></td>
                            <td id="action_row<?php echo $row->id;?>">
                                <table id="row_form_table<?php echo $row->id; ?>">
                                    <tr>
                                        <td>
                                            <?php 
                                            
                                            echo form_input(array(
                                                'type' => 'number',
                                                'step' => '0.01',
                                                'name' => 'reading_amount',
                                                'required' => '',
                                                'class' => 'form-control',
                                                'style' => 'height:25px',
                                                'id' => 'input_reading'.$row->id
                                            ));
                                            
                                            ?>
                                            <br>
                                            <small class="text-red" id="reading_error_display<?php echo $row->id; ?>" style="display: none">Cannot process request!</small>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs submit_reading_button" customer_id="<?php echo $row->id; ?>">
                                                Submit
                                                <img src="<?php echo base_url();?>img/admin/loading/loading8.gif" id="submit_reading_loading<?php echo $row->id;?>" style="width: 20px; height: 20px; display: none"/>
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <?php } ?>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
                  </div>
              <div class="panel-footer"></div>
          </div>
          
      </div><!--/row-->
      
	</div>
</div><!--/.container-->


<script>
    $(document).ready(function(){
        $('#reading-datatable').DataTable({
            responsive: true
        });
    });
</script>