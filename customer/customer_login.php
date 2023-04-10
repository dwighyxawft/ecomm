<div class="col-md-9">
    <div class="box mt-3 pt-4 mb-3 pb-4" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
    <div class="box-header">
    <div class="text-center">
                       <h3>Login To Your Account</h3>
                       <p class="pt-2">Already Have An Account</p>
                       <p class="text-muted pt-2">
                       Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit. Lorem Ipsum dolor sit amet consectetur adpiliscing elit
                       </p>
                      

                    </div>
    </div>


          <div class="container">
          <form action="checkout.php" method="post">
            <div class="form-group mt-3 mb-3">
                <label for="mail">Email</label>
                <input type="email" name="email" id="mail" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" id="pass" class="form-control" required>
            </div>
    <div class="text-center mt-3">
        <button class="btn btn-primary" name="login" value="Login"><i class="fa fa-sign-in"></i> Login</button>
    </div>
    <center class="mt-2">
        <hr>
        Don't have An Account <a href="customer_register.php" style="text-decoration: none;">Sign Up</a>
    </center>

          </div>




            </form>

</div>
</div>
<?php  
if(isset($_POST["login"])){
    $customer_email = mysqli_real_escape_string($conn, $_POST["email"]);
    $customer_pass = mysqli_real_escape_string($conn, $_POST["pass"]);
    $get_customer = "SELECT * FROM customer WHERE customer_email = '$customer_email' AND customer_pass = '$customer_pass'";
    $run_customer = mysqli_query($conn, $get_customer);
    $ip_add = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_cart = mysqli_query($conn, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer == 0){
       echo ' <script>alert("Your email or password is wrong")</script>';
    }
    elseif($check_customer == 1 && $check_cart == 0){
        $_SESSION["customer_email"] = $customer_email;
        echo ' <script>alert("You are Logged In")</script>';
       echo ' <script>window.open("customer/my_account.php?my_orders", "_self")</script>';
     }
     else{
        $_SESSION["customer_email"] = $customer_email;
        echo ' <script>alert("You are Logged In")</script>';
       echo ' <script>window.open("checkout.php", "_self")</script>';
     }
}



?>