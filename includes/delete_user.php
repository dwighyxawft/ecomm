<?php
include("db.php");
if(isset($_GET["delete_user"])){
    $delete_id = $_GET["delete_user"];
    $delete = "DELETE FROM admins WHERE admin_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The User Details has been deleted")</script>';
        echo '<script>window.open("index.php?view_user", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_user", "_self")</script>';
}







?>