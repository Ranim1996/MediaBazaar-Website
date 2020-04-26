<?php
    session_start();

    require ('./php/db_connect.php');
    
    $msg = "";
    if(!isset($_SESSION[$username]))
    {    
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];

            if (empty($username))
            {
                $msg="Username not entered<br>";   
            }
            else
            {
                require_once('./php/db_connect.php');
                $query= "SELECT * FROM user WHERE username='$username';";

                $sth = $conn->prepare($query);
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

                    require_once('./php/db_connect.php');
                    $query = "UPDATE user SET password = '$msg' WHERE username = '$username';";
                
                    $stm=$conn->prepare($query);    
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