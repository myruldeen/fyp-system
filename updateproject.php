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
	<?php include "includes/navigation.php"; ?>

	<div class="container">
		<ul class="nav nav-tabs">
		  <li role="presentation" class="active"><a href="#">Home</a></li>
		  <li role="presentation"><a href="#">Profile</a></li>
		</ul><br>
		<div class="row">
			<div class="col-lg-6">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>PROJECT NAME</label>
						<input type="text" name="project" class="form-control">
					</div>
					<div class="form-group">
						<label>PROJECT TYPE</label>
						<select name="type" class="form-control">
							<option value="">--SELECT TYPE--</option>
							<option value="system">System</option>
							<option value="network">Network</option>
							<option value="multimedia">Multimedia</option>
						</select>
						
					</div>
					<div class="form-group">
						<label>PROJECT DETAIL</label>
						<textarea name="detail" class="form-control" rows="10"></textarea>
					</div>
					<div class="form-group">
						<label>POSTER IMAGE</label>
						<input type="file" name="image">
					</div>
					<div class="form-group">
						<input type="submit" name="update" class="btn btn-primary" value="UPDATE">
					</div>
				</form>
				
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