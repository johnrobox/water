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
                        <td id="userStatus<?php echo $row->id; ?>"></td>
                        <td id="userLastLogin<?php echo $row->id;?>"></td>
                        <td id="userLastLogout<?php echo $row->id;?>"></td>
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
        
        
        // script used to check of a admin status
        setInterval(function(){ 
            $.ajax({
                type: "POST",
                url: window.base_url + "AdminUserController/getUserStatus",
                dataType: "json",
                success: function(data){
                    data.forEach(function(user){
                        var id = user.id;
                        var status = user.admin_status;
                        var last_login = user.admin_last_login;
                        var last_logout = user.admin_last_logout;
                        
                        
                        var login_text = (last_login != null) ? last_login : "";
                        var logout_text = (last_logout != null) ? last_logout : "";
                        
                        var user_status = $("#userStatus"+id);
                        var status_class_remove = "";
                        var status_class_add = "";
                        var status_text = "";
                        if (status == 1) {
                            status_class_add = "text-green";
                            status_class_remove = "text-red";
                            status_text = "ONLINE";
                        } else {
                            status_class_add = "text-red";
                            status_class_remove = "text-green";
                            status_text = "OFFLINE";
                        }
                        user_status.addClass(status_class_add);
                        user_status.removeClass(status_class_remove);
                        user_status.text(status_text);
                        
                        $("#userLastLogin"+id).text(login_text);
                        $("#userLastLogout"+id).text(logout_text);
                        console.log(user);
                        
                    });
                },
                error: function(error){
                    console.log(error);
                }
            });
        }, 1000);
    
    });
</script>