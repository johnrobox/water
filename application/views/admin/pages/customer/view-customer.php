<style type="text/css">
    .pagination {
    display: inline-block;
    padding-left: 0;
    margin-bottom: 15px;
    margin-top: -5px;
    border-radius: 4px;
    float:right;
}
.datepicker {z-index: 1151 !important;}
</style>
        <div class="col-sm-9 col-md-10 main">
            <h1 class="page-header"><span class="fa fa-pencil"></span> View Customer </h1>
            <?php// echo $links; ?>
            
            <?php echo $this->session->flashdata('error');?>
            <?php echo $this->session->flashdata('success');?>
            <div id="commonAlertMessage"></div>
            <div class="dataTable_wrapper">
            <table class="table table-bordered" id="stagit-datatable">
                <thead >
                <tr>
                    <th>Name</th>
                    <th>Meter No</th>
                    <th>Contact</th>
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
                    <td><?php echo $row->customer_address;?></td>
                    <td>
                        <button value="<?php echo $id;?>" class="btn btn-default btn-xs viewCustomerInfoButton">View Info</button>
                        <button class="btn btn-success btn-xs editCustomerButton" value="<?php echo $id; ?>">Edit</button>
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
        $('#stagit-datatable').DataTable({
            responsive: true
        });
    });
</script>
