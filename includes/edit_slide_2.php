<?php
include("db.php");
if(isset($_POST["submit"])){
    if(isset($_GET["edit_slide"])){
        $edit_id = $_GET["edit_slide"];
    $slide_name = mysqli_real_escape_string($conn, $_POST["slide_name"]);
    $slide_url = mysqli_real_escape_string($conn, $_POST["slide_url"]);
    $slide_images = $_FILES["slide_images"]["name"];
    $tmp_name = $_FILES["slide_images"]["tmp_name"];
   

 
    move_uploaded_file($tmp_name, "../images/slide-images/$slide_images");


    $insert = "UPDATE slider SET slide_name = '$slide_name', slide_image = '$slide_image', slide_url = '$slide_url' WHERE slide_id = '$edit_id'";
    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
        echo '<script>alert("The Slide has been added")</script>';
        echo '<script>window.open("index.php?view_slides", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }
}


 

}

?>