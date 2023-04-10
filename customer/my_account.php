<?php
session_start();

if(!isset($_SESSION["customer_email"])){
    echo '<script>window.open("../checkout.php", "_self")</script>';
}
else{
    include("../includes/db.php");
    include("../functions/functions.php");



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="../../popper2.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
   
</head>
<body>
<div class="container-fluid bg-dark">
      <div class="container">
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a href="#" class="btn btn-success btn-sm navbar-brand"><?php
        if(!isset($_SESSION["customer_email"])){
            echo "Welcome: GUEST";
        }
        else{
            $mail = $_SESSION["customer_email"];
            $get_name = "SELECT * FROM customer WHERE customer_email = '$mail'";
            $run_name = mysqli_query($conn, $get_name);
            $row_name = mysqli_fetch_array($run_name);
            $name = $row_name["customer_name"];
            echo "Welcome: ". $name;
        }
        ?></a>
      
      
        <div class="collapse navbar-collapse">
        <ul class="menu navbar-nav ms-auto">
            <li class="nav-item"><a href="../customer_register.php" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="../customer/my_account.php" class="nav-link">My Account</a></li>
            <li class="nav-item"><a href="../cart.php" class="nav-link">Go To Cart</a></li>
            <li class="nav-item"><?php
                if(!isset($_SESSION["customer_email"])){
                    echo '<a href="../checkout.php" class="nav-link">Login Page</a>';
                }
                else{
                    echo '<a href="../logout.php" class="nav-link">Logout</a>';
                }
                ?></li>        


</ul>
        </div>
        <div class="offcanvas offcanvas-end navbar-offcanvas bg-dark text-light" id="canva">
        <ul class="menu mt-5 ms-5">
            <li class="nav-item"><a href="../customer_register.php" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="../customer/my_account.php" class="nav-link">My Account</a></li>
            <li class="nav-item"><a href="../cart.php" class="nav-link">Go To Cart</a></li>
            <li class="nav-item"><a href="../checkout.php" class="nav-link">Login Page</a></li>        


</ul>
        </div>

        </nav>
      </div>
       </div>
       
<div class="container-fluid bg-light">
    <div class="container">
        <nav class="navbar nav-tabs navbar-expand-md navbar-light">
            <h4 class="navbar-brand">ECOMM</h4>
            <button class="navbar-toggler me-auto" data-bs-toggle="collapse" data-bs-target="#canva2"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="canva2">
                <ul class="navbar-nav" id="nav-links">
                    <li class="nav-item"><a href="../index.php" class="nav-link">HOME</a></li>
                    <li class="nav-item"><a href="../shop.php" class="nav-link">SHOP</a></li>
                    <li class="nav-item"><a href="../customer/my_account.php" class="nav-link">MY ACCOUNT</a></li>
                    <li class="nav-item"><a href="../cart.php" class="nav-link">SHOPPING CART</a></li>
                    <li class="nav-item"><a href="../contact.php" class="nav-link">CONTACT US</a></li>
                </ul>
            </div>
            <div class="ms-auto">
                <span><button data-bs-toggle="collapse" data-bs-target="#formsearch" class="btn text-light"><i class="fa fa-search"></i></button></span>
                <span><button class="btn text-light"><i class="fa fa-shopping-cart"></i> <?php items();?> Items In Your Cart | Total Price: <?php total_price();?></button></span>
                
            </div>
            
            
        </nav>
        <div id="formsearch" class="collapse ms-auto w-25">
            <form action="#" method="GET" class="needs-validation">
                <div class="input-group">
                    <input type="text" name="name" class="form-control mt-3 mb-3">
                    <button type="submit" class="btn text-light mt-3 mb-3"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>









<div id="content">
    <div class="container">
        <div class="col-md-12 mt-3">
            <ul class="breadcrumb">
                <li class="padding-right: 3px;"><a style="text-decoration: none;" href="index.php">Home</a> </li>
                <li>My Account</li>
            </ul>
        </div>
        <div class="row">
       <div class="col-md-3">
        <?php include ("includes/sidebar.php"); ?>
        </div>

<div class="col-md-9">
    <div class="box mt-3 pt-4 mb-3 pb-4" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
    <?php
    if(isset($_GET["my_orders"])){
        include("my_orders.php");
    }
    elseif(isset($_GET["pay_offline"])){
        include("pay_offline.php");
    }
    elseif(isset($_GET["edit_account"])){
        include("edit_account.php");
    }
    elseif(isset($_GET["change_password"])){
        include("change_password.php");
    }
    elseif(isset($_GET["delete_account"])){
        include("delete_account.php");
    }
    else{
        include("my_orders.php");
    }
   
    
    
    ?>

</div>






        </div>
    </div>
</div>



<?php include ("../includes/footer.php"); ?>
</body>
</html>
<?php }?>