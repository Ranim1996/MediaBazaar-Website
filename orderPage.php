<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Media Bazaar</title>
  <link rel="stylesheet" href="admin.css" />
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
          <div class="container-orders">
            <div class="item-order">
              <div class="heading-item-order">Order no. #1</div>
              <div class="container-receiver">
                <div class="receiver-order">TO:</div>
                <div class="receiver-name">Michael Jackson</div>
              </div>
              <div class="container-button">
                <form action="" method="POST">
                  <input id="confirmButton" type="submit" name="confirm" value="Confirm">
                </form>

              </div>
            </div>
          </div>
        </div>
        <div class="grid-item widget widget-order">
          <div class="widget-heading">
            <h5 class="">Delivered</h5>
          </div>
          <div class="container-orders">

          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="confirmOrder.js"></script>
  <script src="admin.js"></script>
</body>

</html>