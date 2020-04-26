<?php
session_start();

require ('./db_connect.php');
$msgCity = "";
if(!isset($_SESSION[$chagePassword]))
    {    
        if(isset($_POST['update-password']))
        {
            $username=$_SESSION['username'];           
            $password=$_POST['password'];        
    
            if(!empty($password))
            {
                require_once('./db_connect.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $conn->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {        
                    $user = $result[0];

                    $_SESSION['password'] = $user[8];
                    $_SESSION['username'] = $user[7];            
                    
                    require_once('./db_connect.php');
                    $query = "UPDATE user SET password = '$password' WHERE username = '$username'";
                
                    $stm=$conn->prepare($query);
                    $execute_success=$stm->execute();
                    $stm->closeCursor();                    
                }
            } 
        }
    }
   header('Location: ../ProfilePage.php');
?>