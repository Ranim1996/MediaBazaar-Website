<?php

require ('./php/db_connect.php');
session_start();
    try
    {  
        require_once ('./php/db_connect.php');


        $topProd = $conn->prepare("SELECT * FROM product GROUP BY `product_price` DESC LIMIT 5;");
        $topProd->execute();
        $topProducts = $topProd->fetchAll();

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
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
        <link rel="stylesheet" href="./ImageSlider/slideshow.css">
        <link rel="stylesheet" href="./pop-up-menu/style.css">

    </head>
    <body>
        <header class="main-header">
            <div class="pop-up-menu">         
                <?php include ('./pop-up-menu/drop-down-menu.php') ?>
            </div>

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
            <aside class="menu-adds">
                <h1>Product Categories</h1>
                <div class="main-content">
                    <nav class="stock-menu">
                        <ul class="all-sub-menus"> 
                                <li><a href="####"><i class="fas fa-tv"></i>TV Video and Gaming</a>
                                    <ul class="stock-detailed">
                                            <li><h3>TV Video and Gaming</h3></li>
                                            <li><a href="./ProductsPage.php?data=TV">TV</a></li>
                                            <li><a href="####">Home cinema</a></li>
                                            <li><a href="####">Audio system</a></li>
                                            <li><a href="####">Consoles</a></li>
                                            <li><a href="####">Games</a></li>
                                            <li><a href="####">PC gaming</a></li>
                                    </ul>
                                </li>
                                <li><a href="####"><i class="fas fa-mobile-alt"></i>Phones and Tablets</a>
                                    <ul class="stock-detailed">
                                            <li><h3>Phones and Tablets</h3></li>
                                            <li><a href="####">Mobile phones</a></li>
                                            <li><a href="####">Accessories for mobile phones</a></li>
                                            <li><a href="####">Tablet accessories</a></li>
                                            <li><a href="####">Tablets</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-camera"></i>Photo and Video</a>
                                    <ul class="stock-detailed">
                                            <li><h3>Photo and Video</h3></li>
                                            <li><a href="####">Mirrorless cameras</a></li>
                                            <li><a href="####">Compact cameras</a></li>
                                            <li><a href="####">Snapshot cameras and supplies</a></li>
                                            <li><a href="####">Camcorders</a></li>
                                            <li><a href="####">Memory Cards</a></li>
                                            <li><a href="####">Photo printers and scanners</a></li>
                                            <li><a href="####">Photo and video accessories</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-map-marker-alt"></i>Auto and GPS</a>
                                    <ul class="stock-detailed">
                                            <li><h3>Auto and GPS</h3></li>
                                            <li><a href="####">GPS navigation</a></li>
                                            <li><a href="####">GPS accessories</a></li>
                                            <li><a href="####">Audio system</a></li>
                                            <li><a href="####">Amplifiers</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-laptop"></i>PC peripherias</a>
                                    <ul class="stock-detailed">
                                            <li><h3>PC peripherias</h3></li>
                                            <li><a href="####">Laptops</a></li>
                                            <li><a href="####">Desktops</a></li>
                                            <li><a href="####">Monitors</a></li>
                                            <li><a href="####">Printers and Scanners</a></li>
                                            <li><a href="####">Ebooks & Accessories</a></li>
                                            <li><a href="####">PC Gaming</a></li>
                                            <li><a href="####">PC Software</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-headphones"></i>IT accessories</a>
                                    <ul class="stock-detailed">
                                            <li><h3>IT accessories</h3></li>
                                            <li><a href="####">USB Sticks</a></li>
                                            <li><a href="####">Mice and keyboards</a></li>
                                            <li><a href="####">Joysticks and steering wheels</a></li>
                                            <li><a href="####">Network adapters</a></li>
                                            <li><a href="####">Webcams</a></li>
                                            <li><a href="####">Protectors</a></li>
                                            <li><a href="####">Bags</a></li>
                                            <li><a href="####">Hard disks</a></li>
                                            <li><a href="####">Coolers</a></li>
                                            <li><a href="####">PC cleaning</a></li>
                                            <li><a href="####">Earphones and microphones</a></li>
                                            <li><a href="####">Laptop chargers</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-bullseye"></i>Outdoors and Sports</a>
                                    <ul class="stock-detailed">
                                            <li><h3>Outdoors and Sports</h3></li>
                                            <li><a href="####">Action cameras</a></li>
                                            <li><a href="####">Drones</a></li>
                                            <li><a href="####">Robots</a></li>
                                            <li><a href="####">Cross-trainers</a></li>
                                            <li><a href="####">Fitness bracelets</a></li>
                                            <li><a href="####">Audio headphones and microphones</a></li>
                                            <li><a href="####">Bluetooth speakers</a></li>
                                            <li><a href="####">Blu Ray</a></li>
                                    </ul></li>
                                    <li><a href="####"><i class="fas fa-blender"></i>Home and Garden</a>
                                        <ul class="stock-detailed">
                                                <li><h3>Home and Garden</h3></li>
                                                <li><a href="####">Smart home</a></li>
                                                <li><a href="####">Clocks</a></li>
                                                <li><a href="####">Weather Stations</a></li>
                                                <li><a href="####">Batteries and Chargers</a></li>
                                                <li><a href="####">Garden tools</a></li>
                                                <li><a href="####">Drilling machines</a></li>
                                                <li><a href="####">Screwdrivers</a></li>
                                                <li><a href="####">Saws, circular saws and planers</a></li>
                                                <li><a href="####">Generators</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-laptop-house"></i>Small domestic appliances</a>
                                    <ul class="stock-detailed">
                                        <li><h3>Small domestic appliances</h3></li>
                                        <li><a href="####">Vacuum cleaners</a></li>
                                        <li><a href="####">Coffee machines and vending machines</a></li>
                                        <li><a href="####">Microwaves</a></li>
                                        <li><a href="####">Ironing</a></li>
                                        <li><a href="####">Water and steam jetting</a></li>
                                        <li><a href="####">Sewing machines</a></li>
                                </ul></li>
                                
                                <li><a href="####"><i class="fas fa-fan"></i>Air conditioners and Heaters</a>
                                    <ul class="stock-detailed">
                                            <li><h3>Air conditioners and Heaters</h3></li>
                                            <li><a href="####">Inverter Split Systems</a></li>
                                            <li><a href="####">Professional air conditioning equipment</a></li>
                                            <li><a href="####">Mobile air conditioners</a></li>
                                            <li><a href="####">Fans</a></li>
                                            <li><a href="####">Heaters</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-solar-panel"></i></i>Home appliances</a>
                                    <ul class="stock-detailed">
                                            <li><h3>TV Video and Gaming</h3></li>
                                            <li><a href="####">Washing machines</a></li>
                                            <li><a href="####">Dryers</a></li>
                                            <li><a href="####">Refrigerators</a></li>
                                            <li><a href="####">Freezers</a></li>
                                            <li><a href="####">Dishwashers</a></li>
                                            <li><a href="####">Cookers</a></li>
                                            <li><a href="####">Boilers</a></li>
                                            <li><a href="####">Absorbers</a></li>
                                    </ul></li>
                        </ul>
                    </nav>
                    <div class="advertisements">
                        <div class="container">
	
                            <input type="radio" id="i1" name="images" checked />
                            <input type="radio" id="i2" name="images" />
                            <input type="radio" id="i3" name="images" />
                            <input type="radio" id="i4" name="images" />
                            <input type="radio" id="i5" name="images" />	
                            
                            <div class="slide_img" id="one">			
                                    
                                    <img src="./ImageSlider/blank-business-composition-computer-373076.jpg">
                                    
                                        <label class="prev" for="i5"><span>&#x2039;</span></label>
                                        <label class="next" for="i2"><span>&#x203a;</span></label>	
                                
                            </div>
                            
                            <div class="slide_img" id="two">
                                
                                    <img src="./ImageSlider/books-business-computer-connection-459654.jpg" >
                                    
                                        <label class="prev" for="i1"><span>&#x2039;</span></label>
                                        <label class="next" for="i3"><span>&#x203a;</span></label>
                                
                            </div>
                                    
                            <div class="slide_img" id="three">
                                    <img src="./ImageSlider/iphone-notebook-pen-working-34578.jpg">	
                                    
                                        <label class="prev" for="i2"><span>&#x2039;</span></label>
                                        <label class="next" for="i4"><span>&#x203a;</span></label>
                            </div>

                            <div class="slide_img" id="four">
                                    <img src="./ImageSlider/three-white-ceramic-pots-with-green-leaf-plants-near-open-796602.jpg">	
                                    
                                        <label class="prev" for="i3"><span>&#x2039;</span></label>
                                        <label class="next" for="i5"><span>&#x203a;</span></label>
                            </div>

                            <div class="slide_img" id="five">
                                    <img src="./ImageSlider/tyler-franta-iusJ25iYu1c-unsplash.jpg">	
                                    
                                        <label class="prev" for="i4"><span>&#x2039;</span></label>
                                        <label class="next" for="i1"><span>&#x203a;</span></label>

                            </div>

                            <div id="nav_slide">
                                <label for="i1" class="dots" id="dot1"></label>
                                <label for="i2" class="dots" id="dot2"></label>
                                <label for="i3" class="dots" id="dot3"></label>
                                <label for="i4" class="dots" id="dot4"></label>
                                <label for="i5" class="dots" id="dot5"></label>
                            </div>
                                
                        </div>
                    </div>
                </div>  
            </aside>

            <aside class="site-info">
                <div class="container">
                    
                    <input type="radio" id="img1" name="imgs" checked />
                    <input type="radio" id="img2" name="imgs" />
                    <input type="radio" id="img3" name="imgs" />
                    <input type="radio" id="img4" name="imgs" />
                    <input type="radio" id="img5" name="imgs" />	
                    
                    <div class="slide_png" id="one">			
                            
                            <img src="./css/images/add.png">
                            
                                <label class="previous" for="img5"><span>&#x2039;</span></label>
                                <label class="nxt" for="img2"><span>&#x203a;</span></label>	
                        
                    </div>
                    
                    <div class="slide_png" id="two">
                        
                            <img src="./css/images/feecms_x_x_x.png" >
                            
                                <label class="previous" for="img1"><span>&#x2039;</span></label>
                                <label class="nxt" for="img3"><span>&#x203a;</span></label>
                        
                    </div>
                            
                    <div class="slide_png" id="three">
                            <img src="./css/images/msi.png">	
                            
                                <label class="previous" for="img2"><span>&#x2039;</span></label>
                                <label class="nxt" for="img4"><span>&#x203a;</span></label>
                    </div>

                    <div class="slide_png" id="four">
                            <img src="./css/images/unnamed.jpg">	
                            
                                <label class="previous" for="img3"><span>&#x2039;</span></label>
                                <label class="nxt" for="img5"><span>&#x203a;</span></label>
                    </div>

                    <div class="slide_png" id="five">
                            <img src="./css/images/Untitled.png">	
                            
                                <label class="previous" for="img4"><span>&#x2039;</span></label>
                                <label class="nxt" for="img1"><span>&#x203a;</span></label>

                    </div>

                    <div id="nav-slide">
                        <label for="img1" class="dts" id="d1"></label>
                        <label for="img2" class="dts" id="d2"></label>
                        <label for="img3" class="dts" id="d3"></label>
                        <label for="img4" class="dts" id="d4"></label>
                        <label for="img5" class="dts" id="d5"></label>
                    </div>
                        
                </div>
            </aside>

            <aside class="top-products">
                <h2>Top Products</h2>        
                <div class="products">

                    <?php 
                    foreach($topProducts as $row)
                    {
                    ?>
                        <article class="product">
                        <div class="image">
                            <img src="<?php echo $row['product-image'];?>">
                        </div>
                        <header class="product-name">
                            <h3><?php echo $row['product_name']?></h3>
                        </header>
                        <h3 class="product-price"><?php echo $row['product_price']?>.-</h3>
                        </article>
                    <?php    
                    }
                    ?>
                

                
                </div>                
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
        <script src="./js/pop-up-menu.js"></script>
        <script src="./ImageSlider/slider.js"></script>
    </body>
</html>