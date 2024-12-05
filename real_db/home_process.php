<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
//For home page
$home_heading = '';
$home_paragraph = '';

if (isset($_POST['save'])){
	//For home page
	$home_heading = $_POST['home_heading'];
	$home_paragraph = $_POST['home_paragraph'];

	$mysqli->query("INSERT INTO home_data (home_heading, home_paragraph) VALUES('$home_heading','$home_paragraph')") or die($mysqli->error);//for home and membership pages

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: home_crud.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM home_data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: home_crud.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT home_heading, home_paragraph FROM home_data WHERE id=$id") or die($mysqli->error());
	if ($result->num_rows){
		$row = $result->fetch_array();
		//for home Page
		$home_heading = $row['home_heading'];
		$home_paragraph = $row['home_paragraph'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	//for home Page
	$home_heading = $_POST['home_heading'];
	$home_paragraph = $_POST['home_paragraph'];

	//for home Page
	$mysqli->query("UPDATE home_data SET home_heading='$home_heading', home_paragraph='$home_paragraph' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: home_crud.php');
}

?> 