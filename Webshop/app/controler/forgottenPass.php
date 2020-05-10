<?php    
require ('../core/db_connect.class.php');

    $msg = "";
    if(!isset($_SESSION["forgotten_pass"]))
    {    
        $dbconn=new db_connect();
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];

            if (empty($username))
            {
                $msg="Username not entered<br>";   
            }
            else
            {
                require_once('../core/db_connect.class.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $dbconn->connect()->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {        
                    $user = $result[0];

                    $_SESSION['username'] = $user[7];
                    $_SESSION['password'] = $user[8];
                    
                    $length=8;
                    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                    $max = mb_strlen($keyspace, '8bit') - 1;
                    
                    for ($i = 0; $i < $length; ++$i)
                    {
                        $msg .= $keyspace[random_int(0, $max)];
                    }       

                    require_once('../core/db_connect.class.php');
                    $query = "UPDATE user SET password = '$msg' WHERE username = '$username';";
                
                    $stm=$dbconn->connect()->prepare($query);    
                    $stm->execute();                    
                    $stm->closeCursor();    
                }
                else
                {
                    $msg="Wrong username"; 
                }
            } 
        }
                        
    }
    ?>