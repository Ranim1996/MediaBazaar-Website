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
            $query_admin = "SELECT * FROM employee WHERE username='$username' AND password='$password' AND Position='ADMINISTRATOR';";
            $sth_admin = $dbconn->connect()->prepare($query_admin);
            $sth_admin->execute();
            $result_admin = $sth_admin->fetchAll();
            if (empty($username))
            {
                $msg="Username not entered<br>";   
            }
            else if(empty($password))
            {
                $msg="Password not entered<br>";   
            }
            else if($sth_admin->rowCount() > 0)
            {
                header('location: /Webshop/webshopAdmin/adminDashboard.php');
            }
            else
            {
                $query= "SELECT * FROM user WHERE Username='$username' AND Password='$password';";
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
                    header('location: /Webshop/app/view/ProfilePage.php');                            
                }
                else
                {
                    $msg="Wrong username/password<br>";   
                }
            } 
        }
    }
?>