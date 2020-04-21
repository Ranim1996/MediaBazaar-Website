<?php  

//start session
session_start();

require_once('./php/CreateDB.php');
require_once('./php/component.php');

if (isset($_POST['add'])){

    if(isset($_SESSION['cart'])){

        $product_id = array_column($_SESSION['cart'], 'product_id');

        if(in_array($_POST['product_id'], $product_id)){
            echo "<script>alert('Product is already added in the cart')</script>";
            echo "<script>window.location = 'index.php'</script>";
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

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Shopping Cart</title>
    
    <link rel="stylesheet" href="indexStyle.css">

</head>
<body>

	<?php require_once("php/header.php"); ?>
	<div class="container">
		<!-- padding y for padding top and bottom -->
		<div class="row text-center py-5"> 
			<?php  
			$result = getData();

            for ($i=0; $i < sizeof($result) ; $i++) { 
            	# code...
            	component($result[$i]['id'], $result[$i]['product_name'], $result[$i]['product_price'], $result[$i]['product_image'], $result[$i]['product_description'] );
            }

			?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>