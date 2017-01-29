
        
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Billing Information
          </h1>
          
          <div class="breadcrumb" style="border: 1px solid #428bca">
            <?php echo form_open(base_url().'index.php/admin/BillingController/setBillingDate');?>
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
          
          <div class="alert alert-success alert-dismissable" id="success_display_text">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <span class="success_text_content"></span>
          </div>
          
          <table class="table table-bordered table-hover" id="billing-datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Meter No.</th>
                        <th>Reading Amount</th>
                        <th>Status</th>
                        <th>Date Paid</th>
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
                        $this->db->where('customer_reading_month_cover', $this->session->userdata('setBillingMonthValue').'-'.$this->session->userdata('setBillingYear')); 
                        $query = $this->db->get('customer_readings');
                        if ($query->num_rows() > 0) { 
                           $reading_row = $query->row(); 
                           $readingAmount = $reading_row->customer_reading_amount;
                           echo number_format($readingAmount, 2); 
                        } else { 
                           echo '<small><i style="color: red">No Reading</i></small>';
                        } ?>
                    </td>
                    
                    <!-- this is for status TD -->
                     <?php 
                     if ($query->num_rows() > 0) { ?>
                        <td class="text-center" id="status_td<?php echo $reading_row->id;?>">
                         <?php   echo ($reading_row->customer_billing_flag) ? "Paid" : "Unpaid"; ?>
                        </td>
                    <?php } else { ?>
                        <td></td>
                    <?php } ?>
                        
                        
                    
                    <?php
                    // this is for date TD 
                    if ($query->num_rows() > 0){
                        echo '<td id="date_td'.$reading_row->id.'">';
                        if ($reading_row->customer_billing_flag == 1) {
                            echo $reading_row->customer_billing_date;
                        } 
                        echo '</td>';
                    } else {
                        echo '<td></td>';
                    }
                    ?>
                     
                    <!-- this is for billing TD -->
                    <td>
                        <?php
                        if ($query->num_rows() > 0) {
                            if ($reading_row->customer_billing_flag == 0) { 
                                $btn_class = 'primary';
                                $status = 0;
                                $btn_text = 'Mark as Paid';
                            } else {
                                $btn_class = 'warning';
                                $status = 1;
                                $btn_text = 'Mark as Unpaid';
                            } 
                            $billing_button = array(
                                'class' => 'btn btn-'.$btn_class.' btn-xs mark_as_paid_button',
                                'id' => 'mark_as_paid_button' . $reading_row->id,
                                'status' => $status,
                                'reading_id' => $reading_row->id,
                                'reading_amount' => $reading_row->customer_reading_amount,
                                'content' => $btn_text
                            );
                            echo form_button($billing_button);
                        }
                        ?>
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