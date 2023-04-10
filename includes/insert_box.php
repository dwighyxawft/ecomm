



<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Box
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> Insert Boxes</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Box Title
</div>
                        <div class="col-md-6"><input type="text" required name="box_title" id="" class="form-control">
                    </div>
                    </div>
                   
                    <div class="form-group row mt-2 mb-2">
                        <div class="control-label col-md-3">
                            Box Desc
</div>
                        <div class="col-md-6"><textarea name="box_desc" id="" cols="30" rows="10" class="form-control"></textarea>
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

<?php
if(isset($_POST["submit"])){
    $box_title = mysqli_real_escape_string($conn, $_POST["box_title"]);
    $box_desc = mysqli_real_escape_string($conn, $_POST["box_desc"]);
  
   


    $insert = "INSERT INTO boxes_section(box_title, box_desc) VALUES ('$box_title', '$box_desc', '$slide_url')";
    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
        echo '<script>alert("The Box has been added")</script>';
        echo '<script>window.open("index.php?view_boxes", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }


 


}

?>