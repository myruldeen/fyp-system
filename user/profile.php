<?php include "./includes/header.php"; ?>
<?php include "./includes/navigation.php"; ?>

<?php include "../includes/config.php"; ?>

<?php

$email = $_SESSION['user']; 

$query = "SELECT * FROM users WHERE email = '$email'";
$select_user_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($select_user_query)) {

	$username = $row['username'];
	$email = $row['email'];
	//$password = $row['password'];

}

extract($_POST);
if (isset($update)) {

	$username = mysqli_real_escape_string($connection, $username);
	$email = mysqli_real_escape_string($connection, $email);
	//$password = mysqli_real_escape_string($connection, $password);

	//$password_encrypt = md5($password);

	$query = "UPDATE users SET username = '$username' WHERE email = '$email'";
	//$query = "password = '$password_encrypt' WHERE email = '$email'";

	$update_query = mysqli_query($connection, $query);

	if (!$update_query) {
		
		die("Query failed") . mysqli_error($connection);
	} else {

		$message = "<font color='green'>Update successful</font>";
	}
}

 ?>



<div class="container">
	<h4><?php echo @$message; ?></h4>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Profile
		</div>
		<div class="panel-body">
			<form method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" disabled>
				</div>
				<!-- <div class="form-group">
					<label for="password">Password</label>
					<input type="text" name="password" class="form-control" placeholder="Password" value="<?php //echo $password; ?>">
				</div> -->
				<div class="form-group">
					<input type="submit" name="update" class="btn btn-primary" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include "./includes/footer.php"; ?>