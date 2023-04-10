<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> View Orders</h3>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                           <th>Order No: </th>
                           <th>Customer Email </th>
                           <th>Invoice No</th>
                           <th>Product Name </th>
                           <th>Product Qty </th>
                           <th>Product Size</th>
                           <th>Order Date</th>
                           <th>Total Amount</th>
                           <th>Status</th>
                           <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $get_p_cat = "SELECT * FROM pending_orders";
                        $run_p_cat = mysqli_query($conn, $get_p_cat);
                        while($row = mysqli_fetch_array($run_p_cat)){
                            $c_id = $row["customer_id"];
                            $invoice = $row["invoice_no"];
                            $product_id = $row["product_id"];
                            $qty = $row["qty"];
                            $size = $row["size"];
                            $status = $row["order_status"];
                            $id = $row["order_id"];

                           
                            //customer email
                            $get_email = "SELECT * FROM customer WHERE customer_id = '$c_id'";
                            $run_email = mysqli_query($conn, $get_email);
                            $row_email = mysqli_fetch_array($run_email);
                            $email = $row_email["customer_email"];

                            //amount
                            $get_pro = "SELECT * FROM products WHERE product_id = '$product_id'";
                            $run_pro = mysqli_query($conn, $get_pro);
                            $row_pro = mysqli_fetch_array($run_pro);
                            $price = $row_pro["product_price"];
                            $title = $row_pro["product_title"];
                            $total = $price * $qty;


                            //Get Order Date
                           
                             $get_date = "SELECT * FROM customer_orders WHERE order_id = '$id'";
                             $run_date = mysqli_query($conn, $get_date);
                             $row_date = mysqli_fetch_array($run_date);
                             $date = $row_date["order_date"];



                            echo '
                            <tr>
                            <td>'.$i.'</td>
                            <td>'.$email.'</td>
                            <td>'.$invoice.'</td>
                            <td>'.$title.'</td>
                            <td>'.$qty.'</td>
                            <td>'.$size.'</td>
                            <td>'.$date.'</td>
                            <td>'.$total.'</td>
                            <td>'.$status.'</td>
        
                            <td><a href="delete_order.php?delete_order='.$id.'" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
                        </tr>';
                        $i++;
                        }
                      
                        
                       
                        
                        ?>
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>