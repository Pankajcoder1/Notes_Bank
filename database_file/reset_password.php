<?php
	include "config.php";

	session_start();
	if(!(isset($_SESSION['email'])))
	{
		$email = $_POST['email'];
		$new_pass1 = $_POST['pass1'];
		$new_pass2 = $_POST['pass2'];
		if($new_pass2==$new_pass1)
		{
			$sql = "SELECT * FROM signup_data WHERE email = '$email'";
			$result = mysqli_query($con,$sql);
			if(mysqli_query($con,$sql))
			{
				if(mysqli_num_rows($result)!=0)
				{
					$sql = "UPDATE signup_data SET password='$new_pass1' WHERE email='$email' ";
					if(mysqli_query($con,$sql))
					{
						$sql = "SELECT * from signup_data WHERE email= '$email' ";
						$result = mysqli_fetch_assoc($result);
						session_start();
						$_SESSION['email']=$email;
						$_SESSION['name'] = $result['name'];
						$_SESSION['idno'] = $result['idno'];
						$_SESSION['rollno'] = $result['rollno'];
						$_SESSION['first_view']=0;
						header("Location: ../main.php?flag1");
						exit();
					}
					else
					{
						header("Location: ../forgot_password.php?flag1");
						exit();
					}
				}
				else
				{
					header("Location: ../forgot_password.php?flag3");
					exit();
				}
			}
			else
			{
				header("Location: ../forgot_password.php?flag1");
				exit();
			}
		}
		else
		{
			header("Location: ../forgot_password.php?flag2");
			exit();
		}
	}
	else
	{
		header("Location: ../main.php");
		exit();
	}
?>
