<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../fontawesome/js/fontawesome.min.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../popper2.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>ECOMM</title>
</head>
<body>
<?php include ("includes/header.php"); ?>

<div class="container" id="slider">
<div class="row">
<div class="col-md-12">
    <div class="carousel slide" id="mycaro" data-bs-ride="carousel">
    <ul class="carousel-indicators">
    <li data-bs-target="#mycaro" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#mycaro" data-bs-slide-to="1"></li>
    <li data-bs-target="#mycaro" data-bs-slide-to="2"></li>
    <li data-bs-target="#mycaro" data-bs-slide-to="3"></li>

    

    </ul>
    <div class="carousel-inner">
      <?php
      $slide_sql = "SELECT * FROM slider LIMIT 0,1";
      $slide_run = mysqli_query($conn, $slide_sql);
      while($slide_row=mysqli_fetch_array($slide_run)){
          $slide_name = $slide_row["slide_name"];
          $slide_image = $slide_row["slide_images"];
          $slide_url = $slide_row["slide_url"];
         echo ' <div class="carousel-item active">
         <a href="'.$slide_url.'"> <img src="images/slide-images/'.$slide_image.' " alt=""></a>
        
         </div>';
      }


      $slide_sql2 = "SELECT * FROM slider LIMIT 1,3";
      $slide_run2 = mysqli_query($conn, $slide_sql2);
      while($slide_row2=mysqli_fetch_array($slide_run2)){
          $slide_name2 = $slide_row2["slide_name"];
          $slide_image2 = $slide_row2["slide_images"];
          $slide_url2 = $slide_row2["slide_url"];
         echo ' <div class="carousel-item">
         <a href="'.$slide_url2.'">
         <img src="images/slide-images/'.$slide_image2.' " alt=""></a>
         </div>';
      }
     
      ?>
    </div>
    
    <button class="carousel-control-prev lbt" data-bs-target="#mycaro" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
    <button class="carousel-control-next lbt" data-bs-slide="next"  data-bs-target="#mycaro"><span class="carousel-control-next-icon"></span></button>

    </div>    




    </div>
</div>




</div>
<div class="container mt-4 cont3">
    <div class="row">
   
          <?php
          $get_box = "SELECT * FROM boxes_section";
          $run_box = mysqli_query($conn, $get_box);
          while($row_box = mysqli_fetch_array($run_box)){
            $box_id = $row_box["box_id"];
            $box_title = $row_box["box_title"];
            $box_desc = $row_box["box_desc"];
          
          
          
          
          
          
          
          ?>
        <div class="col-md-4 col-sm-12 mt-4"><div class="card">
            <div class="card-body">
                <h4 class="card-title text-center text-uppercase text-info"><a href="#" style="text-decoration: none; color: black;"><?php echo $box_title;?></a></h4>
                <p class="card-text text-center"><?php echo $box_desc;?></p>
            </div>
        </div></div> <?php } ?>
    </div>
</div>
         
     
<div class="container-fluid bg-light mt-5 cont4">
    <h4 class="text-center text-info pt-5 pb-5">OUR LATEST PRODUCTS</h4>
</div>
  
<div class="container mt-5 mb-5">
    <div class="row">
      <?php
      getPro();
      
      ?>

    </div>
    
</div>

<?php include ("includes/footer.php"); ?>


</body>
</html>