<?php
session_start();
require_once("dbcontroller.php");

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if (isset($_POST['add'])){

		    if(isset($_SESSION['cart'])){
		        $item_array = array(
		                'product_id' => $_POST['product_id']
		        );

		        // Create new session variable
		        $_SESSION['cart'][0] = $item_array;
		        print_r($_SESSION['cart']);
		    }
		}
	break;

	case "remove":
		if (isset($_POST['remove'])){
		  if ($_GET['action'] == 'remove'){
		      foreach ($_SESSION['cart'] as $key => $value){
		          if($value["product_id"] == $_GET['id']){
		              unset($_SESSION['cart'][$key]);
		          }
		      }
		  }
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>

<div class="no-records">Cart is Empty</div>
<?php 
}
?>
</div>



<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$result = getData();
	if (!empty($result)) { 
		foreach($result as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $result[$key]['id']; ?>">
			<!-- <div class="product-image"><img src="<?php echo $result[$key]['product_image']; ?>"></div> -->
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $result[$key]['product_name']; ?></div>
			<div class="product-description"><?php echo $result[$key]['product_description']; ?></div>
			<div class="product-price"><?php echo "$".$result[$key]['product_price']; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>