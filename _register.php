<?php 

include "_sys/db_connection.php";

function escape_string($val) {
	global $conn;
	return $conn->real_escape_string($val);
}
 
if (isset($_POST['r_matrik'])) {
	$mtx = escape_string($_POST['r_matrik']); 
	$e = escape_string($_POST['r_email']);
	$p = escape_string($_POST['r_password']);
	$phash = password_hash($p, PASSWORD_DEFAULT);
	$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

	$sql = "SELECT email, matric_no FROM student_tbl WHERE email = '$e' && matric_no = '$mtx'";
	$query = $conn->query($sql);
	if ($query->num_rows > 0) {
		echo "Student is registered";
		exit();
	} else {
		echo "Student is not registered yet!";
		$sql = "INSERT INTO student_tbl(matric_no, email, password, registration_date, last_login_date, ip) VALUES('$mtx', '$e', '$phash', now(), now(), '$ip') ";
		$q = $conn->query($sql);
		if ($q == TRUE) {
			echo "Successfully registered! Wait for coordinator to activate your account";
			exit();
		} else {
			echo $conn->error;
			exit();
		}
	}
}



 ?>