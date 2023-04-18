<?php
include("headersimple.php")
	?>
    <?php
$options = [
    '' => 'Please Select a Restaurant',
    'Furstenhof Restaurant & Bar' => 'Furstenhof Restaurant & Bar',
    'Neptunes Coffee Shop' => 'Neptunes Coffee Shop',
    'Top Restaurant and Bar' => 'Top Restaurant and Bar',
    'Tafule Yaka Restaurant & Bar' => 'Tafule Yaka Restaurant & Bar',
    'Cresta Pandu Restaurant & Bar' => 'Cresta Pandu Restaurant & Bar',
    'Cafe Thuringerhof' => 'Cafe Thuringerhof'
];
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
    <link href="css/review.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
				

	
	<main class="bg_gray">
		
		<div class="container margin_60_20">
		    <div class="row justify-content-center">
		        <div class="col-lg-8">
		            <div class="box_general write_review">
		                <h1 class="add_bottom_15">Write a review </h1>
                        <form action="submitReview.php" method="post" >
						<div class="col-md-6">
											<div class="custom_select submit">
                                            <select name="restaurant" id="restaurant" class="form-control wide">
											<?php foreach ($options as $key => $label) { ?>
        <option value="<?= $key ?>" <?= (isset($_POST['restaurant']) && $_POST['restaurant'] == $key) ? 'selected' : '' ?>><?= $label ?></option>
    <?php } ?>
											</select>											
										</div>
									</div><br><br>
		                <label class="d-block add_bottom_15">Overall rating</label>
		                <div class="row">
		                    <div class="col-md-3 add_bottom_25">
		                        <div class="add_bottom_15">Food Quality <strong class="food_quality_val"></strong></div>
		                        <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="foodquality" name="foodquality" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>
		                    <div class="col-md-3 add_bottom_25">
		                        <div class="add_bottom_15">Service <strong class="service_val"></strong></div>
		                        <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="service" name="service" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
		                    </div>
		                    <div class="col-md-3 add_bottom_25">
		                        <div class="add_bottom_15">Price <strong class="price_val"></strong></div>
		                        <input type="range" min="0" max="10" step="1" value="0" data-orientation="horizontal" id="price" name="price" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
		                    </div>
		                </div>
                       
					    <div class="group">
						<h4 style="color:Red;">	<?php if(isset($_GET['message1'])) {echo $_GET['message1'];} ?> </h4>
							<div id="message-order"></div>
					        <div class="form-group">
					        <div class="row">
					            <div class="col-md-6">
					                <div class="form-group">
									<label>Full Name</label>
					                    <input class="form-control" placeholder="Name" name="cname" id="cname">
					                </div>
					            </div>
					            <div class="col-md-6">
					                <div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="email" id="email" type="email">
					               </div>
					            </div>

								<div class="col-md-6">
					                <div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" placeholder="Phone Number" name="phone" id="phone" type="text">
					               </div>
                                </div>
                            </div>
                        </div>
		                <div class="form-group">
		                    <label>Title of your review</label>
		                    <input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?" name="title" id="title">
		                </div>
		                <div class="form-group">
		                    <label>Your review</label>
                            <input class="form-control" type="text" style="height: 180px;" placeholder="Write your review to help others learn about this online business" name="review" id="review">
		                    </div>
		                <input type="submit" class="btn_1 gradient full-width" value="Submit Review" name="reviewsPost">
                        </form>
		            </div>
		        </div>
		    </div>
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
  <!--   <script src="js/specific_review.js"></script> -->
	

</body>
</html>