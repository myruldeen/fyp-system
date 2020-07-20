<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id    = $conn->real_escape_string($_POST['id']);
		$code  = $conn->real_escape_string($_POST['code']);
		$title = $conn->real_escape_string($_POST['title']);

		$sql = "UPDATE course SET code = '$code', title = '$title' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:course.php');

?>