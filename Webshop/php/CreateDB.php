<?php

		$conn;
		$username = 'dbi344446';
		$pass = '1996';
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
		    $cisco_error = 'Try to connect to cisco!';
		    $err_mssg = $e->getMessage();
		    include('db_error.php');
		    exit();
		    #echo "Connection failed: " .$e->getMessage();
		}

		function getData(){
			global $conn;
	        $sql = "SELECT * FROM products";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

	        if (!$result) {
	        	die(mysql_error($conn));
	        }
	        else if(sizeof($result)> 0){
	            return $result;
	        }
        }

?>