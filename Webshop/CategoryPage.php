<?php 

require ('./php/db_connect.php');
session_start();

    try
    {  
        require_once ('./php/db_connect.php');        

        
        $subCateg = $conn->prepare("SELECT DISTINCT Category FROM product;");
        $subCateg->execute();
        $subCategories = $subCateg->fetchAll();
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
        <link rel="stylesheet" href="./css/style-categorypage.css">
        
        <link rel="icon" href="./css/images/9A902BDC06A64F96A24667E63CFB24FC.png">
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

            <aside class="top-product">
                <article class="info">
                    <h2>Product Name</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem unde temporibus vel sint. Sint possimus, iste fugit molestias eaque veritatis enim cumque, numquam voluptatum nihil architecto, consectetur optio cupiditate recusandae.</p>
                    <h2 class="product-price">599.-</h3>
                </article>
                <article class="image">
                    <img src="###">
                </article>
            </aside>

            <h1>Subcategory name</h1>

            <aside class="sub-categories">
                <?php 
                    foreach($subCategories as $row)
                    {
                    ?>
                        <article class="sub-category">
                            <div class="image">
                                <img src="<?php echo $row['product-image']?>">
                            </div>
                            <header class="sub-category-name">
                                <h3><?php echo $row['Category']?></h3>
                            </header>
                        </article>
                    <?php
                    }
                    ?>  
            </aside>

            <h1>Chosen Products</h1>
            
            <aside class="chosen-products">

                    <article class="product">
                            <div class="image">
                                <img src="###">
                            </div>
                            <header class="product-name">
                                <h3>Product name</h3>
                             </header>
                            <h3 class="product-price">599.-</h3>
                    </article>

                    <article class="product">
                            <div class="image">
                                <img src="###">
                            </div>
                            <header class="product-name">
                                <h3>Product name</h3>
                             </header>
                            <h3 class="product-price">599.-</h3>
                    </article>

                    <article class="product-3">
                            <div class="image">
                                <img src="###">
                            </div>
                            <header class="product-name">
                                <h3>Product name</h3>
                             </header>
                            <h3 class="product-price">599.-</h3>
                    </article>

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
    </body>
</html>