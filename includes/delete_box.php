<?php
include("db.php");
if(isset($_GET["delete_box"])){
    $delete_id = $_GET["delete_box"];
    $delete = "DELETE FROM boxes_section WHERE box_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("The Box has been deleted")</script>';
        echo '<script>window.open("index.php?view_boxes", "_self")</script>';
    }
}
else{
    echo '<script>window.open("index.php?view_boxes", "_self")</script>';
}







?>