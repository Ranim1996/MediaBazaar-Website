<?php

$total = 0;
if (isset($_SESSION['cart']))
{
    $cart_items = array_column($_SESSION['cart'], 'product_id');

    $result = getData();

    for ($i = 0; $i < sizeof($result); $i++)
    {
        foreach ($cart_items as $id) 
        {
            if ($result[$i]['id'] == $id) 
            {
                $product_ids[] = $result[$i]['id'];
                cartElement($id, $result[$i]['product-image'], $result[$i]['product_name'], $result[$i]['product_price']);
                $total = $total + (float) $result[$i]['product_price'];
            }
        }                    
    }
    $_SESSION['products'] = $product_ids;
}
else 
{
    echo "<h5>Cart is Empty</h5>";
}
?>