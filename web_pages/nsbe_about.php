<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>About Us</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container">
	<?php
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result = $mysqli->query("SELECT * FROM page_data") or die($mysqli->error);
	?>
	<a href="http://localhost/nsbe_db/web_pages/nsbe_home.php" class="navbar-brand">
		 <!-- Logo Image -->
      <img src="https://www.logosurfer.com/wp-content/uploads/2018/03/nsbe-logo_0.png" width="45" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
		 <span class="text-uppercase font-weight-bold">Ole Miss Chapter</span>
	</a>
	<div id="tabs">
		<nav class="nav">
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/web_pages/nsbe_home.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/web_pages/nsbe_about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/web_pages/nsbe_memshippage.php">Membership</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="http://localhost/nsbe_db/web_pages/nsbe_contact.php" tabindex="-1" aria-disabled="true">Contact</a>
			</li>
		</nav>
	</div>
	<div >
		<h1 class="justify-content-center">About the Ole Miss NSBE Chapter</h1>
	</div>

	<div id ="about-table">
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
			<td class="row justify-content-center"><?php echo $row['heading']; ?></td>
			<td class="row"><?php echo $row['paragraph']; ?></td>
			</tr>
		<?php endwhile; ?>	

</table>
</div>
</div>
</body>
</html>