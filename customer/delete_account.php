<center>
    <h1>Do You Really Want To Delete Your Account</h1>
</center>
<hr>
<div class="container">
    <form action="delete_account.php" method="post" class="needs-validation">
        <center>
        <input type="submit" name="yes" value="Yes, I want to Delete" class="btn btn-danger">
        <input type="submit" name="no" value="No, I don't want to Delete" class="btn btn-primary">
        </center>
    </form>
</div>
<?php
$email = $_SESSION["customer_email"];

if(isset($_POST["yes"])){
    $sql = "DELETE FROM customer WHERE customer_email = '$email'";
    $run = mysqli_query($conn, $sql);
    if($run){
        unset($_SESSION["customer_email"]);
       echo ' <script>alert("Your Account has been Deleted Successfully")</script>';
        echo '<script>window.open("../index.php", "_self")</script>';
    }
}
if(isset($_POST["no"])){
    echo '<script>window.open("my_account.php", "_self")</script>';
}


?>