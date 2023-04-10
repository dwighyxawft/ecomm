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




    if(isset($_POST["add_cart"])){
        $ip_add = getRealIpUser();
        $p_id = $_GET["add_cart"];
        $product_qty = $_POST["product_qty"];
        $product_size = $_POST["product_size"];
        $check_product = "SELECT * FROM cart WHERE p_id = '$p_id' AND ip_add = '$ip_add'";
        $run_check = mysqli_query($db, $check_product);
        $check = mysqli_num_rows($run_check);
        if($check > 0){
            echo '<script>alert("The product has already been added");</script>';
            echo '<script>window.open("details.php?pro_id='.$p_id.'", "_self");</script>';
        }
        else{
            $query = "INSERT INTO cart(p_id, ip_add, qty, size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size')";
            $run_query = mysqli_query($db, $query);
            echo '<script>window.open("details.php?pro_id='.$p_id.'", "_self");</script>';

        }





}

?>