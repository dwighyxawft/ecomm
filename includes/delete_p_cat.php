<?php
include("db.php");
if(isset($_GET["delete_p_cat"])){
    $delete_id = $_GET["delete_p_cat"];
    $delete = "DELETE FROM products_categories WHERE p_cat_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The Product Category has been deleted")</script>';
        echo '<script>window.open("index.php?view_p_cat", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_p_cat", "_self")</script>';
}







?>