<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<?php require_once 'user_process.php'; ?>
	<?php 

	if (isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
	<?php endif ?>
	<div class="container">
	<?php 
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result12 = $mysqli->query("SELECT * FROM user") or die($mysqli->error); //for about page
		//pre_r($result12);
		//pre_r($result12->fetch_assoc());
		//pre_r($result12->fetch_assoc());
		?>

		<div class="row justify-content-center">
			<h1>CRUD Table</h1>
		</div>
			<div id="crud-tabs">
		<nav class="nav">
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/real_db/home_crud.php">Home Crud</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/real_db/web_crud.php">About Crud</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/real_db/mempage_crud.php" tabindex="-1" aria-disabled="true">Membership Crud</a>
			</li>
		</nav>
	</div>
		<div class="row">
			<br>
			<br>
			<!--Beginning of the About Page components-->
			<h2>For The List of Users</h2>
			<table class="table">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Username</th>
						<th>Account Type</th>
						<th>Email</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>

			<?php
				while ($row = $result12->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['user_fname']; ?></td>
						<td><?php echo $row['user_lname']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['account_type']; ?></td>
						<td><?php echo $row['user_email']; ?></td>
						<td>
							<a href="user_crud.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
							<a href="user_process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						</td>	
					</tr>
			<?php endwhile; ?>		
			</table>
		</div>
		<?php

		function pre_r( $array ) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';	
		}
		?>

	<div class=" justify-content-center">
	<form action="user_process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<!--For User Info Page-->
			<label>First Name</label>
				<input type="text" name="user_fname" class="form-control" value="<?php echo $user_fname; ?>" placeholder="Enter the First Name of the Members">
			</div>
			<div class="form-group">
				<label>Last Name</label>
				<input type="text"  name="user_lname" class="form-control form-control-lg" value="<?php echo $user_lname; ?>" placeholder="Enter the Last Name of the Members">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text"  name="username" class="form-control form-control-lg" value="<?php echo $username; ?>" placeholder="Enter the Username for the Member">
			</div>
			<div class="form-group">
				<label>Account Type</label>
				<input type="text"  name="account_type" class="form-control form-control-lg" value="<?php echo $account_type; ?>" placeholder="Enter the Account Type for the Member">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text"  name="user_email" class="form-control form-control-lg" value="<?php echo $user_email; ?>" placeholder="Enter the Email for the Member">
			</div>
			<div class="form-group">
			<?php 
			if ($update == true):
				?>
				<button type="submit" class="btn btn-info" name="update">Update</button>
			<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
		<?php endif; ?>
		</div>
		</form>
	</div>
<!-- end of the About Page/Membership Page Components-->
			<br>
			<br>
	</div>
</body>
</html>