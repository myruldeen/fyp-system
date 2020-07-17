<?php
	include 'includes/session.php';
	// print_r($_POST);
	$project_id = '';
	if(isset($_POST['add'])){
		$project_id = $_POST['id'];
		$comment = $_POST['comment'];
		
		$sql = "INSERT INTO comments (project_id, comment, date_added) VALUES ('$project_id', '$comment', now())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Comment added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: project_detail.php?id='.$project_id);

?>