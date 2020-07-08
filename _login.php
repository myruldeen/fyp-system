<?php 
session_start();

include "_sys/db_connection.php";

function filter($val) {
	global $conn;
	return $conn->real_escape_string($val);
}

if(isset($_POST["no_matric"])){
	// $mtx = filter($_POST['no_matric']);
	// $p = filter($_POST['password']);
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));

    $mtx = $conn->real_escape_string(trim($_POST['no_matric']));
    $p  = $conn->real_escape_string(trim($_POST['password']));

    $valmtx = $conn->query("SELECT * FROM student_tbl WHERE matric_no='$mtx' AND activated = '1'");
    if ($valmtx->num_rows == 0) echo "No matrik tidak dijumpai!";
    else {
        $db_row = $valmtx->fetch_assoc();

        if (password_verify($p, $db_row['password'])) {
            // echo 'Valid Password'; 
            $_SESSION['user'] = $db_row;
            $_SESSION['student'] = true;
            echo 'berjaya';
        } else echo 'Invalid Password.';
    }

	
}
// print_r($_POST);


 ?>