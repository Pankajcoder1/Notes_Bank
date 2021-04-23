<?php
	define("HOSTNAME","localhost");
	define("DBNAME","notes_data");
	define("PASSWORD","");
	define("USERNAME","root");

	$con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("Unexpected error in connection. ");
?>