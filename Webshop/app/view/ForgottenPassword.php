<?php
    session_start();

    require ('../controler/forgottenPass.php');
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
        <h1>New Password</h1>     
        
            <form name="LogInForm"  action = "ForgottenPassword.php" method= "POST">
                <p>Username</p>
                <input type="text"  name="username" placeholder="Enter Username">
               
                <input type="submit"  name="login" value="Generate">            
            </form> 
            <p style="color:red"><?php if ($msg != "") echo "Your new password is: $msg<br><br>"; ?></p> 
    </div>
    <a class="registration-link" href="Login.php">Login</a>
    <footer class="footer">
        <p>Mediabazaar Client Account | Personal data</p>
    </footer>
</body>
</head>
</html>