<?php

	require('DBConnection.php');

	if(isset($_POST['signup']))
	{
		if(empty($_POST["name"]) || empty($_POST["pass"]) || empty($_POST["mail"]))
        {
            $message = '<label>All fields are required</label>';
            echo $message;
        }
        else {

	        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password ,:email)";
	        $statement = $conn->prepare($query);
	        $statement->execute(
	            array(
	                'username' => $_POST["name"],
	                'email' => $_POST["mail"],
	                'password' => $_POST["pass"]
	            )
	        );

	        $count = $statement->rowCount();

	        if($count > 0)
	        {
		        header('Location: ');
	            exit;
	        }

	        else
	        {
	            $message = "ERROR";
	            echo $message;
	        }
	    }
    }

?>