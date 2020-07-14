


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
			<!-- <span id="status"></span> -->
			<!-- <h2><?= $msg; ?></h2> -->
			<form action="" method="POST" onSubmit="return false;" id="lform">

				<div class="form-group">
					<label>MATRIC NO:</label>
					<input id="no_matric" type="text" name="no_matric" class="form-control" autocomplete="off" onkeypress="return isNumber(event)" maxlength="10" onfocus="emptyElement('status')">
				</div>
				<div class="form-group">
					<label>PASSWORD:</label>
					<input id="password" type="password" name="password" class="form-control" onfocus="emptyElement('status')">
				</div>
				<div class="form-group">
					<input type="submit" name="login" value="Login" class="btn btn-primary" onclick="signin()">
					<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit"></i> Register</a>
				</div>
			</form>
			
		</div>
		<div class="col-lg-8">
			<h2 class="page-header">Please register to sign in</h2>
			<p id="status">Please wait for coordinator to vlidate student matric no</p>
		</div>
	</div>
		<!-- Modal -->
	<div class="modal" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  <h4 class="modal-title">Register</h4>
			</div>
			<div class="modal-body form-horizontal">
				<span id="r_status"></span>
			  <form class="form-horizontal" role="form" action="" method="POST" onsubmit="return false;" id="rform">
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Matric Number</label>
				  <div class="col-xs-10">
					<input type="text" class="form-control" name="r_matrik" id="r_matrik" onkeypress="return isNumber(event)" onfocus="emptyElement2('r_status')">
				  </div>
				</div>
				<div class="form-group">
				  <label for="email" class="control-label col-xs-2">Email</label>
				  <div class="col-xs-10">
					<input type="email" class="form-control" name="r_email" id="r_email" onfocus="emptyElement2('r_status')" onblur="emailValidation()">
				  </div>
				</div>
				<div class="form-group">
				  <label for="title" class="control-label col-xs-2">Password</label>
				  <div class="col-xs-10">
					<input type="password" class="form-control" name="r_password" id="r_password" onfocus="emptyElement2('r_status')">
				  </div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-primary" onclick="register()">Register</button>
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/_ajax.js"></script>
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
		function validateEmail(email) {
		  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		  return re.test(email);
		}
		function emailValidation() {
		  var e = _("r_email").value;
		  if (!validateEmail(e)) {
			_("r_email").style.borderColor = "red";
		  }
		  return false;
		}
		function emptyElement(x){
			_(x).innerHTML = "";
			_("password").style.borderColor = "black";
			_("no_matric").style.borderColor = "black";
			
		}
		function emptyElement2(x){
			_(x).innerHTML = "";
			_("r_matrik").style.borderColor = "black";
			_("r_email").style.borderColor = "black";
			_("r_password").style.borderColor = "black";
		}
		function isNumber(evt) {
			evt = (evt) ? evt : window.event;
		    var charCode = (evt.which) ? evt.which : evt.keyCode;
		    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		        return false;
		    }
		    return true;
		}
		function signin(){
			var matric = _("no_matric").value;
			var p = _("password").value;
			var status = _("status");
			if(matric == ""){
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("no_matric").style.borderColor = "red";
			} else if(p == ""){
				status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("password").style.borderColor = "red";
			}else {
				// _("showloader").style.display = "block";
				$.ajax({
                    url: "_login.php",
                    method: "POST",
                    data: $('#lform').serialize(),
                    success: function(data){
                        // _("status").innerHTML = data;
                        if (data == 'berjaya') {
                        	window.location = "student/dashboard.php";
                        } else {
                        	_("status").innerHTML = data;
                        }
                    },
                    error: function() {
                        alert('error handling here');
                    }
                });
				
				// var ajax = ajaxObj("POST", "login.php");
		  //       ajax.onreadystatechange = function() {
			 //        if(ajaxReturn(ajax) == true) {
			 //            if(ajax.responseText == "login_failed"){
				// 			status.innerHTML = '<h5><div class="alert">Wrong email or password</div></h5>';
				// 			// _("showloader").style.display = "none";
				// 		} else {
				// 			// window.location = "sync&"+ajax.responseText;
				// 			window.location = "student/dashboard.php";
				// 		}
			 //        }
		  //       }
		        // ajax.send("matrik="+matric+"&p="+encodeURIComponent(p));
			}
		}
		function register() {
			var r_status = _("r_status");
			// Text Field
			var r_matrik = _("r_matrik").value;
			var r_email = _("r_email").value;
			var r_password = _("r_password").value;
			if (r_matrik == "") {
				r_status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("r_matrik").style.borderColor = "red";
			} else if (r_email == "") {
				r_status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("r_email").style.borderColor = "red";
			} else if (r_password == "") {
				r_status.innerHTML = '<h5><div class="alert">Please fill out all of the form data</div></h5>';
				_("r_password").style.borderColor = "red";
			} else {
				  $.ajax({
                    url: "_register.php",
                    method: "POST",
                    data: $('#rform').serialize(),
                    success: function(data){
                        _("r_status").innerHTML = data;
                    },
                    error: function() {
                        alert('error handling here');
                    }
                });
			}
		}
    </script>
  </body>
</html>