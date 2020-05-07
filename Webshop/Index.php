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

    //add products to the cart according to their id.
    if (isset($_POST['add'])){

        if(isset($_SESSION['cart'])){

            $product_id = array_column($_SESSION['cart'], 'product_id');

            if(in_array($_POST['product_id'], $product_id)){
                echo "<script>alert('Product is already added in the cart')</script>";
                echo "<script>window.location = 'ProductsPage.php'</script>";
            }else{

                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );

                $_SESSION['cart'][$count] = $item_array;
            }

        }else{

            $item_array = array(
                    'product_id' => $_POST['product_id']
            );

            // Create new session variable
            $_SESSION['cart'][0] = $item_array;
            print_r($_SESSION['cart']);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MediaBazaar</title>
        <meta charset="utf-8"/>        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
        <link rel="stylesheet" href="./ImageSlider/slideshow.css">
    </head>
    <body>
        <header class="main-header">
            <?php include ('./top-header.php') ?>
        </header>
        <main class="main-index">
            <aside class="menu-adds">
                <h1>Product Categories</h1>
                <div class="main-content">
                    <nav class="stock-menu">
                        <ul class="all-sub-menus"> 
                                <li><a href="####"><i class="fas fa-tv"></i>TV Video and Gaming</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>TV Video and Gaming</h3></li>
                                        <li><a href="./ProductsPage.php?data=TV">TV</a></li>
                                        <li><a href="./ProductsPage.php?data=Home Cinemas">Home cinema</a></li>
                                        <li><a href="./ProductsPage.php?data=Audio system">Audio system</a></li>
                                        <li><a href="./ProductsPage.php?data=Consoles">Consoles</a></li>
                                        <li><a href="./ProductsPage.php?data=Games">Games</a></li>
                                        <li><a href="./ProductsPage.php?data=PC gaming">PC gaming</a></li>
                                    </ul>
                                </li>
                                <li><a href="####"><i class="fas fa-mobile-alt"></i>Phones and Tablets</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Phones and Tablets</h3></li>
                                        <li><a href="./ProductsPage.php?data=Phone">Mobile phones</a></li>
                                        <li><a href="./ProductsPage.php?data=Accessories for mobile phones">Accessories for mobile phones</a></li>
                                        <li><a href="./ProductsPage.php?data=Tablet accessories">Tablet accessories</a></li>
                                        <li><a href="./ProductsPage.php?data=Tablet">Tablets</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-camera"></i>Photo and Video</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Photo and Video</h3></li>
                                        <li><a href="./ProductsPage.php?data=Mirrorless cameras">Mirrorless cameras</a></li>
                                        <li><a href="./ProductsPage.php?data=Compact cameras">Compact cameras</a></li>
                                        <li><a href="./ProductsPage.php?data=Snapshot cameras and supplies">Snapshot cameras and supplies</a></li>
                                        <li><a href="./ProductsPage.php?data=Camcorders">Camcorders</a></li>
                                        <li><a href="./ProductsPage.php?data=Memory Cards">Memory Cards</a></li>
                                        <li><a href="./ProductsPage.php?data=Photo printers and scanners">Photo printers and scanners</a></li>
                                        <li><a href="./ProductsPage.php?data=Photo and video accessories">Photo and video accessories</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-map-marker-alt"></i>Auto and GPS</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Auto and GPS</h3></li>
                                        <li><a href="./ProductsPage.php?data=GPS">GPS navigation</a></li>
                                        <li><a href="./ProductsPage.php?data=GPS accessories">GPS accessories</a></li>
                                        <li><a href="./ProductsPage.php?data=Audio systems">Audio system</a></li>
                                        <li><a href="./ProductsPage.php?data=Amplifiers">Amplifiers</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-laptop"></i>PC peripherias</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>PC peripherias</h3></li>
                                        <li><a href="./ProductsPage.php?data=Laptops">Laptops</a></li>
                                        <li><a href="./ProductsPage.php?data=Desktop">Desktops</a></li>
                                        <li><a href="./ProductsPage.php?data=Monitors">Monitors</a></li>
                                        <li><a href="./ProductsPage.php?data=Printers and Scanners">Printers and Scanners</a></li>
                                        <li><a href="./ProductsPage.php?data=Ebooks & Accessories">Ebooks & Accessories</a></li>
                                        <li><a href="./ProductsPage.php?data=PC Gaming">PC Gaming</a></li>
                                        <li><a href="./ProductsPage.php?data=PC Software">PC Software</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-headphones"></i>IT accessories</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>IT accessories</h3></li>
                                        <li><a href="./ProductsPage.php?data=USB Sticks">USB Sticks</a></li>
                                        <li><a href="./ProductsPage.php?data=Mouse">Mouse</a></li>
                                        <li><a href="./ProductsPage.php?data=Keyboard">Keyboard</a></li>
                                        <li><a href="./ProductsPage.php?data=Joysticks and steering wheels">Joysticks and steering wheels</a></li>
                                        <li><a href="./ProductsPage.php?data=Network adapters">Network adapters</a></li>
                                        <li><a href="./ProductsPage.php?data=Webcams">Webcams</a></li>
                                        <li><a href="./ProductsPage.php?data=Protectors">Protectors</a></li>
                                        <li><a href="./ProductsPage.php?data=Bags">Bags</a></li>
                                        <li><a href="./ProductsPage.php?data=Hard disks">Hard disks</a></li>
                                        <li><a href="./ProductsPage.php?data=Coolers">Coolers</a></li>
                                        <li><a href="./ProductsPage.php?data=PC cleaning">PC cleaning</a></li>
                                        <li><a href="./ProductsPage.php?data=Earphones and microphones">Earphones and microphones</a></li>
                                        <li><a href="./ProductsPage.php?data=Laptop chargers">Laptop chargers</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-bullseye"></i>Outdoors and Sports</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Outdoors and Sports</h3></li>
                                        <li><a href="./ProductsPage.php?data=Action cameras">Action cameras</a></li>
                                        <li><a href="./ProductsPage.php?data=Drones">Drones</a></li>
                                        <li><a href="./ProductsPage.php?data=Robots">Robots</a></li>
                                        <li><a href="./ProductsPage.php?data=Cross-trainers">Cross-trainers</a></li>
                                        <li><a href="./ProductsPage.php?data=Fitness bracelets">Fitness bracelets</a></li>
                                        <li><a href="./ProductsPage.php?data=Audio headphones and microphones">Audio headphones and microphones</a></li>
                                        <li><a href="./ProductsPage.php?data=Bluetooth speakers">Bluetooth speakers</a></li>
                                        <li><a href="./ProductsPage.php?data=Blu Ray">Blu Ray</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-blender"></i>Home and Garden</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Home and Garden</h3></li>
                                        <li><a href="./ProductsPage.php?data=Smart home">Smart home</a></li>
                                        <li><a href="./ProductsPage.php?data=Clocks">Clocks</a></li>
                                        <li><a href="./ProductsPage.php?data=Weather Stations">Weather Stations</a></li>
                                        <li><a href="./ProductsPage.php?data=Batteries and Chargers">Batteries and Chargers</a></li>
                                        <li><a href="./ProductsPage.php?data=Garden tools">Garden tools</a></li>
                                        <li><a href="./ProductsPage.php?data=Drilling machines">Drilling machines</a></li>
                                        <li><a href="./ProductsPage.php?data=Screwdrivers">Screwdrivers</a></li>
                                        <li><a href="./ProductsPage.php?data=Saws, circular saws and planers">Saws, circular saws and planers</a></li>
                                        <li><a href="./ProductsPage.php?data=Generators">Generators</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-laptop-house"></i>Small domestic appliances</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Small domestic appliances</h3></li>
                                        <li><a href="./ProductsPage.php?data=Vacuum cleaners">Vacuum cleaners</a></li>
                                        <li><a href="./ProductsPage.php?data=Coffee machines and vending machines">Coffee machines and vending machines</a></li>
                                        <li><a href="./ProductsPage.php?data=Microwaves">Microwaves</a></li>
                                        <li><a href="./ProductsPage.php?data=Ironing">Ironing</a></li>
                                        <li><a href="./ProductsPage.php?data=Water and steam jetting">Water and steam jetting</a></li>
                                        <li><a href="./ProductsPage.php?data=Sewing machines">Sewing machines</a></li>
                                </ul></li>
                                
                                <li><a href="####"><i class="fas fa-fan"></i>Air conditioners and Heaters</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Air conditioners and Heaters</h3></li>
                                        <li><a href="./ProductsPage.php?data=Inverter Split Systems">Inverter Split Systems</a></li>
                                        <li><a href="./ProductsPage.php?data=Professional air conditioning equipment">Professional air conditioning equipment</a></li>
                                        <li><a href="./ProductsPage.php?data=Mobile air conditioners">Mobile air conditioners</a></li>
                                        <li><a href="./ProductsPage.php?data=Fans">Fans</a></li>
                                        <li><a href="./ProductsPage.php?data=Heaters">Heaters</a></li>
                                    </ul></li>
                                <li><a href="####"><i class="fas fa-solar-panel"></i></i>Home appliances</a>
                                    <ul class="stock-detailed">
                                        <li class="option-Menu"><h3>Home appliances</h3></li>
                                        <li><a href="./ProductsPage.php?data=Washing machines">Washing machines</a></li>
                                        <li><a href="./ProductsPage.php?data=Dryers">Dryers</a></li>
                                        <li><a href="./ProductsPage.php?data=Refrigerators">Refrigerators</a></li>
                                        <li><a href="./ProductsPage.php?data=Freezers">Freezers</a></li>
                                        <li><a href="./ProductsPage.php?data=Dishwashers">Dishwashers</a></li>
                                        <li><a href="./ProductsPage.php?data=Cookers">Cookers</a></li>
                                        <li><a href="./ProductsPage.php?data=Boilers">Boilers</a></li>
                                        <li><a href="./ProductsPage.php?data=Absorbers">Absorbers</a></li>
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
                            <form method="post" action="Index.php?action=add$id='. $row['id'].'">
                                <div class="image">
                                    <img src="<?php echo $row['product-image'];?>">
                                </div>
                                <header class="product-name">
                                    <h3><?php echo $row['Brand']?></h3>
                                </header>
                                <header class="product-name">
                                    <h3><?php echo $row['product_name']?></h3>
                                </header>
                                <h3 class="product-price"><?php echo $row['product_price']?>.-
                                    <button type="submit" class="btn" name="add">Add to Cart</button>
                                </h3>
                                <input type="hidden" name="product_id" value= <?php echo $row['id']?> > 
                            </form>
                        </article>
                    <?php    
                    }
                    ?>
                

                
                </div>                
            </aside>
        </main>

        <footer>
            <?php include ('./footer.php') ?>
        </footer>     
        <script src="./js/pop-up-menu.js"></script>
        <script src="./ImageSlider/slider.js"></script>
    </body>
</html>