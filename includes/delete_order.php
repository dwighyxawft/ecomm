<?php
include("db.php");
if(isset($_GET["delete_order"])){
    $delete_id = $_GET["delete_order"];
    $delete = "DELETE FROM pending_orders WHERE order_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The Order has been deleted")</script>';
        echo '<script>window.open("index.php?view_orders", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_orders", "_self")</script>';
}







?>