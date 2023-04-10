<div class="col-md-9">
<div class="box mt-3 pt-4 mb-3 pb-4" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
    <?php
    $session_email = $_SESSION["customer_email"];
    $select_customer = "SELECT * FROM customer WHERE customer_email = '$session_email'";
    $run_customer = mysqli_query($conn, $select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer["customer_id"];

    
    
    ?>
    <div class="box-header">
    <div class="text-center">
    <h1>Payment Options For You</h1>
    <p class="text-muted">
        <a href="orders.php?c_id=<?php echo $customer_id;?>" style="text-decoration: none;">Offline Payment</a>
    </p>
    </div>
    <div class="col-md-12">
            <div class="box mt-3 pt-4 mb-3 pb-4">
               <div class="container">
               <a style="text-decoration: none;" href="#">
                   <p class="text-center">Paypal Payment</p>
                <img src="images/kisspng-payment-gateway-logo-credit-card-paypal-32-red-casino-review-get-1-free-bonus-no-5ba3ac3e733708.7163727115374531184719.png" alt="" class="img-fluid">
                </a>
               </div>
            </div>
    </div>







    </div>
</div>
    
</div>