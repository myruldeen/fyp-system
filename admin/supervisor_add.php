<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$fullname = $conn->real_escape_string($_POST['fullname']);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating supervisor id
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$student_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		$p = 'Unisel@123';
		$password = password_hash($p, PASSWORD_DEFAULT);

		$sql = "INSERT INTO supervisor (supervisor_id, name, password, photo, created_on) VALUES ('$student_id', '$fullname', '$password', '$filename', NOW())";
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

	header('location: supervisor.php');
?>