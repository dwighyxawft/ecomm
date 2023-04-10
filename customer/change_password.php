<center>
    <h1>Change Password</h1>
</center>
<hr>

<div class="container">
<form action="" method="POST" class="needs-validation">
<div class="form-group">
    <label>Your Old Password</label>
    <input type="password" name="old_pass" id="" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Your New Password</label>
    <input type="password" name="new_pass" id="" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Confirm New Password</label>
    <input type="password" name="new_pass_again" id="" class="form-control" required>
</div>
<div class="text-center mt-3">
    <button class="btn btn-info text-light" type="submit" name="update2"><i class="fa fa-user-md"></i> Update Now</button>
</div>
</form>
</div>
<?php

$email = $_SESSION["customer_email"];

$get_user = "SELECT * FROM customer WHERE customer_email = '$email'";
$run_user = mysqli_query($conn, $get_user);
$row_user = mysqli_fetch_array($run_user);
$pass = $row_user["customer_pass"];

if(isset($_POST["update2"])){
    $old_pass = mysqli_real_escape_string($conn, $_POST["old_pass"]);
    $new_pass = mysqli_real_escape_string($conn, $_POST["new_pass"]);
    $conf_pass = mysqli_real_escape_string($conn, $_POST["new_pass_again"]);

    if($old_pass === $pass){
        if($new_pass === $conf_pass){
            $update_user = "UPDATE customer SET customer_pass = '$new_pass' WHERE customer_email = '$email'";
            $run_update = mysqli_query($conn, $update_user);
            if($run_update){
                echo '<script>alert("Your Password has been updated successfully To complete the process, Please Login Again")</script>';
                echo '<script>window.open("my_account.php?my_orders", "_self")</script>';
            }
        

        }

    }
    else{
        echo '<script>alert("Sorry Your Passwords did not match")</script>';
        echo '<script>window.open("my_account.php?change_password", "_self")</script>';

    }



}




?>