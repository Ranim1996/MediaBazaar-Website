<?php
session_start();

include ('../controler/SignUpController.php')
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
                <p>Confirm password</p>
                <input type="password" name="confirm-password" placeholder="Enter Password">

                <input type="submit" name="signup" value="Create Account">                              
        </form>        
       <p style="color:red"><?php if ($msg != "") echo "$msg<br><br>"; ?></p> 
    </div>
    <a class="signup-link" href="./Login.php">Have already an account?</a>
    
    <footer>
        <p>Mediabazaar Client Account | Personal data</p>
    </footer>
</body>
</head>
</html>