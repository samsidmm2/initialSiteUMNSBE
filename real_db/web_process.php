<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$heading = '';
$paragraph = '';

if (isset($_POST['save'])){
	$heading = $_POST['heading'];
	$paragraph = $_POST['paragraph'];


	$mysqli->query("INSERT INTO page_data (heading, paragraph) VALUES('$heading','$paragraph')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: web_crud.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM page_data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: web_crud.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM page_data WHERE id=$id") or die($mysqli->error());
	if ($result->num_rows){
		$row = $result->fetch_array();
		$heading = $row['heading'];
		$paragraph = $row['paragraph'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$heading = $_POST['heading'];
	$paragraph = $_POST['paragraph'];

	$mysqli->query("UPDATE page_data SET heading='$heading', paragraph='$paragraph' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: web_crud.php');
}

?>