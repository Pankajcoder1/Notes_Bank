<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		header("Location: main.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="refresh" content="2"> -->
	<title>
		reset_password page
	</title>

	<link rel="stylesheet" type="text/css" href="bootstrap-file/css/bootstrap.min.css">
	<!-- google font link -->
	<link href="https://fonts.googleapis.com/css?family=Caladea&display=swap" rel="stylesheet"> 
	<!-- css file -->
	<link rel="stylesheet" type="text/css" href="css/form.css">
</head>
<body>
	<div class="box">
		<form action="database_file/reset_password.php" method="POST">
			<h1>Forgot password</h1>
			<input type="email" name="email" placeholder="Email" required>
			<input type="password" name="pass1" placeholder="New password" required>
			<input type="password" name="pass2" placeholder="Confirm password" required>
			<input type="submit" name="submit" value="Submit">

			<p style="color: #FFCC00; text-transform: capitalize; font-weight: lighter; font-size: 15px;">
				<?php
					if(isset($_GET['flag2']))
					{
						echo "Both password should same.";
					}
					else if(isset($_GET['flag1']))
					{
						echo "Error in connection.";
					}
					else if(isset($_GET['flag3']))
					{
						echo "invalid email provided.";
					}
				?>
			</p>
		</form>
	</div>
</body>
</html>