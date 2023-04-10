<?php
include("../includes/db.php");
if(isset($_GET["edit_user"])){
    $edit_id = $_GET["edit_user"];
    $get_user = "SELECT * FROM admins WHERE admin_id = '$edit_id'";
    $run = mysqli_query($conn, $get_user);
    $row = mysqli_fetch_array($run);

    $name = $row["admin_name"];
    $mail = $row["admin_email"];
    $pass = $row["admin_pass"];
    $job = $row["admin_job"];
    $country = $row["admin_country"];
    $contact = $row["admin_contact"];
    $image = $row["admin_image"];
    $about = $row["admin_about"];
    
}
else{
    echo '<script>window.open("edit_user.php?view_user", "_self")</script>';
}










?>

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
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / Edit User</li>
            </ol>
        </div>
    </div>
    <div class="row">
      <div class="w-75 mx-auto ">
      <div class="card border border-0">
            <div class="card-header">
                <h4 class="card-title text-center">
                    <i class="fa fa-money fa-fw"></i> Edit User
                </h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="edit_user_2.php?edit_user=<?php echo $edit_id;?>" class="form-horizontal">
                    <div class="form-group form-inline">
                      <div class="row">
                      <label class="col-md-2 control-label"> Username</label>
                       <div class="col-md-7">
                           <input type="text" name="name" id="" class="form-control" value="<?php echo $name;?>" required>
                       </div>
                      </div>
                    </div>
                        <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"> User Email</label>
                        <div class="col-md-7">
                      <input type="email" name="email" id="" class="form-control" value="<?php echo $mail;?>" required>
                        </div>
                    </div>
                        </div>

                        <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Password </label>
                        <div class="col-md-7">
                       <input type="password" name="pass" id="" class="form-control" value="<?php echo $pass;?>" required>
                        </div>
                      </div>
                        </div>
                        <div class="form-group form-inline mt-2">
                     <div class="row">
                     <label class="col-md-2 control-label"> User Country</label>
                       <div class="col-md-7">
                           <input type="text" name="country" id="" class="form-control" value="<?php echo $country;?>" required>
                       </div>
                     </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Contact</label>
                       <div class="col-md-7">
                           <input type="tel" name="contact" id="" class="form-control" value="<?php echo $contact;?>" required>
                       </div>
                      </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> User Job</label>
                       <div class="col-md-7">
                           <input type="text" name="job" id="" class="form-control" value="<?php echo $job;?>" required>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                      <div class="row">
                      <label class="col-md-2 control-label"> User Image</label>
                       <div class="col-md-7">
                           <input type="file" name="image" id="" class="form-control" required>
                           <img src="images/admin/<?php echo $image;?>" style="width: 100px; height: 100px;" alt="">
                       </div>
                      </div>
                    </div>
                   
                 
                    <div class="form-group form-inline mt-2">
                       <div class="row">
                       <label class="col-md-2 control-label"> User About</label>
                       <div class="col-md-7">
                           <textarea name="about" id="" cols="30" rows="8" class="form-control" required><?php echo $about;?></textarea>
                       </div>
                       </div>
                    </div>
                    <div class="form-group form-inline mt-2">
                    <div class="row">
                    <label class="col-md-2 control-label"></label>
                       <div class="col-md-7">
                          
                              <input type="submit" value="Insert Product" class="btn btn-primary form-control" name="submit">
                          
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


