<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE productcode='" . $_GET["productcode"] . "'");
			$itemArray = array($productByCode[0]["productcode"]=>array('productname'=>$productByCode[0]["productname"], 'productcode'=>$productByCode[0]["productcode"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart"])) {
				if(in_array($productByCode[0]["productcode"],array_keys($_SESSION["cart"]))) {
					foreach($_SESSION["cart"] as $k => $v) {
							if($productByCode[0]["productcode"] == $k) {
								if(empty($_SESSION["cart"][$k]["quantity"])) {
									$_SESSION["cart"][$k]["quantity"] = 0;
								}
								$_SESSION["cart"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart"] = array_merge($_SESSION["cart"],$itemArray);
				}
			} else {
				$_SESSION["cart"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart"])) {
			foreach($_SESSION["cart"] as $k => $v) {
					if($_GET["productcode"] == $k)
						unset($_SESSION["cart"][$k]);				
					if(empty($_SESSION["cart"]))
						unset($_SESSION["cart"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart"]);
	break;	
        case "buy":
            if(!empty($_POST["quantity"])) {
                     echo "<script type='text/javascript'>alert('$quantity');</script>";

   }
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
<a class="right" href="customerhome.html">back</div>




<a id="btnEmpty" href="index1.php?action=empty">Empty Cart</a>


<?php
if(isset($_SESSION["cart"])){
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

</tr>	

<?php		
    foreach ($_SESSION["cart"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["productname"]; ?></td>
				<td><?php echo $item["productcode"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				
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

<a id="btnEmpty"  href="ca.php?action=empty">buy</a>


	
  <?php	
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY productcode ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index1.php?action=add&productcode=<?php echo $product_array[$key]["productcode"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["productname"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
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
