<?php
require ('../core/db_connect.class.php');
    session_start();

    $msg = "";
    
    if(!isset($_SESSION["Login"]))
    {    
        if(isset($_POST['login']))
        {
            $dbconn=new db_connect();

            $username=$_POST['username'];
            $password=$_POST['password'];

            if (empty($username))
            {
                $msg="Username not entered<br>";   
            }
            else if(empty($password))
            {
                $msg="Password not entered<br>";   
            }
            else
            {
                $query= "SELECT * FROM user WHERE username='$username' AND password='$password';";

                $sth = $dbconn->connect()->prepare($query);
                $sth->execute();
                $result = $sth->fetchAll();
                if($sth->rowCount() > 0)
                {
                    $user = $result[0];
                
                    $_SESSION['first_name'] = $user[1];
                    $_SESSION['last_name'] = $user[2];
                    $_SESSION['email'] = $user[3];
                    $_SESSION['city'] = $user[4];
                    $_SESSION['phone'] = $user[5];
                    $_SESSION['birthdate'] = $user[6];
                    $_SESSION['username'] = $user[7];
                    $_SESSION['password'] = $user[8];
                    $_SESSION['loggedin'] = TRUE;
                    header('location: http://localhost/Webshop/app/view/profilepage.php');                            
                }
                else
                {
                    $msg="Wrong username/password<br>";   
                }
            } 
        }
    }
?>