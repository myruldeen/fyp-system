<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $conn->real_escape_string($_POST['id']);
		$sql = "DELETE FROM supervisor WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Supervisor deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: supervisor.php');
	
?>