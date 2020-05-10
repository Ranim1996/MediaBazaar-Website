<?php
session_start();

require ('./db_connect.php');
if(isset($_POST['update-phoneNr']))
{
    $phoneNr = $_POST['phoneNr'];
    $username = $_SESSION['username'];
    $query = "UPDATE user SET phone='$phoneNr' WHERE username='$username'";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    header('Location: /Webshop/app/view/ProfilePage.php');
}
?>