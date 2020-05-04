<?php
session_start();
require('db_connect.php');

$query_product = "SELECT * FROM product";
$product_statement = $conn->prepare($query_product);
$product_statement->execute();
$products = $product_statement->fetchAll();
$product_statement->closeCursor();
$brand = $products[0]['Brand'];
$category = $products[0]['Category'];
$ok = 0;
$ok2 = 0;
//not correct 
//should make an array with all brands then sort it alphabetically
foreach ($products as $p) {
  if ($p['Brand'] != $brand) {
    $ok++;
    $brand = $p['Brand'];
  }
  if ($p['Category'] != $category) {
    $ok2++;
    $category = $p['Category'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Media Bazaar</title>
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
        <ul>
          <li>
            <a href="#" id="search-order"> <i class="fas fa-search"></i></a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-bell"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-user"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="sidebar">
      <ul>
        <li>
          <a href="adminDashboard.php" id="dashboard-sidebar">
            <span class="icon"><i class="fas fa-home"></i></span>
            <span class="title">Dashboard</span></a>
        </li>
        <li>
          <a href="orderPage.php" id="orders-sidebar">
            <span class="icon"><i class="fas fa-shopping-bag"></i></span>
            <span class="title">Orders</span>
          </a>
        </li>
        <li>
          <a href="#" id="contact-sidebar" id="dashboard-sidebar" class="active">
            <span class="icon"><i class="fas fa-archive"></i></span>
            <span class="title">Product</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="main-container">
      <div class="grid-container-table">
        <div class="grid-item widget widget-table">
          <div class="widget-heading">
            <h5 class="">Product Inventory</h5>
          </div>
          <div class="grid-container-details">
            <div class="grid-item-inventory">
              <ul>
                <li class="product-title">Total products</li>
                <li class="count"><?php echo count($products); ?></li>
              </ul>
            </div>
            <div class="grid-item-inventory">
              <ul>
                <li class="product-title">Categories</li>
                <li class="count"><?php echo $ok2; ?></li>
              </ul>
            </div>
            <div class="grid-item-inventory">
              <ul>
                <li class="product-title">Brands</li>
                <li class="count"><?php echo $ok; ?></li>
              </ul>
            </div>
          </div>
          <table id="products" class="display table-products" style="width: 100%;">
            <thead>
              <tr class="eu">
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product) {
                echo "<tr>
                <td>" . $product['product_name'] . "</td>
                <td>" . $product['Category'] . "</td>
                <td>" . $product['Brand'] . "</td>
                <td>" . $product['product_price'] . "</td>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="tableProducts.js"></script>
  <script src="admin.js"></script>
</body>

</html>