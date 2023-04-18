<?php
include("headersimple.php");
require_once("dbconn.php");


//code for Cart
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		//code for adding product in cart
		case "add":
			if(!empty($_POST["quantity"])) {
				$pid=$_GET["pid"];
				$result=mysqli_query($conn,"SELECT * FROM products WHERE id='$pid'");
				  while($productByCode=mysqli_fetch_array($result)){
				$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'extra1'=>$productByCode["extra1"], 'extra2'=>$productByCode["extra2"], 'extra3'=>$productByCode["extra3"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
				//$extrasArray = array($productByCode["code"]=>array('extra1'=>$productByCode["extra1"], 'extra2'=>$productByCode["extra2"], 'code'=>$productByCode["code"])); 
				if(!empty($_SESSION["cart_item"])) {
					if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode["code"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
						//$_SESSION["cart_extras"] = array_merge($_SESSION["cart_extras"],$extrasArray);
					}
				}  else {
					$_SESSION["cart_item"] = $itemArray;
					//$_SESSION["cart_extras"] = $extrasArray;
				}
			}
		}
		break;
	
		// code for removing product from cart
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		// code for if cart is empty
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
	}
	}
	?>