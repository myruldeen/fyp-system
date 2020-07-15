<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$student_id = $_POST['student_id'];
		$fullname = $_POST['fullname'];
		$course = $_POST['course'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$p = 'password123';
		$password = password_hash($p, PASSWORD_DEFAULT);

		$sql = "INSERT INTO students (student_id, fullname, password, course_id, photo, created_on) VALUES ('$student_id', '$fullname', '$password', '$course', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: student.php');
?>