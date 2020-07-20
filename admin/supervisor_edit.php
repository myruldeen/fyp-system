<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $conn->real_escape_string($_POST['id']);
		$fullname = $conn->real_escape_string($_POST['fullname']);

		$sql = "UPDATE supervisor SET name = '$fullname' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Supervisor updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:supervisor.php');

?>