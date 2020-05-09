<?php

if (isset($_SESSION['username'])) {
    //session_start();
    $notLoggedInlink = '<a href="/Webshop/app/view//Login.php">';
    $hrefNotLoggedIn = '/Webshop/app/view/Login.php';
    $loggedInHref = '/Webshop/app/view/ProfilePage.php';

    if ($_SESSION['loggedin'] == TRUE) {
        $new_link = str_replace($hrefNotLoggedIn, $loggedInHref, $notLoggedInlink);
    } else {
        $new_link = str_replace($loggedInHref, $hrefNotLoggedIn, $notLoggedInlink);
    }
}
else
{
    $notLoggedInlink = '<a href="/Webshop/app/view//Login.php">';
    $hrefNotLoggedIn = '/Webshop/app/view//Login.php';
    $loggedInHref = '/Webshop/app/view/ProfilePage.php';
    $new_link = str_replace($loggedInHref, $hrefNotLoggedIn, $notLoggedInlink);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>MediaBazaar</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Webshop/app/view/css/style.css">
    <link rel="stylesheet" href="/Webshop/app/view/css/all.min.css">
    <link rel="stylesheet" href="/Webshop/app/view/pop-up-menu/style.css">
</head>

<body>
    <div class="pop-up-menu">
        <?php include('pop-up-menu/drop-down-menu.php'); ?>
    </div>

    <a class="logo-href" href="/Webshop/Index.php"><img src="/Webshop/app/view/css/images/mediaBazaarLogo.png"></a>

    <form class="search-product" action="/Webshop/app/view/SearchProductPage.php" method="POST">
        <input type="text" name="search" id="search-stock" placeholder="Search Product" class="search-input">
        <button id="btnSearch" type="submit" name="submit-product"><i class="fas fa-search"></i></button>
    </form>

    <nav class="header-menu">
        <ul>
            <li class="profile"><?php echo $new_link ?><i class="far fa-user"></i>My Profile</a></li>
            <li><a href="/Webshop/app/view/cart.php"><i class="fas fa-shopping-cart">
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </i></a></li>
            <li class="language"><a href="####">NL<img src="/Webshop/app/view/css/images/holland-flag.png"></a></li>
            <?php 
            if(!isset($_SESSION['username']))
            {
                echo "<li class=\"logout\"><a href=\"./Login.php\">Log in</a></li>";
            }
            else
            {
                if($_SESSION['loggedin'] == TRUE)
                {
                    echo "<li class=\"logout\"><a href=\"./php/Logout.php\">Log out</a></li>";
                }
                else
                {
                    echo "<li class=\"logout\"><a href=\"./Login.php\">Log in</a></li>";
                }
            }                
            ?>            
        </ul>
    </nav>
</body>

</html>