
<div class="modal fade" id="customerViewInfo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img id="loadingImage" style="height: 100px; width:100px; display: none" src="<?php echo base_url().'img/admin/loading.gif';?>" class="center-block">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="customerFirstname">Firstname</label>
                    <input type="text" id="customerFirstname" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerMiddlename">Middlename</label>
                    <input type="text" id="customerMiddlename" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerLastname">Lastname</label>
                    <input type="text" id="customerLastname" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerMeterNo">Meter No</label>
                    <input type="text" id="customerMeterNo" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerAddress">Address</label>
                    <input type="text" id="customerAddress" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerContact">Contact No</label>
                    <input type="text" id="customerContact" class="form-control" disabled="" />
                </div>
                <div class="form-group">
                    <label for="customerBirthdate">Birthdate</label>
                    <input type="text" id="customerBirthdate" class="form-control" disabled="" />
                </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>