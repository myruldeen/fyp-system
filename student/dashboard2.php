<?php 
// ob_start();
// session_start();
// include('include/db.php');
// if (!isset($_SESSION['user'])) header('Location: login.php');
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
			    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
			</div>			
		</div>
		
		<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
			<!-- <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>Add</button> -->
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
	
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  <h4 class="modal-title">Add project</h4>
			</div>
			<div class="modal-body form-horizontal">
			  <form class="form-horizontal" role="form">
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Title</label>
				  <div class="col-xs-10">
					<input type="text" class="form-control" id="title" name="title">
				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Description</label>
				  <div class="col-xs-10">
				  	<textarea class="form-control" name="description" rows="10"></textarea>

				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Category</label>
				  <div class="col-xs-10">
					<select class="form-control" name="category">
					    	<option value="">Network</option>
					    	<option value="">System</option>
					    	<option value="">Multimedia</option>
					    </select>
				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Image</label>
				  <div class="col-xs-10">
					<input type="file" name="file" id="file">
				  </div>
				</div>
			  
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
 
  </body>
</html>