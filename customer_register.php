<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../fontawesome/js/fontawesome.min.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../popper2.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php include ("includes/header.php"); ?>



<div id="content">
    <div class="container">
        <div class="col-md-12 mt-3">
            <ul class="breadcrumb">
                <li class="padding-right: 3px;"><a style="text-decoration: none;" href="index.php">Home</a> </li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="row">
       <div class="col-md-3">
        <?php include ("includes/sidebar.php"); ?>
        </div>
        <div class="col-md-9">
            <div class="box mt-3 pt-4 mb-3 pb-4" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
                <div class="box-header">
                    <div class="text-center">
                       <h3>Register A New Account</h3>
                      

                    </div>
                    <form action="customer_register.php" method="POST" class="needs-validation" enctype="multipart/form-data">
                          <div class="container">
                          <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" name="c_name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail">Your Email</label>
                                <input type="email" name="c_mail" id="mail" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your Password</label>
                                <input type="password" name="c_pass" id="pass" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your Country</label>
                                <input type="text" name="c_country" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your City</label>
                                <input type="text" name="c_city"  class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your Contact</label>
                                <input type="tel" name="c_contact" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your Address</label>
                                <input type="text" name="c_add" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="pass">Your Profile Picture</label>
                                <input type="file" name="c_image" class="form-control" required>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary" name="register">
                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                          </div>

                    </form>
                </div>

            </div>

        </div>




        
        </div>





    </div>
</div>




<?php include ("includes/footer.php"); ?>
</body>
</html>


<?php
if(isset($_POST["register"])){
    $c_name = mysqli_real_escape_string($conn, $_POST["c_name"]);
    $c_mail = mysqli_real_escape_string($conn,$_POST["c_mail"]);
    $c_pass = mysqli_real_escape_string($conn, $_POST["c_pass"]);
    $c_city = mysqli_real_escape_string($conn,  $_POST["c_city"]);
    $c_country = mysqli_real_escape_string($conn, $_POST["c_country"]);
    $c_contact = mysqli_real_escape_string($conn, $_POST["c_contact"]);
    $c_addr = mysqli_real_escape_string($conn, $_POST["c_add"]);
    $c_ip = getRealIpUser();
    $c_image = $_FILES["c_image"]["name"];
    $c_image_tmp = $_FILES["c_image"]["tmp_name"];
   

    $check_mail = "SELECT * FROM customer WHERE customer_email = '$c_mail'";
    $run_check = mysqli_query($conn, $check_mail);
    $check = mysqli_num_rows($run_check);
    if($check > 0){
        echo '<script>alert("Email Exists")</script>';
        echo ' <script>window.open("customer_register.php", "_self")</script>';
    }else{
        move_uploaded_file($c_image_tmp, "images/customer-images/$c_image");


        $insert_customer = "INSERT INTO customer(customer_name, customer_email, customer_pass, customer_city, customer_country, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name', '$c_mail', '$c_pass', '$c_city', '$c_country', '$c_contact', '$c_addr', '$c_image', '$c_ip')";
        $run_insert = mysqli_query($conn, $insert_customer);
        if($run_insert){
            $sel_cart = "SELECT * FROM cart WHERE ip_add = '$c_ip'";
        $run_cart = mysqli_query($conn, $sel_cart);
        $check_cart = mysqli_num_rows($run_cart);
        if($check_cart > 0){
            $_SESSION["customer_email"] = $c_mail;
            echo '<script>alert("Congratulations '.$c_name.', You have been Registered Successfully")</script>';
           echo ' <script>window.open("checkout.php", "_self")</script>';
        }
        else{
           
            echo '<script>alert("Congratulations '.$c_name.', You have been Registered Successfully")</script>';
           echo ' <script>window.open("index.php", "_self")</script>';
        }
        }
        else{
            echo mysqli_error($conn);
        }
    }



   
}





?>