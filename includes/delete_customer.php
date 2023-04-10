<?php
include("db.php");
if(isset($_GET["delete_customer"])){
    $delete_id = $_GET["delete_customer"];
    $delete = "DELETE FROM customer WHERE customer_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The Customer has been deleted")</script>';
        echo '<script>window.open("index.php?view_customers", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_customers", "_self")</script>';
}







?>