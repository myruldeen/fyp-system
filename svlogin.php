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
		<div class="col-lg-4">
			<form action="" method="POST" id="svLogin">
				<span id="message"></span>
				<div class="form-group">
					<input type="text" name="id_num" placeholder="ID Number" id="id_num" onfocus="clearMessage()" class="form-control" onkeypress="return isNumber(event)" maxlength="10">
				</div>
				<div class="form-group">
					<input type="text" name="password" placeholder="Password" id="password" onfocus="clearMessage()" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="login" value="Login" id="login" class="btn btn-primary" >
				</div>
				
			</form>
			
		</div>

	</div>
   
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function() {
		$('#svLogin').on('submit', function(e) {
			e.preventDefault();
			var id_num = $('#id_num').val();
			var p = $('#password').val();
			var message = $("#message");
			if (id_num == "") {
				message.html("ID number cannot be blank");
				_('id_num').style.borderColor = 'red';
			} else if (p == "") {
				message.html("Password cannot be blank");
				_('password').style.borderColor = 'red';
			} else {
				$.ajax({
                    url: "sv/_login.php",
                    method: "POST",
                    data: $('#svLogin').serialize(),
                    success: function(data){
                    	// $("#message").html(data);
                        if (data == 'berjaya') {
                        	window.location = "student/dashboard.php";
                        } else {
                        	$("#message").html(data);
                        }
                    },
                    error: function() {
                        alert('error handling here');
                    }
                });
			}
		});
		
		
	});
	function clearMessage() {
		$('#message').html("");
		_('id_num').style.borderColor = 'black';
		_('password').style.borderColor = 'black';
	}
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
	function _(x) {
		return document.getElementById(x);
	}
    </script>
  </body>
</html>