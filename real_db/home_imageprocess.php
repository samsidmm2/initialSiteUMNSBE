<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
//$home_image = '';
//$test_description = '';

if (isset($_POST['save'])){
	//$home_image = $_POST['home_image'];
	$home_image = $_FILES['home_image']['name'];

	$path = 'images/'.$home_image;	
	echo $path;
	//$test_description = $_POST['test_description'];

	if(move_uploaded_file($_FILES['home_image']['tmp_name'], $path)){
			$_SESSION['message'] = "Record has been saved!";
			$_SESSION['msg_type'] = "success";
		} else {
			$_SESSION['message'] = "Record has not been saved!";
			$_SESSION['msg_type'] = "failure";
	}


	$mysqli->query("INSERT INTO home_data (home_image) VALUES('$home_image')") or die($mysqli->error);

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: home_imagecrud.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM home_data WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: home_imagecrud.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT home_image FROM home_data WHERE id=$id") or die($mysqli->error());
	if ($result->num_rows){
		$row = $result->fetch_array();
		$home_image = "images/{$row['home_image']}";
		//$test_description = $row['test_description'];

	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$home_image = $_FILES['home_image']['name'];

	$path1 = 'images/'.$home_image;	
	echo $path1;

	//$test_description = $_POST['test_description'];

		if(move_uploaded_file($_FILES['home_image']['tmp_name'], $path1)){
			$_SESSION['message'] = "Record has been updated!";
			$_SESSION['msg_type'] = "warning";
		} else {
			$_SESSION['message'] = "Record has not been updated!";
			$_SESSION['msg_type'] = "failure";
	}

	$mysqli->query("UPDATE home_data SET home_image='$home_image' WHERE id=$id") or die($mysqli->error);

	$_SESSION['message'] = "Record has been updated";
	$_SESSION['msg_type'] = "warning";

	header('location: home_imagecrud.php');
}
?>