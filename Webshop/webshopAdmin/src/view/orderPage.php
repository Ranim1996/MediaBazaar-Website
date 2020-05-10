<?php
session_start();
require('../php/db_connect.php');

$query_order_made = "SELECT * FROM orders ";

$made_stmt = $conn->prepare($query_order_made);
$made_stmt->execute();
$made_orders = $made_stmt->fetchAll();
$made_stmt->closeCursor();


$count_query = "SELECT COUNT(DISTINCT OrderID) FROM orders;";
$stm = $conn->prepare($count_query);
$stm->execute();
$counts = $stm->fetch();
foreach ($counts as $c) {
  $count_orders = $c;
}


$total_price = 0;

function GetPriceOfProduct($id)
{
  require('../php/db_connect.php');
  $query_product = "SELECT * FROM product WHERE id='$id'";
  $stmt = $conn->prepare($query_product);
  $stmt->execute();
  $product_price = $stmt->fetchAll();
  foreach ($product_price as $price_detail) {
    $price = $price_detail['product_price'];
  }
  return $price;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Media Bazaar</title>
  <link rel="stylesheet" href="../style/admin.css" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".hamburger").click(function() {
        $(".wrapper").toggleClass("collapse");
      });
    });
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="top_navbar">
      <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
      </div>
      <div class="top_menu">
        <div class="logo">Media Bazaar Admin</div>
      </div>
    </div>

    <div class="sidebar">
      <ul>
        <li>
          <a href="/Webshop/webshopAdmin/adminDashboard.php" id="dashboard-sidebar">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Dashboard</span></a>
        </li>
        <li>
          <a href="#" id="orders-sidebar" class="active">
            <span class="icon"><i class="fas fa-shopping-bag"></i></span>
            <span class="title">Orders</span>
          </a>
        </li>
        <li>
          <a href="productPage.php" id="contact-sidebar">
            <span class="icon"><i class="fas fa-archive"></i></span>
            <span class="title">Product</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="main-container">
      <div class="grid-container-order">
        <div class="grid-item widget widget-order">
          <div class="widget-heading">
            <h5 class="">Recent orders</h5>
          </div>
          <?php for ($i = 1; $i <= $count_orders; $i++) {
            $total_price = 0; ?>
            <div class="container-orders">
              <div class="item-order">
                <?php foreach ($made_orders as $order) {
                  if ($order['OrderID'] == $i) {
                    $total_price += GetPriceOfProduct($order['ProductID']);
                    $name = $order['Buyer'];
                  }
                } ?>
                <div class="heading-item-order">Order no. #<?php echo $i ?></div>
                <div class="container-receiver">
                  <div class="receiver-order">TO:</div>
                  <div class="receiver-name"><?php echo $name ?></div>
                  <div class="container-total-price">
                    <div class="order-price">TOTAL PRICE:</div>
                    <div class="total-price">$<?php echo $total_price ?></div>
                  </div>
                </div>

                <div class="container-button">
                  <input id="confirmButton" type="button" name="confirm" value="Delivered">

                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <script src="admin.js"></script>
</body>

</html>