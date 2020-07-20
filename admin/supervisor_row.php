<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $conn->real_escape_string($_POST['id']);
		
		$query = $conn->query("SELECT * FROM supervisor WHERE id=$id");
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>