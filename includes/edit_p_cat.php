<?php
   if(isset($_GET["edit_p_cat"])){
    $edit_id = $_GET["edit_p_cat"];
    $sql = "SELECT * FROM products_categories WHERE p_cat_id = '$edit_id'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
    $title = $row["p_cat_title"];
    $desc = $row["p_cat_desc"];
}


?>



<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
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
                <form action="edit2.php?edit_p_cat=<?php echo $edit_id;?>" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Product Category Title
</div>
                        <div class="col-md-6"><input type="text" value="<?php echo $title;?>" name="p_cat_title" id="" required class="form-control">
                    </div>
                    </div>
                    <div class="form-group row mt-2 mb-2">
                        <div class="control-label col-md-3">
                            Product Description
</div>
                        <div class="col-md-6"><textarea name="p_cat_desc" class="form-control" id="" cols="30" rows="10" required><?php echo $desc;?></textarea>
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

