<!DOCTYPE html>
<html>
<head>
	<title>Supervisor Login</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 ">
				<form action="" method="POST" id="svLogin">
					<span id="message"></span>
					<div class="form-group">
						<input type="text" name="id_num" placeholder="ID Number" id="id_num" onfocus="clearMessage()" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Password" id="password" onfocus="clearMessage()" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" id="login" class="btn btn-primary">
					</div>
					
				</form>
			</div>
		</div>
	</div>
	

</body>
<script src="../js/jquery.min.js"></script>
<script>

	$(document).ready(function() {
		$('#svLogin').on('submit', function(e) {
			e.preventDefault();
			var id_num = $('#id_num').val();
			var p = $('#password').val();
			var message = $("#message");
			if (id_num == "") {
				message.html("ID number cannot be blank");
				$("#id_num").css("border", "1px solid red");
			} else if (p == "") {
				message.html("Password cannot be blank");
				$("#id_num").css("border", "1px solid red");
			} else {
				$.ajax({
                    url: "_login.php",
                    method: "POST",
                    data: $('#svLogin').serialize(),
                    success: function(data){
                    	$("#message").html(data);
                        // if (data == 'berjaya') {
                        // 	window.location = "student/dashboard.php";
                        // } else {
                        // 	$("#status").html(data);
                        // }
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
		// $('#id_num').css("border", "black");
		// $('#password').css("border", "black");
	}
</script>
</html>