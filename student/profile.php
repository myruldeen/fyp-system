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
    <title>Complaint System | Login(SV)</title>

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
		<h1 class="page-header">Profile</h1>
		<div class="row">
			<form class="form-horizontal col-lg-6">
				<?php 
				$id = $_SESSION['user']['id'];
				$sql = "SELECT * FROM student_tbl WHERE id = '$id'";
				$q = $conn->query($sql);
				if ($q) {
					$db_row = $q->fetch_assoc();
					$id = $db_row['id'];
					$p = $db_row['password'];
					$mtx = $db_row['matric_no'];
					$e = $db_row['email'];
					$isactive = $db_row['is_active'];
					$reg_date = $db_row['registration_date'];
					$last_log = $db_row['last_login_date'];
					$ip = $db_row['ip'];
					$actv = $db_row['activated'];
				}
				 ?>
				    
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Matric Number</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="matric" name="matric" value="<?= $mtx ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Email</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="email" name="email" value="<?= $e ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">is active</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="active" name="active" value="<?= $isactive == 'Y' ? 'Yes' : 'No'  ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Register Date</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="reg_date" name="reg_date" value="<?= $reg_date ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Last Login</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="last_log" name="last_log" value="<?= $last_log ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">IP Address</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="ip" name="ip" value="<?= $ip ?>" disabled>
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Activated</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="activated" name="activated" value="<?= $actv ?>" disabled>
				      </div>
				    </div>
				    
				    <div class="form-group form-group-sm">
				    	<label class="col-sm-2 control-label" for="sm"></label>
				    	<div class="col-sm-10">
				    	<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
				        <!-- <input class="btn btn-primary rounded-0" type="submit" id="sm" value="Edit"> -->
				      </div>
				      
				    </div>
				  </form>
			<div class="col-lg-6">

				<!-- <form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>MATRIC NO</label>
						<input type="text" name="project" class="form-control">
					</div>
					
					
					<div class="form-group">
						<input type="submit" name="update" class="btn btn-primary" value="UPDATE">
					</div>
				</form> -->
				
			</div>
		</div>

	</div>
		<!-- Edit Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  <h4 class="modal-title">Edit Profile</h4>
			</div>
			<div class="modal-body form-horizontal">
			  <form class="form-horizontal" role="form">
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Matric No</label>
				  <div class="col-xs-10">
					<input type="text" class="form-control" id="matric" name="matric" value="<?= $mtx ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Email</label>
				  <div class="col-xs-10">
					<input type="text" class="form-control" id="email" name="email" value="<?= $e ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Password</label>
				  <div class="col-xs-10">
					<input type="password" class="form-control" id="password" name="password" value="<?= $p ?>">
				  </div>
				</div>
				
				<!-- <div class="form-group">
				  <label for="title" class="control-label col-xs-2">Image</label>
				  <div class="col-xs-10">
					<input type="file" name="file" id="file">
				  </div>
				</div> -->
			  
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-primary">Save changes</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    	$(window).scroll(function(){
		   if ($(window).scrollTop() == 0) {
		    $(".navbar").removeClass("fixed-top");
		 } else {
		    $(".navbar").addClass("fixed-top");
		 }
		});
    </script>
  </body>
</html>