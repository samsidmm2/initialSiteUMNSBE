<?php
//echo "Run Success <br>";
session_start();


if (isset($_SESSION['adminId'])) {
	require('./config/dbase.php');
	
	$adminId = $_SESSION['adminId'];
	
	if( isset($_POST['edit']) ) {

	$adminFirstName = filter_var($_POST['adminFirstName'], FILTER_SANITIZE_STRING);
	$adminLastName = filter_var($_POST['adminLastName'], FILTER_SANITIZE_STRING);
	$adminEmail = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL);
	$stmt = $pdo -> prepare('UPDATE admins SET firstname=?, lastname=?, email=? where id=?');
	$stmt -> execute( [ $adminFirstName, $adminLastName, $adminEmail, $adminId ] );

}
	
	//echo $userId;
	$stmt = $pdo -> prepare("SELECT * from admins where id = ?");
	$stmt -> execute([$adminId]);
	$user = $stmt -> fetch();


}

?>

<?php

require('./inc/header.html');
?>

<div class="container">
	<div class="card">
	<div class="card-header bg-light mb-3">Update your Admin Profile</div>
		<div class="card-body">
			<form action="profile.php" method="post">		
				<div class="form-group">
					<label for="adminFirstName" class="form-control">Admin First Name</label>
						<input required type="text" name="adminFirstName" class="form-control" value="<?php echo $user->firstname ?>">
				</div>
				<div class="form-group">
					<label for="adminFirstName" class="form-control">Admin Last Name</label>
						<input required type="text" name="adminFirstName" class="form-control" value="<?php echo $user->lastname ?>">
				</div>
					<div class="form-group">
					<label for="adminFirstName" class="form-control">Email</label>
						<input required type="text" name="adminFirstName" class="form-control" value="<?php echo $user->email ?>">
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
