<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$fullname = $_POST['fullname'];

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