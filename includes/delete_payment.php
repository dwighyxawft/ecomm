<?php
include("db.php");
if(isset($_GET["delete_payment"])){
    $delete_id = $_GET["delete_payment"];
    $delete = "DELETE FROM payments WHERE payment_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The Payment Details has been deleted")</script>';
        echo '<script>window.open("index.php?view_payments", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_payments", "_self")</script>';
}







?>