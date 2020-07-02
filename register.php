<?php include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php //ob_start(); ?>

<?php 

extract($_POST);
if (isset($register)) {

	if ($email == "" || $password == "" || $username == "") {

		$message = "<font color='red'>Fill all the fields first</font>";

	} else {


		//to check the user is exist or not
		$query = "SELECT * FROM users WHERE email = '$email'";
		$validate_user_query = mysqli_query($connection, $query);

		$row = mysqli_num_rows($validate_user_query);

		if ($row == true) {
			
			$message = "<font color='red'>This user already exists</font>";
		} else {

			$username = mysqli_real_escape_string($connection, $username);
			$email = mysqli_real_escape_string($connection, $email);
			$password = mysqli_real_escape_string($connection, $password);


			$password_encrypt = md5($password);

			$query = "INSERT INTO users VALUES('', '$username', '$email', '$password_encrypt')";

			$register_query = mysqli_query($connection, $query);

			if (!$register_query) {

				die("Query failed!") . mysqli_error($connection);
			} else {

				$message = "<font color='green'>Registration successful -> <a href='index.php'>login here</a></font>";
			}

		}
	}
	
	


}




 ?>



	<div class="container">
		<h4><?php echo @$message; ?></h4>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Register
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<input type="submit" name="register" class="btn btn-primary" value="Register">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php include "includes/footer.php"; ?>