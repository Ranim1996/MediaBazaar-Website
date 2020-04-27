<?php
session_start();

require ('./db_connect.php');
$msgCity = "";
if(!isset($_SESSION[$chageEmail]))
    {    
        if(isset($_POST['update-email']))
        {
            $username=$_SESSION['username'];           
            $email=$_POST['email'];        
    
            if(!empty($email))
            {
                require_once('./db_connect.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $conn->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {        
                    $user = $result[0];

                    $_SESSION['email'] = $user[3];
                    $_SESSION['username'] = $user[7];            
                    
                    require_once('./db_connect.php');
                    $query = "UPDATE user SET email = '$email' WHERE username = '$username'";
                
                    $stm=$conn->prepare($query);
                    $execute_success=$stm->execute();
                    $stm->closeCursor();                    
                }
            } 
        }
    }
   header('Location: ../ProfilePage.php');
?>