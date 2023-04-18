<?php
include("headerloggedIn.php");
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
    <title>Eat@United Restaurants</title>

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
    <link href="css/contacts.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>
				

	
	<main>
		<div class="hero_single inner_pages background-image" data-background="url(./img/ContactImage.jpeg)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1>Need Help?</h1>
							<p>Please contact us</p>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
			<div class="wave gray hero"></div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
		    <div class="container margin_60_40">
		        <div class="row justify-content-center">
		            <div class="col-lg-4">
		                <div class="box_contacts">
		                    <i class="icon_lifesaver"></i>
		                    <h2>Help Center</h2>
		                    <a href="#0">+264 (61) 209 0300</a> - <a href="mailto:info@eatatunited.com.na">info@eatatunited.com.na</a>
		                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
		                </div>
		            </div>
		            <div class="col-lg-4">
		                <div class="box_contacts">
		                    <i class="icon_pin_alt"></i>
		                    <h2>Address</h2>
							<?php
	$product= mysqli_query($conn,"SELECT * FROM restaraunt WHERE id = '3001'");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?> 
	 <div><?php echo $row["address"]; ?></div>
	                       						<?php
		}
	} 
		
		?>
		                    <small>MON to FRI 9am-6pm SAT 9am-2pm</small>
		                </div>
		            </div>
		        </div>
		        <!-- /row -->
		    </div>
		    <!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_20">
		    <h5 class="mb_5">Get In Touch</h5>
		    <div class="row">
		        <div class="col-lg-4 col-md-6 add_bottom_25">
		            <div id="message-contact"></div>
			            <form method="post" action="assets/contact.php" id="contactform" autocomplete="off">
			                <div class="form-group">
			                    <input class="form-control" type="text" placeholder="Name" id="name_contact" name="name_contact">
			                </div>
			                <div class="form-group">
			                    <input class="form-control" type="email" placeholder="Email" id="email_contact" name="email_contact">
			                </div>
			                <div class="form-group">
			                    <input class="form-control" type="text" id="verify_contact" name="verify_contact" placeholder="Phone Number">
			                </div>
			                <div class="form-group">
			                    <textarea class="form-control" style="height: 150px;" placeholder="Message" id="message_contact" name="message_contact"></textarea>
			                </div>
			                <div class="form-group">
			                    <input class="btn_1 gradient full-width" type="submit" value="Submit" id="submit-contact">
			                </div>
			            </form>
		        	</div>
		            <div class="col-lg-8 col-md-6 add_bottom_25">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.3433977555965!2d17.076417014959393!3d-22.566256385186016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c0b1b418adbd945%3A0x4c84b084e1ca797f!2sProtea%20Hotel%20by%20Marriott%20Windhoek%20F%C3%BCrstenhof!5e0!3m2!1sen!2sza!4v1647162065783!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>   </div>
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

</body>
</html>