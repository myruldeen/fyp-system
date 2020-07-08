<?php 
ob_start();
session_start();
include('../_sys/db_connection.php');
// if (!isset($_SESSION['user'])) header('Location: login.php');
if (!isset($_SESSION['user'])) header('Location: ../login.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FYP System | Dashboard</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
    	
    	.brand-image {
    		height: 25px;
    	}
    </style>
  </head>
    <body>
	<?php include "includes/nav.php" ?>

	<div class="container">
		
		<h1 class="page-header">Home</h1>
		<?php 
		$id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM project_tbl WHERE student_id = '$id'";
		$q = $conn->query($sql);
		if ($q->num_rows == 0) {
			?>
			<h2>You dont have any project yet. Please <a href="#" data-toggle="modal" data-target="#myModal">add a project</a></h2>
			<?php
		} else {
			?>
			
			<div class="row">
				<div class="col-lg-4 col-md-4 col-xs-4">
					<div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="..."> 
				    </div> 
				</div>
				<div class="col-lg-8">
					<h2 class="page-header">Project 1</h2>
					<h4>Introduction</h4><hr>
				    <p>dsfdsfdsfdsf</p>
				    <a href="#" data-toggle="modal" data-target="#editmodal" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
				</div>			
			</div>
			<?php
		}

		 ?>
	
		<div class="row">
			
			<div class="col-lg-6">
				
			
				
				<div class="row">
					<?php 



					 ?>
					
				</div>
			</div>
		</div>

	</div>
	<!-- Modal -->
	
	<!-- Add Modal -->
	<?php include "_ext/_add_modal.php" ?>
	<!-- Edit Modal -->
	<?php include "_ext/_edit_modal.php" ?>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
    	
		function add_project() {
			var t = _("title").value;
			var d = _("description").value;
			var c = _("category").value;
			var file = _("file").value;

			if (t == "") {
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("title").style.borderColor = "red";
			} else if (d == "") {
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("description").style.borderColor = "red";
			} else if (c == "") {
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("category").style.borderColor = "red";
			} else if (file == "") {
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("file").style.borderColor = "red";
			} else {
				var formData = new FormData($('#add_project')[0]);
				$.ajax({
	              url: "_add_project.php",
	              type: "POST",
	              data: formData,
	              processData: false,  // tell jQuery not to process the data
	              contentType: false,   // tell jQuery not to set contentType
	              success: function(data) {

	                // clearForm();
	                // Swal.fire({
	                //       icon: 'success',
	                //       title: 'success',
	                //       text: data
	                //     });

	                 // console.log("PHP Output:");
	                    console.log( data );
	                 // $('#complaintForm')[0].reset();

	              },
	              error: function(err) {
	                console.log(err);
	              }
	           
	            });
			}
			
		}
    </script>
  </body>
</html>