<?php ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MediaBazaar</title>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css//all.min.css">
        <link rel="stylesheet" href="./pop-up-menu/style.css">
    </head> 
    <body>

            <div class="pop-up-menu">         
                <?php include ('./pop-up-menu/drop-down-menu.php') ?>
            </div>

            <a class="logo-href" href="Index.php"><img src="./css/images/mediaBazaarLogo.png"></a>
            <input type="search" id="search-stock">
            <label for="search-stock"><i class="fas fa-search"></i></label>
            <nav class="header-menu">
                <ul>
                    <li class="profile"><a href="./Login.php"><i class="far fa-user"></i>My Profile</a></li>
                    <li><a href="./cart.php"><i class="fas fa-shopping-cart">
                        <?php

                            if (isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                            }else{
                                echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                            }

                        ?>
                    </i></a></li>
                    <li class="language"><a href="####">NL<img src="./css/images/holland-flag.png"></a></li>
                    <li class="logout"><a href="./Login.php">Log In <i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </nav>
    </body>
</html>