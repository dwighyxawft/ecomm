<?php
session_start();
    include("includes/db.php");
    include("functions/functions.php");



?>
<?php
    if(isset($_GET["c_id"])){
        $customer_id = $_GET["c_id"];
        $get_customer = "SELECT * FROM customer WHERE customer_id = '$customer_id'";
        $run = mysqli_query($conn, $get_customer);
        $row = mysqli_fetch_array($run);
        $ip_add = $row["customer_ip"];
        $status = "pending";
        $invoice_no = mt_rand();
        $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
        $run_cart = mysqli_query($conn, $select_cart);
        $check = mysqli_num_rows($run_cart);
        if($check != 0){
            while($row_cart = mysqli_fetch_array($run_cart)){
                $pro_id = $row_cart["p_id"];
                $pro_qty = $row_cart["qty"];
                $pro_size = $row_cart["size"];
        
                $get_product = "SELECT * FROM products WHERE product_id = '$pro_id'";
                $run_product = mysqli_query($conn, $get_product);
                while($row_product = mysqli_fetch_array($run_product)){
                    $sub_total = $row_product["product_price"] * $pro_qty;
                    $insert = "INSERT INTO customer_orders(customer_id, due_amount, invoice_no, qty, size, order_date, order_status) VALUES ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')";
                    $run_customer_order = mysqli_query($conn, $insert);
                    $insert_pending = "INSERT INTO pending_orders(customer_id, invoice_no, product_id, qty, size, order_status) VALUES ('$customer_id', '$invoice_no', '$pro_id', '$pro_qty', '$pro_size', '$status')";
                    $run_pending_order = mysqli_query($conn, $insert_pending);
                    $delete_cart = "DELETE FROM cart WHERE ip_add = '$ip_add'";
                    $run_delete = mysqli_query($conn, $delete_cart);
        
                   echo ' <script>alert("Your Orders Has Been Submitted, Thanks")</script>';
                    echo '<script>window.open("customer/my_account.php?my_orders", "_self")</script>';
                }
        
            }
        }
        else{
            echo '<script>window.open("customer/my_account.php?my_orders", "_self")</script>';
        }
    
    
    }
    
   


?>