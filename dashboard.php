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
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">
	      	<img alt="Brand" class="brand-image" src="http://esurvey.unisel.edu.my/eLecturer/admin/images/logo.png"/>
	      </a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	       <ul class="nav navbar-nav">
	        <li><a href="dashboard.php"><i class="fa fa-sign-in"></i> Dashboard</a></li>
	        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
	      </ul>
	      
	    </div>
	  </div>
	</nav>

	<div class="container">
		
		<h1 class="page-header">Home</h1>
		<h2>You dont have any project yet. Please <a href="#">add a project</a></h2>
			<!-- <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>Add</button> -->
		<div class="row">
			<form class="form-horizontal col-lg-6">
				    
				    <div class="form-group form-group-sm">
				      <label class="col-sm-2 control-label" for="sm">Project Title</label>
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
				
			
				
				<div class="row">
					
				</div>
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