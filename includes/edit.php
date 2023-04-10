<?php
include("../includes/db.php");
if(isset($_POST["submit"])){
    $edit_id = $_GET["edit_product"];
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
    move_uploaded_file($img_tmp2, "../images/product-images/$product_img3");
    
    $update = "UPDATE products SET p_cat_id = '$product_cat', cat_id = '$cat', date = NOW(), product_title = '$product_title', product_img1 = '$product_img1', product_img2 = '$product_img2', product_img3 = '$product_img3', product_price = '$product_price', product_keywords = '$product_keyword', product_desc = '$product_desc' WHERE product_id = '$edit_id'";
    $run_update = mysqli_query($conn, $update);
    if($run_update){
      echo '  <script>alert("Product has been updated successfully")</script>';
      echo '<script>window.open("index.php?edit_product='.$edit_id.'", "_self")</script>';
    }
    else{
        echo mysqli_error($conn);
    }
    


}
    
    
    


?>