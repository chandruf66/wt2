<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">you bought these items</div>



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
session_start();	
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
				
		}
		 session_destroy();
		?>

<tr>

<td></td>
</tr>
</tbody>
</table>
<a class="right" href="custlogin.html"><h3>log out</h3>
<a class="right" href="index1.php"><h3>back</h3></div>

</body>
</html>
