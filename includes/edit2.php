<?php
include("db.php");

if(isset($_POST["submit"])){
    if(isset($_GET["edit_p_cat"])){
        $edit_id = $_GET["edit_p_cat"];
    $p_cat_title = mysqli_real_escape_string($conn, $_POST["p_cat_title"]);
    $p_cat_desc = mysqli_real_escape_string($conn, $_POST["p_cat_desc"]);


   
    $update = "UPDATE products_categories SET p_cat_title = '$p_cat_title', p_cat_desc = '$p_cat_desc' WHERE p_cat_id = '$edit_id'";
    $run_update = mysqli_query($conn, $update);
    if($run_update){
        echo '<script>alert("The Product Category has been updated")</script>';
        echo '<script>window.open("index.php?edit_p_cat='.$edit_id.'", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }
    }



}?>