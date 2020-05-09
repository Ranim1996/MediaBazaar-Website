<?php 
session_start();
include('./db_connect.php'); 
 
if(isset($_POST["action"]))
{
    $category=$_SESSION['categoryVal'];
   
    $query="SELECT * FROM product WHERE Category = '$category' "; 
    
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    { 
        $query .= "
        AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";
    }
    if(isset($_POST["brand"]))
    {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
        AND Brand IN('".$brand_filter."')
        ";
    }

     if(isset($_POST["ascending"]))
    {
        $brand_filter = implode("','", $_POST["ascending"]);
        $query .= "
        ORDER BY product_price
        ";
    }

    if(isset($_POST["descending"]))
    {
        $brand_filter = implode("','", $_POST["descending"]);
        $query .= "
        ORDER BY product_price DESC
        ";
    }

    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output .= '
            <article class="product">
                <form method="post" action="ProductsPage.php?action=add$id='. $row['id'].'">
                        <div class="image">
                            <img src="' . $row['product-image'] . '">
                        </div>
                        <header class="product-name">
                                <h3>'. $row['Brand'] .'</h3>
                            </header>
                        <header class="product-name">
                            <h3>'. $row['product_name'] .'</h3>
                        </header>
                        <h3 class="product-price">
                            '. $row['product_price'] .'.-
                            <button type="submit" class="btn" name="add">Add to Cart</button>
                        </h3>
                        <input type="hidden" name="product_id" value='. $row['id'].'> 
                        
                </form>
            </article>
            ';
        }
    }
    else
    {
        $output = '<h3 id="no-data">No Data Found</h3>';
    }
    echo $output;
}
?>