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
				    
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Matric Number</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="sm">
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Project Description</label>
				      <div class="col-sm-10">
				        <input class="form-control" type="text" id="sm">
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Project Category</label>
				      <div class="col-sm-10">
				      	<select class="form-control">
					    	<option value="">Network</option>
					    	<option value="">System</option>
					    	<option value="">Multimedia</option>
					    </select>
				        <!-- <input class="form-control" type="text" id="sm"> -->
				      </div>
				    </div>
				    <div class="form-group form-group-sm">
				    	<label class="col-sm-2 control-label" for="sm"></label>
				    	<div class="col-sm-10">
				        <input class="btn btn-primary rounded-0" type="submit" id="sm" value="Submit">
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