<?php

	$username = 'dbi344446';
	$pass = '@Malak1996';
	$servername = 'studmysql01.fhict.local';
	$databaseName = 'dbi344446';

	try
	{
	    $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $pass);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    echo "Connected successfully";
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " .$e->getMessage();
	}

?>
