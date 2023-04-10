<?php
$db = mysqli_connect("localhost", "dwightxawft", "timilehin1.", "ecomm_store");
if(!$db){
    echo "Error in connecting to database ". mysqli_connect_error();
}



function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER["HTTP_X_REAL_IP"])): return $_SERVER["HTTP_X_REAL_IP"];
        case(!empty($_SERVER["HTTP_CLIENT_IP"])): return $_SERVER["HTTP_CLIENT_IP"];
        case(!empty($_SERVER["HTTP_X_FROWARDED_FOR"])): return $_SERVER["HTTP_X_FROWARDED_FOR"];
        default: return $_SERVER["REMOTE_ADDR"];

    }



}


function add_cart(){
    global $db;

    if(isset($_POST["add_cart"])){
        $ip_add = getRealIpUser();
        $p_id = $_GET["add_cart"];
        $product_qty = $_POST["product_qty"];
        $product_size = $_POST["product_size"];
        $check_product = "SELECT * FROM cart WHERE p_id = '$p_id' AND ip_add = '$ip_add'";
        $run_check = mysqli_query($db, $check_product);
        $check = mysqli_num_rows($run_check);
        if($check > 0){
            echo '<script>imap_alerts("The product has already been added");</script>';
            echo '<script>window.open("details.php?pro_id='.$p_id.'", "_self");</script>';
        }
        else{
            $query = "INSERT INTO cart(p_id, ip_add, qty, size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size')";
            $run_query = mysqli_query($db, $query);
            echo '<script>window.open("details.php?pro_id='.$p_id.'", "_self");</script>';

        }





}
}

function items(){
    global $db;
    $ip_add = getRealIpUser();
    $get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_items = mysqli_query($db, $get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;


}




function getPro(){
    global $db;

    $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db, $get_products);
    while ($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products["product_id"];
        $pro_title = $row_products["product_title"];
        $pro_price = $row_products["product_price"];
        $pro_img = $row_products["product_img1"];

       echo ' <div class="col-md-3 col-sm-6 single">
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




function getPCats(){
    global $db;


    $get_p_cats = "SELECT * FROM products_categories";
    $run_p_cats = mysqli_query($db, $get_p_cats);
    
    echo '    <div class="card sidebar-menu ccc">
    <div class="card-header">
        <h3 class="card-title">Products Categories</h3>
    </div>
    <div class="card-body">
        <ul class="list-group" style="list-style: none;">';
        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
            
        $p_cat_id = $row_p_cats["p_cat_id"];
        $p_cat_title = $row_p_cats["p_cat_title"];
            echo '<li class="nav-item"><a class="nav-link" href="shop.php?p_cat='.$p_cat_id.'">'.$p_cat_title.'</a></li>';
            
        }
        echo '</ul>
    </div>
</div>
';



   

}

function getCats(){
    global $db;


    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($db, $get_cats);


   echo ' <div class="card sidebar-menu mt-5 mb-5">
   <div class="card-header">
       <h3 class="card-title">Categories</h3>
   </div>
   <div class="card-body">
       <ul class="list-group" style="list-style: none;">';
          
           while($row_cats = mysqli_fetch_array($run_cats)){
            $cat_id = $row_cats["cat_id"];
            $cat_title = $row_cats["cat_title"];
            echo '<li class="nav-item"><a class="nav-link" href="shop.php?cat='.$cat_id.'">'.$cat_title.'</a></li>';
            
           }
     echo  '</ul>
   </div>
</div>
';

}

function getCatsPro(){
    global $db;

    if(isset($_GET["p_cat"])){
        $p_cat_id = $_GET["p_cat"];
        $get_p_cats = "SELECT * FROM products_categories WHERE p_cat_id = '$p_cat_id'";
        $run_p_cats = mysqli_query($db, $get_p_cats);
        $row_p_cats = mysqli_fetch_array($run_p_cats);
       
        $p_cat_title = $row_p_cats["p_cat_title"];
        $p_cat_desc = $row_p_cats["p_cat_desc"];
       


        $get_p_cat = "SELECT * FROM products WHERE p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);
        $num_p_cat = mysqli_num_rows($run_p_cat);
        if($num_p_cat == 0){
            echo '<div class="col-md-12 card col-sm-12">
            <h1 class="card-title ps-3 pt-1">No Products Found In This Category</h1>
           
            </div>';
        }
        else{
            echo '<div class="col-md-12 card col-sm-12">
            <h1 class="card-title ps-3 pt-1">'.$p_cat_title.'</h1>
             <p class="card-text ps-3 pt-2 pb-2">Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet
             </p>
            </div>';
        }
        while ($row_products = mysqli_fetch_array($run_p_cat)){
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
}



function getcat(){
    global $db;


   
    if(isset($_GET["cat"])){
        $cat = $_GET["cat"];

        $get_cat = "SELECT * FROM products WHERE cat_id = '$cat'";
        $run_cat = mysqli_query($db, $get_cat);

        $get_cats = "SELECT * FROM categories WHERE cat_id='$cat'";
        $run_cats = mysqli_query($db, $get_cats);


        $cat_rows = mysqli_fetch_array($run_cats);
        $cat_title = $cat_rows["cat_title"];


        $num_cat = mysqli_num_rows($run_cat);
        if($num_cat == 0){
            echo '<div class="col-md-12 card col-sm-12">
            <h1 class="card-title ps-3 pt-1">No Products Found In This Category</h1>
           
            </div>';
        }
        else{
            echo '<div class="col-md-12 card col-sm-12">
            <h1 class="card-title ps-3 pt-1">'.$cat_title.'</h1>
             <p class="card-text ps-3 pt-2 pb-2">Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet
             </p>
            </div>';
        }

       
        while($row_cats = mysqli_fetch_array($run_cat)){
            $pro_id = $row_cats["product_id"];
            $pro_title = $row_cats["product_title"];
            $pro_price = $row_cats["product_price"];
            $pro_img = $row_cats["product_img1"];
    
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
  
   
}

function total_price(){
    global $db;
    $ip_add = getRealIpUser();
    $total = 0;
    $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_cart = mysqli_query($db, $select_cart);

    while($row_cart = mysqli_fetch_array($run_cart)){
        $pro_id = $row_cart["p_id"];
        $pro_qty = $row_cart["qty"];
        $pro_size = $row_cart["size"];
        $get_price = "SELECT * FROM products WHERE product_id = '$pro_id'";
        $run_price = mysqli_query($db, $get_price);
        while($row_price = mysqli_fetch_array($run_price)){
            $pro_price = $row_price["product_price"];
            $sub_total = $pro_price * $pro_qty;
            $total += $sub_total;
        }

    }
    echo "$".$total;



}

?>
