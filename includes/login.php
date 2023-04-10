<?php
session_start();
include("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="../../popper2.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="login.php" class="form-login" method="POST">
            <h2 class="form-login-heading">Admin Login</h2>
            <input type="text" name="admin_email" id="" class="form-control" placeholder="Enter Your Email">
            <input type="password" name="admin_pass" placeholder="Your Password" id="" class="form-control">        
            <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">Login</button>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST["admin_login"])){
    $admin_email = mysqli_real_escape_string($conn, $_POST["admin_email"]);
    $admin_pass = mysqli_real_escape_string($conn, $_POST["admin_pass"]);
    $get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'";
    $run_admin = mysqli_query($conn, $get_admin);
    $check = mysqli_num_rows($run_admin);
    if($check == 1){
        $_SESSION["admin_email"] = $admin_email;
       echo ' <script>alert("You are Logged In")</script>';
        echo '<script>window.open("index.php?dashboard", "_self")</script>';
    }
    else{
        echo ' <script>alert("Email Or Password Is Wrong")</script>';
    }
}


?>