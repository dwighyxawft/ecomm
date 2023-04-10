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
        
<?php

        if(!isset($_SESSION["customer_email"])){
            include("customer/customer_login.php");
        }
        else{
            include("payment_options.php");
        }

    
    ?>



        
        </div>





    </div>
</div>




<?php include ("includes/footer.php"); ?>
</body>
</html>




