<?php
include("../includes/db.php");?>

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
    <script src="../../tinymce.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Insert Product</title>
</head>
<body>
   <div class="container-fluid">
   <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Insert Product</li>
            </ol>
        </div>
    </div>
    <div class="row">
      <div class="w-75 mx-auto ">
      <div class="card border border-0">
            <div class="card-header">
                <h4 class="card-title text-center">
                    <i class="fa fa-money fa-fw"></i> Insert Product
                </h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group form-inline">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Title</label>
                       <div class="col-md-7">
                           <input type="text" name="product_title" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                        <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"> Product Category</label>
                        <div class="col-md-7">
                        <select name="product_cat" id="" class="form-control form-select">
                            <option disabled>Select A Product Category</option>
                            <?php
                            $get_p_cat = "SELECT * FROM products_categories";
                            $run_p_cat = mysqli_query($conn, $get_p_cat);
                            while($row_p_cat = mysqli_fetch_array($run_p_cat)){
                                $p_cat_id = $row_p_cat["p_cat_id"];
                                $p_cat_title = $row_p_cat["p_cat_title"];
                               echo ' <option value="'.$p_cat_id.'">'.$p_cat_title.'</option>';
                            }
                            
                            
                            
                            ?>

                        </select>
                        </div>
                    </div>
                        </div>

                        <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Category </label>
                        <div class="col-md-7">
                        <select name="cat" id="" class="form-control form-select">
                            <option disabled>Select A Category</option>
                            <?php
                            $get_cat = "SELECT * FROM categories";
                            $run_cat = mysqli_query($conn, $get_cat);
                            while($row_cat = mysqli_fetch_array($run_cat)){
                                $cat_id = $row_cat["cat_id"];
                                $cat_title = $row_cat["cat_title"];
                               echo ' <option value="'.$cat_id.'">'.$cat_title.'</option>';
                            }
                            
                            
                            
                            ?>

                        </select>
                        </div>
                      </div>
                        </div>
                        <div class="form-group form-inline mt-2">
                     <div class="row">
                     <label class="col-md-2 control-label"> Product Image 1</label>
                       <div class="col-md-7">
                           <input type="file" name="product_img1" id="" class="form-control" required>
                       </div>
                     </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Image 2</label>
                       <div class="col-md-7">
                           <input type="file" name="product_img2" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Image 3</label>
                       <div class="col-md-7">
                           <input type="file" name="product_img3" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> Product Price</label>
                       <div class="col-md-7">
                           <input type="number" name="product_price" id="" class="form-control" required>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Keyword</label>
                       <div class="col-md-7">
                           <input type="text" name="product_keyword" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> Product Desc</label>
                       <div class="col-md-7">
                           <textarea name="product_desc" id="" cols="30" rows="8" class="form-control" required></textarea>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"></label>
                       <div class="col-md-7">
                          
                              <input type="submit" value="Insert Product" class="btn btn-primary form-control" name="submit">
                          
                       </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
   </div>
  
   <!-- <script>tinymce.init({selector: 'textarea'});</script>-->
</body>
</html>


<?php
if(isset($_POST["submit"])){
    $product_title = mysqli_real_escape_string($conn, $_POST["product_title"]);
    $product_cat = mysqli_real_escape_string($conn, $_POST["product_cat"]);
    $cat = mysqli_real_escape_string($conn,  $_POST["cat"]);
    $product_price = mysqli_real_escape_string($conn,  $_POST["product_price"]);
    $product_keyword = mysqli_real_escape_string($conn,  $_POST["product_keyword"]);
    $product_desc = mysqli_real_escape_string($conn,  $_POST["product_desc"]);


    $product_img1 = $_FILES["product_img1"]["name"];
    $product_img2 = $_FILES["product_img2"]["name"];
    $product_img3 = $_FILES["product_img3"]["name"];

    $img_tmp1 = $_FILES["product_img1"]["tmp_name"];
    $img_tmp2 = $_FILES["product_img2"]["tmp_name"];
    $img_tmp3 = $_FILES["product_img3"]["tmp_name"];

    move_uploaded_file($img_tmp1, "../images/product-images/$product_img1");
    move_uploaded_file($img_tmp2, "../images/product-images/$product_img2");
    move_uploaded_file($img_tmp3, "../images/product-images/$product_img3");

    $insert = "INSERT INTO products(p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keywords) VALUES('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keyword')";

    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
      echo '  <script>alert("Product has been inserted successfully")</script>';
      echo '<script>window.open("insert_product.php", "_self")</script>';
    }


}
   
   
    


?>