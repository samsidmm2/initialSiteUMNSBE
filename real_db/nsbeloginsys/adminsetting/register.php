<?php
//echo "Run Success <br>";


if(isset($_POST['register'])) {
	require('./config/dbase.php');
/*
	$adminFirstName = $_POST['adminFirstName'];
	$adminLastName = $_POST['adminLastName'];
	$adminEmail = $_POST['adminEmail'];
	$password = $_POST['password'];
*/
	$adminFirstName = filter_var($_POST['adminFirstName'], FILTER_SANITIZE_STRING);
	$adminLastName = filter_var($_POST['adminLastName'], FILTER_SANITIZE_STRING);
	$adminEmail = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$passwordHashed = password_hash(($password), PASSWORD_DEFAULT);

	if(filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
	//echo $adminFirstName. " " . $adminLastName . " " . $adminEmail . " " . $password;
		$stmt = $pdo -> prepare("SELECT * from admins where email = ?");
		$stmt -> execute([$adminEmail]);
		$totalUsers = $stmt -> rowCount();

		//echo $totalUsers . '<br >';

		if($totalUsers > 0) {
			//echo "Email is already used";
			$emailUsed = "Email is already used";
			$_SESSION['message'] = $emailUsed;
		} else {
			$stmt = $pdo -> prepare('INSERT into admins(firstname, lastname, email, password) VALUES(? , ?, ?, ?)');
			$stmt -> execute( [ $adminFirstName, $adminLastName, $adminEmail, $passwordHashed ] );
			header("location: http://localhost/nsbe_db/web_pages/nsbe_home.php");
		}
	}

}

?>

<!DOCTYPE html>
<html>

<?php

require('./inc/header.html');
?>

<div class="container">
	<div class="card">
	<div class="card-header bg-light mb-3">Register</div>
		<div class="card-body">
			<form action="register.php" method="post">		
				<div class="form-group">
					<label for="adminFirstName" class="form-control">User First Name</label>
						<input required type="text" name="adminFirstName" class="form-control">
				</div>
				<div class="form-group">
					<label for="adminLastName" class="form-control">User Last Name</label>
						<input required type="text" name="adminLastName" class="form-control">
				</div>
					<div class="form-group">
					<label for="adminEmail" class="form-control">Email</label>
						<input required type="text" name="adminEmail" class="form-control">
						<br>
					<?php if(isset($emailUsed)) { ?>
						<?php echo $emailUsed;?>
					<?php } $emailUsed ?>
					</div>
				
					<div class="form-group">
					<label for="password" class="form-control">Password</label>
						<input required type="password" name="password" class="form-control">
				</div>
				<button name="register" type="submit" class="btn btn-success">Register</button>
				
			</form>
		</div>
	</div>
</div>


<?php
require('./inc/footer.html');
?>
