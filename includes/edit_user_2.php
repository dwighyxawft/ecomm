<?php
if(isset($_POST["submit"])){
   if(isset($_GET["edit_user"])){
       $edit_id = $_GET["edit_user"];
       $name = mysqli_real_escape_string($conn, $_POST["name"]);
       $mail = mysqli_real_escape_string($conn, $_POST["email"]);
       $pass = mysqli_real_escape_string($conn,  $_POST["pass"]);
       $country = mysqli_real_escape_string($conn,  $_POST["country"]);
       $contact = mysqli_real_escape_string($conn,  $_POST["contact"]);
       $job = mysqli_real_escape_string($conn,  $_POST["job"]);
       $about = mysqli_real_escape_string($conn,  $_POST["about"]);
   
   
       $image = $_FILES["image"]["name"];
      
       $img_tmp3 = $_FILES["image"]["tmp_name"];
   
       
       move_uploaded_file($img_tmp3, "images/admin/image");
   
      $insert = "UPDATE admins SET admin_name = '$name', admin_email = '$mail', admin_pass = '$pass', admin_country = '$country', admin_contact = '$contact', admin_job = '$job', admin_about = '$about' WHERE admin_id = '$edit_id'";
   
       $run_insert = mysqli_query($conn, $insert);
       if($run_insert){
         echo '  <script>alert("User has been updated successfully")</script>';
         echo '<script>window.open("edit_user.php?edit_user='.$edit_id.'", "_self")</script>';
       }
   
   }
   else{
    echo '<script>window.open("edit_user.php?view_user", "_self")</script>';
   }

}
   
   
    


?>