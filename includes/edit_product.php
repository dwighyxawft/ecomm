<?php
include("../includes/db.php");

if(isset($_GET["edit_product"])){
    $edit_id = $_GET["edit_product"];
    $get_prod = "SELECT * FROM products WHERE product_id = '$edit_id'";
    $run_prod = mysqli_query($conn, $get_prod);
    $row_prod = mysqli_fetch_array($run_prod);
    $prod_title = $row_prod["product_title"];
    $prod_img1 = $row_prod["product_img1"];
    $prod_img2 = $row_prod["product_img2"];
    $prod_img3 = $row_prod["product_img3"];
    $prod_price = $row_prod["product_price"];
    $prod_key = $row_prod["product_keywords"];
    $prod_desc = $row_prod["product_desc"];

}




?>


   <div class="container-fluid">
   <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit Product</li>
            </ol>
        </div>
    </div>
    <div class="row">
      <div class="w-75 mx-auto ">
      <div class="card border border-0">
            <div class="card-header">
                <h4 class="card-title text-center">
                    <i class="fa fa-money fa-fw"></i> Edit Product
                </h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="edit.php?edit_product=<?php echo $edit_id;?>">
                    <div class="form-group form-inline">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Title</label>
                       <div class="col-md-7">
                           <input type="text" name="product_title" id="" value="<?php echo $prod_title;?>" class="form-control" required>
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
                           <input type="file" name="product_img1" id=""  value="<?php echo $prod_img1;?>"  class="form-control" required>
                           <img src="../images/product-images/<?php echo $prod_img1;?>" style="width: 70px; height: 70px;" alt="" class="img-fluid">
                       </div>
                     </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Image 2</label>
                       <div class="col-md-7">
                           <input type="file" name="product_img2" id=""  value="<?php echo $prod_img2;?>"  class="form-control" required>
                           <img src="../images/product-images/<?php echo $prod_img2;?>"  style="width: 70px; height: 70px;" alt="" class="img-fluid">
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Image 3</label>
                       <div class="col-md-7">
                           <input type="file" name="product_img3" id=""  value="<?php echo $prod_img3;?>"  class="form-control" required>
                           <img src="../images/product-images/<?php echo $prod_img3;?>"  style="width: 70px; height: 70px;" alt="" class="img-fluid">
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> Product Price</label>
                       <div class="col-md-7">
                           <input type="number" name="product_price" id=""  value="<?php echo $prod_price;?>" class="form-control" required>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> Product Keyword</label>
                       <div class="col-md-7">
                           <input type="text" name="product_keyword" id=""  value="<?php echo $prod_key;?>" class="form-control" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> Product Desc</label>
                       <div class="col-md-7">
                           <textarea name="product_desc" id="" cols="30" rows="8" class="form-control" required><?php echo $prod_desc;?></textarea>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"></label>
                       <div class="col-md-7">
                          
                              <input type="submit" value="Update Product" class="btn btn-primary form-control" name="submit">
                          
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


