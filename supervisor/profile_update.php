<?php
	include 'includes/session.php';


	if(isset($_POST['save'])){
		$curr_password = $conn->real_escape_string($_POST['curr_password']);
		$username      = $conn->real_escape_string($_POST['username']);
		$password      = $conn->real_escape_string($_POST['password']);
		$name          = $conn->real_escape_string($_POST['name']);

		$photo = $_FILES['photo']['name'];

		if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			if($password == $user['password']){
				$password = $user['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$sql = "UPDATE supervisor SET password = '$password', name = '$name', photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Supervisor profile updated successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';

		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
		
	}

	header('location: home.php');

?>