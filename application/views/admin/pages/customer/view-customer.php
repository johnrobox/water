
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><span class="fa fa-pencil"></span> View Customer </h1>
            <?php echo $this->session->flashdata("success"); ?>
            <?php echo $this->session->flashdata("error"); ?>
            <div id="commonAlertMessage"></div>
            <div class="dataTable_wrapper">
            <table class="table table-bordered" id="customer-datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Meter No</th>
                        <th>Contact</th>
                        <th>Reports</th>
                        <th>Address</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($customers as $row) { 
                $status = ($row->customer_status == 0)? 'Disable' : 'Enable';
                $id = $row->id;
                if ($row->customer_status) { 
                    $btn_type = "danger";
                    $btn_text = "Disable";
                    $tr_class = "bg-white";
                } else {
                    $tr_class = "bg-eee";
                    $btn_type = "primary";
                    $btn_text = "Enable";
                } ?>
                
                <tr id="row<?php echo $id; ?>" class="<?php echo $tr_class; ?>">
                    <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                    <td><?php echo $row->customer_meter_no;?></td>
                    <td><?php echo $row->customer_contact;?></td>
                    <td>
                        <a href="<?php echo base_url();?>index.php/admin/BillingController/singleReport/<?php echo $id;?>" target="blank">View Reports</a>
                    </td>
                    <td><?php echo $row->customer_address;?></td>
                    <td>
                        <?php
                        $view_info_button = array(
                            'value' => $id,
                            'class' => 'btn btn-default btn-xs viewCustomerInfoButton',
                            'content' => 'View Info'
                        );
                        echo form_button($view_info_button);
                        
                        $edit_button = array(
                            'value' => $id,
                            'class' => 'btn btn-success btn-xs editCustomerButton',
                            'content' => 'Edit'
                        );
                        echo form_button($edit_button);
                        ?>
                        <button class="btn btn-<?php echo $btn_type;?> btn-xs changeStatusCustomerButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $row->customer_status;?>">
                            <span id="changeStatusText<?php echo $id;?>"><?php echo $btn_text;?></span>
                            <img src="<?php echo base_url();?>img/admin/loading/loading8.gif" id="changeStatusLoading<?php echo $id;?>" style="width: 20px; height: 20px; display: none"/>
                        </button>
                    </td>
                </tr>
                
                <?php } ?>
                </tbody>
            </table>
        </div>
            
        </div><!--/row-->
    </div>
</div><!--/.container-->

<script>
    $(document).ready(function(){
        $('#customer-datatable').DataTable({
            responsive: true
        });
    });
</script>
