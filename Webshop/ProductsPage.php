<?php

require ('./php/db_connect.php'); 
session_start(); 

    try
    {   
        require_once ('./php/db_connect.php');        

        global $category;
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
            <?php include ('./top-header.php') ?>
        </header>
        <main class="main-products">
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
            <?php include ('./footer.php') ?>
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