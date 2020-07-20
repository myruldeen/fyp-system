<?php
	include 'includes/session.php';

	
	if(isset($_POST['save'])){
		$student_id    = $conn->real_escape_string($_POST['student_id']);
		$curr_password = $conn->real_escape_string($_POST['curr_password']);
		$name          = $conn->real_escape_string($_POST['name']);
		$password      = $conn->real_escape_string($_POST['password']);

		$photo = $_FILES['photo']['name'];

		if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			} else {
				$filename = $user['photo'];
			}

			if($password == $user['password']){
				$password = $user['password'];
			} else {
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE students SET student_id = '$student_id', password = '$password', fullname = '$name', photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Profile updated successfully';
			} else {
				$_SESSION['error'] = $conn->error;
			}
			
			
		} else {
			$_SESSION['error'] = 'Incorrect password';
		}
	} else {
		$_SESSION['error'] = 'Complete the form';
	}


	header('location: home.php');

?>