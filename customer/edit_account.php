<?php
$email = $_SESSION["customer_email"];
$get_user = "SELECT * FROM customer WHERE customer_email = '$email'";
$run_user = mysqli_query($conn, $get_user);
while($row_user = mysqli_fetch_array($run_user)){
    $name = $row_user["customer_name"];
    $mail = $row_user["customer_email"];
    $country = $row_user["customer_country"];
    $city = $row_user["customer_city"];
    $contact = $row_user["customer_contact"];
    $address = $row_user["customer_address"];
    $image = $row_user["customer_image"];
}



?>



<center>
    <h1>Edit Your Account</h1>
  
</center>

<hr>

<div class="container">
<form action="" method="POST" class="needs-validation" enctype="multipart/form-data">
<div class="form-group">
    <label>Customer Name:</label>
    <input type="text" name="c_name" value="<?php echo $name; ?>" id="" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Customer Email:</label>
    <input type="email" name="c_email" value="<?php echo $mail; ?>" id="" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Customer Country:</label>
    <input type="text" name="c_country" value="<?php echo $country; ?>" id="" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Customer City:</label>
    <input type="text" name="c_city" id="" value="<?php echo $city; ?>" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Customer Contact:</label>
    <input type="tel" name="c_contact" id="" value="<?php echo $contact; ?>" class="form-control" required>
</div>
<div class="form-group mt-2">
<label>Customer Address:</label>
    <input type="text" name="c_address" id="" class="form-control" value="<?php echo $address; ?>" required>
</div>
<div class="form-group mt-2">
<label>Customer Image:</label>
    <input type="file" name="c_image" id="" class="form-control" required>
    <img src="../images/customer-images/<?php echo $image; ?>" alt="" class="img-fluid" style="width: 220px;">
</div>
<div class="text-center mt-3">
    <button class="btn btn-info text-light" type="submit" name="update"><i class="fa fa-user-md"></i> Update Now</button>
</div>
</form>
</div>

<?php





if(isset($_POST["update"])){
    $c_name = mysqli_real_escape_string($conn, $_POST["c_name"]);
$c_email = mysqli_real_escape_string($conn, $_POST["c_email"]);
$c_country = mysqli_real_escape_string($conn, $_POST["c_country"]);
$c_city = mysqli_real_escape_string($conn, $_POST["c_city"]);
$c_address = mysqli_real_escape_string($conn, $_POST["c_address"]);
$c_contact = mysqli_real_escape_string($conn, $_POST["c_contact"]);


$c_img = $_FILES["c_image"]["name"];
$c_img_tmp = $_FILES["c_image"]["tmp_name"];

    move_uploaded_file($c_img_tmp, "../images/customer-images/$c_img");
    $get_user1 = "SELECT * FROM customer WHERE customer_email = '$c_email'";
$run_user1 = mysqli_query($conn, $get_user1);
$check = mysqli_num_rows($run_user1);
if($check > 0){
    echo '<script>alert("The Email is in use by another user, Please use another email")</script>';
}
else{
    $update_user = "UPDATE customer SET customer_name = '$c_name', customer_email = '$c_email', customer_country = '$c_country', customer_city = '$c_city', customer_address = '$c_address', customer_contact = '$c_contact', customer_image = '$c_img' WHERE customer_email = '$email'";
    $run_update = mysqli_query($conn, $update_user);
    if($run_update){
        unset($_SESSION["customer_email"]);
        $_SESSION["customer_email"] = $c_email;
        echo '<script>alert("Your Account has been updated successfully To complete the process, Please Login Again")</script>';
        echo '<script>window.open("logout.php", "_self")</script>';
    }

}

  


}









?>