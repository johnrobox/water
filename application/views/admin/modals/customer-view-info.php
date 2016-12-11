
<div class="modal fade" id="customerViewInfo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img id="loadingImage" style="height: 30px; width:30px; display: none" src="<?php echo base_url().'img/admin/loading/loading6.gif';?>" class="center-block">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Firstname</td>
                        <td><input type="text" id="customerFirstname" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Middlename</td>
                        <td><input type="text" id="customerMiddlename" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td><input type="text" id="customerLastname" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Meter No</td>
                        <td><input type="text" id="customerMeterNo" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" id="customerAddress" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Contact No</td>
                        <td><input type="text" id="customerContact" class="form-control" disabled="" /></td>
                    </tr>
                    <tr>
                        <td>Birthdate</td>
                        <td><input type="text" id="customerBirthdate" class="form-control" disabled="" /></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <ul class="pager">
                    <li class="previous nextAndPrevButtonInModal" id="viewPreviousButtonInModal" state="previous" value=""><a href="#">Previous</a></li>
                    <li class="next nextAndPrevButtonInModal"  id="viewNextButtonInModal" state="next" value=""><a href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>