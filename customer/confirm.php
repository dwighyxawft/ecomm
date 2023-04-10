<?php
session_start();

if(!isset($_SESSION["customer_email"])){
    echo '<script>window.open("../checkout.php", "_self")</script>';
}
else{
    include("../includes/db.php");
    include("../functions/functions.php");
    if(isset($_GET["order_id"])){
        $order_id = $_GET["order_id"];
    }


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
        <a href="#" class="btn btn-success btn-sm navbar-brand">Welcome</a>
      
      
        <div class="collapse navbar-collapse">
        <ul class="menu navbar-nav ms-auto">
            <li class="nav-item"><a href="../customer_register.php" class="nav-link">Register</a></li>
            <li class="nav-item"><a href="../customer/my_account.php" class="nav-link">My Account</a></li>
            <li class="nav-item"><a href="../cart.php" class="nav-link">Go To Cart</a></li>
            <li class="nav-item"><a href="../checkout.php" class="nav-link">Login Page</a></li>        


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
                <span><button class="btn text-light"><i class="fa fa-shopping-cart"></i> 4 Items In Your Cart</button></span>
                
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
  <div class="container">
  <h1 class="text-center">
       Please Confirm Your Payment
   </h1>
   <form action="confirm.php?update_id=<?php echo $order_id;?>" class="needs-validation" enctype="multipart/form-data" method="POST">

    <?php
    
    
    if(isset($_POST["confirm"])){
        $update_id = $_GET["update_id"];
        $invoice_no = $_POST["invoice_no"];
        $amt = $_POST["amt_sent"];
        $mode = $_POST["payment_mode"];
        $ref = $_POST["ref"];
        $code = $_POST["code"];
        $date = $_POST["date"];
        $complete = "Complete";



        $insert = "INSERT INTO payments(invoice_no, amount, payment_mode, ref_no, code, payment_date) VALUES('$invoice_no', '$amt', '$mode', '$ref', '$code', '$date')";
        $run_insert = mysqli_query($conn, $insert);
        $update_order = "UPDATE customer_orders SET order_status = '$complete' WHERE order_id = '$update_id'";
        $run_update = mysqli_query($conn, $update_order);
        $update_p_order = "UPDATE pending_orders SET order_status = '$complete' WHERE order_id = '$update_id'";
        $run_p_update = mysqli_query($conn, $update_p_order);
        $run_p_delete = "DELETE FROM pending_orders WHERE order_status = '$complete'";
        $delete_p = mysqli_query($conn, $run_p_delete);
        if($run_p_update){
            echo '<script>alert("Thanks for purchasing,  your orders will be processed within 24 hours")</script>';
            echo '<script>window.open("my_account.php?my_orders", "_self")</script>';
        }

       
    }
    
    
    
    
    
    
    ?>


    <div class="form-group mt-2">
        <label for="invoice">Invoice No:</label>
        <input type="text" name="invoice_no" class="form-control" required>
    </div>
    <div class="form-group mt-2">
    <label for="amt">Amount Sent:</label>
        <input type="text" name="amt_sent" class="form-control" required>
    </div>
    <div class="form-group mt-2">
    <label for="payment">Select Payment Mode</label>
        <select name="payment_mode" id="payment" class="form-control form-select">
            <option disabled>Select Payment Mode</option>
            <option value="Bank Code">Bank Code</option>
            <option value="UBL/Omni Paisa">UBL/Omni Paisa</option>
            <option value="Easy Paisa">Easy Paisa</option>
            <option value="Western Union">Western Union</option>


        </select>
    </div>
    <div class="form-group mt-2">
    <label for="ref">Transaction / Reference:</label>
        <input type="text" name="ref" class="form-control" required>
    </div>
    <div class="form-group mt-2">
    <label for="code">Omni Paisa / Easy Paisa:</label>
        <input type="text" name="code" class="form-control" required>
    </div>
    <div class="form-group mt-2">
    <label for="date">Payment Date</label>
        <input type="text" name="date" class="form-control" required>
    </div>
    <div class="text-center mt-2">
        <button class="btn-lg btn-primary" name="confirm"><i class="fa fa-user-md"></i>Confirm Payment</button>
    </div>


   </form>
   
  </div>

</div>






        </div>
    </div>
</div>



<?php include ("../includes/footer.php"); ?>
</body>
</html>
<?php }?>