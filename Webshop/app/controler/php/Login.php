<?php

    require ('db_connect.php');
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if(!isset($_SESSION['username']))
    {    
        if (empty($username))
        {
            $err_msg="Username not entered<br>";   
            include('db_error.php');
        }
        if(empty($password))
        {
            $err_msg="Password not entered<br>";   
            include('db_error.php');
        }
        else
        {
            require_once('db_connect.php');
            $query= "SELECT * FROM user WHERE username='$username' AND password='$password';";

        $sth = $conn->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll();
        if($sth->rowCount() > 0)    
                {
                    $user = $result[0];
                   
                    $_SESSION['first_name'] = $user[1];
                    $_SESSION['last_name'] = $user[2];
                    $_SESSION['email'] = $user[3];
                    $_SESSION['phone'] = $user[5];
                   
                    header('location: /Webshop/app/view/PersonalInfo.php');
                    
                }
                else
                {
                    $err_msg="Wrong username/password<br>";   
                    include('db_error.php');
                }
                exit();
        } 
    }
?>