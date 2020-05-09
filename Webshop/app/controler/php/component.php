<?php

function getData(){   
    $dbconn=new db_connect();
    $sql = "SELECT * FROM product";
    $stmt = $dbconn->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (!$result) {
        die(mysqli_error($dbconn));
    }
    else if(sizeof($result)> 0){
        return $result;
    }
}

function cartElement($productid, $productimg, $productname, $productprice){

    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: Our WebShop</small>
                                <h5 class=\"pt-2\">$$productprice</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                        </div>
                    </div>
                </form>    
    ";
    echo  $element;
}

















