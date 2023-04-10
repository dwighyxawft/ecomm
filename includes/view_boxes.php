<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
   <div class="row">
   <?php
                        $get_cat = "SELECT * FROM boxes_section";
                        $run_cat = mysqli_query($conn, $get_cat);
                        while($row = mysqli_fetch_array($run_cat)){
                            $box_id = $row["box_id"];
                            $box_title = $row["box_title"];
                            $box_desc = $row["box_desc"];
                        
                       
                      
                        
                       
                        
                        ?>
     <div class="col-lg-3">
     <div class="card">
      
      <div class="card-header">
          <h3 class="card-title"><i class="fa fa-fw fa-money"></i> <?php echo $box_title;?></h3>
      </div>
      <div class="card-body">
        <p class="card-text text-center"><?php echo $box_desc;?></p>
      </div>
      <div class="card-footer">
      <a href="index.php?edit_box=<?php echo $box_id;?>" class="btn btn-primary pull-left"> <i class="fa fa-pencil"></i> Edit</a>
      <a href="index.php?delete_box=<?php echo $box_id;?>" class="btn btn-danger pull-right"> <i class="fa fa-trash"></i> Delete</a>
      </div>
  </div>
     </div>
  <?php  } ?>
   </div>
    </div>
</div>