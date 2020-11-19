<?php
session_start();

if (isset($_SESSION['userId'])) {
	require('./nsbeloginsys/config/dbase.php');

	$userId = $_SESSION['userId'];
	//echo $userId;
	$stmt = $pdo -> prepare("SELECT * from users where id = ?");
	$stmt -> execute([$userId]);
	$user = $stmt -> fetch();
/*
	if($user->account_type ==='regular')
	{
		$message = "You have a regular account";
	} 
	*/
}





//echo "Run Success <br>";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://localhost/nsbe_db/web_pages/injectNSBEEvents.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Home Page</title>
</head>
<body class="bg-danger">
	<div class="container bg-light gray">
		<a href="http://localhost/nsbe_db/web_pages/nsbe_home.php" class="navbar-brand">
		 <!-- Logo Image -->
      <img src="https://www.logosurfer.com/wp-content/uploads/2018/03/nsbe-logo_0.png" width="45" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
		 <span class="text-uppercase text-danger font-weight-bold">Ole Miss Chapter of NSBE</span>
	</a>
	<?php
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT home_heading, home_paragraph,home_image FROM home_data") or die($mysqli->error);
		//$result1 = $mysqli->query("SELECT home_image from home_data") or die($mysqli->error);
	?>
	<div id="tabs">
		<nav class="nav navbar-expand-lg navbar-light bg-success">
			<li class="nav-item" >
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_home.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_memshippage.php">Membership</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_contact.php" >Contact</a>
			</li>
			<li class="nav-item justify-content-end">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/nsbeloginsys/login.php" tabindex="-1" aria-disabled="true">Login</a>
			</li>
			<li class="nav-item justify-content-end">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/nsbeloginsys/register.php" tabindex="-1" aria-disabled="true">Register</a>
			</li>
		</nav>
	</div>
		<div>
		<h1 class="justify-content-center">Welcome to the Ole Miss NSBE Chapter Website</h1>

	</div>
	<div id ="home-table">
<table class="table table-borderless">
	<!--thead>
			<tr>
				<th class="row justify-content-center">Heading</th>
				<th class="row justify-content-center">Paragraph</th>
			</tr>
	</thead-->



	<?php
	while ($row = $result->fetch_assoc()): ?>
		<tr>

			<td class="row justify-content-center"><?php echo $row['home_heading']; ?></td>
			<td class="row justify-content-center">
				 <?php echo "<img class='img-thumbnail' src='http://localhost/nsbe_db/real_db/images/{$row['home_image']}' width='350' height='350'>"; ?>
			</td>			
			<td class="row"><?php echo $row['home_paragraph']; ?></td>

			</tr>
		<?php endwhile; ?>	



</table>
</div>
  <br>
  <br>
  <?php include('templates\footers.php'); ?>
</div>
</body>
</html>