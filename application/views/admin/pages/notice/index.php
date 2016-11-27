
        <div class="col-sm-9 col-md-10 main">
          
          <!--toggle sidebar button-->
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">
                Notice to Customer
          </h1>
          <div class="panel panel-default">
              <div class="panel-heading">Notice</div>
              <?php echo form_open(base_url().'index.php/AdminNoticeController/update'); ?>
              <div class="panel-body">
                  <?php echo $this->session->flashdata('okay'); ?>
                  <div class="form-group">
                      <label for="notice">Notice Input here</label>
                      <textarea name="notice" id="notice" class="form-control" rows="8"><?php echo $notice['note'];?></textarea>
                  </div>
              </div>
              <div class="panel-footer">
                  <input type="hidden" name="id" value="<?php echo $notice['id'];?>"/>
                  <button class="btn btn-success" type="submit"><i class="fa fa-pencil"></i> Create Notice</button>
                  <button class="btn btn-default" type="reset">Clear</button>
              </div>
              <?php echo form_close();?>
          </div>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->