<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MediaBazaar</title>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link rel="stylesheet" href="./css/style.css" type="text/css">
        <link rel="stylesheet" href="./css//all.min.css" type="text/css">
        <link rel="stylesheet" href="./css/style-profilepage.css" type="text/css">
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <form action="./php/MyProfile.php" method="POST"></form>
        <header class="main-header">
            <i class="fas fa-bars"></i>
            <a href="Index.html"><img src="./css/images/mediaBazaarLogo.png"></a>
            <input type="search" id="search-stock">
            <label for="search-stock"><i class="fas fa-search"></i></label>
            <nav class="header-menu">
                <ul>
                    <li class="profile"><a href="####"><i class="far fa-user"></i>My Profile</a></li>
                    <li><a href="####"><i class="fas fa-shopping-cart"></i></a></li>
                    <li class="language"><a href="####">NL<img src="./css/images/holland-flag.png"></a></li>
                    <li class="logout"><a href="####">Log Out <i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="main-content">
                <aside class="profile">
                    <h2>Profile</h2>
                    <nav class="profile-nav">
                        <ul>
                            <li class="personal-data"><a href="">Personal data</a></li>
                            <li class="user-products"><a href="">My products</a></li>
                        </ul>
                    </nav>
                </aside>

                <aside class="personal-info">
                    <h2>Personal Information</h2>
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
                    <p>Username</p>
                    <h3><?php echo $_SESSION['username']; ?></h3>        
                    <p>Password</p>
                    <form action="./php/UpdatePasswordInProfilePage.php" method="POST">
                        <div class="new-value">
                            <input class="change" type="text" name="password" value="<?php echo $_SESSION['password']; ?>">
                            <input class="update" type="submit"  name="update-password" value="✓"> 
                        </div>  
                    </form>                                                    
                </aside>
            </div>
        </main>

        <footer>
            <div class="info-sections">
            <article class="top-categories">
                <h4 class="section-header">Top Categories</h4>
                <ul>
                        <li><a href="####">TV Video and Gaming</a></li>
                        <li><a href="####">Phones and Tablets</a></li>
                        <li><a href="####">Photo and Video</a></li>
                        <li><a href="####">Auto and GPS</a></li>
                        <li><a href="####">PC peripherias</a></li>
                </ul>
            </article>

            <article class="view-all-brands">
                    <h4 class="section-header">View all brands</h4>
                    <ul>
                        <li><a href="####">Brands at MediaBazaar</a></li>                           
                    </ul>
            </article>
    

            <article class="MediaBazaar">
                    <h4 class="section-header">MediaBazaar</h4>
                    <ul>
                        <li><a href="####">Stores</a></li>
                        <li><a href="####">About us</a></li>
                        <li><a href="####">Legal information</a></li>                            
                    </ul>
            </article>

            <article class="customer-service">
                    <h4 class="section-header">Customer service</h4>
                    <ul>
                        <li><a href="####">Contact</a></li>
                        <li><a href="####">Order and delivery</a></li>
                        <li><a href="####">Pay</a></li>
                        <li><a href="####">Return</a></li>
                        <li><a href="####">Guarantee</a></li>                            
                    </ul>
            </article>

            <article class="safe-shopping">
                    <h4 class="section-header">Safe shopping</h4>
                    <ul>
                        <li><a href="####">Terms</a></li>                                               
                    </ul>
            </article>
        </div>
            <div class="copyright">         
                    <p>Copyright &copy;2020 MediaBazaar</p>
            </div>
        </footer>   
        
        <script>
            function showUser(str) {
                if (str == "") {
                    document.getElementById("new-city").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("new-city").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","getuser.php?q="+str,true);
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>