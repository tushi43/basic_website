<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM wproducts WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
			$a=$_POST["quantity"];
			$product_Code = $db_handle->runQuery("UPDATE wproducts SET quant= quant - $a WHERE code='" . $_GET["code"] . "'");
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
			$a=$_POST["quantity"];
			$product_Code = $db_handle->runQuery("UPDATE wproducts SET quant= quant + $a WHERE code='" . $_GET["code"] . "'");
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
		$product_Code = $db_handle->runQuery("UPDATE wproducts SET quant= 20");
	 break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>giftARTicles</TITLE>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main1.css">
<script src="backtotop.js"></script>
<script src="slide.js"></script>
</HEAD>
<BODY style="position:relative;min-height:100%;">
<a href="main.php"><img src="icon1.jpg" class="icon" ></a><br/><br/><br/><br/><br/>
  <!--dropdown start-->
  <div class="nav">
	<div class="dropdown">
		  <button class="dropbtn1">Home</button>
			  <div class="dropdown1-content">
				<a href="latest.php">LATEST</a>
				<a href="main.php">OFFERS</a>
			  </div>
	</div>
	<div class="dropdown">
		   <button class="dropbtn1">Articles</button>
			   <div class="dropdown1-content">
				<a href="handmade.php">HANDMADE</a>
				<a href="wooden.php">WOODEN</a>
				<a href="appliance.php">APPLIANCES</a>
			  </div>
	</div>
		<div class="dropdown">
		   <button class="dropbtn3"><a href="register.php" style="text-decoration:none; color:white;">Register</a></button>
			<button class="dropbtn4" ><a href="about.php" style="text-decoration:none; color:white;">About Us</a></button>
			</div>
		</div>
		</div>
		<br/><br/><br/><br/>
	<?php	
	require 'core.php';
	
	if(loggedin())
		{
		 	echo '<button class="dropbtn4" ><a href="index.php" style="text-decoration:none; float:right;color:white; padding:10px;">You\'re logged In</a></button>
<br/><br/><br/><br/>';
		}else{
	  echo '<button class="dropbtn4" ><a href="loginform.php" style="text-decoration:none; float:right;color:white; padding:10px;">Log In</a></button>
<br/><br/><br/><br/>';
		}
		?>
	<div id="shopping-cart">
<div class="txt-heading">Shopping Cart<a id="btnEmpty" href="wooden.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
	$item_no = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "Rs ".$item["price"]*$item["quantity"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="wooden.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
	    $item_no += (1*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
<td colspan="5" align=right><strong>Total Items:</strong> <?php echo " ".$item_no; ?></td>
</tr>
</tbody>
</table>		
  <?php
}
?>
<div id="product-grid">
	<div class="txt-heading">Products</div><br/><br/><br/>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM wproducts ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="wooden.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image" ><img src="<?php echo $product_array[$key]["image"]; ?>" height="180px" width="250px"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div><strong class="namesake"><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["price"]; ?></div>
			
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			
			<div><input type="button" value="Quantity Available" class="btnAddAction" /></div>
			<div class="product-price"><?php echo " ".$product_array[$key]["quant"]; ?></div>
		</form>
		</div>
	<?php
			}
	}
	?>
</div>
<br/>
</div>

 <!--Footer starts-->
 <div class="last">
  <div class="footer">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
  <table>

  <i>GiftARTicles is a online shopping website which brings to you various types of gifts<br/>
  Come shop with us and Give Your Loved One a Cherishing Moment.
  We have lot to Offer<br/></i>
  While using this site, you agree to have read and accepted our terms of use, cookie and <a href="#"><i>Privacy policy</i></a>.
  </table>
</div>
  <!--Footer ends-->
  <br/>
  <div class="copyright" >
  <i> © 2017 ALL RIGHTS RESERVED by Tushar Jumani & Rahul Dhameja </i>
  </div>
  <br/>
  <button class="btt" onclick="topFunction()" id="myBtn" title="Go to top" >Back To Top</button>
  </div>
  </body>
</HTML>