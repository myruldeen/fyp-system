<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Complaint System</title>

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
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
				  <div class="col-lg-4">
				    <div class="thumbnail box-shadow">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				        <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-lg-4">
				    <div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				         <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4">
				    <div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				         <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4">
				    <div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				         <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4">
				    <div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				         <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				  <div class="col-md-4">
				    <div class="thumbnail">
				      <img src="https://via.placeholder.com/350C" alt="...">
				      <div class="caption">
				        <h3>Thumbnail label</h3>
				         <p><span class="label label-default">System</span></p>
				        <p><a href="detail.php" class="btn btn-primary" role="button">Projek Detail</a></p>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<div class="col-lg-4">
				<h4>Search</h4>
				<div class="input-group">
			      <input type="text" class="form-control" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
			      </span>
			    </div><!-- /input-group -->
			  
			    <hr>
			    <h4>Category</h4>
			    <select class="form-control">
			    	<option value="">Network</option>
			    	<option value="">System</option>
			    	<option value="">Multimedia</option>
			    </select>
			    
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<nav aria-label="Page navigation">
				  <ul class="pagination">
				    <li>
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
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