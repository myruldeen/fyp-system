<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, projects.id AS proid
                    FROM projects 
                    LEFT JOIN category
                    ON category.id=projects.project_category 
                    WHERE projects.student_id = '$id'";
		// $sql = "SELECT * FROM projects WHERE student_id='$id'";
		$query = $conn->query($sql);
		if (!$query) {
			json_encode($conn->error);
		} else {
			$row = $query->fetch_assoc();

			echo json_encode($row);
		}
		
	}
?>