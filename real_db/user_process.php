<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
//For about page
$user_fname = '';
$user_lname = '';
$username = '';
$account_type = '';
$user_email = '';

if (isset($_POST['save'])){
	//For the user info
	$user_fname = $_POST['user_fname'];
	$user_lname = $_POST['user_lname'];
	$username = $_POST['username'];
	$account_type = $_POST['account_type'];
	$user_email = $_POST['user_email'];

	//for home page
	$mysqli->query("INSERT INTO user (user_fname, user_lname, username, account_type,user_email) VALUES('$user_fname','$user_lname','$username','$account_type','$user_email')") or die($mysqli->error);//for about page

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: user_crud.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
		// explicitly begin DB transaction

	$mysqli->query("DELETE FROM user WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: user_crud.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result12 = $mysqli->query("SELECT * FROM user WHERE id=$id") or die($mysqli->error());
	if ($result12->num_rows){
		$row = $result12->fetch_array();
	$user_fname = $row['user_fname'];
	$user_lname = $row['user_lname'];
	$username = $row['username'];
	$account_type = $row['account_type'];
	$user_email = $row['user_email'];

	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$user_fname = $_POST['user_fname'];
	$user_lname = $_POST['user_lname'];
	$username = $_POST['username'];
	$account_type = $_POST['account_type'];
	$user_email = $_POST['user_email'];

	//for About Page and Membership Page
	$mysqli->query("UPDATE user SET user_fname='$user_fname', user_lname='$user_lname',username='$username',account_type='$account_type',user_email='$user_email' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: user_crud.php');
}

?>