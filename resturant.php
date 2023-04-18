<?php
include("cart.php");
error_reporting(E_ERROR | E_PARSE);
$extrasel = "";
$user_id = $_SESSION['id'];
$restID = $_GET['restId'];

if(isset($_GET['prodExtra1Rem']) || isset($_GET['prodExtra2Rem']) || isset($_GET['prodExtra3Rem'])){
	$delete_query = "DELETE FROM current_order WHERE id =".$_GET['code']." AND user_id =".$user_id;
	$result = mysqli_query($conn,$delete_query);
	header("Refresh:0; url=resturant?restId= $restID");
}

if(isset($_GET['empty'])){
	$delete_query = "DELETE FROM current_order WHERE user_id =".$user_id;
	$result = mysqli_query($conn,$delete_query);
	header("Refresh:0; url=resturant.ph?restId=$restID");
}

$user_id = $_SESSION['id'];
		
if(isset($_POST['add'])){

	$prodName = $_POST['name'];
	$prodID = $_POST['pid'];
	$prodExtra = $_POST['extra'];
	$prodPrice = $_POST['price'];
	$rowExtra1 = $_POST['extra1'];
	$rowExtra2 = $_POST['extra2'];
	$rowExtra3 = $_POST['extra3'];
	$prodExtra1 = "";
	$prodExtra2 = "";
	$prodExtra3 = "";

	if(strcasecmp($prodExtra,$rowExtra1) == 0){
		$prodExtra1 = $prodExtra;
		$prodExtra2 = "";
		$prodExtra3 = "";
	}
	else if(strcasecmp($prodExtra,$rowExtra2) == 0){
		$prodExtra2 = $prodExtra;
		$prodExtra1 = "";
		$prodExtra3 = "";
	}
	else if(strcasecmp($prodExtra,$rowExtra3) == 0){
		$prodExtra3 = $prodExtra;
		$prodExtra2 = "";
		$prodExtra1 = "";
	}

	$insert_query = "INSERT INTO current_order (user_id, prodID, prodName, prodExtra1, prodExtra2, prodExtra3, prodPrice, quantity) VALUES('".$user_id."','".$prodID."','".$prodName."','".$prodExtra1."','".$prodExtra2."','".$prodExtra3."','".$prodPrice."', '1')";
	$result = mysqli_query($conn,$insert_query);

	$extrasel = $_POST['extra'];
	
	//$delete_query = "DELETE FROM current_order WHERE user_id =".$user_id;
	//$result = mysqli_query($conn,$delete_query);
}
	?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Eat@United">
    <meta name="author" content="SnSCyber">
    <title>Eat@United</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/detail-page.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body data-spy="scroll" data-target="#secondary_nav" data-offset="75">
				
	
	
	<main>
	    <div class="container margin_detail_2">
	        <div class="row">
	            <div class="col-lg-8">
	                <div class="detail_page_head clearfix">
	                    <div class="rating">
						<?php
						$restInfo= mysqli_query($conn,"SELECT * FROM restaraunt WHERE id = '".$restID."'");
						if (!empty($restInfo)) { 
							while ($row=mysqli_fetch_array($restInfo)) {	

						$restName = $row["name"];}}
	$reviews= mysqli_query($conn,"SELECT FLOOR(AVG(average)) as averages, COUNT(id) as ratings FROM reviews WHERE restaurant = '".$restName."'  && accepted = 1 ");
	if (!empty($reviews)) { 
		while ($row=mysqli_fetch_array($reviews)) {
		
	?>
	                        <div class="score"><span>Superb<em>Based on <?php echo $row["ratings"]; ?> Rating</em></span><strong><?php echo $row["averages"]; ?></strong></div>
							<?php
		}
	}  else {
		
		?>
								<div class="score"><span>Unrated<em>Unrated</em></span><strong>0</strong></div>
								<?php
		


	}
	?>
	                    </div>
	                    <div class="title">




						<?php
	$about= mysqli_query($conn,"SELECT * FROM restaraunt WHERE id = '".$restID."'");
	if (!empty($about)) { 
		while ($row=mysqli_fetch_array($about)) {
		
	?> <h1> <?php echo $row["name"]; ?></h1><?php if(!isset($_SESSION['id'])){echo '</br><h6 style="color:red">***Attention***</h6></br><h6 style="color:red">Please sign in using the navigation button at the top of the page before proceeding to order or the order will not be processed</h6>';}?>
						
	<?php echo $row["address"]; ?> - <a href="<?php echo $row["maps"]; ?>" target="blank">Get directions</a>
	                       						
		
	                    </div>
	                </div>
	                <!-- /detail_page_head -->
					<br>
	                <h6>About "<?php echo $row["name"]; ?>"</h6>
	                <p> <?php echo $row["description"]; ?></p>
	            </div>
	            <div class="col-lg-4">
	                <div class="pictures magnific-gallery clearfix">
	                    <figure>
	                        <a href="<?php echo $row["image"]; ?>" title="Photo title" data-effect="mfp-zoom-in">
	                            <img src="<?php echo $row["image"]; ?>" class="lazy loaded" alt="" data-was-processed="true">
	                        </a>
	                    </figure></div>
	            </div>
				<?php
		}
	} 
		?>
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->

		<nav class="secondary_nav sticky_horizontal">
	        <div class="container">
				
			<ul id="secondary_nav">
			<?php
	$categories= mysqli_query($conn,"SELECT * FROM products WHERE  restID = '".$restID."' GROUP BY category ORDER BY id ASC");
	if (!empty($categories)) { 
		while ($row=mysqli_fetch_array($categories)) {	
	
			?>
	                <li style=" text-transform: capitalize"><a class="list-group-item list-group-item-action" href="#<?php echo$row["category"]; ?>"><?php echo$row["category"]; ?></a></li>
	                
				<?php
		}
	}  ?>
	<li><a class="list-group-item list-group-item-action" href="#section-5"><i class="icon_chat_alt"></i>Reviews</a></li>
	            </ul>
	        </div>
	        <span></span>
	    </nav>
	    <!-- /secondary_nav -->
	
	    <div class="bg_gray">
	        <div class="container margin_detail">
	            <div class="row">
	                <div class="col-lg-7 list_menu">

					<!-- Order Again -->
					<?php
	$prevOrder= mysqli_query($conn,"SELECT * FROM orders WHERE restID = '".$restID."' && userID = '".$user_id."' && rest = '".$restName."'  ORDER BY id DESC LIMIT 1");
	if (!empty($prevOrder)) { 
		while ($row=mysqli_fetch_array($prevOrder)) {	
            $orderProd = $row['prodID'];
			$restNameOrder = $row['rest'];

	$categoryOrder = 'Order Again'; 

			?>
						
					<section id="<?php echo$categoryOrder; ?>">
	                        <h4 style=" text-transform: capitalize"><?php echo$categoryOrder; ?></h4>
							<div class="table_wrapper">
	                            <table class="table cart-list menu-gallery">
	                                <thead>
									<tr>
											<th></th>
	                                        <th>
	                                            Item
	                                        </th>
	                                        <th>
	                                            Price
	                                        </th>
	                                        <th>
	                                        </th>
	                                    </tr>
	                                </thead>
	                                <tbody>
									<?php
	$productOrder= mysqli_query($conn,"SELECT * FROM products WHERE restID = '".$restID."' && id = '".$orderProd."' ORDER BY id ASC");
	if (!empty($productOrder)) { 
		while ($row=mysqli_fetch_array($productOrder)) {	
	
			?><tr>
			<td class="d-md-flex align-items-center">
			<form method="post" action="resturant?restId=<?php echo $restID ; ?>&action=add&pid=<?php echo $row["id"]; ?>&prodName=<?php echo $row["name"]; ?>&prodExtra1=<?php if(strcasecmp($row["extra1"],$extrasel) == 0){echo $row["extra1"];} else{echo "";}?>&prodExtra2=<?php if(strcasecmp($row["extra2"],$extrasel) == 0){echo $row["extra2"];} else{echo "";}?>&prodPrice=<?php echo $row["price"]; ?>&extrasel=<?php echo $extrasel; ?>&refresh=1">
				<figure>
				<a href="<?php echo $row["image"]; ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["image"]; ?>" class="lazy"></a>
				</figure>
				</td>
				<td>
				<div class="flex-md-column">
					<input hidden type="text" value="<?php echo $row['id']?>" name="pid" id="pid">	
					<h4><?php echo $row["name"]; ?></h4>
					<input hidden type="text" value="<?php echo $row['name']?>" name="name" id="name">
					<input hidden type="text" value="<?php echo $row['extra1']?>" name="extra1" id="extra1">
					<input hidden type="text" value="<?php echo $row['extra2']?>" name="extra2" id="extra2">
					<p>
					<?php echo $row["description"]; ?>
					</p>
					
					<?php
		if ($row["extra"] == 'yes'){
		$extra = $row["extra1"];
		$extra2 = $row["extra2"];
		echo '<div class="row opt_order">
		<div class="col-6">
		<label class="container_radio">' .$extra.'
		<input type="radio" value="' . $extra . '" name="extra" id="extra" checked>
		<span class="checkmark"></span>
		</label>
		</div>
		<div class="col-6">
		<label class="container_radio">' .$extra2.'
		<input type="radio" value="' . $row['extra2'] . '" name="extra" id="extra">
		<span class="checkmark"></span>
		</label>
		</div>
		</div>';
		}
		
		?>
		
				</div>
			</td>
			<td>
				<strong><?php echo 'N$ '. $row["price"]; ?></strong>
				<input hidden type="text" value="<?php echo $row['price']?>" name="price" id="price">
			<td class="options">
			<input type="hidden"  name="quantity" value="1" size="1"  /><input type="submit" value="Add" id="add" name="add" class="btn_1 ">
			
			</td>
			</form>
		</tr>
		
		<?php
			}
	}  else {
		
 echo "No Records.";

	}
	?>
	                                </tbody>
	                            </table>
	                        </div>
	                    </section>
						<?php
		}
    }
	 ?>

    
	                    <!-- /section -->



					<?php
	$section= mysqli_query($conn,"SELECT category FROM products WHERE  restID = '".$restID."' GROUP BY category ORDER BY id ASC ");
	if (!empty($section)) { 
		while ($row=mysqli_fetch_array($section)) {	

	$category = $row["category"]; 
			?>
						
					<section id="<?php echo$row["category"]; ?>">
	                        <h4 style=" text-transform: capitalize"><?php echo$row["category"]; ?></h4>
							<div class="table_wrapper">
	                            <table class="table cart-list menu-gallery">
	                                <thead>
									<tr>
											<th></th>
	                                        <th>
	                                            Item
	                                        </th>
	                                        <th>
	                                            Price
	                                        </th>
	                                        <th>
	                                        </th>
	                                    </tr>
	                                </thead>
	                                <tbody>
									<?php
	$product= mysqli_query($conn,"SELECT * FROM products WHERE category ='".$category."' && restID = '".$restID."' ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {	
	
			?><tr>
			<td class="d-md-flex align-items-center">
			<form method="post" action="resturant?restId=<?php echo $restID ; ?>&action=add&pid=<?php echo $row["id"]; ?>&prodName=<?php echo $row["name"]; ?>&prodExtra1=<?php if(strcasecmp($row["extra1"],$extrasel) == 0){echo $row["extra1"];} else{echo "";}?>&prodExtra2=<?php if(strcasecmp($row["extra2"],$extrasel) == 0){echo $row["extra2"];} else{echo "";}?>&prodExtra3=<?php if(strcasecmp($row["extra3"],$extrasel) == 0){echo $row["extra3"];} else{echo "";}?>&prodPrice=<?php echo $row["price"]; ?>&extrasel=<?php echo $extrasel; ?>&refresh=1">
				<figure>
				<a href="<?php echo $row["image"]; ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="<?php echo $row["image"]; ?>" alt="<?php echo $row["image"]; ?>" class="lazy"></a>
				</figure>
				</td>
				<td>
				<div class="flex-md-column">
					<input hidden type="text" value="<?php echo $row['id']?>" name="pid" id="pid">	
					<h4><?php echo $row["name"]; ?></h4>
					<input hidden type="text" value="<?php echo $row['name']?>" name="name" id="name">
					<input hidden type="text" value="<?php echo $row['extra1']?>" name="extra1" id="extra1">
					<input hidden type="text" value="<?php echo $row['extra2']?>" name="extra2" id="extra2">
					<input hidden type="text" value="<?php echo $row['extra3']?>" name="extra3" id="extra3">
					<p>
					<?php echo $row["description"]; ?>
					</p>
					
					<?php
		if ($row["extra"] == 'yes'){
		$extra = $row["extra1"];
		$extra2 = $row["extra2"];
		$extra3 = $row["extra3"];
		if (!empty ($extra3)) {
		echo '<div class="row opt_order">
		<div class="col-6">
		<label class="container_radio">' .$extra.'
		<input type="radio" value="' . $extra . '" name="extra" id="extra" checked>
		<span class="checkmark"></span>
		</label>
		</div>
		<div class="col-6">
		<label class="container_radio">' .$extra2.'
		<input type="radio" value="' . $row['extra2'] . '" name="extra" id="extra">
		<span class="checkmark"></span>
		</label>
		</div>
	
		<div class="col-6">
		<label class="container_radio">' .$extra3.'
		<input type="radio" value="' . $row['extra3'] . '" name="extra" id="extra">
		<span class="checkmark"></span>
		</label>
		</div>
		</div>';
		} else {
			echo '<div class="row opt_order">
			<div class="col-6">
			<label class="container_radio">' .$extra.'
			<input type="radio" value="' . $extra . '" name="extra" id="extra" checked>
			<span class="checkmark"></span>
			</label>
			</div>
			<div class="col-6">
			<label class="container_radio">' .$extra2.'
			<input type="radio" value="' . $row['extra2'] . '" name="extra" id="extra">
			<span class="checkmark"></span>
			</label>
			</div>
			</div>';

		}
	}
		
		?>
		
				</div>
			</td>
			<td>
				<strong><?php echo 'N$ '. $row["price"]; ?></strong>
				<input hidden type="text" value="<?php echo $row['price']?>" name="price" id="price">
			<td class="options">
			<input type="hidden"  name="quantity" value="1" size="1"  /><input type="submit" value="Add" id="add" name="add" class="btn_1 ">
			
			</td>
			</form>
		</tr>
		
		<?php
			}
	}  else {
		
 echo "No Records.";

	}
	?>
	                                </tbody>
	                            </table>
	                        </div>
	                    </section>
						<?php
		}
	}  ?>
	                    <!-- /section -->

	                 
	                 

	                </div>
	                <!-- /col -->

	                <div class="col-lg-5" id="sidebar_fixed">
	                    <div class="box_order mobile_fixed">
	                        <div class="head">
	                            <h3>Order Summary</h3>
								<form action="order.php" method="post">	
	                            <a href="#0" class="close_panel_mobile"><i class=""></i></a>
	                        </div>
	                        <!-- /head -->
	                        <div class="main">
							
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
}
?>	
<table class="clearfix" cellpadding="8" cellspacing="10">
<tbody>

<?php

$user_id = $_SESSION['id'];
$extrasel = $_POST['extra'];
$cartProducts= mysqli_query($conn,"SELECT * FROM current_order WHERE user_id =".$user_id." ORDER BY id ASC");
	if (!empty($cartProducts)) { 
		while ($row=mysqli_fetch_array($cartProducts)) {
			$extraName1 = $row['prodExtra1'];
			$extraName2 = $row['prodExtra2'];
			$extraName3 = $row['prodExtra3'];
			$prodID = $row['prodID'];
			$rowID = $row['id'];
			$item_price = $row["quantity"]*$row["prodPrice"];
			if($extrasel){
				if(strcasecmp($extrasel,$extraName1) == 0){
					echo '<tr>
				  <td style="text-align:left; "><a href="resturant?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
				  <td style="text-align:right;">'.$row["quantity"].' x</td>
				  <td>'.$row["prodName"].'</td>
				  <td>'.$row["prodExtra1"].'</td>
				  <td>'.$row["prodExtra2"].'</td>
				  <td>'.$row["prodExtra3"].'</td>
					<td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
					</tr>';
				}
				else if(strcasecmp($extrasel,$extraName2) == 0){
				   echo '<tr>
				   <td style="text-align:left; "><a href="resturant?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
				   <td style="text-align:right;">'.$row["quantity"].' x</td>
				   <td>'.$row["prodName"].'</td>
				   <td>'.$row["prodExtra1"].'</td>
				   <td>'.$row["prodExtra2"].'</td>
				   <td>'.$row["prodExtra3"].'</td>
					 <td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
					 </tr>';
				}
				else if(strcasecmp($extrasel,$extraName3) == 0){
					echo '<tr>
					<td style="text-align:left; "><a href="resturant?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
					<td style="text-align:right;">'.$row["quantity"].' x</td>
					<td>'.$row["prodName"].'</td>
					<td>'.$row["prodExtra1"].'</td>
					<td>'.$row["prodExtra2"].'</td>
					<td>'.$row["prodExtra3"].'</td>
					  <td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
					  </tr>';
				 }
				else{
					echo '<tr>
					  <td style="text-align:left; "><a href="resturant?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
					  <td style="text-align:right;">'.$row["quantity"].' x</td>
					  <td>'.$row["prodName"].'</td>
					  <td>'.$row["prodExtra1"].'</td>
				  	  <td>'.$row["prodExtra2"].'</td>
						<td>'.$row["prodExtra3"].'</td>
						<td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
						</tr>';
				}
			}
			else{
				echo '<tr>
					  <td style="text-align:left; "><a href="resturant?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
					  <td style="text-align:right;">'.$row["quantity"].' x</td>
					  <td>'.$row["prodName"].'</td>
					  <td>'.$row["prodExtra1"].'</td>
				  	<td>'.$row["prodExtra2"].'</td>
					  <td>'.$row["prodExtra3"].'</td>
						<td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
						</tr>';
			
			}
				$total_quantity += $row["quantity"];
				$total_price += ($row["prodPrice"]*$row["quantity"]);
				$grand_total = $total_price + 25;
				$_SESSION['resturant'] = $restName;
				$_SESSION['resturantID'] = $restID;
				$_SESSION['prodID'] = $prodID;
		}
		?>
			<?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</tbody>
</table>
								<ul class="clearfix">
									<br>
									<li><a id="btnEmpty" href="resturant?restId=<?php echo $restID ; ?>&action=empty&empty=true">Empty Cart</a></li>
									<li>Subtotal<span><?php echo "N$ ".number_format($total_price, 2); ?></span></li>
								</ul>
	                            </ul>
							
	                             <div class="row opt_order">
	                                <div class="col-6">
	                                    <label class="container_radio">Delivery (N$25.00)
	                                        <input type="radio" value="Delivery" name="opt_order" checked>
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="col-6">
	                                    <label class="container_radio">Pick Up (N$0.00)
	                                        <input type="radio" value="Pick Up" name="opt_order">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                            </div>
	                            <div class="dropdown day">
	                                <a href="#0" data-toggle="dropdown">Day <span id="selected_day"></span></a>
	                                <div class="dropdown-menu">
	                                    <div class="dropdown-menu-content">
	                                        <h4>Which day delivered?</h4>
	                                        <div class="radio_select chose_day">
	                                            <ul>
	                                                <li>
	                                                    <input type="radio" id="day_1" name="day" value="Today">
	                                                    <label for="day_1">Today</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="day_2" name="day" value="Tomorrow">
	                                                    <label for="day_2">Tomorrow</label>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <!-- /people_select -->
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /dropdown -->
	                            <div class="dropdown time">
	                                <a href="#0" data-toggle="dropdown">Time <span id="selected_time"></span></a>
	                                <div class="dropdown-menu">
	                                    <div class="dropdown-menu-content">
	                                        <h4>Lunch</h4>
	                                        <div class="radio_select add_bottom_15">
	                                            <ul>
	                                                <li>
	                                                    <input type="radio" id="time_1" name="time" value="12.00pm">
	                                                    <label for="time_1">12.00</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_2" name="time" value="12.30pm">
	                                                    <label for="time_2">12.30</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_3" name="time" value="01.00pm">
	                                                    <label for="time_3">1.00</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_4" name="time" value="01.30pm">
	                                                    <label for="time_4">1.30</label>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <!-- /time_select -->
	                                        <h4>Dinner</h4>
	                                        <div class="radio_select">
	                                             <ul>
	                                                <li>
	                                                    <input type="radio" id="time_5" name="time" value="08.00pm">
	                                                    <label for="time_5">20.00</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_6" name="time" value="08.30pm">
	                                                    <label for="time_6">20.30</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_7" name="time" value="09.00pm">
	                                                    <label for="time_7">21.00</label>
	                                                </li>
	                                                <li>
	                                                    <input type="radio" id="time_8" name="time" value="09.30pm">
	                                                    <label for="time_8">21.30</label>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                        <!-- /time_select -->
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /dropdown -->
	                            <div class="btn_1_mobile">
								<input type="hidden" name="extra" id="extra" value="<?=$extrasel?>"/>
								<input type="submit" class="btn_1 gradient full-width mb_5" value="Order Now">
								<input type="hidden" name="restName" id="restName" value="<?=$restName?>"/>
									</form>
	                                <div class="text-center"><small>No money charged on this step</small></div>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- /box_order -->
	                    
	                    <div class="btn_reserve_fixed"><a href="#0" class="btn_1 gradient full-width">View Basket</a></div>
	                </div>
					</div>
	            </div>
	            <!-- /row -->
	        </div>
	        <!-- /container -->
	    </div>
	    <!-- /bg_gray -->

	    <div class="container margin_30_20">
	        <div class="row">
	            <div class="col-lg-8 list_menu">
	                <section id="section-5">
	                    <h4>Reviews</h4>
						<?php
	$addReview= mysqli_query($conn,"SELECT * FROM reviews WHERE restaurant = '".$restName."' && accepted = 1 ORDER BY id ASC");
	if (!empty($addReview)) { 
		while ($row=mysqli_fetch_array($addReview)) {
			$fq = $row["foodquality"] *10;
			$service = $row["service"] *10;
			$price = $row["price"] *10;
		
	?>
	                    <div class="row add_bottom_30 d-flex align-items-center reviews">
	                        <div class="col-md-3">
	                            <div id="review_summary">
	                                <em><?php echo $restName; ?></em>
	                            </div>
	                        </div>
	                        <div class="col-md-9 reviews_sum_details">
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <h6>Food Quality</h6>
	                                    <div class="row">
	                                        <div class="col-xl-10 col-lg-9 col-9">
	                                            <div class="progress">
	                                                <div class="progress-bar" role="progressbar" style="width: <?=$fq?>%" aria-valuenow="90" aria-valuemin="#0" aria-valuemax="100"></div>
	                                            </div>
	                                        </div>
	                                        <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $row["foodquality"]; ?></strong></div>
	                                    </div>
	                                    <!-- /row -->
	                                    <h6>Service</h6>
	                                    <div class="row">
	                                        <div class="col-xl-10 col-lg-9 col-9">
	                                            <div class="progress">
	                                                <div class="progress-bar" role="progressbar" style="width: <?=$service?>%" aria-valuenow="95" aria-valuemin="#0" aria-valuemax="100"></div>
	                                            </div>
	                                        </div>
	                                        <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $row["service"]; ?></strong></div>
	                                    </div>
	                                    <!-- /row -->
	                                </div>
	                                <div class="col-md-6">
	                                    
	                                    <!-- /row -->
	                                    <h6>Price</h6>
	                                    <div class="row">
	                                        <div class="col-xl-10 col-lg-9 col-9">
	                                            <div class="progress">
	                                                <div class="progress-bar" role="progressbar" style="width: <?=$price?>%" aria-valuenow="60" aria-valuemin="#0" aria-valuemax="100"></div>
	                                            </div>
	                                        </div>
	                                        <div class="col-xl-2 col-lg-3 col-3"><strong><?php echo $row["price"]; ?></strong></div>
	                                    </div>
	                                    <!-- /row -->
	                                </div>
	                            </div>
	                            <!-- /row -->
	                        </div>
	                    </div>
	                    <!-- /row -->
	                    <div id="reviews">
	                        <div class="review_card">
	                            <div class="row">
	                                <div class="col-md-2 user_info">
	                                </div>
	                                <div class="col-md-10 review_content">
	                                    <div class="clearfix add_bottom_15">
	                                        
	                                    </div>
	                                    <h3><?php echo $row["title"]; ?></h3>
										<p><?php echo $row["review"]; ?></p>
	                                   
	                                </div>
	                            </div>
	                            <!-- /row -->
	                        </div>
	                        <!-- /review_card -->
	                        <!-- /review_card -->
	                    </div>
						<?php
		}
	}  else {
 echo "No Records.";

	}
	?>
	                    <!-- /reviews -->
	                    <div class="text-right"><a href="leave-review.php" class="btn_1 gradient">Leave a Review</a></div>
	                </section>
	                <!-- /section -->
	            </div>
	        </div>
	    </div>
	    <!-- /container -->
	</main>

	<!-- /main -->

<footer>
        <div class="wave footer"></div>
        <div class="container margin_60_40 fix_mobile">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <h3 data-target="#collapse_1">Quick Links</h3>
                    <div class="collapse dont-collapse-sm links" id="collapse_1">
                        <ul><li>
							<a href="home.php" >Home</a>                        
						</li>					
						<li><a href="restaurants.php">Our Restaurants</a></li>  
						<li><a href="contacts.php">Contact Us</a></li>                          
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
				<h3 data-target="#collapse_2">Choose a location</h3>
				<div class="collapse dont-collapse-sm links" id="collapse_2">
                        <ul>
                            <li><a href="resturant.php?restId=3005">Katima Mulilo</a></li>
                            <li><a href="resturant.php?restId=3004">Ondangwa</a></li>
                            <li><a href="resturant.php?restId=3003">Walvis Bay</a></li>
                            <li><a href="resturant.php?restId=3001">Windhoek</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_4">Contacts</h3>
                        <div class="follow_us">
                            <ul>
                                <li><a href="https://facebook.com/eatatunitedrestaurants"><img src="img/twitter.png" alt="" class="lazy"></a></li>
                                <li><a href="https://www.instagram.com/eatatunitedrestaurants/"><img src="img/instagram.png"  alt="" class="lazy"></a></li>
                            </ul>
                        </div>
                    <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                        <ul>
                            <li><i class="icon_mobile"></i>+264 (61) 209 0300</li>
                            <li><i class="icon_mail_alt"></i><a href="mailto:info@eatatunited.com.na">info@eatatunited.com.na</a></li>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <hr>
            <div class="row add_bottom_25">
                <div class="col-lg-6">
                    <ul class="footer-selector clearfix">
                        
                        <li><img src="img/visa_logo.jpg"  alt="" width="80" height="30" class="lazy"></li>
						<li><img src="img/master card.png" alt="" width="65" height="30" class="lazy"></li>
						<li><img src="img/PayPoint-logo.jpg"  alt="" width="60" height="30" class="lazy"></li>
                   
					</ul>
                </div>
                <div class="col-lg-6">
                    <ul class="additional_links">
                        <li><a href="termsandconditions.php">Terms and conditions</a></li>
                        <li><a href="privacy.php">Privacy</a></li>
                        <li><span>© Eat@United</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
	<!--/footer-->


	<div id="toTop" class="detail_page"></div><!-- Back to top button -->

	<div id="message">Item added to cart</div><!-- Add to cart message -->
	
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="assets/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/sticky_sidebar.min.js"></script>
    <script src="js/sticky-kit.min.js"></script>
    <script src="js/specific_detail.js"></script>

</body>
</html>