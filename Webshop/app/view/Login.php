<?php
require ('../controler/loginControl.class.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>MediaBazaar</title>
    <meta charset="utf-8"/>        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
    <link rel="stylesheet" type="text/css" href="/Webshop/app/view/css/styleLogin.css">
<body>
    <img class="logo" src="./css/images/mediaBazaarLogo.png" >
    <div class="loginbox"> 
        <h1>Hello!</h1>     
        
            <form name="LogInForm"  action = "Login.php" method= "POST">
                <p>Username</p>
                <input type="text"  name="username" placeholder="Enter Username">
                <p>Password</p>
                <input type="password"  name="password" placeholder="Enter Password">

                <input type="submit"  name="login" value="Login">            
            </form> 
            <p style="color:red"><?php if ($msg != "") echo "$msg<br><br>"; ?></p> 
    </div>
    <a class="registration-link" href="/Webshop/app/view/SignUp.php">Don't have an account?</a>
    <a class="new-password-link" href="/Webshop/app/view/ForgottenPassword.php">Forgotten password?</a>
    <footer class="footer">
        <p>Mediabazaar Client Account | Personal data</p>
    </footer>
</body>
</head>
</html>