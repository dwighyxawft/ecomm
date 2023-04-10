<?php
 if(isset($_GET["edit_box"])){
        $edit_id = $_GET["edit_box"];
        $get_box = "SELECT * FROM boxes_section";
          $run_box = mysqli_query($conn, $get_box);
          while($row_box = mysqli_fetch_array($run_box)){
            $box_id = $row_box["box_id"];
            $box_title = $row_box["box_title"];
            $box_desc = $row_box["box_desc"];



          }
}
?>



<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Box
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> Edit Boxes</h3>
            </div>
            <div class="card-body">
                <form action="edit_box_2.php?edit_box=<?php echo $box_id;?>" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Box Title
</div>
                        <div class="col-md-6"><input type="text" required name="box_title" value="<?php echo $box_title;?>" id="" class="form-control">
                    </div>
                    </div>
                   
                    <div class="form-group row mt-2 mb-2">
                        <div class="control-label col-md-3">
                            Box Desc
</div>
                        <div class="col-md-6"><textarea name="box_desc" id="" cols="30" rows="10" class="form-control"><?php echo $box_desc;?></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                           
</div>
                        <div class="col-md-6"><button type="submit" style="width: 100%;" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

