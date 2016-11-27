
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Customer Request
          </h1>
          <div class="panel panel-default">
              <div class="panel-heading"></div>
              <div class="panel-body">
                  <table class="table table-hover table-bordered">
                      <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Request</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                      <?php foreach ($allRequest->result() as $row): ?>
                      <tr class="delete<?php echo $row->id;?>">
                          <td><?php echo ucwords(strtolower($row->customer_firstname.' '.$row->customer_middlename.' '.$row->customer_lastname));?></td>
                          <td><?php echo $row->customer_address;?></td>
                          <td><?php echo $row->request;?></td>
                          <td><?php echo $row->date_send;?></td>
                          <td>
                              <button class="btn btn-danger" onclick="deleteRequest(<?php echo $row->id;?>)">Delete</button>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </table>
              </div>
              <div class="panel-footer"></div>
          </div>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->