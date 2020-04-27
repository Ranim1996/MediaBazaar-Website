<?php
session_start();

require ('./db_connect.php');
$msgCity = "";
if(!isset($_SESSION[$username]))
    {    
        if(isset($_POST['update-city']))
        {
            $username=$_SESSION['username'];           
            $city=$_POST['city'];        
    
            if(!empty($city))
            {
                require_once('./db_connect.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $conn->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {        
                    $user = $result[0];

                    $_SESSION['city'] = $user[4];
                    $_SESSION['username'] = $user[7];            
                    
                    require_once('./db_connect.php');
                    $query = "UPDATE user SET city = '$city' WHERE username = '$username';";
                
                    $stm=$conn->prepare($query);
                    $execute_success=$stm->execute();
                    $stm->closeCursor();    
                    header('location: ../ProfilePage.php');                            
                }
            } 
        }
    }

?>