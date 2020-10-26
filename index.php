<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <meta http-equiv="refresh" content="2"> -->
  <title>Notesutff_startUp</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <link href="css/creative.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Notestuff.com</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">SignUp</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact/Suggestion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Your notes,paper,pdf and so many thing here.</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">This site will provide you so many things.Like notes of any subject,previous year question paper,pdf of some book or notes etc.</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
          <!-- in href add link of other page. -->
          <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <input type="submit" name="start" value="Get Started!" class="btn btn-light btn-xl js-scroll-trigger">
          </form>
          <!-- php code start to check user login -->
          <?php
            if(isset($_POST['start']))
            {
              session_start();
              if(isset($_SESSION['email']))
              {
                header("Location: main.php");
                exit();
              }
              else
              {
                header("Location: signup.php");
                exit();
              }
            }
          ?>
          <!-- php code end -->
        </div>
      </div>
    </div>
  </section>

  <!-- team section written by Pankaj Kumar. -->
  <!-- <section id="team" class="page-section">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="">
    			<img src="img/team/pk.jpg" alt="Pankaj">
    		</div>
    		<div>
    			<p>Pankaj Kumar.</p>
    			<p>Full stack developer.</p>
    		</div>
    	</div>
    </div>
  </section> -->
  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">If you have any query or suggestion.<br>your most welcome.....</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+91-9155082479</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:pankajkumarmath1@gmail.com">contact@Notestuff.com</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="container footer">
      <div class="small text-center text-muted">Copyright &copy; 2020 -Notestuff.com</div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>
</html>