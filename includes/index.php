<?php
include("../includes/db.php");
session_start();
if(!isset($_SESSION["admin_email"])){
    echo '<script>window.open("login.php", "_self")</script>';
}else{
    $email = $_SESSION["admin_email"];
    $get_user = "SELECT * FROM admins WHERE admin_email = '$email'";
    $run_admin = mysqli_query($conn, $get_user);
    $row_admin = mysqli_fetch_array($run_admin);
        $admin_id = $row_admin["admin_id"];
        $admin_name = $row_admin["admin_name"];
        $get_products = "SELECT * FROM products";
        $run_products = mysqli_query($conn, $get_products);
        $count_products = mysqli_num_rows($run_products);
        $get_customers = "SELECT * FROM customer";
        $run_customers = mysqli_query($conn, $get_customers);
        $count_customers = mysqli_num_rows($run_customers);
        $get_orders = "SELECT * FROM pending_orders";
        $run_orders = mysqli_query($conn, $get_orders);
        $count_orders = mysqli_num_rows($run_orders);
        $get_p_cats = "SELECT * FROM products_categories";
        $run_p_cats = mysqli_query($conn, $get_p_cats);
        $count_p_cats = mysqli_num_rows($run_p_cats);

    




}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <script src="../../jquery-3.5.1.min.js"></script>
    <script src="../../popper2.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div id="wrapper">
        <?php
        include("images/sidebar.php");
        ?>
        <div id="page-wrapper">
            <div class="container-fluid" style="padding-left: 255px;">
       <?php
        if(isset($_GET["dashboard"])){
            include("dashboard.php");
        }
        elseif(isset($_GET["insert_product"])){
            include("insert_product.php");
        }
        elseif(isset($_GET["view_product"])){
            include("view_product.php");
        }
        elseif(isset($_GET["delete_product"])){
            include("delete_product.php");
        }
        elseif(isset($_GET["edit_product"])){
            include("edit_product.php");
        }
        elseif(isset($_GET["insert_p_cat"])){
            include("insert_p_cat.php");
        }
        elseif(isset($_GET["view_p_cat"])){
            include("view_p_cat.php");
        }
        elseif(isset($_GET["edit_p_cat"])){
            include("edit_p_cat.php");
        }
        elseif(isset($_GET["view_cat"])){
            include("view_cat.php");
        }
        elseif(isset($_GET["insert_cat"])){
            include("insert_cat.php");
        }
        elseif(isset($_GET["edit_cat"])){
            include("edit_cat.php");
        }
        elseif(isset($_GET["insert_slide"])){
            include("insert_slide.php");
        }
        elseif(isset($_GET["view_slides"])){
            include("view_slides.php");
        }
        elseif(isset($_GET["edit_slide"])){
            include("edit_slide.php");
        }
        elseif(isset($_GET["view_customers"])){
            include("view_customers.php");
        }
        elseif(isset($_GET["view_orders"])){
            include("view_orders.php");
        }
        elseif(isset($_GET["view_payments"])){
            include("view_payments.php");
        }
        elseif(isset($_GET["view_user"])){
            include("view_users.php");
        }
        elseif(isset($_GET["insert_user"])){
            include("insert_user.php");
        }
        elseif(isset($_GET["edit_user"])){
            include("edit_user.php");
        }
        elseif(isset($_GET["view_boxes"])){
            include("view_boxes.php");
        }
        elseif(isset($_GET["edit_box"])){
            include("edit_box.php");
        }
        elseif(isset($_GET["insert_box"])){
            include("insert_box.php");
        }
        elseif(isset($_GET["edit_css"])){
            include("edit_css.php");
        }
        ?>
            </div>
        </div>
    </div>
</body>
</html>