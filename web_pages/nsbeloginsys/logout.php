<?php
session_start();

if(isset($_SESSION['userId']))
{
	session_destroy();
	header("location: http://localhost/nsbe_db/web_pages/nsbe_home.php");
}

?>