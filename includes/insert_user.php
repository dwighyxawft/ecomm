<?php
include("../includes/db.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="../../popper2.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../tinymce.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Insert Product</title>
</head>
<body>
   <div class="container-fluid">
   <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Insert User</li>
            </ol>
        </div>
    </div>
    <div class="row">
      <div class="w-75 mx-auto ">
      <div class="card border border-0">
            <div class="card-header">
                <h4 class="card-title text-center">
                    <i class="fa fa-money fa-fw"></i> Insert User
                </h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group form-inline">
                      <div class="row">
                      <label class="col-md-2 control-label"> Username</label>
                       <div class="col-md-7">
                           <input type="text" name="name" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                        <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"> User Email</label>
                        <div class="col-md-7">
                      <input type="email" name="email" id="" class="form-control" required>
                        </div>
                    </div>
                        </div>

                        <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Password </label>
                        <div class="col-md-7">
                       <input type="password" name="pass" id="" class="form-control" required>
                        </div>
                      </div>
                        </div>
                        <div class="form-group form-inline mt-2">
                     <div class="row">
                     <label class="col-md-2 control-label"> User Country</label>
                       <div class="col-md-7">
                           <input type="text" name="country" id="" class="form-control" required>
                       </div>
                     </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Contact</label>
                       <div class="col-md-7">
                           <input type="tel" name="contact" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> User Job</label>
                       <div class="col-md-7">
                           <input type="text" name="job" id="" class="form-control" required>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Image</label>
                       <div class="col-md-7">
                           <input type="file" name="image" id="" class="form-control" required>
                       </div>
                      </div>
                    </div>
                   
                 
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> User About</label>
                       <div class="col-md-7">
                           <textarea name="about" id="" cols="30" rows="8" class="form-control" required></textarea>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"></label>
                       <div class="col-md-7">
                          
                              <input type="submit" value="Insert User" class="btn btn-primary form-control" name="submit">
                          
                       </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
   </div>
  
   <!-- <script>tinymce.init({selector: 'textarea'});</script>-->
</body>
</html>


<?php
if(isset($_POST["submit"])){
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $mail = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn,  $_POST["pass"]);
    $country = mysqli_real_escape_string($conn,  $_POST["country"]);
    $contact = mysqli_real_escape_string($conn,  $_POST["contact"]);
    $job = mysqli_real_escape_string($conn,  $_POST["job"]);
    $about = mysqli_real_escape_string($conn,  $_POST["about"]);


    $image = $_FILES["image"]["name"];
   
    $img_tmp3 = $_FILES["image"]["tmp_name"];

    
    move_uploaded_file($img_tmp3, "images/admin/$image");

   $insert = "INSERT INTO admins (admin_name, admin_email, admin_pass, admin_image, admin_country, admin_about, admin_contact, admin_job) VALUES('$name', '$mail', '$pass', '$image', '$country', '$about', '$contact', '$job')";

    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
      echo '  <script>alert("User has been inserted successfully")</script>';
      echo '<script>window.open("index.php?view_user", "_self")</script>';
    }


}
   
   
    


?>