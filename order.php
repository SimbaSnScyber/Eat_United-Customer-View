<?php
include("cart.php");

$promoCodeValueNum = "";
$promoCodeValPercentage = "";

if(isset($_COOKIE["promoCodeValue"])){
	$promoCodeValueNum = $_COOKIE["promoCodeValue"];
	$promoCodeValPercentage = $promoCodeValueNum/100;
}

if(isset($_SESSION['id'])){
	$user_id = $_SESSION['id'];
}
$rest = $_SESSION['resturant'];
$restID = $_SESSION['resturantID'];
$prodID = $_SESSION['prodID'];
?>
	
<body>
<!-- /header -->
	
	<main class="bg_gray">
		
		<div class="container margin_60_20">
			
		<form action="sendiVeri.php" method="post" id="orderform">
		    <div class="row justify-content-center">
		        <div class="col-xl-6 col-lg-8">
		        	<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Delivery Details Confirmation</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
						<h4 style="color:Red;">	<?php if(isset($_GET['message1'])) {echo $_GET['message1'];} ?> </h4>
							<div id="message-order"></div>
							
							<?php

								if(isset($_SESSION['id'])){
									echo '';
								}
								else{
									echo '</br>';
									echo '<h6 style="color: red">Please sign in before you fill in the form below</h6>';
									echo '</br>';
								}

								if(!isset($_COOKIE['promoCodeName'])){
									echo '<div class="form-group">							
									<label>Promo Code (if applicable. *Page will reload when applied. Please wait before filling out the rest of the form*)</label>
											<input type="text" placeholder="Promo Code" name="promoCode" id="promoCode">
											<div id="promoCodeStatus"></div>
											<div hidden id="promoCodeValue"></div>
									</div>';
								}
								else{
									echo '';
								}

							?>
					        <div class="form-group">							
							<label>Full Address</label>
							
							<input class="form-control" placeholder="Full Address" name="address" id="address" value="<?php error_reporting(E_ERROR | E_PARSE); echo $_SESSION['address']; ?>">
								<input type="checkbox" id="addressc" name="addressc">
                                <label for="addressc"> Save as default address?</label><br>
					        </div>
					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
									<label>Full Name</label>
					                    <input class="form-control" placeholder="Name" name="cname" id="cname" value="<?php echo $_SESSION['fullname']; ?>">
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="email" id="email" type="email" value="<?php echo $_SESSION['email']; ?>">
					               </div>
					            </div>

								<div class="col-md-6">
					                <div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" placeholder="Phone Number" name="phone" id="phone" type="text" value="<?php echo $_SESSION['number']; ?>">
					                </div>
					            </div>
					        </div>
					    </div>
					</div>
					<!-- /box_order_form -->
		            <div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Payment Method</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">

					        <div class="payment_select">
					            <label class="container_radio">Card
					                <input type="radio" value="Card" name="payment_type" id="payment_type">
					                <span class="checkmark"></span>
					            </label>
					            <i class="icon_creditcard"></i>
					        </div>
					        <div class="form-group">
					            <label>Name on card</label>
					            <input type="text" class="form-control" id="name_card_order" name="name_card_order" placeholder="First and last name" <?php if(!isset($_SESSION['id'])){echo 'readonly';}?>>
					        </div>
					        <div class="form-group">
					            <label>Card number</label>
					            <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Card number" <?php if(!isset($_SESSION['id'])){echo 'readonly';}?>>
							</div>
					        <div class="row">
					            <div class="col-md-6">
					                <label>Expiration date</label>
					                <div class="row">
					                    <div class="col-md-6 col-6">
					                        <div class="form-group">
					                            <input type="text" id="expire_year" name="expire_year" class="form-control" placeholder="mmyy" <?php if(!isset($_SESSION['id'])){echo 'readonly';}?>>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="col-md-6 col-sm-12">
					                <div class="form-group">
					                    <label>Security code</label>
					                    <div class="row">
					                        <div class="col-md-4 col-6">
					                            <div class="form-group">
					                                <input type="text" id="ccv" name="ccv" class="form-control" placeholder="CCV" <?php if(!isset($_SESSION['id'])){echo 'readonly';}?>>
					                            </div>
					                        </div>
					                        <div class="col-md-8 col-6">
					                            <img src="img/icon_ccv.gif" width="50" height="29" alt="ccv"><small>Last 3 digits</small>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <!--End row -->
					        <div class="payment_select">
					            <label class="container_radio">Pay with Cash
					                <input type="radio" value="Cash" name="payment_type" id="payment_type">
					                <span class="checkmark"></span>
					            </label>
					            <i class="icon_wallet"></i>
					        </div>
					    </div>
					</div>
					
					<!-- /box_order_form -->
		        </div>
		        <!-- /col -->
		        <div class="col-xl-5 col-lg-5" id="sidebar_fixed">
		            <div class="box_order">
		                <div class="head">
		                    <h3>Order Summary</h3>
		                   <!-- <div>Furstenhof Restaurant & Bar</div> -->
		                </div>
		                <!-- /head -->
		                <div class="main">
		                	<ul>
							<?php
							error_reporting(E_ERROR | E_PARSE);
								if(!empty($_POST["day"] &&$_POST['time'])) {
									$day = $_POST["day"];
									$time = $_POST["time"];
								} else {
									$day = "Today";
									$time = "Now";
								}
								?>
							<h4 style="color:Red;">	<?php if(isset($_GET['message'])) {echo $_GET['message'];} ?> </h4>
		                		<li>Date<span><?php echo $day; ?></span></li>
								<li>Time<span><?php echo $time; ?></span></li>
		                		<li>Type<span><?php echo $_POST["opt_order"]; ?></span></li>
		                	</ul>
		                	<hr>
		                	<a id="btnEmpty" href="order.php?action=empty">Empty Cart</a>
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
				  <td style="text-align:left; "><a href="order.php?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
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
				   <td style="text-align:left; "><a href="order.php?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
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
					<td style="text-align:left; "><a href="order.php?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
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
					  <td style="text-align:left; "><a href="order.php?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
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
					  <td style="text-align:left; "><a href="order.php?restId='.$restID.'action=remove&code='.$rowID.'&prodExtra1Rem='.$extraName1.'&prodExtra2Rem='.$extraName2.'&prodExtra3Rem='.$extraName3.'" class="btnRemoveAction"><img src="img/minus-sign.png" height="18px" alt=" " /></a></td>
					  <td style="text-align:right;">'.$row["quantity"].' x</td>
					  <td>'.$row["prodName"].'</td>
					  <td>'.$row["prodExtra1"].'</td>
				  	<td>'.$row["prodExtra2"].'</td>
					  <td>'.$row["prodExtra3"].'</td>
						<td  style="text-align:right;">N$ '.number_format($item_price,2).'</td>
						</tr>';
			
			}
		
				$name .= $row["quantity"]." x ".$row["prodName"] . '  '. $row["prodExtra1"]. ' ' .$row["prodExtra2"].' ' .$row["prodExtra3"]."\n";
				$price_single .= $row["prodPrice"]. "\n";

				$total_quantity += $row["quantity"];
				$total_price += ($row["prodPrice"]*$row["quantity"]);
				if($_POST['opt_order'] == "Delivery") {
					$grand_total = $total_price + 25;
					$delivery = 25;
					$type = "Delivery";
					if(isset($_COOKIE['promoCodeName'])){
						$grand_total = $grand_total - $grand_total * $promoCodeValPercentage;
					}
				} else {
					$delivery = 0;
					$grand_total = $total_price + 0;
					$type = "Pick Up";
					if(isset($_COOKIE['promoCodeName'])){
						$grand_total = $grand_total - $grand_total * $promoCodeValPercentage;
					}
				}
				$iVeri = $grand_total*100;
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
									<li><a id="btnEmpty" href="order.php?action=empty&empty=true">Empty Cart</a></li>
									<li>Subtotal<span><?php echo "N$ ".number_format($total_price, 2); ?></span></li>
									<?php
									if($_POST['opt_order'] == "Delivery") {
									echo'<li>Delivery fee<span>N$25.00</span></li>';
									$delivery = "N$25.00";
				} else {
					echo '<li>Delivery fee<span>N$0.00</span></li>';
				}
				if(isset($_COOKIE['promoCodeName'])){
					echo '<li>Discount applied<span>'.$promoCodeValueNum.'%</span></li>';
				}
				else{
					echo '';
				}
				?>
				<li class="total">Total<span><?php echo "N$ ".$grand_total.".00"; ?></span></li>
									<input type="hidden" name="Amount" id="Amount" value="<?php echo $iVeri;?>"/>
									<input type="hidden" name="total_quantity" id="total_quantity" value="<?php echo $total_quantity;?>"/>
									<input type="hidden" name="name" id="name" value="<?php echo $name;?>"/>
									<input type="hidden" name="type" id="type" value="<?php echo $type;?>"/>
									<input type="hidden" name="amount1" id="amount1" value="<?php echo $grand_total;?>"/>	
									<input type="hidden" name="prodPrice" id="prodPrice" value="<?php echo $price_single;?>"/>									
									<input type="hidden" name="rest" id="rest" value="<?php echo $rest;?>"/>
									<input type="hidden" name="restID" id="restID" value="<?php echo $restID;?>"/>
									<input type="hidden" name="prodID" id="prodID" value="<?php echo $prodID;?>"/>
									<input type="hidden" name="day" id="day" value="<?php echo $day;?>"/>
									<input type="hidden" name="time" id="time" value="<?php echo $time;?>"/>
									<input type="hidden" name="delivery" id="delivery" value="<?=$delivery?>"/>	
									<input type="hidden" name="userID" id="userID" value="<?php echo $user_id;?>"/>
									
								</ul>
	                            </ul>
							

<?php

if(isset($_SESSION['id'])){
	echo '<input type="submit" class="btn_1 gradient full-width mb_5" value="Confirm" name="orderPost">';
}
else{
	echo '</br>';
	echo '<h6 style="color: red">Please sign in before you can confirm your order</h6>';
}

?>
		                    <div class="text-center"><small>Or Call Us on <strong>+264 (61) 209 0300</strong></small></div>

		                </div>
		            </div>
		            <!-- /box_booking -->
		        </div>

		    </div>
			</form>
		    <!-- /row -->
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


	<div id="toTop"></div><!-- Back to top button -->
	
	
	
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="assets/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/sticky_sidebar.min.js"></script>
    <script>
    	$('#sidebar_fixed').theiaStickySidebar({
		    minWidth: 991,
		    updateSidebarHeight: false,
		    additionalMarginTop: 30
		});
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	function checkPromoCode(promoCodeInput){
       $.ajax({
        method:"POST",
        url: "promoCodeCheck.php",
        data:{promoCodeVal:promoCodeInput},
        success: function(data){
          $('#promoCodeStatus').html(data);
        }
      });
	}
	</script>
	<script>
	$(document).on('input','#promoCode',function(e){
    let promoCodeInput = $('#promoCode').val();
    let msg;
    if(promoCodeInput.length==0){
      msg="<span style='color:red'>Enter promo code</span>";
    }
    else{
      checkPromoCode(promoCodeInput);
    }
    $('#promoCodeStatus').html(msg);
});
	</script>
<!--------------------------------------------------------------------------------->
<script>
		 function checkPromoVal(promoCodeInput2){
       $.ajax({
        method:"POST",
        url: "promoCodeVal.php",
        data:{promoCodeNum:promoCodeInput2},
        success: function(data){
          $('#promoCodeValue').html(data);
		  var promoPercentage = data;
		  console.log(data);
		  if(!promoPercentage.includes(">")){
		  document.cookie = "promoCodeValue="+promoPercentage;
		  }
        }
      });
	}
	</script>
	<script>
		$(document).on('input','#promoCode',function(e){
    	let promoCodeInput2 = $('#promoCode').val();
    	let msg2;
    	if(promoCodeInput2.length==0){
      		msg2="<span style='color:red'>Enter promo code</span>";
    	}
    	else{
      		checkPromoVal(promoCodeInput2);
    	}
    	$('#promoCodeValue').html(msg2);
	});
	</script>

	<!-------------------------------------------------------------------------------->

	<script>
	function checkPromoCode2(promoCodeInput3){
       $.ajax({
        method:"POST",
        url: "promoCodeCheck2.php",
        data:{promoCodeVal2:promoCodeInput3},
        success: function(data){
		  var promoName = data;
		  console.log(data);
		  if(!promoName.includes(">")){
		  document.cookie = "promoCodeName="+promoName;
		  document.cookie = "refreshCookie=0";
		  }
        }
      });
	}
	</script>
	<script>
		var refresh = window.setInterval(function(){
			if(getCookie("refreshCookie")){
			document.cookie = "refreshCookie= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			document.cookie = "writeCookie = 0";
			clearInterval(refresh);
			//writeCouponUsage(user_id,promoName);
			window.location.reload();
		  }
		}, 15000);
	</script>
	<script>
		function getCookie(cname) {
     var name = cname + "=";
     var ca = document.cookie.split(';');
     for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if(c.indexOf(name) == 0)
           return c.substring(name.length,c.length);
     }
     return "";
}
	</script>
	<script>
	$(document).on('input','#promoCode',function(e){
    let promoCodeInput3 = $('#promoCode').val();
    let msg3;
    if(promoCodeInput3.length==0){
      msg="<span style='color:red'>Enter promo code</span>";
    }
    else{
      checkPromoCode2(promoCodeInput3);
    }
    $('#promoCodeStatus').html(msg3);
});
	</script>
	<script>
		var tid = setInterval(function () {
		if (document.readyState !== 'complete') return;
		clearInterval(tid);
		if(getCookie("writeCookie")){
			document.cookie = "writeCookie= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			var user_id = "<?php echo $_SESSION['id'];?>"; 
			var promoCodeN = "<?php echo $_COOKIE['promoCodeName'];?>";      
			writeCouponUsage(user_id,promoCodeN);
		}
	}, 100 );
	</script>
	<script>
		function writeCouponUsage(userID,promoCodeN){
       $.ajax({
        method:"POST",
        url: "writeCouponUsage.php",
        data:{user_id : userID, couponCode : promoCodeN},
        success: function(data){
		  console.log(data);
        }
      });
	}
	</script>
</body>
</html>