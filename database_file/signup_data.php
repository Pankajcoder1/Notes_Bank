<?php
	include "config.php";
?>

<?php
	$msg = "";
	if(isset($_POST['submit']))
	{
		if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['idno'])&&isset($_POST['rollno'])&&isset($_POST['pass1'])&&isset($_POST['pass2']))
		{
			$name=$_POST['name'];
			$rollno = $_POST['rollno'];
			$idno = $_POST['idno'];
			$email = $_POST['email'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$signup_date = date("y/m/d");
			echo "current date is  ";
			echo $signup_date;
			if(($name[0]>='A'&&$name[0]<='Z')||($name[0]>='a'&&$name[0]<='z'))
			{
				if(($rollno[0]!='B'&&$rollno[0]!='b')||($rollno[1]!='T'&&$rollno[1]!='t'))
				{
					$msg="Invalid rollno. ";
				}
				else
				{
					if(strlen($idno)!=8)
					{
						$msg = "Invalid idno.";
					}
					else
					{
						if($pass1==$pass2)
						{
							$sql = "INSERT INTO signup_data (name,idno,rollno,email,password,signup_date) VALUES ('$name','$idno','$rollno','$email','$pass2','$signup_date')";
							if(mysqli_query($con,$sql))
							{
								session_start();
								$_SESSION['email']=$email;
								$_SESSION['name']=$name;
								$_SESSION['idno']=$idno;
								$_SESSION['rollno']=$rollno;
								header("Location: ../main.php");
								exit();
							}
							else
							{
								$msg="Error in connection.";
							}
						}
						else
						{
							$msg = "password not match. ";
						}
					}
				}
			}
			else
			{
				$msg="Name should start with alphabet.";
			}
			
		}
		else
		{
			$msg = "All fields are required ";
		}
	}
	if(strlen($msg)>0)
	{
		header("Location: ../signup.php?msg=".$msg);
		exit();
	}
?>