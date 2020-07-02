<?php include "./includes/header.php"; ?>
<?php include "./includes/navigation.php"; ?>
<?php include "../includes/config.php"; ?>


<?php 

$email = $_SESSION['user']; 

extract($_POST);
if (isset($save)) {
	
	if ($old_password == "" || $new_password == "" || $confirm_password == "") {
		
		$message = "<font color='red'>Fill all the fields first</font>";
	} else {

		$old_password = md5($old_password);

		$query = "SELECT * FROM users WHERE password = '$old_password'";
		$password_query = mysqli_query($connection, $query);
		$row = mysqli_num_rows($password_query);

		if ($row == true) {
			
			if ($new_password == $confirm_password) {
				
				$new_password = md5($new_password);

				$query = "UPDATE users SET password = '$new_password' WHERE email = '$email'";

				$update_password_query = mysqli_query($connection, $query);

				if (!$update_password_query) {
					
					die("query failed") . mysqli_error($connection);
				} else {
					$message = "<font color='green'>Update successful</font>";
				}

				
			} else {

				$message = "<font color='red'>New password not match with confirm password</font>";
			}
		} else {
			$message = "<font color='red'>Wrong old password</font>";
		}
	}
}



 ?>



<div class="container">
	<h4><?php echo @$message; ?></h4>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Change password
		</div>
		<div class="panel-body">
			<form method="post">
				<div class="form-group">
					<label for="username">Your old password</label>
					<input type="text" name="old_password" class="form-control" placeholder="Old Password">
				</div>
				<div class="form-group">
					<label for="email">Your new password</label>
					<input type="text" name="new_password" class="form-control" placeholder="New Password">
				</div>
				<div class="form-group">
					<label for="email">Confirm password</label>
					<input type="text" name="confirm_password" class="form-control" placeholder="Confirm Password">
				</div>
				<!-- <div class="form-group">
					<label for="password">Password</label>
					<input type="text" name="password" class="form-control" placeholder="Password" value="<?php //echo $password; ?>">
				</div> -->
				<div class="form-group">
					<input type="submit" name="save" class="btn btn-primary" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>



<?php include "./includes/footer.php"; ?>