<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id         = $conn->real_escape_string($_POST['id']);
		$student_id = $conn->real_escape_string($_POST['student_id']);
		$fullname   = $conn->real_escape_string($_POST['fullname']);
		$course     = $conn->real_escape_string($_POST['course']);
		$supervisor = $conn->real_escape_string($_POST['supervisor']);

		$sql = "UPDATE students SET student_id = '$student_id', supervisor_id = $supervisor, fullname = '$fullname', course_id = '$course' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:student.php');

?>