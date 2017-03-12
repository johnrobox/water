        <div class="col-sm-9 col-md-10 main">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header"> <i class="glyphicon glyphicon-th-list"></i> ADMINISTRATOR USERS </h1>
          <?php echo $this->session->flashdata('error'); ?>
          <?php echo $this->session->flashdata('success'); ?>
          <table class="table table-hover table-bordered" id="admin-user-datatable">
                <thead>
                    <tr>
                        <th></th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Birth date</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Last Logout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $row): ?>
                    <tr>
                        <td>
                            <?php
                            if ($row->admin_image =="" || empty($row->admin_image)) {
                                $user_image = ($row->admin_gender == 1) ? "male-default-image.png" : "female-default-image.png";
                            } else {
                                $user_image = $row->admin_image;
                            }
                            ?>
                            <img src="<?php echo base_url().'img/admin/users/'.$user_image; ?>" style="height: 50px;"/>
                        </td>
                        <td><?php echo ucwords(strtolower($row->admin_firstname));?></td>
                        <td><?php echo ucwords(strtolower($row->admin_lastname));?></td>
                        <td><?php echo $row->admin_email;?></td>
                        <td><?php echo ($row->admin_gender == 1) ? "MALE" : "FEMALE";?></td>
                        <td><?php echo date('F j Y', strtotime($row->admin_birthdate));?></td>
                        <td><?php echo ($row->admin_status) ? "ONLINE" : "OFFLINE";?></td>
                        <td><?php echo $row->admin_last_login; ?></td>
                        <td><?php echo $row->admin_last_logout;?></td>
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