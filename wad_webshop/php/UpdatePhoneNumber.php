<?php
session_start();

require ('./db_connect.php');
$msgCity = "";
if(!isset($_SESSION[$chagePhoneNr]))
    {    
        if(isset($_POST['update-phoneNr']))
        {
            $username=$_SESSION['username'];           
            $phoneNr=$_POST['phoneNr'];        
    
            if(!empty($phoneNr))
            {
                require_once('./db_connect.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $conn->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {        
                    $user = $result[0];

                    $_SESSION['phoneNr'] = $user[5];
                    $_SESSION['username'] = $user[7];            
                    
                    require_once('./db_connect.php');
                    $query = "UPDATE user SET phone = '$phoneNr' WHERE username = '$username'";
                
                    $stm=$conn->prepare($query);
                    $execute_success=$stm->execute();
                    $stm->closeCursor();                    
                }
            } 
        }
    }
   header('Location: ../ProfilePage.php');
?>