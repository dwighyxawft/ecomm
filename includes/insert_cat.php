



<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> Insert Category</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Category Title
</div>
                        <div class="col-md-6"><input type="text" required name="cat_title" id="" class="form-control">
                    </div>
                    </div>
                    <div class="form-group row mt-2 mb-2">
                        <div class="control-label col-md-3">
                            Category Description
</div>
                        <div class="col-md-6"><textarea name="cat_desc" class="form-control" id="" cols="30" rows="10" required></textarea>
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
    $cat_title = mysqli_real_escape_string($conn, $_POST["cat_title"]);
    $cat_desc = mysqli_real_escape_string($conn, $_POST["cat_desc"]);


    $insert = "INSERT INTO categories(cat_title, cat_desc) VALUES ('$cat_title', '$cat_desc')";
    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
        echo '<script>alert("The Category has been added")</script>';
        echo '<script>window.open("index.php?view_cat", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }




}

?>