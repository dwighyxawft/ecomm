<?php
if(!isset($_SESSION["admin_email"])){
    echo '<script>window.open("login.php", "_self")</script>';
}
else{

?>
<?php
$css = "../css/style.css";
if(file_exists($css)){
    $data = file_get_contents($css);

}




?>



 <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard / CSS Editor</li>
            </ol>
        </div>
    </div>


    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-pencil"></i> View Payments</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST" class="form-horizontal">
        <div class="form-group">
            <div class="col-lg-12"><textarea name="newdata" id="" cols="30" rows="15" class="form-control"><?php echo $data;?></textarea></div>
        </div>
        <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" style="width: 100%;" class="btn btn-primary mt-3" name="update">Update CSS</button>

            </div>
        </div>





              </form>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST["update"])){
    $new_data = mysqli_real_escape_string($conn, $_POST["newdata"]);
    $open = fopen($css, "w+");
    $handle = fwrite($open, $new_data);
    fclose($open);
    echo '<script>alert("Your CSS has been updated")</script>'; 
    echo '<script>window.open("index.php?edit_css", "_self")</script>';
}

?>


<?php } ?>