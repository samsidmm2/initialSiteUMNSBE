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
	<?php require_once 'web_process.php'; ?>
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
		$result = $mysqli->query("SELECT * FROM page_data") or die($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		//pre_r($result->fetch_assoc());
		?>

		<div class="row justify-content-center">
			<h1>CRUD Table</h1>
		</div>
		<div class="row">
			<br>
			<br>
			<h2>For About Page</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Heading</th>
						<th>Paragraph</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>

			<?php
				while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['heading']; ?></td>
						<td><?php echo $row['paragraph']; ?></td>
						<td>
							<a href="web_crud.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
							<a href="web_process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
	<form action="web_process.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label>Heading</label>
				<input type="text" name="heading" class="form-control" value="<?php echo $heading; ?>" placeholder="Enter the heading">
			</div>
			<div class="form-group">
				<label>Paragraph</label>
				<textarea name="paragraph" class="form-control form-control-lg" value="<?php echo $paragraph; ?>" placeholder="Enter the paragraph"></textarea>
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
	</div>
</body>
</html>