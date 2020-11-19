<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
//for Membership Page
$mem_heading = '';
$mem_paragraph = '';

// check connection
if(mysqli_connect_errno())
{
  printf("Connect failed: %s\n",mysqli_connect_error());
  exit();
}


if (isset($_POST['save'])){

	//for Membership Page
	$mem_heading = $_POST['mem_heading'];
	$mem_paragraph = $_POST['mem_paragraph'];


	//for home page
	$mysqli->query("INSERT INTO membership_data (mem_heading, mem_paragraph) VALUES('$mem_heading','$mem_paragraph')") or die($mysqli->error);//for about and membership pages


	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: mempage_crud.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
		// explicitly begin DB transaction

	$mysqli->query("DELETE FROM membership_data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: mempage_crud.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM membership_data WHERE id=$id") or die($mysqli->error());


	if ($result->num_rows){
		$row = $result->fetch_array();
		//for Membership Page
		$mem_heading = $row['mem_heading'];
		$mem_paragraph = $row['mem_paragraph'];

	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	//for Membership Page
	$mem_heading = $_POST['mem_heading'];
	$mem_paragraph = $_POST['mem_paragraph'];


	//for Membership Page
	$mysqli->query("UPDATE membership_data SET mem_heading='$mem_heading', mem_paragraph='$mem_paragraph' WHERE id=$id") or die($mysqli->error);


	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: mempage_crud.php');
}

?>