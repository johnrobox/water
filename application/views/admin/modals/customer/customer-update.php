<div class="modal fade" id="CustomerUpdateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Edit
                <div class="text-red commonError"></div>
                <img id="loadingImageUpdateCustomer" style="height: 100px; width:100px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php echo form_label('Firstname', 'CusFirstnameUp'); ?>
                                <div class="text-red firstnameUpErr"></div>
                                <?php
                                $editFirstname = array(
                                    'type' => 'text',
                                    'name' => 'editFirstname',
                                    'id' => 'CusFirstnameUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editFirstname);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive fnameRefreshImage loading-margin-top" />
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php echo form_label('Middlename', 'CusMiddlenameUp');?>
                                <div class="text-red middlenameUpErr"></div>
                                <?php 
                                $editMiddlename = array(
                                    'type' => 'text',
                                    'name' => 'editMiddlename',
                                    'id' => 'CusMiddlenameUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editMiddlename); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive mnameRefreshImage loading-margin-top"/>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php echo form_label('Lastname', 'CusLastnameUp');?>
                                <div class="text-red lastnameUpErr"></div>
                                <?php 
                                $editLastname = array(
                                    'type' => 'text',
                                    'name' => 'editLastname',
                                    'id' => 'CusLastnameUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editLastname);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive lnameRefreshImage loading-margin-top" />
                        </div>
                        
                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php
                                echo form_label('Meter Number', 'CusMeternumberUp');?>
                                ?>
                                <div class="text-red meternumberUpErr"></div>
                                <?php 
                                $editMeterNo = array(
                                    'type' => 'text',
                                    'name' => 'editMeterNo',
                                    'id' => 'CusMeternumberUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editMeterNo);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive meterNumberRefreshImage loading-margin-top"/>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php echo form_label('Contact', 'CusContactUp'); ?>
                                <div class="text-red contactUpErr"></div>
                                <?php 
                                $editContact = array(
                                    'type' => 'text',
                                    'name' => 'editContact',
                                    'id' => 'CusContactUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editContact); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive contactRefreshImage loading-margin-top"/>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <?php echo form_label('Address', 'CusAddressUp'); ?>
                                <div class="text-red addressUpErr"></div>
                                <?php 
                                $editAddress = array(
                                    'type' => 'text',
                                    'name' => 'editAddress',
                                    'id' => 'CusAddressUp',
                                    'class' => 'form-control'
                                );
                                echo form_input($editAddress);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive addressRefreshImage loading-margin-top"/>
                        </div>
                        
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'id' => 'BtnRefreshUpCos',
                    'value' => '',
                    'content' => 'Refresh Data'
                );
                echo form_button($refresh_button);
                
                $update_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'BtnSubmitUpCos',
                    'value' => '',
                    'content' => 'Update'
                );
                echo form_button($update_button);
                ?>
            </div>
        </div>
    </div>
</div>