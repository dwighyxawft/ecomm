<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Category
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> View Categories</h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Title</th>
                            <th>Category Desc</th>
                            <th>Edit Category</th>
                            <th>Delete Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_cat = "SELECT * FROM categories";
                        $run_cat = mysqli_query($conn, $get_cat);
                        while($row = mysqli_fetch_array($run_cat)){
                            $cat_id = $row["cat_id"];
                            $cat_title = $row["cat_title"];
                            $cat_desc = $row["cat_desc"];
                            echo '
                            <tr>
                            <td>'.$cat_id.'</td>
                            <td>'.$cat_title.'</td>
                            <td>'.$cat_desc.'</td>
                            <td><a href="index.php?edit_cat='.$cat_id.'" class="btn btn-primary"> <i class="fa fa-pencil"></i> Edit</a></td>
                            <td><a href="delete_cat.php?delete_p_cat='.$cat_id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>';
                        }
                      
                        
                       
                        
                        ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>