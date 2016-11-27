
        
        <div class="col-sm-9 col-md-10 main">
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Dashboard
          </h1>
          <?php if($overdue) { ?>
          <div class="panel panel-warning">
              <div class="panel-heading">
                  Overdue in the month
              </div>
              <div class="panel-body">
                  <table class="table table-bordered">
                      <tr>
                          <th>Name</th>
                          <th>Meter No</th>
                          <th>Action</th>
                      </tr>
                  <?php
                  foreach($overdue as $due) { ?>
                      <tr>
                          <td>
                              <?php echo $due['name'];?>
                          </td>
                          <td>
                              <?php echo $due['meterno']; ?>
                          </td>
                          <td>
                              <a href="<?php echo base_url().'index.php/AdminOverdueController/view/'.$due['id'];?>" class="btn btn-primary btn-xs">View</a>
                          </td>
                      </tr>
                  <?php   
                  }
                  ?>
                  </table>
              </div>
              <div class="panel-footer">
                  
              </div>
          </div>
          <?php } ?>
          
        </div><!--/row-->
    </div>
</div><!--/.container-->