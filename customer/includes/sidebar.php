<div class="card">
    <div class="card-header">
    <center>
        <?php
        $email = $_SESSION["customer_email"];
        $get_customer = "SELECT * FROM customer WHERE customer_email = '$email'";
        $run_customer = mysqli_query($conn, $get_customer);
        while($row_customer = mysqli_fetch_array($run_customer)){
            $image = $row_customer["customer_image"];
            $name = $row_customer["customer_name"];
        }
        ?>
        <img src="../images/customer-images/<?php echo $image; ?>" style="width: 220px;" alt="">

    </center>
<br>
    <h3 class="card-title text-center"><?php echo $name; ?></h3>

    </div>
    <div class="card-body">
        <ul class="nav-pills nav-stacked nav">
            <li><a  class="<?php if(isset($_GET["my_orders"])){echo "btn-primary";}?> btn" href="my_account.php?my_orders" style="text-decoration: none;">
                <i class="fa fa-list"> </i> My Orders
            </a></li>
            <li><a  class="<?php if(isset($_GET["pay_offline"])){echo "btn-primary";}?> btn mt-2" href="my_account.php?pay_offline" style="text-decoration: none;">
                <i class="fa fa-bolt"> </i> Pay Offline
            </a></li>
            <li><a  class="<?php if(isset($_GET["edit_account"])){echo "btn-primary";}?> btn mt-2" href="my_account.php?edit_account" style="text-decoration: none;">
                <i class="fa fa-pencil"> </i> Edit Account
            </a></li>
            <li><a  class="<?php if(isset($_GET["change_password"])){echo "btn-primary";}?> btn mt-2" href="my_account.php?change_password" style="text-decoration: none;">
                <i class="fa fa-user"> </i> Change Password
            </a></li>
            <li><a  class="<?php if(isset($_GET["delete_account"])){echo "btn-primary";}?> btn mt-2" href="my_account.php?delete_account" style="text-decoration: none;">
                <i class="fa fa-trash-o"> </i> Delete Account
            </a></li>
            <li><form action="logout.php" method="post"><button  class="btn-primary btn mt-2"  name="logout">
                <i class="fa fa-sign-out"> </i> Log Out
</button></form></li>
            
</ul>
    </div>
</div>