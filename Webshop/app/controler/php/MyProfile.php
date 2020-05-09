<?php   

    require ('db_connect.php');
    session_start();
            
    if(!isset($_SESSION[$username]))
    {   
        try
        {            
            require_once ('db_connect.php');

            $stmt = $conn->query("SELECT * FROM user WHERE username = '$username' ;");
            $result = $stmt->fetch();
            
            if($stmt->rowCount() > 0)
            {     
                echo $result['username'];      
            }
            else
            {
                echo "Error";
            }
            $conn =null;
        }
        catch(PDOException $e) 
        {
            echo $e->getMessage();
        }
    }
    else
    {
        echo "Sesion not set";
    }    
?>