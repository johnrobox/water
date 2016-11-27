        <div class="col-sm-9 col-md-10 main">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h1 class="page-header">Add Admin </h1>
          <table class="table table-hover table-bordered">
              <tr>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Birth date</th>
              </tr>
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
          </table>
        </div>
    </div>
</div>