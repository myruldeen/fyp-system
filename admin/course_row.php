<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $conn->real_escape_string($_POST['id']);
		$sql = "SELECT * FROM course WHERE id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>