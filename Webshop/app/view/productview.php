<?php

$Products = new Products();
foreach ($Products->GetTopProducts() as $row) 
{
?>
    <article class="product">
        <form method="post" action="Index.php?action=add$id='. $row['id'].'">
            <div class="image">
                <img src="<?php echo $row['product-image']; ?>">
            </div>
            <header class="product-name">
                <h3><?php echo $row['Brand'] ?></h3>
            </header>
            <header class="product-name">
                <h3><?php echo $row['product_name'] ?></h3>
            </header>
            <h3 class="product-price"><?php echo $row['product_price'] ?>.-
                <button type="submit" class="btn" name="add">Add to Cart</button>
            </h3>
            <input type="hidden" name="product_id" value=<?php echo $row['id'] ?>>
        </form>
    </article>
<?php
}
?>