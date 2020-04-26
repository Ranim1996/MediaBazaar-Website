<?php
    session_start();

    require ('./php/db_connect.php');
    
    $msg = "";
    if(!isset($_SESSION[$username]))
    {    
        if(isset($_POST['login']))
        {
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
                require_once('./php/db_connect.php');
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
                    $_SESSION['city'] = $user[4];
                    $_SESSION['phone'] = $user[5];
                    $_SESSION['birthdate'] = $user[6];
                    $_SESSION['username'] = $user[7];
                    $_SESSION['password'] = $user[8];

                    header('location: ProfilePage.php');                            
                }
                else
                {
                    $msg="Wrong username/password<br>";   
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
    <link rel="stylesheet" type="text/css" href="../Webshop/css/styleLogin.css">
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
    <a class="registration-link" href="SignUp.php">Don't have an account?</a>
    <a class="new-password-link" href="ForgottenPassword.php">Forgotten password?</a>
    <footer class="footer">
        <p>Mediabazaar Client Account | Personal data</p>
    </footer>
</body>
</head>
</html>