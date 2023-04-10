<center>
    <h1>My Orders</h1>
    <p class="lead">Your orders on one place</p>
    <p class="text-muted">
        If you have any questions, feel free to <a href="../contant.php" style="text-decoration: none;">Contact Us</a>. Customer Service Work 24/7
   </p>
</center>

<hr>

<div class="container">
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>ON: </th>
                <th>Due Amount</th>
                <th>Invoice No:</th>
                <th>Qty</th>
                <th>Size</th>
                <th>Order Date</th>
                <th>Paid / Unpaid</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $email = $_SESSION["customer_email"];
            $get_customer = "SELECT * FROM customer WHERE customer_email = '$email'";
            $run_customer = mysqli_query($conn, $get_customer);
            while($row_c = mysqli_fetch_array($run_customer)){
                $c_id = $row_c["customer_id"];

                $get_order = "SELECT * FROM customer_orders WHERE customer_id = '$c_id'";
                $run_order = mysqli_query($conn, $get_order);
                $i = 0;
                while($row_o = mysqli_fetch_array($run_order)){
                    $order_id = $row_o["order_id"];
                    $due = $row_o["due_amount"];
                    $invoice = $row_o["invoice_no"];
                    $qty = $row_o["qty"];
                    $size = $row_o["size"];
                    $date = $row_o["order_date"];
                    $status = $row_o["order_status"];
                    $i++;
                    if($status == 'pending'){
                        $status = 'Unpaid';
                    }
                    else{
                        $status = 'Paid';
                    }


          
            
            
            
            ?>
            <tr>
                <th class="text-center"><?php echo $i;?></th>
                <td>
                    <p class="text-center"><?php echo $due;?></p>
                </td>
                <td>
                    <p class="text-center"><?php echo $invoice;?></p>
                </td>
                <td>
                    <p class="text-center"><?php echo $qty;?></p>
                </td>
                <td>
                    <p class="text-center"><?php echo $size;?></p>
                </td>
                <td>
                    <p class="text-center"><?php echo $date;?></p>
                </td>
                <td>
                    <p class="text-center"><?php echo $status;?></p>
                </td>
                <td>
                 <?php
                   if($status == "Paid"){
                    echo '';
                }
                else{
                    echo ' <p class="text-center"><a href="confirm.php?order_id='.$order_id.'" target="_blank" class="btn btn-info text-light">Confirm Payment</a></p>';
                }
                 ?>
                </td>
                
            </tr>
         <?php
         
                   
        }
    }
    ?>
        </tbody>
    </table>
</div>
</div>