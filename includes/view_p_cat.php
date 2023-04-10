<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Product Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> View Product Categories</h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Product Category ID</th>
                            <th>Product Category Title</th>
                            <th>Product Category Desc</th>
                            <th>Edit Product Category</th>
                            <th>Delete Product Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_p_cat = "SELECT * FROM products_categories";
                        $run_p_cat = mysqli_query($conn, $get_p_cat);
                        while($row = mysqli_fetch_array($run_p_cat)){
                            $p_cat_id = $row["p_cat_id"];
                            $p_cat_title = $row["p_cat_title"];
                            $p_cat_desc = $row["p_cat_desc"];
                            echo '
                            <tr>
                            <td>'.$p_cat_id.'</td>
                            <td>'.$p_cat_title.'</td>
                            <td>'.$p_cat_desc.'</td>
                            <td><a href="index.php?edit_p_cat='.$p_cat_id.'" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a></td>
                            <td><a href="delete_p_cat.php?delete_p_cat='.$p_cat_id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>';
                        }
                      
                        
                       
                        
                        ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>