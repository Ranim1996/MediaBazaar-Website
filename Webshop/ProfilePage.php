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
        <script src="./js/swich-iframes.js"></script>
    </head>
    <body>
        <form action="./php/MyProfile.php" method="POST"></form>
        <header class="main-header">
            <?php include ('./top-header.php') ?>
        </header>
        <main class="main-profile">
            <div class="main-content-profile">
                <aside class="profile">
                    <h2>Profile</h2>
                    <nav class="profile-nav">
                        <ul>
                            <button onclick="addIframe('pd')">Personal data</button>
                            <button onclick="addIframe('myp')">My products</button>
                        </ul>
                    </nav>
                </aside>

                <aside id="profile-info">
                    <iframe id="myFrame"></iframe>                                          
                </aside>

            </div>
        </main>

        <footer>
            <?php include ('./footer.php') ?>
        </footer>   
    </body>
</html>