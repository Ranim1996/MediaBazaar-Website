<?php

require ('./php/db_connect.php');
session_start();

    try
    {  
        require_once ('./php/db_connect.php');        

        $category;
        if(isset($_GET["data"]))
        {
            $category=$_GET["data"];
            $_SESSION['categoryVal']=$category;
        }
        $nrPr = $conn->query("SELECT COUNT(id) FROM product WHERE Category = '$category';");
        $nrProducts = $nrPr->fetch();           
     
        $nrOfProducts=0;
       
        foreach ($nrProducts as $value)         
        {           
            $nrOfProducts=$value;
        }
        
        $brands = $conn->prepare("SELECT DISTINCT Brand FROM product WHERE Category = '$category';");
        $brands->execute();
        $distinctBrands = $brands->fetchAll();
    }
    catch(PDOException $e) 
    {
        echo $e->getMessage();
    } 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MediaBazaar</title>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css//all.min.css">
        <link rel="stylesheet" href="./css/style-profilepage.css">
        <link rel="stylesheet" href="./css/style-products.css">
        <link rel="stylesheet" href="./css/style-order-filter.css">
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
        <script src="./js/jquery-3.5.0.min.js"></script>
        <script src="./js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <link href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <form action="./php/MyProfile.php" method="POST"></form>
        <header class="main-header">
            <i class="fas fa-bars"></i>
            <a href="Index.html"><img src="./css/images/mediaBazaarLogo.png"></a>
            <input type="search" id="search-stock">
            <label for="search-stock"><i class="fas fa-search"></i></label>
            <nav class="header-menu">
                <ul>
                    <li class="profile"><a href="####"><i class="far fa-user"></i>My Profile</a></li>
                    <li><a href="####"><i class="fas fa-shopping-cart"></i></a></li>
                    <li class="language"><a href="####">NL<img src="./css/images/holland-flag.png"></a></li>
                    <li class="logout"><a href="####">Log Out <i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <aside class="filters">
                
                <div class="price">
                <h2>Price</h2>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="6000" />
                <p id="price_show">0 - 6000</p>
                <div id="price_range"></div>
                
                </div>
           


                <div class="brand"> 

                    <div class="select-box">
                        <div class="option-container">
                              
                        <?php 
                        foreach($distinctBrands as $row)
                        {
                        ?>
                            <div class="option">
                                <label class="container">
                                   <p><?php echo $row['Brand']; ?></p> 
                                    <input type="checkbox" class="common_selector brand" value="<?php echo $row['Brand']; ?>">  
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        <?php
                        }
                        ?>  

                        </div>
                        <div class="selected"><h2>Brands</h2></div>             
                    </div>  
                </div>
            </aside>

            <aside class="right">
                
                <aside class="quick-selecting">
                    <h2>Products</h2>
                    
                    <div class="select-box-ord">
                        <div class="options-container-ord">
                            <div class="option-ord">
                                <input type="radio" class="common_selector ascending" name="sort-by" value="Price ascending" />
                                <label for="Price ascending">Price ascending</label>
                            </div>

                            <div class="option-ord">
                                <input type="radio" class="common_selector descending" name="sort-by" value="Price descending" />
                                <label for="Price descending">Price descending</label>
                            </div>

                            <div class="option-ord">
                                <input type="radio" class="common_selector best-match" name="sort-by" value="Best Match"/>
                                <label for="Best Match">Best Match</label>
                            </div>
                        </div>
                        <div class="selected-ord">
                            Order by
                        </div>
                    </div>
                </aside>

                
                    <div class="products" id="prod"></div>
                            
            </aside>
        </main>

        <footer>
            <div class="info-sections">
            <article class="top-categories">
                <h4 class="section-header">Top Categories</h4>
                <ul>
                        <li><a href="####">TV Video and Gaming</a></li>
                        <li><a href="####">Phones and Tablets</a></li>
                        <li><a href="####">Photo and Video</a></li>
                        <li><a href="####">Auto and GPS</a></li>
                        <li><a href="####">PC peripherias</a></li>
                </ul>
            </article>

            <article class="view-all-brands">
                    <h4 class="section-header">View all brands</h4>
                    <ul>
                        <li><a href="####">Brands at MediaBazaar</a></li>                           
                    </ul>
            </article>
    

            <article class="MediaBazaar">
                    <h4 class="section-header">MediaBazaar</h4>
                    <ul>
                        <li><a href="####">Stores</a></li>
                        <li><a href="####">About us</a></li>
                        <li><a href="####">Legal information</a></li>                            
                    </ul>
            </article>

            <article class="customer-service">
                    <h4 class="section-header">Customer service</h4>
                    <ul>
                        <li><a href="####">Contact</a></li>
                        <li><a href="####">Order and delivery</a></li>
                        <li><a href="####">Pay</a></li>
                        <li><a href="####">Return</a></li>
                        <li><a href="####">Guarantee</a></li>                            
                    </ul>
            </article>

            <article class="safe-shopping">
                    <h4 class="section-header">Safe shopping</h4>
                    <ul>
                        <li><a href="####">Terms</a></li>                                               
                    </ul>
            </article>
        </div>
            <div class="copyright">         
                    <p>Copyright &copy;2020 MediaBazaar</p>
            </div>
        </footer> 
        <script src="./js/drop-down-filters.js"></script>
        <script src="./js/order-filter-dropdown.js"></script>  

        <style>
        #loading{
            text-align: center;
            background-image: url("./css/images/mediaMarktLogo.png") no-repeat center;
            height: 150px;
        }
        </style>

        <script>
            $(document).ready(function(){
                function filter_data()
                {
                    $('.filter_data').html('<div id="loading" style="" ></div>');
                    var action='fetch_data';
                    var minimum_price=$('#hidden_minimum_price').val();
                    var maximum_price=$('#hidden_maximum_price').val();

                    var brand=get_filter('brand');
                    var ascending=get_filter('ascending');
                    var descending=get_filter('descending');

                    $.ajax({
                        url:"./php/fetch_data.php",
                        method:"POST",
                        data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ascending:ascending,descending:descending},
                        success:function(data)
                        {
                            $('#prod').html(data);
                        },
                        error: function (request, status, error) {
                            alert(error);
                        }
                    })

                }
                filter_data();

                function get_filter(class_name)
                {
                    var filter=[];
                    $('.'+class_name+':checked').each(function(){
                       //array_push(filter,($(this).val()));
                       
                       filter.push($(this).val());

                    });
                    return filter;    
                }

                $('.common_selector').click(function(){
                    filter_data();
                });

                $('#price_range').slider({
                    range:true,
                    min:0,
                    max:6000,
                    values:[0, 6000],
                    step:100,
                    
                    stop:function(event, ui)
                    {   
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });
            });
        </script>                              
    </body>
</html>