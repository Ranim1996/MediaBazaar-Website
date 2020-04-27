<!-- <?php

require ('db_connect.php');
session_start();

if(!isset($_SESSION[$products]))
{
    try
    {            
        require_once ('db_connect.php');

        $stmt = $conn->query("SELECT * FROM product WHERE Category = 'Tablet';");
        $nrProducts = $stmt->fetch();
        
        if($stmt->rowCount() > 0)
        {     
            echo count($nrProducts);      
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

?> -->