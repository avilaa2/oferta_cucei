<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "oferta_u";

	$con = mysqli_connect($servername, $username, $password, $dbname);
	if (!$con) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	mysqli_set_charset($con, "utf8");
?>