<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$id = $conn->real_escape_string($_POST['id']);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$sql = "UPDATE supervisor SET photo = '$filename' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Supervisor photo updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select supervisor to update photo first';
	}

	header('location: supervisor.php');
?>