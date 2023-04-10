

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-tags"></i> View Products</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Price</th>
                                <th>Product Sold</th>
                                <th>Product Keywords</th>
                                <th>Product Date</th>
                                <th>Product Delete</th>
                                <th>Product Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $get_pro = "SELECT * FROM products";
                            $run_pro = mysqli_query($conn, $get_pro);
                            while($row_pro = mysqli_fetch_array($run_pro)){
                                $pro_id = $row_pro["product_id"];
                                $pro_title = $row_pro["product_title"];
                                $pro_image = $row_pro["product_img1"];
                                $pro_price = $row_pro["product_price"];
                                $pro_keywords = $row_pro["product_keywords"];
                                $date = $row_pro["date"];
                                $i++;
                                $get_sold = "SELECT * FROM pending_orders WHERE product_id = '$pro_id'";
                                $run_sold = mysqli_query($conn, $get_sold);
                                $row_sold = mysqli_fetch_array($run_sold);
                                $status = $row_sold["order_status"];
                                

                            
                            ?>
                            <tr>
                                <td> <?php echo $pro_id;?></td>
                                <td> <?php echo $pro_title;?></td>
                                <td><img src="../images/product-images/<?php echo $pro_image;?>" style="width: 60px; height: 60px;" alt=""></td>
                                <td><?php echo $pro_price;?></td>
                                <td><?php echo $status;?></td>
                                <td><?php echo $pro_keywords;?></td>
                                <td><?php echo $date;?></td>
                                <td><a href="index.php?delete_product=<?php echo $pro_id;?>" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i> Delete</a></td>
                                <td><a href="index.php?edit_product=<?php echo $pro_id;?>" style="text-decoration: none;" class="btn btn-primary">
                                <i class="fa fa-pencil"></i> Edit
                            </a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>