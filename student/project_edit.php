<?php
	include 'includes/session.php';
	
	$project_id = '';
	if(isset($_POST['edit'])){
		$project_id = $_POST['project_id'];
		$id = $_POST['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$category = $_POST['category'];
		$photo = $_FILES['photo']['name'];

		$q = $conn->query("SELECT * FROM projects WHERE id = '$id'");
		$db_row = $q->fetch_assoc();

		if(!empty($photo)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
			$filename = $photo;	
		}
		else{
			$filename = $db_row['photo'];
		}

		$sql = "UPDATE projects SET project_title = '$title', project_description = '$description', project_category = '$category', photo = '$filename' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Project updated!';
		} else {
			$_SESSION['error'] = $conn->error;
		}

		
	} else {
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: project_detail.php?id='.$project_id);

?>