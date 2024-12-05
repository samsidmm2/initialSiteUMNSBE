<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Contact Us</title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title></title>
</head>
<body class="bg-danger">
	<div class="container bg-light gray">
		<a href="http://localhost/nsbe_db/web_pages/nsbe_home.php" class="navbar-brand">
		 <!-- Logo Image -->
      <img src="https://www.logosurfer.com/wp-content/uploads/2018/03/nsbe-logo_0.png" width="45" alt="" class="d-inline-block align-middle mr-2">
      <!-- Logo Text -->
		 <span class="text-uppercase text-danger font-weight-bold">Ole Miss Chapter of NSBE</span>
	</a>
	<div id="tabs">
		<nav class="nav navbar-light bg-success">
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_home.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_memshippage.php">Membership</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark" href="http://localhost/nsbe_db/web_pages/nsbe_contact.php" tabindex="-1" aria-disabled="true">Contact</a>
			</li>
		</nav>
	</div>
		<div>
		<h1 class="justify-content-center">Contact Us</h1>
	</div>
	<form method="post" action="contactmail.php" enctype="multipart/part-data">
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" id="firstname"  name="firstname" placeholder="First Name" required>
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" class="form-control" id="lastname"  name="lastname" placeholder="Last Name" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			 <input class="form-control" id="email" type="email" name="email" required>
		</div>
		<div class="form-group">
		<label>Subject</label>
			<input type="text" class="form-control" id="subject"  name="subject" placeholder="Subject" required>
		</div>
		<div class="form-group">
			<label>Message</label>
			<textarea class="form-control" id="Message" name="message" placeholder="Message"></textarea>
		</div>
		 <button type="submit" name="submit" value="submit">Submit</button>
	</form>
	  <br>
  <br>
  <?php include('templates\footers.php'); ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" 					crossorigin="anonymous"></script>
</body>
</html>