<?php

session_start();

require_once("php/db_connect.php");
require_once("php/component.php");

//remove product from cart
if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>MediaBazaar</title>

    <link rel="stylesheet" href="cartStyle.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
</head>

<body class="bg-light">
<main>
    <header class="main-header">
        <?php include('./top-header.php') ?>
    </header>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $cart_items = array_column($_SESSION['cart'], 'product_id');

                        $result = getData();

                        for ($i = 0; $i < sizeof($result); $i++) {
                            # code...
                            foreach ($cart_items as $id) {
                                # code...
                                if ($result[$i]['id'] == $id) {
                                    # code...
                                    //push ids of ordered products into this array
                                    $product_ids[] = $result[$i]['id'];
                                    cartElement($id, $result[$i]['product-image'], $result[$i]['product_name'], $result[$i]['product_price']);
                                    $total = $total + (float) $result[$i]['product_price'];
                                }
                            }
                            
                        }
                        $_SESSION['products'] = $product_ids;
                    } else {
                        echo "<h5>Cart is Empty</h5>";
                    }

                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php
                                    echo $total;
                                    ?></h6>
                            <hr>
                            <form class="purchase-order" action="./PurchaseOrder.php" method="POST">
                                <button type="submit" class="btn btn-warning" name="purchase-order">Purchase</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
    <footer>
        <?php include('./footer.php') ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>



</html>