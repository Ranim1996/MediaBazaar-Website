<?php
    session_start();

    require ('./db_connect.php');
    $city=$_POST["city"];

    if(!empty($city))
            {
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
    
                        $_SESSION['city'];
                        $_SESSION['username'] = $user[7];            
                        
                        require_once('./db_connect.php');
                        $query = "UPDATE user SET city = '$city' WHERE username = '$username';";
                    
                        $stm=$conn->prepare($query);
                        $execute_success=$stm->execute();
                        $stm->closeCursor();
                        
                        if($execute_success)
                        {
                            echo "DATA updated";
                        }
                        else{
                            echo "DATA not updated";
                        }
                    }
                }
            }
?>