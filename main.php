<?php
    include "database_file/config.php";
    session_start();
    if(!(isset($_SESSION['email'])))
    {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- to refresh every time -->
		<!-- <meta http-equiv="refresh" content="2"> -->
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  	<meta name="description" content="">
	  	<meta name="author" content="">
	  	<!-- Plugin CSS -->
	    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
	  	<!-- bootstrap file -->
	  	<link rel="stylesheet" type="text/css" href="bootstrap-file/css/bootstrap.min.css">
	  	<!-- local css file -->
	    <link rel="stylesheet" href="css/login.css">
	    <link rel="stylesheet" type="text/css" href="css/main.css">
	    <!-- cdn link for font-awesome -->
	    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- cdn link for jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	    
		<title>
			Main Page
		</title>
	</head>
	<body>
	<!-- Navigation -section -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">
                    Notestuff.com
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="upload.php">Upload</a>
                        </li>
                        <li class="nav-item">
                        	<!-- add here for logout -->
                            <a class="nav-link" href="logout.php" name="logout">SignOut</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="index.php">Contact/Suggestion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- navbar end here. -->
        <!-- now it for dynamic content. -->
        <div class="content container" style="margin-top: 80px;">
        	<div class="container name-div" id="info_success">
        	<!-- add name of that person here.  -->
            <?php
                if(isset($_SESSION['email']))
                {
                    if($_SESSION['first_view']==0)
                    {
                        $_SESSION['first_view']=1;
                        ?>
                        <div style="cursor: default;">
                            <?php
                            // coming for reset password page
                            if(isset($_GET['flag1']))
                            {
                                ?>
                                <p style="margin-bottom: 0px;">Your password is reset.</p>

                            <?php
                            }
                            ?>
                            <p style="margin-top: 0px; margin-bottom: 0px;">
                                Hello 
                                <span style="font-weight: bold;">
                                <?php
                                    echo $_SESSION['name'];
                                ?>
                                </span>
                                <i class="fa fa-times" aria-hidden="true" style="float: right; margin-top: 3px; cursor: pointer; width: 20px; vertical-align: 50%;" onclick="my();" id="cross"></i>
                            </p>
                        </div>

                        <?php

                    }
                    else
                    {
                        if(isset($_SESSION['done'])&& $_SESSION['done']==1)
                        {
                            ?>
                            <div id="info_success">
                                <p class="container">Your file is successfully uploaded.
                                    <span>
                                        <i class="fa fa-times" aria-hidden="true" style="float: right; margin-top: 3px; cursor: pointer; width: 20px; vertical-align: 50%;" onclick="my();" id="cross"></i>
                                    </span>
                                </p>
                            </div>
                            <?php
                            $_SESSION['done']=2;
                        }
                    }
                }
                ?>
			</div>
            <!-- <br> -->

        	<div class="container" id="hideDiv" style="margin-top: 20px;">
                <!-- php code to extract all images here -->
                <?php
                    $sql_query="SELECT * FROM uploaded_data WHERE data_type='question'";
                    $result=mysqli_query($con,$sql_query);
                    $row=mysqli_fetch_assoc($result);
                    $no_of_row=mysqli_num_rows($result);
                    // echo "no of row ".$no_of_row;
                    if($no_of_row>0){
                        echo"<div class='container text-center' style='color: green; background-color: #e9ecef; padding:5px; border-radius:6px; margin-bottom:16px;'>
                                 All available question paper.
                            </div>";
                    }
                    echo "<div class='container flex-container' style=''>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        # code...
                        $path=$row['filename_path'];
                        $len=strlen($path);
                        $user=$row['user'];
                        $course_code=$row['course_code'];
                        if($path[$len-1]!='f'){
                            ?>
                            <figure class="figure" style="margin: 7px;">
                                    <?php
                                        echo "<i class='fa fa-file-image-o' style='font-size:70px'></i>";
                                        echo "
                                            <figcaption class='figure-caption'>
                                                <p>Code : $course_code</p>
                                                <p>Uploader: <b>$user</b></p>
                                                <p>
                                                    <a href='$path' style='color: green'; class=''>Click to view</a>
                                                </p>
                                            </figcaption>
                                        ";
                                    ?>
                            </figure>
                            
                            <?php
                        }
                        else{
                            ?>
                                <figure class="figure" style="margin: 7px;">
                                    <?php
                                        echo "<i class='fa fa-file-pdf-o'style='font-size:70px'></i>";
                                        echo "
                                            <figcaption class='figure-caption'>
                                                <p>Code : $course_code</p>
                                                <p>Uploader: <b>$user</b></p>
                                                <p>
                                                    <a href='$path' style='color: green'; class=''>Click to view</a>
                                                </p>
                                            </figcaption>
                                        ";
                                    ?>
                                </figure>
                            <?php
                        }
                    }
                    echo "</div>";
                ?>
                <!-- all question stuff comes here. -->

                <!-- all notes related stuff -->
                <?php
                    $sql_query="SELECT * FROM uploaded_data WHERE data_type='notes'";
                    $result=mysqli_query($con,$sql_query);
                    $no_of_rows=mysqli_num_rows($result);
                    if($no_of_rows>0){
                        echo"<div class='container text-center' style='color: green; background-color: #e9ecef; padding:5px; border-radius:6px; margin-bottom:16px;'>
                                 All available Notes.
                            </div>";
                    }
                    echo "<div class='container flex-container' style=''>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        # code...
                        $path=$row['filename_path'];
                        $len=strlen($path);
                        $user=$row['user'];
                        $course_code=$row['course_code'];
                        if($path[$len-1]!='f'){
                            ?>
                            <figure class="figure" style="margin: 7px;">
                                    <?php
                                        echo "<i class='fa fa-file-image-o' style='font-size:70px'></i>";
                                        echo "
                                            <figcaption class='figure-caption'>
                                                <p>Code : $course_code</p>
                                                <p>Uploader: <b>$user</b></p>
                                                <p>
                                                    <a href='$path' style='color: green'; class=''>Click to view</a>
                                                </p>
                                            </figcaption>
                                        ";
                                    ?>
                            </figure>
                            
                            <?php
                        }
                        else{
                            ?>
                                <figure class="figure" style="margin: 7px;">
                                    <?php
                                        echo "<i class='fa fa-file-pdf-o'style='font-size:70px'></i>";
                                        echo "
                                            <figcaption class='figure-caption'>
                                                <p>Code : $course_code</p>
                                                <p>Uploader: <b>$user</b></p>
                                                <p>
                                                    <a href='$path' style='color: green'; class=''>Click to view</a>
                                                </p>
                                            </figcaption>
                                        ";
                                    ?>
                                </figure>
                            <?php
                        }
                    }
                    echo "</div>";
                ?>
        	</div>
        </div>


        <script type="text/javascript">
            function my()
            {
                document.getElementById('info_success').style.display="none";
                
            }

            $(function()
            {
                setTimeout(function()
                    { $("#info_success").fadeOut(1500);}, 4000)

            })
            
        </script>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>