<?php
	$hostname = 'localhost';
	$username = 'root';
	$userpwd = '';
	$dbname = 'colorlib';
	$conn = mysqli_connect($hostname,$username,$userpwd,$dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

?>