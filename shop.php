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
                <li>Shop</li>
            </ul>
        </div>
       <div class="row">
       <div class="col-md-3">
        <?php getPCats(); getCats(); ?>
        </div>
        <div class="col-md-9">
            <?php
             if(!isset($_GET["cat"]) && !isset($_GET["p_cat"])){
                echo '<div class="col-md-12 card col-sm-12">
                <h1 class="card-title ps-3 pt-1">Shop</h1>
                 <p class="card-text ps-3 pt-2 pb-2">Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet
                 </p>
                </div>';
            }
          
            ?>

           
           
        <div class="row">
      <?php
        if(!isset($_GET["cat"]) && !isset($_GET["p_cat"])){
                $per_page = 6;
                if(isset($_GET["page"])){
                    $page = $_GET["page"];

                }
                else{
                    $page = 1;
                }
                $start_from = ($page - 1) * $per_page;
                $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT $start_from, $per_page";
                $run_products = mysqli_query($conn, $get_products);
                while($row_products = mysqli_fetch_array($run_products)){
                    $pro_id = $row_products["product_id"];
                    $pro_title = $row_products["product_title"];
                    $pro_price = $row_products["product_price"];
                    $pro_img = $row_products["product_img1"];
                    echo ' <div class="col-md-4 col-sm-6 single">
                    <div class="product card border border-0">
                   <div class="card-body">
                   <a href="details.php?pro_id='.$pro_id.'">
                   <img src="images/product-images/'.$pro_img.'" alt="" style="height: 300px;" class="img-fluid card-img-top"></a></div>
                   <div class="card-text">
                   <h3 class="text-center pt-3">
                   <a href="details.php?pro_id='.$pro_id.'" style="text-decoration:none; color:black;">'.$pro_title.'</a>
                   </h3>
                   <p class="text-center pt-3">$'.$pro_price.'</p>
                   <p class="button text-center">
                   <a href="details.php?pro_id='.$pro_id.'" class="btn btn-default border border-1">View Details</a>
                   <a href="details.php?pro_id='.$pro_id.'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                   </p>
                   </div>
                        
                    </div>
                </div>
             
             ';
                }
            
        }
      
      ?>
        </div>
        <center>
           <ul class="pagination">
               <?php
               $per_page = 6;
               $sql = "SELECT * FROM products";
               $res = mysqli_query($conn, $sql);
               $rows = mysqli_num_rows($res);
               $avg_rows = ceil($rows/$per_page);

               echo '<li class="page-item"><a href="shop.php?page=1" class="page-link">First Page</a></li>';
               for($i = 1; $i<=$avg_rows;$i++ ){
                echo '<li class="page-item"><a href="shop.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
            }
            echo ' <li class="page-item"><a href="shop.php?page='.$avg_rows.'" class="page-link">Last Page</a></li>';
               ?>
             
               
               
               
              
            </ul>
           </center>
           <div class="row">
               <?php getCatsPro(); getcat();?>
           </div>
        </div>
       </div>
           
    </div>
</div>


<?php include ("includes/footer.php"); ?>
</body>
</html>