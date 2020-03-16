<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
//For about page
$heading = '';
$paragraph = '';
//for Membership Page
$mem_heading = '';
$mem_paragraph = '';

if (isset($_POST['save'])){
	//For about page
	$heading = $_POST['heading'];
	$paragraph = $_POST['paragraph'];

	//for Membership Page
	$mem_heading = $_POST['mem_heading'];
	$mem_paragraph = $_POST['mem_paragraph'];

	$mysqli->query("INSERT INTO page_data (heading, paragraph, mem_heading, mem_paragraph) VALUES('$heading','$paragraph','$mem_heading','$mem_paragraph')") or die($mysqli->error);//for about and membership pages

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
		//for About Page
		$heading = $row['heading'];
		$paragraph = $row['paragraph'];
		//for Membership Page
		$mem_heading = $row['mem_heading'];
		$mem_paragraph = $row['mem_paragraph'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	//for About Page
	$heading = $_POST['heading'];
	$paragraph = $_POST['paragraph'];
	//for Membership Page
	$mem_heading = $_POST['mem_heading'];
	$mem_paragraph = $_POST['mem_paragraph'];

	//for About Page and Membership Page
	$mysqli->query("UPDATE page_data SET heading='$heading', paragraph='$paragraph', mem_heading='$mem_heading', mem_paragraph='$mem_paragraph' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: web_crud.php');
}

?>