<?php
	include "config.php";
	session_start();
	$msg = "";
	if(!isset($_SESSION['email']))
	{
		header("Location: ../login.php");
		exit();
	}
	else
	{
		if(isset($_POST['upload']))
		{
			$username = $_SESSION['name'];
			$course_code = $_POST['course_code'];
			if(isset($_POST['course_code']) and isset($_POST['type']))
			{
				$filename = $_FILES['file']['name'];
				$tempname = $_FILES['file']['tmp_name'];
				$type=strtolower(pathinfo(basename($_FILES['file']['name']),PATHINFO_EXTENSION));
				$types_of_upload = $_POST['type'];
				$created_date = date("y/m/d");
				// check for pdf and image(only allow)
				if($type=='pdf'||$type='img'||$type='jpg'||$type='jpeg')
				{
					if($types_of_upload=="question")
					{
						// question uploaded
						// create a folder all_notes and inside it create question and notes folde to store pdf or images.
						$target_dir="uploaded_data/question_data/";
						$final_path=$target_dir.basename($_FILES['file']['name']);
						
						$data_type="question";
						$sql = "INSERT INTO uploaded_data (user,course_code,filename_path,created_date,data_type) VALUES ('$username','$course_code','$final_path','$created_date','$data_type')";
						$final_path="../".$final_path;
						if(mysqli_query($con,$sql)&&move_uploaded_file($tempname, $final_path))
						{
							$_SESSION['done']=1;
							header("Location: ../main.php");
							exit();
						}
						else
						{
							echo "error in connection "."<br>";
						}
					}
					else if($types_of_upload=="notes")
					{
						// notes uploaded
						$data_type="notes";
						$target_dir="uploaded_data/notes_data/";
						$final_path=$target_dir.basename($_FILES['file']['name']);
						$sql = "INSERT INTO uploaded_data (user,course_code,filename_path,created_date,data_type) VALUES ('$username','$course_code','$final_path','$created_date','$data_type')";
						$final_path="../".$final_path;
						if(mysqli_query($con,$sql)&&move_uploaded_file($tempname, $final_path))
						{
							$_SESSION['done']=1;
							header("Location: ../main.php");
							exit();
						}
						else
						{
							echo "error in connection ";
						}
					}
				}
				else
				{
					header("Location: ../upload.php?flag2");
					exit();
				}
				// now check for image
				// rest ke liye sochna padega and vaki ka cheking/validation karke data push karna hoga.
				
			}
			else
			{
				header("Location: ../upload.php?flag1");
				exit();
			}
		}
	}
?>