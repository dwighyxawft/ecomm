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
    <style>
        a{
            text-decoration: none;
        }
        #content #cart .table tbody tr td img{
    width: 50px;
}
    </style>
</head>
<body>
<?php include ("includes/header.php"); ?>
<div id="content">
    <div class="container">
      <div class="row">
      <div class="col-md-12 mt-3">
            <ul class="breadcrumb">
                <li class="padding-right: 3px;"><a style="text-decoration: none;" href="index.php">Home</a> </li>
                <li>Cart</li>
            </ul>
        </div>

        <div id="cart" class="col-md-9">
            <div class="box mt-3 pt-2 mb-3 ps-3" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
                <form action="cart.php" class="needs-validation" method="POST" enctype="multipart/form-data">
                    <h1>Shopping Cart</h1>

                    <?php
                    $ip_add = getRealIpUser();
                    $connect_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
                    $run_cart = mysqli_query($conn, $connect_cart);
                    $count = mysqli_num_rows($run_cart);

                    
                    ?>
                    <p class="text-muted">You currently have <?php echo $count;?> item(s) in your cart</p>

                        <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Size</th>
                                            <th colspan="1">Delete</th>
                                            <th colspan="2">Sub-Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total = 0;
                                        while($row_cart = mysqli_fetch_array($run_cart)){
                                            $p_id = $row_cart["p_id"];
                                            $pro_qty = $row_cart["qty"];
                                            $pro_size = $row_cart["size"];
                                            $select_product = "SELECT * FROM products WHERE product_id = '$p_id'";
                                            $run_product = mysqli_query($conn, $select_product);
                                            while($row_product = mysqli_fetch_array($run_product)){
                                                $product_price = $row_product["product_price"];
                                                $product_title = $row_product["product_title"];
                                                $product_img1 = $row_product["product_img1"];
                                                $subtotal = $product_price * $pro_qty;
                                                $total+= $subtotal;
                                            

                                        
                                        
                                        ?>
                                        <tr>
                                            <td>
                                            <img src="images/product-images/<?php echo $product_img1;?>" class="img-fluid" alt="">
                                            </td>
                                            <td>
                                                <a href="#"><?php echo $product_title;?></a>
                                            </td>
                                            <td><p class="text-center"><?php echo $pro_qty;?></p></td>
                                            <td><p class="text-center">$<?php echo $product_price;?></p></td>
                                            <td><p class="text-center"><?php echo $pro_size;?></p></td>
                                            <td><input type="checkbox" name="remove[]" value="<?php echo $p_id;?>"></td>
                                            <td><p class="text-center">$<?php echo $subtotal;?></p></td>
                                        </tr>
                                       
                                        <?php
                                    }
                                }
                                ?>
                                    </tbody>
                                   
                                    <tfoot>
                                        <tr>
                                           <th colspan="5">Total</th>
                                           <th colspan="2"><p class="text-center">$<?php echo $total;?></p></th>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><p class="text-start"> <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a></p></td>
                                <td colspan="5"><p class="text-end">
                              
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Update Cart
                                    </button>
                                    <a href="checkout.php" class="btn btn-primary">Proceed Checkout <i class="fa fa-chevron-right"></i></a>
                                   
                                </p></td>
                                        </tr>
                                    </tfoot>

                            </table>
                        </div>


                </form>
            </div>
           


                            <?php 
                            function update_cart(){
                                global $conn;
                                if(isset($_POST["update"])){
                                    foreach($_POST["remove"] as $remove_id){
                                        $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";
                                        $run_delete = mysqli_query($conn, $delete_product);
                                        if($run_delete){
                                            echo '<script>window.open("cart.php", "_self");</script>';
                                        }


                                    }
                                }



                            }
                            echo $update_cart = update_cart();
                            ?>
            
            <div class="col-md-12 mb-5">
                        <div class="row">
                            <div class="col-md-3 card border-0 border pt-5">
                                <h4 class="card-title text-center">Products That You Maybe Like</h4>
                            </div>
                            <?php
                            
                            $get_products = "SELECT * FROM products ORDER BY rand() DESC LIMIT 0,3";
                            $run_products = mysqli_query($conn, $get_products);
                            while($row_products = mysqli_fetch_array($run_products)){
                                $p_img = $row_products["product_img1"];
                                $p_title = $row_products["product_title"];
                                $p_price = $row_products["product_price"];
                                $pro_id = $row_products["product_id"];
                                echo '   <div class="col-md-3 card border-0 border">
                                <div class="product"><a href="details.php?pro_id='.$pro_id.'">
                        <img src="images/product-images/'.$p_img.'" style="height: 200px" alt="" class="img-fluid">
                    </a>
                <div class="text">
                    <h3 class="text-center pt-3"><a href="details.php?pro_id='.$pro_id.'" style="text-decoration: none;" class="text-dark">'.$p_title.'</a></h3>
                    <p class="price text-center">$'.$p_price.'</p>
                  
                </div></div>
                                </div>';
                            }
                            ?>
                         
                   
                        </div>
                </div>






        </div>
    <div class="col-md-3">
            <div id="order-summary" class="box mt-3 pt-2 mb-3 ps-3" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
                <div class="box-header">
                    <h3>Order Summary</h3>
                </div>
                <p class="text-muted">
                    Shipping and Additional Costs are calculated based on the value you have entered
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><p class="text-start">Order Sub-Total</p></td>
                                <th>$<?php echo $total;?></th>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text-start">Shipping and Handling</p>
                                </td>
                                <td>
                                    <p class="text-center">$0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="text-start">Tax</p>
                                </td>
                                <td>
                                    <p class="text-center">$0</p>
                                </td>
                            </tr>



                        </tbody>
                        <tfoot>
                            <tr><td><p class="text-start">Total</p></td>
                        <td><p class="text-center">$<?php echo $total;?></p></td></tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>









      </div>
   
   
    </div>
</div>







        <?php include ("includes/footer.php"); ?>
</body>
</html>





