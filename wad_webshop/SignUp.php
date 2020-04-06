<?php
session_start();

require ('php/db_connect.php');

if(!isset($_SESSION[$username]))
{   
    $msg="";
    if(isset($_POST['signup']))
    {
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $phone=$_POST['phone'];
        $birthdate=$_POST['birthdate'];
        $username=$_POST['username'];
        $password=$_POST['password'];
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
            require_once ('php/db_connect.php');

            $stmt = $conn->query("SELECT * FROM user WHERE username = '$username';");
            $result = $stmt->fetch();
                    
            if($stmt->rowCount() > 0)
            {      
                $msg="This username is already used! Please enter different one.";
            }
            else
            {  
                require_once('./php/db_connect.php');
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
                    header('location: http://localhost/Webshop/Login.php');
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>MediaBazaar</title>
    <meta charset="utf-8"/>        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
    <link rel="stylesheet" type="text/css" href="./css/styleSignUp.css">    
<body>
    <img class="logo" src="./css/images/mediaBazaarLogo.png" >
    <div class="SignUpBox">
        <h1>Sign Up</h1>
        <form name="SignUpForm" action = "SignUp.php" method= "POST">
                <p>First name</p>
                <input type="text" name="first_name" placeholder="Enter first name">
                <p>Last name</p>
                <input type="text" name="last_name" placeholder="Enter last name">
                <p>Email</p>
                <input type="email" name="email" placeholder="Enter email">
                <p>City</p>
                <input type="text" name="city" placeholder="Enter city">
                <p>Phone</p>
                <input type="text" name="phone" placeholder="Enter phone number">
                <p>Birthdate</p>
                <input type="text" name="birthdate" placeholder="Enter Birthdate (YYYY-mm-dd)">
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter Password">

                <input type="submit" name="signup" value="Create Account">                              
        </form>        
       <p style="color:red"><?php if ($msg != "") echo "$msg<br><br>"; ?></p> 
    </div>
    <a class="signup-link" href="Login.html">Have already an account?</a>
    
    <footer>
        <p>Mediabazaar Client Account | Personal data</p>
    </footer>
</body>
</head>
</html>