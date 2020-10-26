<?php
    session_start();
    if(isset($_SESSION['email']))
    {
        header("Location: main.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <meta http-equiv="refresh" content="2"> -->

    <title>SignUp Page</title>
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet"> 

    <!-- local css file -->
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    </head>

    <body id="page-top">
        <!-- Navigation -section -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Notestuff.com</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">Contact/Suggestion</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <!-- signup form start -->
        <div class="box">
            <form action="database_file/signup_data.php" method="POST">
                <h1>SignUp Here</h1>
                <input type="text" name="name" placeholder="Name" required>
                <!-- here in roll no a add type text.Incase it create problem change it. -->
                <input type="text" name="rollno" placeholder="RollNo" required>
                <input type="text" name="idno" placeholder="Id.No" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="pass1" placeholder="Password" required>
                <input type="password" name="pass2" placeholder="Confirm Password" required>
                <input type="submit" name="submit" value="Submit">
                <p class="have_acc">Have an account.<a href="login.php">Login</a></p>
                <?php
                    $msg = "";
                    if(isset($_GET['msg']))
                    {
                    ?>
                    <p style="color: #FFCC00; text-transform: capitalize; font-weight: lighter; font-size: 15px;" class="text-center">
                        <?php
                            echo $_GET['msg'];
                            ?>

                    </p>
                    <?php
                    }
                ?>
                    
            </form>
        </div>
        <!-- signup form end -->

     <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>