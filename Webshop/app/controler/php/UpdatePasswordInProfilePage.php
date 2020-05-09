<?php
session_start();

require ('./db_connect.php');
if(isset($_POST['update-password']))
{
    $pass = $_POST['password']; 
    $username = $_SESSION['username'];
    $query = "UPDATE user SET password='$pass' WHERE username='$username'";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    header('Location: ../ProfilePage.php');
}
?>