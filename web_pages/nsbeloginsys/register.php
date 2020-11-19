<?php
//echo "Run Success <br>";


if(isset($_POST['register'])) {
	require('./config/dbase.php');
/*
	$userFirstName = $_POST['userFirstName'];
	$userLastName = $_POST['userLastName'];
	$userEmail = $_POST['userEmail'];
	$password = $_POST['password'];
*/
	$userFirstName = filter_var($_POST['userFirstName'], FILTER_SANITIZE_STRING);
	$userLastName = filter_var($_POST['userLastName'], FILTER_SANITIZE_STRING);
	$userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$passwordHashed = password_hash(($password), PASSWORD_DEFAULT);

	if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
	//echo $userFirstName. " " . $userLastName . " " . $userEmail . " " . $password;
		$stmt = $pdo -> prepare("SELECT * from users where email = ?");
		$stmt -> execute([$userEmail]);
		$totalUsers = $stmt -> rowCount();

		//echo $totalUsers . '<br >';

		if($totalUsers > 0) {
			//echo "Email is already used";
			$emailUsed = "Email is already used";
			$_SESSION['message'] = $emailUsed;
		} else {
			$stmt = $pdo -> prepare('INSERT into users(firstname, lastname, email, password) VALUES(? , ?, ?, ?)');
			$stmt -> execute( [ $userFirstName, $userLastName, $userEmail, $passwordHashed ] );
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
					<label for="userFirstName" class="form-control">User First Name</label>
						<input required type="text" name="userFirstName" class="form-control">
				</div>
				<div class="form-group">
					<label for="userLastName" class="form-control">User Last Name</label>
						<input required type="text" name="userLastName" class="form-control">
				</div>
					<div class="form-group">
					<label for="userEmail" class="form-control">Email</label>
						<input required type="text" name="userEmail" class="form-control">
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
