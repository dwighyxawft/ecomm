<?php
if(isset($_GET["edit_slide"])){
    $edit_id = $_GET["edit_slide"];
    $sql = "SELECT * FROM slider WHERE slide_id = '$edit_id'";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($run);
    $slide_name = $row["slide_name"];
    $slide_url = $row["slide_url"];
    $slide_image = $row["slide_images"];
}



?>



<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slides
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-fw fa-money"></i> Insert Slide Images</h3>
            </div>
            <div class="card-body">
                <form action="edit_slide_2.php?edit_slide=<?php echo $edit_id;?>" method="post" class="form-horizontal">
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Slide Name
</div>
                        <div class="col-md-6"><input type="text" value="<?php echo $slide_name;?>" required name="slide_name" id="" class="form-control">
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                            Slide Url
</div>
                        <div class="col-md-6"><input type="text" value="<?php echo $slide_url;?>" required name="slide_url" id="" class="form-control">
                    </div>
                    </div>
                    <div class="form-group row mt-2 mb-2">
                        <div class="control-label col-md-3">
                            Slide Image
</div>
                        <div class="col-md-6"><input type="file" name="slide_images" id="" class="form-control">
                        <img src="../images/slide-images/<?php echo $slide_image;?>" alt="" class="img-fluid">
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="control-label col-md-3">
                           
</div>
                        <div class="col-md-6"><button type="submit" style="width: 100%;" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["submit"])){
    $slide_name = mysqli_real_escape_string($conn, $_POST["slide_name"]);
    $slide_url = mysqli_real_escape_string($conn, $_POST["slide_url"]);
    $slide_images = $_FILES["slide_images"]["name"];
    $tmp_name = $_FILES["slide_images"]["tmp_name"];
    $sql = "SELECT * FROM slider";
    $run = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($run);

 if($count >= 4){
    move_uploaded_file($tmp_name, "../images/slide-images/$slide_images");


    $insert = "INSERT INTO slider(slide_name, slide_images, slide_url) VALUES ('$slide_name', '$slide_images', '$slide_url')";
    $run_insert = mysqli_query($conn, $insert);
    if($run_insert){
        echo '<script>alert("The Slide has been added")</script>';
        echo '<script>window.open("index.php?view_slides", "_self")</script>';
    }
    else{
        echo '<script>alert("'.mysqli_error($conn).'")</script>';
    }


 }
 else{
     echo '<script>alert("Your can only have a maximum of 4 slides")</script>';
    echo '<script>window.open("index.php?view_slides", "_self")</script>';
 }


}

?>