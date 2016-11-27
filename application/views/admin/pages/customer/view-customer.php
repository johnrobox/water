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
            <?php echo $links; ?>
            
            <?php echo $this->session->flashdata('error');?>
            <?php echo $this->session->flashdata('success');?>
            
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Name</th>
                    <th>Meter No</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Option</th>
                </tr>
                <?php if ($results) { ?>
                <?php foreach($results as $row) { ?>
                <tr class="row<?php echo $row->id;?>">
                    <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                    <td><?php echo $row->customer_meter_no;?></td>
                    <td><?php echo $row->customer_contact;?></td>
                    <td><?php echo $row->customer_address;?></td>
                    <td>
                        <button onclick="showCustomerInfo(<?php echo $row->id;?>)" class="btn btn-default btn-xs">View Info</button>
                        <button class="btn btn-success btn-xs editCustomerButton" value="<?php echo $row->id; ?>">Edit</button>
                        
                        <?php $status = ($row->customer_status == 0)? 'Disable' : 'Enable';?>
                        <?php if ($row->customer_status) { 
                            $btn_type = "danger";
                            $btn_text = "Disable";
                        } else {
                            $btn_type = "primary";
                            $btn_text = "Enable";
                        } ?>
                        <button class="btn btn-<?php echo $btn_type;?> btn-xs" onclick="ChangeCustomerStatus(<?php echo $row->id;?>, <?php echo $row->customer_status;?>)"><?php echo $btn_text;?></button>
                    </td>
                </tr>
                <?php } ?>
                <?php } ?>
            </table>
            
        </div><!--/row-->
    </div>
</div><!--/.container-->
