<?php 

session_start();
if($_SESSION['loggedin'] == TRUE)
{
    session_destroy();
    header('Location: /Webshop/app/view/Login.php');
}

?>