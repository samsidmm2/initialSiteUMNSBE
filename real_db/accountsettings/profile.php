<!DOCTYPE html>
<html>
<head>
	<title>User Setting</title>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
		<?php
		$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
		$result12 = $mysqli->query("SELECT user_fname, user_lname FROM user") or die($mysqli->error);
	?>
	<div class="container">
		<div class="justify-content-center">
			<div class="card rounded-0 mt-3 border-primary">
				<div class="card-header border-primary">
					<ul class="nav nav-tab card-header-tabs">
						<li class="nav-item">
							<a href="#profile" class="nav-link active font-weight-bold" data-toggle="tab">
								Profile
							</a>
						</li>
						<li class="nav-item">
							<a href="#editProfile" class="nav-link active font-weight-bold" data-toggle="tab">
								Edit Profile
							</a>
						</li>
						<li class="nav-item">
							<a href="#changePassword" class="nav-link active font-weight-bold" data-toggle="tab">
								Change Password
							</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
						<!--Beginning of Profile Tab-->
						<div class="tab-pane coontainer active" id="profile">
							<div class="card-deck">
								<div class="card border-primary" id="userinfo">
									<div class="card-header bg-primary text-light text-center lead">
										User ID:
									</div>
									<div class="card-body" id="firstname">
										<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8;"><b>
											First Name: 
										</b>
										</p>
									</div>
									<div class="card-body" id="lastname">
										<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8;"><b>
											Last Name: 
										</b>
										</p>
									</div>
									<div class="card-body" id="useremail">
										<p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8;"><b>
											Email:
										</b>
										</p>
									</div>
								</div>
								<div class="card border-primary">
									<!--Card For Profile Pic-->
								</div>
							</div>
						</div>
					</div>
					<!--End of the Profile Tab-->
					<!--Beginning of Edit Profile Tab-->
					<div class="tab-pane coontainer active" id="editProfile">
						<div class="card-deck">

						</div>
					</div>
					<!--End of Edit Profile Tab-->
				</div>

			</div>
		</div>
	</div>
</body>
</html>