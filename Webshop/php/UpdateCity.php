<?php


require ('./db_connect.php');
session_start();

if(isset($_POST['update-city']))
{
    $city = $_POST['city'];
    $username = $_SESSION['username'];
    $query = "UPDATE user SET city='$city' WHERE username='$username'";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    header('Location: ../ProfilePage.php');
}

?>