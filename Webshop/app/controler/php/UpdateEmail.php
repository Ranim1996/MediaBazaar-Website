<?php
session_start();

require ('./db_connect.php');

if(isset($_POST['update-email']))
{
    $email = $_POST['email']; 
    $username = $_SESSION['username'];
    $query = "UPDATE user SET email='$email' WHERE username='$username'";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    header('Location: /Webshop/app/view/ProfilePage.php');
}
?>