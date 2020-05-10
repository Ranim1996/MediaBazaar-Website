<?php
session_start();
require('./src/php/db_connect.php');

//count orders, used in the orderPage.php
$count_query = "SELECT COUNT(DISTINCT OrderID) FROM orders;";
$stm = $conn->prepare($count_query);
$stm->execute();
$counts = $stm->fetch();
foreach($counts as $c)
{
  $count_orders = $c;
}

$count_products = "SELECT COUNT(DISTINCT id) FROM product;";
$stm = $conn->prepare($count_products);
$stm->execute();
$counts = $stm->fetch();
foreach($counts as $c)
{
  $count_products = $c;
}
$count_users = "SELECT COUNT(DISTINCT username) FROM user;";
$stm = $conn->prepare($count_users);
$stm->execute();
$counts = $stm->fetch();
foreach($counts as $c)
{
  $count_users = $c;
}
//used in the orderPage.php
$query_order_made = "SELECT * FROM orders ";

$made_stmt = $conn->prepare($query_order_made);
$made_stmt->execute();
$made_orders = $made_stmt->fetchAll();
$made_stmt->closeCursor();
$total_price = 0;
function GetPriceOfProduct($id)
{
  require('./src/php/db_connect.php');
  $query_product = "SELECT * FROM product WHERE id='$id'";
  $stmt = $conn->prepare($query_product);
  $stmt->execute();
  $product_price = $stmt->fetchAll();
  foreach ($product_price as $price_detail) {
    $price = $price_detail['product_price'];
  }
  return $price;
}
foreach($made_orders as $order_details)
{
  $total_price += GetPriceOfProduct($order_details['ProductID']);
}

$total_products = 0;


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Media Bazaar</title>
    <link rel="stylesheet" href="./src/style/admin.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
      $(document).ready(function () {
        $(".hamburger").click(function () {
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
            <a href="#" id="dashboard-sidebar" class="active">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="title">Dashboard</span></a
            >
          </li>
          <li>
            <a href="./src/view/orderPage.php" id="orders-sidebar">
              <span class="icon"><i class="fas fa-shopping-bag"></i></span>
              <span class="title">Orders</span>
            </a>
          </li>
          <li>
            <a href="./src/view/productPage.php" id="contact-sidebar">
              <span class="icon"><i class="fas fa-archive"></i></span>
              <span class="title">Product</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="main-container">
        <div class="grid-container">
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-shopping-cart icon-item"></i>
                </div>
                <div class="item-text">Total orders<div class="number-orders"><?php echo $count_orders; ?></div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-dollar-sign icon-item"></i>
                </div>
                <div class="item-text">Total income<div class="number-orders"><?php echo $total_price; ?></div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fa fa-cubes icon-item"></i>
                </div>
                <div class="item-text">Total products<div class="number-orders"><?php echo $count_products; ?></div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-male icon-item"></i>
                </div>
                <div class="item-text">Total users<div class="number-orders"><?php echo $count_users; ?></div>
                </div>
              </div>
          </div>
        </div>

        <div class="grid-container grid-container-chart">
          <div class="grid-item widget widget-chart-one">
            <div class="widget-heading">
              <h5 class="">Revenue</h5>
              <ul class="tabs tab-pills">
                <li>
                  <a id="tb_1" class="tabmenu">Monthly</a>
                </li>
              </ul>
            </div>
            <div class="widget-content">
              <h3 class="">$10,560</h4>
              <h4 class="">Total profit</h4>
              <!-- <div class="container-chart"> -->
                <canvas id="profitChart"></canvas>
              <!-- </div> -->
            </div>
          </div>
          <div class="grid-item widget widget-chart-one">
            <div class="widget-heading">
              <h5 class="title-chart">Sales by category</h5>
            </div>
            <div class="widget-content">
                <canvas id="categoryChart"></canvas>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!--CATEGORY CHART script-->
    <script>
      let catChart = document.getElementById('categoryChart').getContext('2d');

      //globaloptions
      //pie chart
      let categChart = new Chart(catChart, {
        type:'doughnut',
        data:{
          labels:['Phone', 'Laptop', 'Other'],
          datasets:[{
            label:'Category',
            data:[
              8,
              3,
              5,
            ],
            backgroundColor:[
              '#ffc107',
              '#dc3545',
              '#6610f2'
            ]
          }]
        },
        options:{
          legend:{
            position:'bottom',
            marginTop:30
          },
         
        }
      })
    </script>
    <!--PROFIT CHART script-->
    <script>
      let myChart = document.getElementById('profitChart').getContext('2d');

      //global options
      Chart.defaults.global.defaultFontFamily = 'Montserrat';
      Chart.defaults.global.defaultFontSize = 20;
      Chart.defaults.global.defaultFontColor = '#777';

      let profitChart = new Chart(myChart, {
        type:'line',
        data:{
          labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets:[{
            label:'Income',
            data:[
              1300,
              700,
              123,
              340,
              540,
              112,
              233,
              98,
              239,
              456,
              645,
              321
            ],
            backgroundColor:'rgba(138,43,226, 0.6)',
            borderWidth:3,
            borderColor:'rgba(138,43,226, 0.8)',
          }]
        },
        options:{
          legend:{
            display:false
          }
        }
      });
    </script>
    <script src="admin.js"></script>
  </body>
</html>
