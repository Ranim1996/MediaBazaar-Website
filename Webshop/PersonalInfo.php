    
<?php
session_start();
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
        <script src="./js/swich-iframes.js"></script>
    </head>
    <body>      
        <div class="sub-page-title">
            <h2>Personal Information</h2>
        </div>   
        
        <aside class="personal-info-content">
        <div class="name">
            <div class="first-name">
                <p>First name</p>
                <h3><?php echo $_SESSION['first_name'];?></h3>
            </div>
            <div class="last-name">
                <p>Last name</p>
                <h3><?php echo $_SESSION['last_name']; ?></h3>
            </div>
        </div>
        <p>City</p>
        <form  name="change-city" action="./php/UpdateCity.php" method="POST">
            <div class="new-value">
                <input id="new-city" class="change" type="text" name="city" value="<?php echo $_SESSION['city']; ?>">
                <input class="update" type="submit"  name="update-city" value="✓">
                <!-- <button type="submit" id="cityUpdate"></button> -->
            </div>  
        </form>


        <p>Date of birth</p>
        <h3><?php echo $_SESSION['birthdate']; ?></h3>
        <p>Phone number</p>
        <form action="./php/UpdatePhoneNumber.php" method="POST">
            <div class="new-value">
                <input class="change" type="text" name="phoneNr" value="<?php echo $_SESSION['phone']; ?>">  
                <input class="update" type="submit"  name="update-phoneNr" value="✓">                
            </div>
        </form>

        <p>Email</p>
        <form action="./php/UpdateEmail.php" method="POST">
            <div class="new-value">
                <input class="change" type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                <input class="update" type="submit"  name="update-email" value="✓"> 
            </div>  
        </form>       
        <div class="credentials">
            <div class="user">
                <p>Username</p>
                <h3><?php echo $_SESSION['username']; ?></h3>      
            </div>
            <div class="pass">
                <p>Password</p>
                <form action="./php/UpdatePasswordInProfilePage.php" method="POST">
                    <div class="new-value">
                        <input class="change" type="text" name="password" value="<?php echo $_SESSION['password']; ?>">
                        <input class="update" type="submit"  name="update-password" value="✓"> 
                    </div>  
                </form> 
            </div>            
        </div>                              
        
        </aside> 
    </body>
</html>  
