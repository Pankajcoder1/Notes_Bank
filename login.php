<?php
    include "database_file/config.php";
?>

<?php
    $msg="";
    session_start();
    if(isset($_SESSION['email']))
    {
        header("Location: main.php");
        exit();
    }
    else
    {
        if(isset($_POST['login']))
        {
            if(isset($_POST['pass'])&&isset($_POST['email']))
            {
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                
                $sql = "SELECT * FROM signup_data WHERE email = '$email'";
                $result = mysqli_query($con,$sql);
                if(mysqli_query($con,$sql))
                {
                    if(mysqli_num_rows($result)==1)
                    {
                        $row = mysqli_fetch_assoc($result);
                        if($row['password']==$pass)
                        {
                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['idno'] = $row['idno'];
                            $_SESSION['rollno'] = $row['rollno'];

                            header("Location: main.php");
                            exit();
                        }
                        else
                        {
                            $msg = "Invalid credentialz";
                        }
                    }
                    else
                    {
                        $msg = "Invalid credential";
                    }
                }
                else
                {
                    $msg="Error in connectin";
                }
            }
            else
            {
                $msg="All fields are compulsory. ";
            }
        }
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

        <title>Login Page</title>
        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
        <!-- google font link -->
        <link href="https://fonts.googleapis.com/css?family=Caladea&display=swap" rel="stylesheet"> 

        <!-- bootstrap file start -->
        <link rel="stylesheet" type="text/css" href="bootstrap-file/css/bootstrap.min.css">
        <script type="text/javascript" src="bootstrap-file/js/bootstrap.min.js"></script>
        <!-- bootstrap end here -->

        <!-- local css file -->
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
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
                        <a class="nav-link" href="signup.php">SignUp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">Contact/Suggestion</a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

        <!-- login form start here. -->

        <div>
            <!-- add link here to send data -->
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST" class="box">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="pass" placeholder="Password" required>
                <input type="submit" name="login" value="Login" required>
                <a href="forgot_password.php" class="forgot"><p>forgot password?</p></a>

                <div style="color: #FFCC00; text-transform: capitalize; font-weight: lighter; font-size: 15px;">
                    <p>
                        <?php
                            if(strlen($msg)>0)
                            {
                                echo "$msg";
                            }
                        ?>
                    </p>
                </div>
            </form>
        </div>

    <!-- login form end here. -->
    
     <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>