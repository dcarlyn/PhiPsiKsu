<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "password";
	$dbname = "phikappapsi";

	//Create Connection
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	//Check Connection
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
