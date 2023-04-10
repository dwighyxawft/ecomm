<?php
if(isset($_GET["edit_slide"])){
    $delete_id = $_GET["delete_slide"];
    $delete = "DELETE FROM slider WHERE slide_id = '$delete_id'";
    $run_delete = mysqli_query($conn, $delete);
    if($run_delete){
        echo '<script>alert("One of Your Products has been deleted")</script>';
        echo '<script>window.open("index.php?view_slides", "_self")</script>';
    }




}



?>