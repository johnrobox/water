
        <div class="col-sm-9 col-md-10 main">
          
            <!--toggle sidebar button-->
            <p class="visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
            </p>
            <h1 class="page-header">
                <i class="glyphicon glyphicon-paperclip"></i> Notice to Customer
            </h1>
            <?php
            $add_button = array(
                'class' => 'btn btn-primary',
                'content' => 'Add Notice',
                'id' => 'addNoticeButton'
            );
            echo form_button($add_button);
            ?>
            <br><br>
            
            <?php echo $this->session->flashdata("success"); ?>
            <?php echo $this->session->flashdata("error"); ?>
            <div class="alert" id="alertContainer">
                <div id="messageContainer"></div>
            </div>
            
            <table class="table table-bordered" id="notice-datatable">
                <thead>
                    <tr>
                        <td>Notice</td>
                        <td style="width: 160px;">Date Created</td>
                        <td style="width: 160px;">Created By</td>
                        <td>Status</td>
                        <td style="width: 220px;">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notices as $row) { ?>
                    <?php $id = $row->id; ?>
                    <tr id="noticeTR<?php echo $id;?>">
                        <td><?php echo $row->note; ?></td>
                        <td><?php echo $row->date_created ?></td>
                        <td><?php echo ucwords(strtolower($row->admin_firstname. ' '.$row->admin_lastname)); ?></td>
                        <td>
                            <?php
                            if ($row->status) {
                                $status_color = 'green';
                                $status_text = 'ENABLE'; 
                            } else {
                                $status_color = 'red';
                                $status_text = 'DISABLE';
                            }
                            ?>
                            <span style="color:<?php echo $status_color; ?>"><?php echo $status_text; ?></span>
                        </td>
                        <td>
                            
                            <?php
                            $delete_button = array(
                                'class' => 'btn btn-danger btn-xs delete_button',
                                'id' => $id,
                                'content' => '<span class="glyphicon glyphicon-trash"></span> Delete'
                            );
                            echo form_button($delete_button);
                            
                            $update_button = array(
                                'class' => 'btn btn-success btn-xs update_button',
                                'id' => $id,
                                'content' => '<span class="glyphicon glyphicon-pencil"></span> Update'
                            );
                            echo form_button($update_button);
                            
                            // status
                            if ($row->status) { 
                                $btn_type = "warning";
                                $btn_text = "Disable";
                                $tr_class = "bg-white";
                            } else {
                                $tr_class = "bg-eee";
                                $btn_type = "primary";
                                $btn_text = "Enable";
                            } 
                            ?>
                            
                            <button class="btn btn-<?php echo $btn_type;?> btn-xs changeStatusCustomerButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $row->status;?>">
                                <span id="changeStatusText<?php echo $id;?>"><?php echo $btn_text;?></span>
                                <img src="<?php echo base_url();?>img/admin/loading/loading8.gif" id="changeStatusLoading<?php echo $id;?>" style="width: 20px; height: 20px; display: none"/>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->

<script>
    $(document).ready(function(){
        $('#notice-datatable').DataTable({
            responsive: true
        });
    });
</script>