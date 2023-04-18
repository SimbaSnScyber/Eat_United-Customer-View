<?php
include("headersimple.php");
include("dbconn.php");
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
    <link href="css/listing.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
				
	
	
	<main>
	    <div class="page_header element_to_stick">
	        <div class="container">
	            <div class="row">
	                <div class="col-xl-8 col-lg-7 col-md-7 d-none d-md-block">
	                    <h1>Our Restaurants</h1><?php if(!isset($_SESSION['id'])){echo '</br><h1 style="color:red">***Attention***</h1></br><h1 style="color:red">Please sign in using the navigation button at the top of the page before proceeding to order or the order will not be processed</h1>';}?>
	                </div>
	                <div class="col-xl-4 col-lg-5 col-md-5">
	                    <div class="search_bar_list">
						<form class='searchbox'>
	                        <input type="text" class="form-control" placeholder="Restaurants" name="search" id="search"> 
	                        <button type="submit"><i class="icon_search"></i></button>
							</form>
	                    </div>
	                </div>
	            </div>
	            <!-- /row -->
	        </div>
	    </div>
	    <!-- /page_header -->
	    <div class="filters_full clearfix add_bottom_15">
	        <div class="container">
	            <div class="type_delivery">
						<ul class="clearfix">
							<li>
						        <label class="container_radio">All
						            <input type="radio" name="type_d" value="all" id="all" checked data-filter="*" class="selected">
						            <span class="checkmark"></span>
						        </label>
						    </li>
						    <li>
						        <label class="container_radio">Delivery
						            <input type="radio" name="type_d" value="delivery" id="delivery" data-filter=".delivery">
						            <span class="checkmark"></span>
						        </label>
						    </li>
						    <li>
						        <label class="container_radio">Pickup 
						            <input type="radio" name="type_d" value="takeway" id="takeaway" data-filter=".pickup">
						            <span class="checkmark"></span>
						        </label>
						    </li>
						</ul>
				</div>
				<!-- /type_delivery -->
	            <a class="btn_map mobile btn_filters" data-toggle="collapse" href="#collapseMap"><i class="icon_pin_alt"></i></a>
	           <!-- <a href="#collapseFilters" data-toggle="collapse" class="btn_filters"><i class="icon_adjust-vert"></i><span>Filters</span></a> -->
	        </div>
	    </div>
	    <!-- /filters_full -->
	    <div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- /Map -->

	    <div class="collapse filters_2" id="collapseFilters">
	        <div class="container margin_30_20">
	            <div class="row">
	                <div class="col-md-4">
	                    <div class="filter_type">
	                        <h6>Rating</h6>
	                        <ul>
	                            <li>
	                                <label class="container_check">Superb 9+ <small>06</small>
	                                    <input type="checkbox">
	                                    <span class="checkmark"></span>
	                                </label>
	                            </li>
	                            <li>
	                                <label class="container_check">Very Good 8+ <small>12</small>
	                                    <input type="checkbox">
	                                    <span class="checkmark"></span>
	                                </label>
	                            </li>
	                            <li>
	                                <label class="container_check">Good 7+ <small>17</small>
	                                    <input type="checkbox">
	                                    <span class="checkmark"></span>
	                                </label>
	                            </li>
	                            <li>
	                                <label class="container_check">Pleasant 6+ <small>43</small>
	                                    <input type="checkbox">
	                                    <span class="checkmark"></span>
	                                </label>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	                 <!--  <div class="col-md-4">
	                  <div class="filter_type">
	                        <h6>Distance</h6>
	                       <div class="distance"> Radius around selected destination <span></span> km</div>
	                        <div class="mb-3
	                        "><input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal"></div>  
	                    </div>
	                </div> -->
	            </div>
	            <!-- /row -->
	        </div>
	    </div> 
	    <!-- /filters -->
		<div class="container margin_30_20">

<?php
$product= mysqli_query($conn,"SELECT * FROM banner WHERE id = '6' LIMIT 1");
if (!empty($product)) { 
while ($row=mysqli_fetch_array($product)) {

?>
	<div class="promo mb_30">
		<img src="img/megaphone.png" width="40px">
		<h3><?php echo $row["full_description"]; ?></h3>
		<i class="icon-food_icon_delivery"></i>
	</div>

	<?php
}
}  
?>
	<!-- /promo -->

	<div class="row isotope-wrapper">
	<?php
$rest= mysqli_query($conn,"SELECT * FROM restaraunt");
if (!empty($rest)) { 
while ($row=mysqli_fetch_array($rest)) {
	$restID = $row["id"];
	$pickup = $row["pickup"];
	$delivery = $row["delivery"];
	if ($pickup == 'yes'){
		$filter = 'pickup';
	}elseif ($delivery == 'yes') {
		$filter = 'delivery';
	}else{
		$filter = 'all';
	}

?>
		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 isotope-item <?php echo $filter; ?>">
			
			<div class="strip">
			

				<figure>
			<!--		<span class="rest_logo"><img  src="img/Eat@United_4-furstenhof.png" style="width: 120px;"></img></span> -->
					<img src="<?php echo $row["image"]; ?>" class="img-fluid lazy" alt="">
					<a href="resturant.php?restId=<?php echo $row["id"]; ?>" class="strip_info">
						<div class="item_title">
							<h3><?php echo $row["name"]; ?></h3>
							<small><?php echo $row["address"]; ?></small>
							<?php
$product= mysqli_query($conn,"SELECT * FROM products WHERE restID = '".$restID."' ");
if (!empty($product)) { 
while ($row=mysqli_fetch_array($product)) {

?>
	<h3 hidden><?php echo $row["name"]; ?></h3>

	<?php
}
}  
?>	
						</div>
					</a>
				</figure>
				<?php
				$product= mysqli_query($conn,"SELECT * FROM restaraunt WHERE id = '".$restID."' ");
if (!empty($product)) { 
while ($row=mysqli_fetch_array($product)) {

?>
	<?php
if ($row["pickup"] == 'yes' && $row["delivery"] == 'yes'){
echo '<ul>

<li><span class="take yes">Pick Up</span> <span class="deliv yes">Delivery</span> <a href="'.$row["maps"].'" target="_blank"><span class="icon_map"></span> </a></li>

</ul>';
}
else if ($row["pickup"] == 'yes' && $row["delivery"] == 'no'){
echo '<ul>
<li><span class="take yes">Pick Up</span> <span class="deliv no">Delivery</span> <a href="'.$row["maps"].'" target="_blank"><span class="icon_map"></span> </a></li>

</ul>';
}
else if ($row["pickup"] == 'no' && $row["delivery"] == 'yes'){
echo '<ul>
<li><span class="take no">Pick Up</span> <span class="deliv yes">Delivery</span> <a href="'.$row["maps"].'" target="_blank"><span class="icon_map"></span> </a></li>

</ul>';
}
else{
echo '<ul>
<li><span class="take no">Pick Up</span> <span class="deliv no">Delivery</span> <a href="'.$row["maps"].'" target="_blank"><span class="icon_map"></span> </a></li>

</ul>';
}

?>

	<?php
}
}  
?>

			   
			</div>
				
		</div>
		<?php
}
}  
?>
	  
		
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
    <script src="js/specific_listing.js"></script>
    <script src="js/isotope.min.js"></script>
    <script>
		$(window).on("load",function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.type_delivery').on( 'click', 'input', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>
	<script src="js/search.js"></script>

    <!-- Map -->
    <script src="js/main_map_scripts.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ0tSqIjHXqF69_UczefPbSiiZA7BuEk0&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cA"></script>

</body>
</html>