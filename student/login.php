<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$student_id = $_POST['student_id'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM students WHERE student_id = '$student_id'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the student ID';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['student'] = $row['id'];
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