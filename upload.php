<?php
	session_start();
	if(!isset($_SESSION['email']))
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
		<title>
			Upload Page
		</title>
		<link rel="stylesheet" type="text/css" href="css/form.css">
	</head>
	<body>
		<div class="box">
			<form action="database_file/upload_data.php" method="POST" enctype="multipart/form-data">
	            <h1>Upload File</h1>
				<input type="file" name="file" placeholder="Upload file here..." required>
				<input type="text" name="course_code" placeholder="Enter Subject code..." required>
				<div style="color: #fff;">
					<input type="radio" name="type" id="question" value="question">
					<label for="question">Question</label>
					<input type="radio" name="type" id="notes" value="notes">
					<label for="notes">Notes</label>
				</div>
	            <input type="submit" name="upload" value="Upload" required>
	        </form>

	        <div style="color: #FFCC00; text-transform: capitalize; font-weight: lighter; font-size: 15px;">
	        	<?php
	        		if(isset($_GET['flag1']))
	        		{
	        			echo "All fields are compulsory";
	        		}
	        		else if(isset($_GET['flag2']))
	        		{
	        			echo "You upload some wrong file.<br> Only pdf(notes) and images(Question) are valid.";
	        		}
	        	?>
	        </div>
		</div>

	</body>
</html>