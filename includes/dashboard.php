<style>
    div.huge{
        font-size: 40px;
        line-height: 40px;
    }
    div.huge div{
        font-size: 18px;
    }
    a{
        text-decoration: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">


        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
        </ol>
        </h1>
        <hr class="mb-3">
        <div class="col-lg-12" style="padding-left: 6px; background-color: rgba(0, 0, 0, 0.1); border-radius: 4px;"> <i class="fa fa-dashboard"> </i>Dashboard</div>

    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
    <div class="card-header bg-primary text-light">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-tasks fa-5x"></i>

            </div>
            <div class="col-xs-9 text-end">
                <div class="huge">
                   <?php echo $count_products; ?> <div> Products </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?view_product=<?php echo $count_products; ?>" class="text-primary">
        <div class="card-footer">
            <span class="pull-left">
                View Details
            </span>
            <span class="pull-right text-primary">
                <i class="fa fa-arrow-circle-right"></i>
            </span>
            <div class="clearfix"></div>
        </div>
    </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
    <div class="card-header bg-success text-light">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-users fa-5x"></i>

            </div>
            <div class="col-xs-9 text-end">
                <div class="huge">
                   <?php echo $count_customers;?> <div> Customers </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?view_customers=<?php echo $count_customers;?>" class="text-success">
        <div class="card-footer">
            <span class="pull-left">
                View Details
            </span>
            <span class="pull-right text-success">
                <i class="fa fa-arrow-circle-right"></i>
            </span>
            <div class="clearfix"></div>
        </div>
    </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
    <div class="card-header bg-warning text-light">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-tags fa-5x"></i>

            </div>
            <div class="col-xs-9 text-end">
                <div class="huge">
                <?php echo $count_p_cats;?> <div> Products Categories </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?view_p_cat=<?php echo $count_p_cats;?> " class="text-warning">
        <div class="card-footer">
            <span class="pull-left">
                View Details
            </span>
            <span class="pull-right text-warning">
                <i class="fa fa-arrow-circle-right"></i>
            </span>
            <div class="clearfix"></div>
        </div>
    </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card">
    <div class="card-header bg-danger text-light">
        <div class="row">
            <div class="col-xs-3">
                <i class="fa fa-shopping-cart fa-5x"></i>

            </div>
            <div class="col-xs-9 text-end">
                <div class="huge">
                <?php echo $count_orders;?> <div> Orders </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?view_orders=<?php echo $count_orders;?>" class="text-danger">
        <div class="card-footer">
            <span class="pull-left">
                View Details
            </span>
            <span class="pull-right text-danger">
                <i class="fa fa-arrow-circle-right"></i>
            </span>
            <div class="clearfix"></div>
        </div>
    </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mt-3">
            <div class="card-header bg-primary text-light">
                <h3 class="card-title">
                    <i class="fa fa-fw fa-money"></i> New Orders
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered table-responsive">
                    <thead class="">
                        <tr>
                            <th>Order No:</th>
                            <th>Customer Email</th>
                            <th>Invoice No:</th>
                            <th>Product ID:</th>
                            <th>Product Qty:</th>
                            <th>Product Size</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        
                        $i = 0;
                        $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,4";
                        $run_order = mysqli_query($conn, $get_order);
                        while($row_order = mysqli_fetch_array($run_order)){
                            $order_id = $row_order["order_id"];
                            $c_id = $row_order["customer_id"];
                            $invoice_no = $row_order["invoice_no"];
                            $product_id = $row_order["product_id"];
                            $qty = $row_order["qty"];
                            $size = $row_order["size"];
                            $order_status = $row_order["order_status"];
                            $i++;
                            $get_user = "SELECT * FROM customer WHERE customer_id = '$c_id'";
                            $run_user = mysqli_query($conn, $get_user);
                            $row_user = mysqli_fetch_array($run_user);
                            $customer_email = $row_user["customer_email"];
                            

                            echo '
                            <tr>
                            <td>'.$order_id.'</td>
                            <td>'.$customer_email.'</td>
                            <td>'.$invoice_no.'</td>
                            <td>'.$product_id.'</td>
                            <td>'.$qty.'</td>
                            <td>'.$size.'</td>
                            <td>'.$order_status.'</td>
                        </tr>';
                        }
                        
                        
                        
                        ?>
                      
                       
                    </tbody>
                </table>
            </div>
    <div class="text-end">
        <a href="index.php?view_orders">
            View All Orders<i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
        </div>
    </div>
                        <?php
                        $get_admin = "SELECT * FROM admins WHERE admin_email = '$email'";
                        $run_admin = mysqli_query($conn, $get_admin);
                        $row_admin = mysqli_fetch_array($run_admin);
                        $admin_image = $row_admin["admin_image"];
                        $admin_name = $row_admin["admin_name"];
                        $admin_job = $row_admin["admin_job"];
                        $admin_about = $row_admin["admin_about"];
                        $admin_country = $row_admin["admin_country"];
                        $admin_contact = $row_admin["admin_contact"];
                        
                        
                        
                        ?>

   <div class="col-lg-4">
   <div class="card mt-3">
        <div class="card-body">
            <div class="mb-md thumb-info">
                <img src="images/admin/<?php echo $admin_image;?>" alt="" class="img-fluid">
                <div class="thumb-info-title">
                    <h4 class="card-title">
                    <span class="thumb-info-inner"><?php echo $admin_name;?></span> <br>
                    <span class="thumb-info-type"><?php echo $admin_job;?></span>
                    </h4>
                </div>
            </div>
            <div class="mb-md">
                <div class="widget-content-expanded pt-1">
                <i class="fa fa-user"></i> <span>Email:</span> <?php echo $email;?> <br>
                    <i class="fa fa-user"></i> <span>Country:</span> <?php echo $admin_country;?> <br>
                    <i class="fa fa-user"></i> <span>Contact:</span><?php echo $admin_contact;?><br>
                    <hr class="dotted short">
                    <h5 class="text-muted">About Me</h5>
                    <p class="card-text"><?php echo $admin_about;?> <a href="#" class="card-link stretched-link">Xawft Dev Media</a> 
                    Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit
                </p>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>