<?php

if(!isset($_SESSION['loggedin'])){
    header('Location: Index.php');
    exit;
}

require ('../core/db_connect.class.php');

$username = $_SESSION['username'];

$dbconn=new db_connect();

$query_user = "SELECT * FROM user WHERE username='$username'";
$user_statement =  $dbconn->connect()->prepare($query_user);
$user_statement->execute();
$user_details = $user_statement->fetchAll();
$user_statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MediaBazaar</title>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="./css/personal-info-style.css" type="text/css">
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    </head>
    <body>      
        <div class="sub-page-title">
            <h2>Personal Information</h2>
        </div>   

        <?php foreach($user_details as $user) ?>

        <aside class="personal-info-content">
        <div class="name">
            <div class="first-name">
                <p>First name</p>
                <h3><?php echo $user['first_name'];?></h3>
            </div>
            <div class="last-name">
                <p>Last name</p>
                <h3><?php echo $user['last_name']; ?></h3>
            </div>
        </div>
        <p>City</p>
        <form  name="change-city" action="./php/UpdateCity.php" method="POST">
            <div class="new-value">
                <input id="new-city" class="change" type="text" name="city" value="<?php echo $user['city']; ?>">
                <input class="update" id="changeCity" type="submit"  name="update-city" value="✓">
                <div id="errorMessageCity"></div>
                <!-- <button type="submit" id="cityUpdate"></button> -->
            </div>  
        </form>


        <p>Date of birth</p>
        <h3><?php echo $user['birthdate']; ?></h3>
        <p>Phone number</p>
        <form action="./php/UpdatePhoneNumber.php" method="POST">
            <div class="new-value">
                <input id="new-phone" class="change" type="text" name="phoneNr" value="<?php echo $user['phone']; ?>">  
                <input class="update" id="changePhone" type="submit"  name="update-phoneNr" value="✓">  
                <div id="errorMessagePhone"></div>              
            </div>
        </form>

        <p>Email</p>
        <form action="./php/UpdateEmail.php" method="POST">
            <div class="new-value">
                <input id="new-email" class="change" type="email" name="email" value="<?php echo $user['email']; ?>">
                <input class="update" id="changeEmail" type="submit"  name="update-email" value="✓"> 
                <div id="errorMessageEmail"></div>
            </div>  
        </form>       
        <div class="credentials">
            <div class="user">
                <p>Username</p>
                <h3><?php echo $user['username']; ?></h3>      
            </div>
            <div class="pass">
                <p>Password</p>
                <form action="./php/UpdatePasswordInProfilePage.php" method="POST">
                    <div class="new-value">
                        <input id="new-password" class="change" type="text" name="password" value="<?php echo $user['password']; ?>">
                        <input class="update" id="changePassword" type="submit"  name="update-password" value="✓"> 
                        <div id="errorMessagePass"></div>
                    </div>  
                </form> 
            </div>            
        </div>                              
        
        </aside> 
        <script src="./js/swich-iframes.js"></script>
        <script src="./js/validationProfile.js"></script>
    </body>
</html>  
