<?php
//echo "Run Success <br>";
session_start();


if (isset($_SESSION['userId'])) {
	require('./config/dbase.php');
	
	$userId = $_SESSION['userId'];
	
	if( isset($_POST['edit']) ) {

	$userFirstName = filter_var($_POST['userFirstName'], FILTER_SANITIZE_STRING);
	$userLastName = filter_var($_POST['userLastName'], FILTER_SANITIZE_STRING);
	$userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
	$stmt = $pdo -> prepare('UPDATE users SET firstname=?, lastname=?, email=? where id=?');
	$stmt -> execute( [ $userFirstName, $userLastName, $userEmail, $userId ] );

}
	
	//echo $userId;
	$stmt = $pdo -> prepare("SELECT * from users where id = ?");
	$stmt -> execute([$userId]);
	$user = $stmt -> fetch();


}

?>

<?php

require('./inc/header.html');
?>

<div class="container">
	<div class="card">
	<div class="card-header bg-light mb-3">Update your Profile</div>
		<div class="card-body">
			<form action="profile.php" method="post">		
				<div class="form-group">
					<label for="userFirstName" class="form-control">User First Name</label>
						<input required type="text" name="userFirstName" class="form-control" value="<?php echo $user->firstname ?>">
				</div>
				<div class="form-group">
					<label for="userLastName" class="form-control">User Last Name</label>
						<input required type="text" name="userLastName" class="form-control" value="<?php echo $user->lastname ?>">
				</div>
					<div class="form-group">
					<label for="userEmail" class="form-control">Email</label>
						<input required type="text" name="userEmail" class="form-control" value="<?php echo $user->email ?>">
						<br>
					<?php if(isset($emailUsed)) { ?>
						<?php echo $emailUsed;?>
					<?php } $emailUsed ?>
					</div>
				
				<button name="edit" type="submit" class="btn btn-success">Update</button>
				
			</form>
		</div>
	</div>
</div>


<?php
require('./inc/footer.html');
?>
