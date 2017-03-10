
            <div class="col-sm-9 col-md-10 main">
                <!--toggle sidebar button-->
                <p class="visible-xs">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
                </p>
                <h1 class="page-header"> <i class="glyphicon glyphicon-envelope"></i> CUSTOMER REQUEST </h1>
                <?php echo $this->session->flashdata("success"); ?>
            <?php echo $this->session->flashdata("error"); ?>
                <div class="alert" id="alertContainer">
                    <div id="alertMessage"></div>
                </div>
                <table class="table table-hover table-bordered" id="customer-request">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Request</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allRequest->result() as $row): ?>
                        <?php $id = $row->id; ?>
                        <tr id="requestTR<?php echo $id;?>">
                            <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                            <td><?php echo $row->customer_address;?></td>
                            <td><?php echo $row->request;?></td>
                            <td><?php echo $row->date_send;?></td>
                            <td>
                                <?php
                                $delete_button = array(
                                    'class' => 'btn btn-danger btn-xs delete_request_button',
                                    'request_id' => $id,
                                    'content' => '<span class="glyphicon glyphicon-trash"></span> Delete'
                                );
                                echo form_button($delete_button);
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->

<script>
    $(document).ready(function(){
        $('#customer-request').DataTable({
            responsive: true
        });
    });
</script>