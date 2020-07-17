<?php
include_once("db_connection.php");


$tbl_student = "CREATE TABLE IF NOT EXISTS student_tbl (
			id INT(11) NOT NULL AUTO_INCREMENT,
			matric_no VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			password VARCHAR(100) NOT NULL,
			is_active ENUM('N','Y') NOT NULL DEFAULT 'N',
			registration_date DATETIME NOT NULL,
			last_login_date DATETIME NOT NULL,
			ip VARCHAR(255) NOT NULL,
			activated ENUM('0','1') NOT NULL DEFAULT '0',
			PRIMARY KEY (id)
)";


$query = $conn->query($tbl_student);
echo $query ? "<h1 style='color:green;'>student table created OK :) </h1>" : "<h1 style='color:red;'>student table NOT created :( </h1>".$conn->error;


$tbl_supervisor = "CREATE TABLE IF NOT EXISTS supervisor_tbl (
			id INT(11) NOT NULL AUTO_INCREMENT,
			staff_id VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			password VARCHAR(100) NOT NULL,
			registration_date DATETIME NOT NULL,
			last_login_date DATETIME NOT NULL,
			ip VARCHAR(255) NOT NULL,
			activated ENUM('0','1') NOT NULL DEFAULT '0',
			PRIMARY KEY (id)
)";

$query = $conn->query($tbl_supervisor);
echo $query ? "<h1 style='color:green;'>supervisor table created OK :) </h1>" : "<h1 style='color:red;'>supervisor table NOT created :( </h1>".$conn->error;


$tbl_project = "CREATE TABLE IF NOT EXISTS project_tbl (
			id INT(11) NOT NULL AUTO_INCREMENT,
			student_id VARCHAR(255) NOT NULL,
			project_title VARCHAR(255) NOT NULL,
			project_description TEXT NOT NULL,
			project_category VARCHAR(255) NOT NULL,
			added_date DATETIME NOT NULL,
			PRIMARY KEY (id)
)";

$query = $conn->query($tbl_project);
echo $query ? "<h1 style='color:green;'>project table created OK :) </h1>" : "<h1 style='color:red;'>project table NOT created :( </h1>".$conn->error;


$tbl_admin = "CREATE TABLE IF NOT EXISTS admin_tbl (
			id INT(11) NOT NULL AUTO_INCREMENT,
			admin_id VARCHAR(255) NOT NULL,
			password VARCHAR(100) NOT NULL,
			last_login_date DATETIME NOT NULL,
			ip VARCHAR(255) NOT NULL,
			PRIMARY KEY (id)
)";

$query = $conn->query($tbl_admin);
echo $query ? "<h1 style='color:green;'>admin table created OK :) </h1>" : "<h1 style='color:red;'>admin table NOT created :( </h1>".$conn->error;


?>