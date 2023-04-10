<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


if(isset($_GET["pro_id"])){
    $pro_id = $_GET["pro_id"];
    $sql = "SELECT * FROM products WHERE product_id = '$pro_id'";
    $run_sql = mysqli_query($conn, $sql);
       $row = mysqli_fetch_array($run_sql);
       $p_cat_id = $row["p_cat_id"];
       $product_price = $row["product_price"];
       $product_desc = $row["product_desc"];
       $product_title = $row["product_title"];

       $get_p_cat = "SELECT * FROM products_categories WHERE p_cat_id='$p_cat_id'";
       $run_p_cat = mysqli_query($conn, $get_p_cat);
       while($row_p_cat = mysqli_fetch_array($run_p_cat)){
        $p_cat_title = $row_p_cat["p_cat_title"];
       }
   
}


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
                <li>Shop</li>
                <li><a style="text-decoration: none;" href="<?php echo 'shop.php?p_cat='.$p_cat_id.'';?>"><?php echo $p_cat_title; ?></a></li>
                <li><?php echo $product_title; ?></li>
            </ul>
        </div>
   
       <div class="row">

       <div class="col-md-3">
        <?php include ("includes/sidebar.php"); ?>
        </div>

        <div class="col-md-9">
            <div id="productMain" class="row">
                <div class="col-sm-6">
                    <div class="mainImage">
                        <div class="carousel slide" id="slides" data-bs-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-bs-target="#slides" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#slides" data-bs-slide-to="1"></li>
                                <li data-bs-target="#slides" data-bs-slide-to="2"></li>
                            </ul>

                            <div class="carousel-inner">
                                <?php
                                $product_img1 = $row["product_img1"];
                                $product_img2 = $row["product_img2"];
                                $product_img3 = $row["product_img3"];
                                

                                echo ' <div class="carousel-item active"><img height="350px" src="images/product-images/'.$product_img1.'" alt=""></div>';
                                echo '<div class="carousel-item"><img height="350px" src="images/product-images/'.$product_img2.'" alt=""></div>';
                                echo '<div class="carousel-item"><img height="350px" src="images/product-images/'.$product_img3.'" alt=""></div>';
                                ?>
                               
                                
                               
                            </div>
                            <a href="#slides" class="carousel-control-prev" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                            <a href="#slides" class="carousel-control-next" data-bs-slide="next"><span class="carousel-control-next-icon"></span></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="box ps-3 mb-5" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
                        <h1 class="text-center pt-4"><?php echo $product_title;?></h1>
                        <form action="<?php echo 'add_cart.php?add_cart='.$pro_id.''?>" method="POST" class="form-inline">
                            <div class="form-group"><label for="quantity" class="col-md-5 form-label">Products Quantity</label>
                        
                            <div class="col-md-7">
                                <select name="product_qty" id="quantity" class="form-control form-select">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>

                            </div>
                        
                        </div>
                      <div class="form-group">
                          <label for="size" class="form-label">Product Size</label>

                          <div class="col-md-7">
                          <select name="product_size" id="size" class="form-control form-select" oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick at least 1 size')">
                                    <option disabled>Select A Size</option>
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                   
                                </select>
                          </div>
                      </div>

                      <p class="price pt-3 text-center">$<?php echo $product_price;?></p>
                   <p class="text-center pb-5"> <button type="submit" class="btn btn-info mx-auto text-light" name="add_cart"><i class="fa fa-shopping-cart"> Add To Cart</i></button></p>
                        </form>
                    </div>
                    <div class="box">
                        <div class="row" id="thumbs">
                            <?php 
                            echo ' <div class="col-sm-4"><a href="#"><img src="images/product-images/'.$product_img1.'" alt="" class="img-fluid"></a></div>';
                            echo ' <div class="col-sm-4"><a href="#"><img src="images/product-images/'.$product_img2.'" alt="" class="img-fluid"></a></div>';
                            echo ' <div class="col-sm-4"><a href="#"><img src="images/product-images/'.$product_img3.'" alt="" class="img-fluid"></a></div>';
                            
                            
                            ?>
                        </div>


                    </div>
                </div>

                <div class="col-md-12 mb-3">
    <div class="row" id="productMain">
        <div class="box ps-3" id="details" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
    <h4><?php echo $product_title; ?></h4>
    <p>Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet. </p>

    <h4>Size</h4>
    <ul>
        <li>Small</li>
        <li>Medium</li>
        <li>Large</li>
    </ul>

        </div>
    </div>


                </div>

                <div class="col-md-12 mb-5">
                        <div class="row">
                        <div class="col-md-3 card border-0 border pt-5">
                                <h4 class="card-title text-center">Products That You Maybe Like</h4>
                            </div>
                            <?php
                            $get_cat = "SELECT * FROM products WHERE p_cat_id = '$p_cat_id' ORDER BY 1 DESC LIMIT 0,3";
                            $run_cat = mysqli_query($conn, $get_cat);
                           if($run_cat){
                            while($row_cat = mysqli_fetch_array($run_cat)){
                                $product_id = $row_cat["product_id"];
                                $pro_img1 = $row_cat["product_img1"];
                                $pro_price = $row_cat["product_price"];
                                $pro_title = $row_cat["product_title"];
                               

                                echo '
                            <div class="col-md-3 card border-0 border">
                            <div class="product"><a href="details.php?pro_id='.$product_id.'">
                    <img src="images/product-images/'.$pro_img1.'" style="height: 200px" alt="" class="img-fluid">
                </a>
            <div class="text">
                <h3 class="text-center pt-3"><a href="details.php?pro_id='.$product_id.'" style="text-decoration: none;" class="text-dark">'.$pro_title.'</a></h3>
                <p class="price text-center">$'.$pro_price.'</p>
              
            </div></div>
                            </div>';
                            }
                           }
                           else{
                               echo mysqli_error($conn);
                           }
                            
                            ?>
                           
                        </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>



            </div>
        </div>



       <div class="container-fluid">
       <?php include ("includes/footer.php"); ?>
       </div>

    








</body>
</html>