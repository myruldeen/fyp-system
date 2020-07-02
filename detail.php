<?php session_start(); ?>
<?php include "includes/config.php"; ?>
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
			<div class="col-lg-4 col-md-4 col-xs-4">
				<div class="thumbnail">
			      <img src="https://via.placeholder.com/350C" alt="..."> 
			    </div> 
			</div>
			<div class="col-lg-8">
				<h2 class="page-header">Project 1</h2>
				<h4>Introduction</h4><hr>
			    <p>dsfdsfdsfdsf</p>
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