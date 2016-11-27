<div class="modal fade" id="CustomerUpdateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Edit
                <img id="loadingImageUpdateCustomer" style="height: 100px; width:100px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                        <?php
                        $editFirstname = array(
                            'type' => 'text',
                            'name' => 'editFirstname',
                            'id' => 'CusFirstnameUp',
                            'class' => 'form-control'
                        );
                        ?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusFirstnameUp">Firstname</label>
                                <div class="text-red firstnameUpErr"></div>
                                <?php
                                echo form_input($editFirstname);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive fnameRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>

                        <?php
                        $editMiddlename = array(
                            'type' => 'text',
                            'name' => 'editMiddlename',
                            'id' => 'CusMiddlenameUp',
                            'class' => 'form-control'
                        );
                        ?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusMiddlenameUp">Middlename</label>
                                <div class="text-red middlenameUpErr"></div>
                                <?php echo form_input($editMiddlename); ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive mnameRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>

                        <?php $editLastname = array(
                            'type' => 'text',
                            'name' => 'editLastname',
                            'id' => 'CusLastnameUp',
                            'class' => 'form-control'
                        );?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusLastnameUp">Lastname</label>
                                <div class="text-red lastnameUpErr"></div>
                                <?php echo form_input($editLastname);?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive lnameRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>

                        <?php
                        $editMeterNo = array(
                            'type' => 'text',
                            'name' => 'editMeterNo',
                            'id' => 'CusMeternumberUp',
                            'class' => 'form-control'
                        );
                        ?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusMeternumberUp">Meter Number</label>
                                <div class="text-red meternumberUpErr"></div>
                                <?php echo form_input($editMeterNo);?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive meterNumberRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>

                        <?php
                        $editContact = array(
                            'type' => 'text',
                            'name' => 'editContact',
                            'id' => 'CusContactUp',
                            'class' => 'form-control'
                        )
                        ?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusContactUp">Contact</label>
                                <div class="text-red contactUpErr"></div>
                                <?php echo form_input($editContact); ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive contactRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>

                        <?php
                        $editAddress = array(
                            'type' => 'text',
                            'name' => 'editAddress',
                            'id' => 'CusAddressUp',
                            'class' => 'form-control'
                        );
                        ?>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label for="CusAddressUp">Address</label>
                                <div class="text-red addressUpErr"></div>
                                <?php echo form_input($editAddress);?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <img src="<?php echo base_url();?>img/admin/loading/loading6.svg" class="img-responsive addressRefreshImage" style="height: 30px; width: 30px;"/>
                        </div>
                        
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                    <button class="btn btn-success" id="BtnRefreshUpCos" value="">Refresh Data</button>
                    <button class="btn btn-primary" id="BtnSubmitUpCos">Update</button>
            </div>
        </div>
    </div>
</div>