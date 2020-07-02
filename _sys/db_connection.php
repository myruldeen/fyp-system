<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "fyp_sys";
$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// if (mysqli_connect_errno()){
// 		echo mysqli_connect_error();
// 		exit();
// }
/* else{
	echo "Successful connected to database!";
} */
?>
