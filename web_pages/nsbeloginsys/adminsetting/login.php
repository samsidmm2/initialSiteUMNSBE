<?php
//echo "Run Success <br>";
session_start();

if(isset($_POST['login'])) {
	require('./config/dbase.php');

	$adminEmail = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$stmt = $pdo -> prepare("SELECT * from admins where email = ?");
	$stmt -> execute([$adminEmail]);
	$user = $stmt -> fetch();

	if(isset($user)) {
		if(password_verify(($password), $user -> password)) {
			echo "Correct email and password successfully";
			$_SESSION['adminID'] = $user -> id;
			header("location: http://localhost/nsbe_db/web_pages/nsbe_home.php");
		} else {
			//echo "Either incorrect email or password";
			$emailError = "Either incorrect email or password";
		}
	}

/*
	$user -> id;
	$user -> first_name;
	$user -> last_name;
	$user -> email;
*/
	//$passwordHashed = password_hash(($password), PASSWORD_DEFAULT);
/*
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
			$stmt = $pdo -> prepare('INSERT into users(first_name, last_name, email, password) VALUES(? , ?, ?, ?)');
			$stmt -> execute( [ $userFirstName, $userLastName, $userEmail, $passwordHashed ] );
		}
	}
*/
}

?>

<!DOCTYPE html>
<html>

<?php

require('./inc/header.html');
?>

<div class="container">
	<div class="card">
	<div class="card-header bg-light mb-3">Login</div>
		<div class="card-body">
			<form action="login.php" method="post">	
					<div class="form-group">
					<label for="adminEmail" class="form-control">Email</label>
						<input required type="text" name="userEmail" class="form-control">
						<br>
					<?php if(isset($emailError)) { ?>
						<?php echo $emailError;?>
					<?php } $emailError ?>
					</div>
				
					<div class="form-group">
					<label for="password" class="form-control">Password</label>
						<input required type="password" name="password" class="form-control">
				</div>
				<button name="login" type="submit" class="btn btn-success">Login</button>
				
			</form>
		</div>
	</div>
</div>


<?php
require('./inc/footer.html');
?>
