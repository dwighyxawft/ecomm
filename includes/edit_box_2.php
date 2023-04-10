<?php
if(isset($_POST["submit"])){
    if(isset($_GET["edit_box"])){
        $edit_id = $_GET["edit_box"];
    
    $box_title = mysqli_real_escape_string($conn, $_POST["box_title"]);
    $box_desc = mysqli_real_escape_string($conn, $_POST["box_desc"]);
  
   


    $insert = "UPDATE boxes_section SET box_title = '$box_title', box_desc = '$box_desc' WHERE box_id = '$edit_id'";
    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
        echo '<script>alert("The Box has been added")</script>';
        echo '<script>window.open("index.php?view_boxes", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }

}
 


}

?>