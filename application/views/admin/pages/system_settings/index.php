
            <div class="col-sm-9 col-md-10 main">
                <!--toggle sidebar button-->
                <p class="visible-xs">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
                </p>
                <h1 class="page-header">
                    <i class="glyphicon glyphicon-cog"></i> System Settings
                </h1>
                <?php echo $this->session->flashdata("success"); ?>
                <?php echo $this->session->flashdata("error"); ?>
              
                <!-- PER CUBIC PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading"> PER CUBIC </div>
                    <div class="panel-body">
                        <?php
                        $edit_per_cubic_button = array(
                            'id' => 'editPerCubic',
                            'class' => 'btn btn-primary pull-right',
                            'content' => 'EDIT',
                            'value' => $cubic_settings
                        );
                        echo form_button($edit_per_cubic_button);
                        ?>
                        <div id="cubicValueContainer">
                            <?php echo $cubic_settings; ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                </div>
                <!-- END PER CUBIC PANEL -->
                
                <!-- MINIMUM AMOUNT PANEL-->
                <div class="panel panel-default">
                    <div class="panel-heading"> MINIMUM AMOUNT </div>
                    <div class="panel-body">
                        <?php
                        $edit_minimum_amount_button = array(
                            'id' => 'editMinimumAmountButton',
                            'class' => 'btn btn-primary pull-right',
                            'content' => 'EDIT',
                            'value' => $minimum_settings
                        );
                        echo form_button($edit_minimum_amount_button);
                        ?>
                        <div id="minimumAmountContainer">
                            <?php echo $minimum_settings; ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        
                    </div>
                </div>
                <!-- END MINIMUM AMOUNT PANEL -->
                
            </div>
        </div><!--/row-->
      
    </div>
</div><!--/.container-->
