<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$databasename ='nsbelogin';

	//set DSN - Database  Source Name
	$dbSourceName = 'mysql:host=' .$host .'; dbname=' . $databasename;


	try {
		//create a PDO instance
		$pdo = new PDO($dbSourceName, $user, $password);
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
	} catch(PDOException $e) {
		echo "Connection failed: " .$e->getMessage();
	}
?>