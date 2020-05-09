<?php 
class productcontroller
{
    public function AddProductToCart()
    {
        if (isset($_POST['add'])) 
        {
            if (isset($_SESSION['cart'])) 
            {
                $product_id = array_column($_SESSION['cart'], 'product_id');
                if (in_array($_POST['product_id'], $product_id)) 
                {
                    echo "<script>alert('Product is already added in the cart')</script>";
                    echo "<script>window.location = 'ProductsPage.php'</script>";
                }
                else 
                {
                    $count = count($_SESSION['cart']);
                    $item_array = array('product_id' => $_POST['product_id']);

                    $_SESSION['cart'][$count] = $item_array;
                }
            }
            else 
            {
                $item_array = array('product_id' => $_POST['product_id']);
            
                $_SESSION['cart'][0] = $item_array;
                print_r($_SESSION['cart']);
            }
        }
    }

    public function RemoveProductFromCart()
    {
        if (isset($_POST['remove']))
        {
            if ($_GET['action'] == 'remove') 
            {
                foreach ($_SESSION['cart'] as $key => $value) 
                {
                    if ($value["product_id"] == $_GET['id']) 
                    {
                        unset($_SESSION['cart'][$key]);
                        echo "<script>alert('Product has been Removed')</script>";
                        echo "<script>window.location = 'cart.php'</script>";
                    }
                }
            }
        }
    }

    public function AddProductToCartByID()
    {
        if (isset($_POST['add']))
        {
            if(isset($_SESSION['cart']))
            {    
                $product_id = array_column($_SESSION['cart'], 'product_id');
    
                if(in_array($_POST['product_id'], $product_id))
                {
                    echo "<script>alert('Product is already added in the cart')</script>";
                    echo "<script>window.location = 'ProductsPage.php'</script>";
                }
                else
                {    
                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'product_id' => $_POST['product_id']
                    );    
                    $_SESSION['cart'][$count] = $item_array;
                }
            }
            else
            {    
                $item_array = array(
                        'product_id' => $_POST['product_id']
                );
                // Create new session variable
                $_SESSION['cart'][0] = $item_array;
                print_r($_SESSION['cart']);
            }
        }
    }
}
?>