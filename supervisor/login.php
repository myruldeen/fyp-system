<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$supervisor_id = $conn->real_escape_string($_POST['supervisor_id']);
		$password      = $conn->real_escape_string($_POST['password']);

		$sql = "SELECT * FROM supervisor WHERE supervisor_id = '$supervisor_id'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the supervisor ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['user'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input supervisor credentials first';
	}

	header('location: index.php');

?>