<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$userid = $user['id'];
		$title       = $conn->real_escape_string($_POST['title']);
		$description = $conn->real_escape_string($_POST['description']);
		$category    = $conn->real_escape_string($_POST['category']);

		$filename    = $_FILES['photo']['name'];
		
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO projects (student_id, project_title, project_description, project_category, photo, created_on) VALUES ('$userid', '$title', '$description', '$category', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project added';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: home.php');
?>