<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, students.id AS studid
                    FROM students 
                    LEFT JOIN course 
                    ON course.id=students.course_id 
                    LEFT JOIN supervisor
                    ON supervisor.id = students.supervisor_id
                    WHERE students.supervisor_id = '".$user['id']."'";

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>