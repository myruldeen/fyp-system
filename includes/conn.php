<?php
	$conn = new mysqli('localhost', 'root', '', 'fyp_sys');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>