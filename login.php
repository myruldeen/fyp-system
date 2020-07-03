<?php 

// ob_start();
// session_start();

include "includes/config.php";
// $msg = '';
if (isset($_POST['login'])){
    header('Location: dashboard.php');

    // OOP method
    // $no_matric = $conn->real_escape_string(trim($_POST['no_matric']));
    // $password  = $conn->real_escape_string(trim($_POST['password']));

    // $validateMatric = $conn->query("SELECT * FROM users WHERE matricNum='$no_matric'");
    // if ($validateMatric->num_rows == 0) $msg = "No matrik tidak dijumpai!";
    // else {
    //     $db_row = $validateMatric->fetch_assoc();
    //     if (password_verify($password, $db_row['password'])) {
    //         // echo 'Valid Password'; 
    //         $_SESSION['user'] = $db_row;
    //         $_SESSION['student'] = true;
    //         header('Location: dashboard.php');
    //     } else $msg = 'Invalid Password.';
    // }

    
}



 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Complaint System | Login</title>

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
		<div class="col-lg-4">
			<span id="status"></span>
			<!-- <h2><?= $msg; ?></h2> -->
			<form action="" method="POST">

				<div class="form-group">
					<label>MATRIC NO:</label>
					<input type="text" name="no_matric" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" maxlength="10">
				</div>
				<div class="form-group">
					<label>PASSWORD:</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="login" value="Login" class="btn btn-primary">
					<a href="register.php">Register</a>
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
    <script type="text/javascript">
    	function _(x){
			return document.getElementById(x);
		}
    	function restrict(elem){
			var tf = _(elem);
			var rx = new RegExp;
			if(elem == "email"){
				rx = /[' "]/gi;
			}
			tf.value = tf.value.replace(rx, "");
		}
		function emptyElement(x){
			_(x).innerHTML = "";
			_("password").style.borderColor = "black";
			_("email").style.borderColor = "black";
		}
		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
		    var charCode = (evt.which) ? evt.which : evt.keyCode;
		    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		        return false;
		    }
		    return true;
		}
    </script>
  </body>
</html>