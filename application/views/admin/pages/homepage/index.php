
<script>
$(document).ready(function(){
    var number = 1;
    setInterval(function(){ 
        var time = new Date();
        $("#displayTime").text(time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds());
    }, 1000);
});
</script>

        <div class="col-sm-9 col-md-10 main">
          <!--toggle sidebar button-->
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
            </p>
            
            <div class="pull-right" style="font-size: 30px;">
                <i class="glyphicon glyphicon-time"></i>
                <span id="displayTime"></>
            </div>
            
            <h1 class="page-header"> <i class="glyphicon glyphicon-dashboard"></i> DASHBOARD </h1>
            
            <?php echo $this->session->flashdata("success"); ?>
            <?php echo $this->session->flashdata("error"); ?>
            
            <div class="row">
                <div class="col-sm-9">
                    
                    <!-- Overdue starts here -->
                    <?php if (isset($overdue)) { ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Overdue Customer
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered" id="overdue-datatable-info">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Meter No</th>
                                        <th>Amount</th>
                                        <th>Reading Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Overdue ends here -->
                    
                    
                </div>
                <div class="col-sm-3 pull-right">
                    <i class="glyphicon glyphicon-calendar"></i>
                    <?php echo $this->calendar->generate();?>
                </div>
            </div>
            
        </div><!--/row-->
    </div>
</div><!--/.container-->

<script>
    $(document).ready(function(){
        $('#overdue-datatable-info').DataTable({
            responsive: true
        });
    });
</script>