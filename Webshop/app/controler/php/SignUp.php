<?php

require ('db_connect.php');
session_start();

if(!isset($_SESSION[$username]))
{   
    $msg="";
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $birthdate=$_POST['birthdate'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm-password'];
    $userid=rand(100,100000);

    if($first_name==null || $last_name==null || $email==null || $city==null || $phone==null || 
    $birthdate==null || $username==null || $password==null)
    {
        $msg="Not all of the values are entered<br>";   
    }
    elseif(!preg_match("/[a-zA-Z]{3,30}$/",$first_name))
    {
        $$msg="First name not valid<br>";   
    }
    elseif(!preg_match("/[a-zA-Z]{3,30}$/",$last_name))
    {
        $msg="Last name not valid<br>";   
    }
    elseif(!preg_match("/[a-zA-Z- ]{3,60}$/",$city))
    {
        $msg="City not valid<br>";   
    }
    elseif(!preg_match("/[0-9- ]{8,12}$/",$birthdate))
    {
        $msg="Date not valid<br>";   
    }
    else
    {         
        require_once ('db_connect.php');

        $stmt = $conn->query("SELECT * FROM user WHERE username = '$username';");
        $result = $stmt->fetch();
                
        if($stmt->rowCount() > 0)
        {      
            $msg="This username is already used! Please enter different one.";
        }
        else
        {  
            require_once('db_connect.php');
            $query='INSERT INTO user(user_id, first_name, last_name, email, city, phone, birthdate, username, password) VALUES (:user_id,:first_name,:last_name,:email,:city,:phone,:birthdate, :username,:password)';
        
            $stm=$conn->prepare($query);

            $stm->bindValue(':user_id',$userid);
            $stm->bindValue(':first_name',$first_name);
            $stm->bindValue(':last_name',$last_name);
            $stm->bindValue(':email',$email);
            $stm->bindValue(':city',$city);
            $stm->bindValue(':phone',$phone);
            $stm->bindValue(':birthdate',$birthdate);
            $stm->bindValue(':username',$username);
            $stm->bindValue(':password',$password);
            
            $execute_success=$stm->execute();
            $stm->closeCursor();
            if(!$execute_success)
            {
                print_r($stm->errorInfo()[2]);
            }
            else
            {
                header('location: http://localhost/Webshop/Login.html');
            }
        }
    }
    echo $msg;
}
?>

