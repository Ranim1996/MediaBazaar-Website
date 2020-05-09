<?php

session_start();
require ('./php/db_connect.php');

//function for getting the highest id from the order table 
//keeping the orders with unique id

function GetMax($array)
{
    $max = 0;
    for($i = 0 ; $i < sizeof($array); $i++)
    {
        if($array[$i] >= $max)
        {
            $max = $array[$i];
        }
    } 
    $value = (int)$max;
    return $value;
}

//get info from order table to see all ids

$query_order = "SELECT * FROM orders";
$stmt = $conn->prepare($query_order);
$stmt->execute();
$order_ids = $stmt->fetchAll();
$stmt->closeCursor();
$max_id = 0;
foreach($order_ids as $id)
{
    if($id['OrderID'] > $max_id)
    {
        $max_id = (int)$id['OrderID'];
    }
}

$max_id++;

if(!isset($_SESSION['username']))
{
    header('Location: ./Login.php');
}
else
{
    $username = $_SESSION['username'];
    $status = "Ordered";
    foreach($_SESSION['products'] as $product)
    {
        $query_product = "INSERT INTO orders (OrderID, ProductID, Status, Buyer) VALUES ('$max_id', '$product', '$status', '$username');";

        $stmt = $conn->prepare($query_product);
        $stmt->execute();

       
    }
    unset($_SESSION['cart']);
    header('Location: Index.php');
}


?>