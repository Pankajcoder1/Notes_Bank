<?php
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
	    <link rel="stylesheet" type="text/css" href="main.css">
	    <!-- cdn link for font-awesome -->
	    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    
		<title>
			Main Page
		</title>
	</head>
	<body>
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
        <div class="content container">
        	<div class="container name-div">
        	<!-- add name of that person here.  -->
            <?php
                if(!isset($_SESSION['email']))
                {
                    session_start();
                }
                if(isset($_SESSION['email']))
                {
                    if(isset($_GET['flag1']))
                    {
                        echo "Your password is reset.";
                    }
                    ?>
                    <h2 style="text-transform: uppercase;">Hello 
                        <?php
                            echo $_SESSION['name'];
                        ?>
                    </h2>
                    <p>Thanks for visit.</p>
                <?php
                }

                ?>
			</div>
			<div class="container">
				<form>
					<div>
						<div class="inner-div">
							<button type="button" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></button>
							<input type="text" name="" placeholder="search here..">
						</div>
					</div>
				</form>
			</div>
        	<div class="container">
        		 all images comes here.
        	</div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

