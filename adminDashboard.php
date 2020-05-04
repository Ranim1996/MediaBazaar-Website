<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin Media Bazaar</title>
    <link rel="stylesheet" href="admin.css" />
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
            <a href="#" id="dashboard-sidebar" class="active">
              <span class="icon"><i class="fas fa-home"></i></span>
              <span class="title">Dashboard</span></a
            >
          </li>
          <li>
            <a href="orderPage.php" id="orders-sidebar">
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
        <div class="grid-container">
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-shopping-cart icon-item"></i>
                </div>
                <div class="item-text">Total orders<div class="number-orders">2000</div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-dollar-sign icon-item"></i>
                </div>
                <div class="item-text">Total income<div class="number-orders">2000</div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fa fa-cubes icon-item"></i>
                </div>
                <div class="item-text">Total products<div class="number-orders">2000</div>
                </div>
              </div>
          </div>
          <div class="grid-item">
              <div class="grid-container-item">
                <div class="item-icon">
                  <i class="fas fa-male icon-item"></i>
                </div>
                <div class="item-text">Total users<div class="number-orders">2000</div>
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
              300,
              120,
              80,
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
