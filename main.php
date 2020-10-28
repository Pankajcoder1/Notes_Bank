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
        <!-- <meta http-equiv="refresh" content="2"> -->
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
        <!-- glyghicon -->
	    
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
                            if(isset($_SESSION['flag1']))
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
                }
                ?>
			</div>
			<div class="">
				<form>
					<div>
						<div class="inner-div">
							<input type="text" name="" placeholder="search here ..." style="margin-right: 10px;">
                            <i class="fa fa-search" aria-hidden="true" style="cursor: pointer;"></i>
						</div>
					</div>
				</form>
			</div>
        	<div class="container">
                all images comes here.
        	</div>
        </div>


        <script type="text/javascript">
            function my()
            {
                // document.getElementById('info_success').style.height="0px";
                document.getElementById('info_success').style.display="none";
            }
        </script>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

