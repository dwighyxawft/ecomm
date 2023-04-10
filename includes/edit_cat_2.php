<?php
include("db.php");

if(isset($_POST["submit"])){
    if(isset($_GET["edit_cat"])){
        $edit_id = $_GET["edit_cat"];
    $cat_title = mysqli_real_escape_string($conn, $_POST["cat_title"]);
    $cat_desc = mysqli_real_escape_string($conn, $_POST["cat_desc"]);


   
    $update = "UPDATE categories SET cat_title = '$cat_title', cat_desc = '$cat_desc' WHERE cat_id = '$edit_id'";
    $run_update = mysqli_query($conn, $update);
    if($run_update){
        echo '<script>alert("The Category has been updated")</script>';
        echo '<script>window.open("index.php?edit_cat='.$edit_id.'", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }
    }



}?>