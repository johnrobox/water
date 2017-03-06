
            <div class="col-sm-9 col-md-10 main">
                <!--toggle sidebar button-->
                <p class="visible-xs">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
                </p>
                <h1 class="page-header">System Settings</h1>
                <?php echo $this->session->flashdata("success"); ?>
                <?php echo $this->session->flashdata("error"); ?>
              
                <div class="panel panel-default">
                    <div class="panel-heading"> Per Cubic </div>
                    <div class="panel-body">
                        <?php
                        $edit_per_cubic_button = array(
                            'id' => 'editPerCubic',
                            'class' => 'btn btn-primary pull-right',
                            'content' => 'EDIT',
                            'value' => $system_settings->value
                        );
                        echo form_button($edit_per_cubic_button);
                        ?>
                        <div id="cubicValueContainer">
                            <?php echo $system_settings->value; ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                </div>
                
            </div>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->
