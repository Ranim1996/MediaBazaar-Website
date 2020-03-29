<?php 

    require('DBConnection.php');

    session_start();

    if(isset($_POST['login']))
    {
        if(empty($_POST["user"]) || empty($_POST["pass"]))
        {
            $message = '<label>All fields are required</label>';
            echo $message;
        }
        else
        {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $conn->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["user"],
                    'password' => $_POST["pass"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0)
            {
                $_SESSION["username"] = $_POST["user"];
    	        header('Location: ');
                exit;
            }
            else
            {
                $message = "Wrong data inserted";
                echo $message;
            }
        }
    }

?>


