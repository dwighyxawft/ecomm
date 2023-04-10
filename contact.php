<?php
session_start();
include("includes/db.php");
include("functions/functions.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <script src="../fontawesome/js/fontawesome.min.js"></script>
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../popper2.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<?php include ("includes/header.php"); ?>
<div id="content">
    <div class="container">
        <div class="col-md-12 mt-3">
            <ul class="breadcrumb">
                <li class="padding-right: 3px;"><a style="text-decoration: none;" href="index.php">Home</a> </li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="row">
       <div class="col-md-3">
        <?php include ("includes/sidebar.php"); ?>
        </div>
        <div class="col-md-9">
            <div class="box mt-3 pt-4 mb-3 pb-4" style="box-shadow: 0px 1px 5px rgba(0,0,0,0.5);">
                <div class="box-header">
                    <div class="text-center">
                       <h3> Feel Free To Contact Us</h3>
                       <p class="text-muted">
                           If you have any questions, feel free to contact us. Customer Service Work 24/7
                       </p>

                    </div>
                    <form action="contact.php" method="POST" class="needs-validation">
                          <div class="container">
                          <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="mail">Email</label>
                                <input type="email" name="mail" id="mail" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="sub">Subject</label>
                                <input type="text" name="sub" id="sub" class="form-control">
                            </div>
                            <div class="form-group mt-3">
                                <label for="msg">Message</label>
                                <textarea name="msg" class="form-control" id="msg"></textarea>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary" name="send_msg">
                                    <i class="fa fa-user-md"></i> Send Message
                                </button>
                            </div>
                          </div>

                    </form>
                    <?php
                    if(isset($_POST["send_msg"])){
                        $sender_name = mysqli_real_escape_string($conn, $_POST["name"]);
                        $sender_mail = mysqli_real_escape_string($conn, $_POST["mail"]);
                        $subject = mysqli_real_escape_string($conn, $_POST["sub"]);
                        $msg = mysqli_real_escape_string($conn, $_POST["msg"]);
                        $receiver_mail = "amuoladipupo@gmail.com";

                        mail($receiver_mail, $sender_name, $subject, $msg, $sender_mail);
                        $sub2 = "Welcome To Xawft Websites";
                        $msg2 = "Thanks for sending this message. We will get back to You ASAP";
                        mail($sender_mail, $sub2, $msg2, $receiver_mail);
                        echo '<h3>Your message has been sent successfully</h3>';
                    }


                    ?>
                </div>

            </div>

        </div>




        
        </div>





    </div>
</div>




<?php include ("includes/footer.php"); ?>
</body>
</html>