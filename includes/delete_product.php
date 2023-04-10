<?php

if(isset($_GET["delete_product"])){
    $delete_id = $_GET["delete_product"];
    $delete = "DELETE FROM products WHERE product_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("One of Your Products has been deleted")</script>';
        echo '<script>window.open("index.php?view_product", "_self")</script>';
    }
}




?>