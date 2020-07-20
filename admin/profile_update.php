<?php
	include 'includes/session.php';

	
	if(isset($_POST['save'])){
		$curr_password = $conn->real_escape_string($_POST['curr_password']);
		$username      = $conn->real_escape_string($_POST['username']);
		$password      = $conn->real_escape_string($_POST['password']);
		$firstname     = $conn->real_escape_string($_POST['firstname']);
		$lastname      = $conn->real_escape_string($_POST['lastname']);

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

			$sql = "UPDATE admin SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname', photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Admin profile updated successfully';
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