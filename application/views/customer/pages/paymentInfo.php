<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            Your Billing and Payment Information
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Reading Date</th>
                    <th>Reading Amount</th>
                    <th>Paid Amount</th>
                    <th>Paid Date</th>
                    <th>Current Balance Status</th>
                </tr>
                <?php foreach($paymentAndBilling as $row) : ?>
                <tr>
                    <td><?php echo $row['readingDate'];?></td>
                    <td><?php echo $row['readingAmount'];?></td>
                    <td><?php echo $row['payAmount'];?></td>
                    <td><?php echo $row['payDate']?></td>
                    <td>
                    <?php echo $row['balance']['type'];?> :
                    <?php echo $row['balance']['balanceAmount']; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="panel-footer">
            
        </div>
    </div>
</div>