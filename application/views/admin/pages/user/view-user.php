        <div class="col-sm-9 col-md-10 main">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">Add Admin </h1>
          <?php echo $this->session->flashdata('error'); ?>
          <?php echo $this->session->flashdata('success'); ?>
          <table class="table table-hover table-bordered" id="admin-user-datatable">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Birth date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $row): ?>
                    <tr>
                        <?php $age =  ($row->admin_gender == 1)? 'Male' : 'Female'; ?> 
                        <td><?php echo ucwords(strtolower($row->admin_firstname));?></td>
                        <td><?php echo ucwords(strtolower($row->admin_lastname));?></td>
                        <td><?php echo $row->admin_email;?></td>
                        <td><?php echo $age;?></td>
                        <td><?php echo date('F j Y', strtotime($row->admin_birthdate));?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
          </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('#admin-user-datatable').DataTable({
            responsive: true
        });
    });
</script>