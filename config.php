<?php
	$host = 'localhost'; 
	$user = 'root'; 
	$dbname = "website";
	$con = mysqli_connect($host, $user, "", $dbname);

	if (!$con) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
