<?php
session_start();

if(isset($_SESSION['adminId']))
{
	session_destroy();
	header("location: http://localhost/nsbe_db/web_pages/nsbe_home.php");
}

?>