<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Slides
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
   <div class="row">
   <?php
                        $get_cat = "SELECT * FROM slider";
                        $run_cat = mysqli_query($conn, $get_cat);
                        while($row = mysqli_fetch_array($run_cat)){
                            $slide_id = $row["slide_id"];
                            $slide_name = $row["slide_name"];
                            $slide_image = $row["slide_images"];
                        
                       
                      
                        
                       
                        
                        ?>
     <div class="col-lg-3">
     <div class="card">
      
      <div class="card-header">
          <h3 class="card-title"><i class="fa fa-fw fa-money"></i> <?php echo $slide_name;?></h3>
      </div>
      <div class="card-body">
        <img src="../images/slide-images/<?php echo $slide_image;?>" alt="" class="img-fluid">
      </div>
      <div class="card-footer">
      <a href="index.php?edit_slide=<?php echo $slide_id;?>" class="btn btn-primary pull-left"> <i class="fa fa-pencil"></i> Edit</a>
      <a href="index.php?delete_slide=<?php echo $slide_id;?>" class="btn btn-danger pull-right"> <i class="fa fa-trash"></i> Delete</a>
      </div>
  </div>
     </div>
  <?php  } ?>
   </div>
    </div>
</div>