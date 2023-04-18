<?php
session_start();
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
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap_customized.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="revolution-slider/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/settings.css">
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/navigation.css">

    <!-- SPECIFIC CSS -->
    <link href="css/home.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">


</head>

<body>
                
    <header class="header clearfix element_to_stick">
        <div class="container">
            <div id="logo">
                <a href="home.php">
                    <img src="img/logo.png" width="200" height="52" alt="" class="logo_normal">
                    <img src="img/logo_sticky.png" width="177" height="52" alt="" class="logo_sticky">
                </a>
            </div>
            
                    <!-- /dropdown -->
                </li>
            </ul>
            <!-- /top_menu -->
            <a href="#0" class="open_close">
                <i class="icon_menu"></i><span>Menu</span>
            </a>
            <nav class="main-menu">
                <div id="header_menu">
                    <a href="#0" class="open_close">
                        <i class="icon_close"></i><span>Menu</span>
                    </a>
                    <a href="home.php"><img src="img/logo.png" width="162" height="35" alt=""></a>
                </div>
                <ul>
                    <li>
                        <a href="home.php" >Home</a>                        
                    </li>
                    <li><a href="restaurants.php">Our Restaurants</a></li>
                    <li><a href="contacts.php">Contact Us</a></li>
                    <?php
    if (isset($_SESSION['name'])|| isset($_SESSION['FBID'])){
        echo '<li><a href="logout.php" id="sign-out" class="logout">Log Out</a></li>';
    }else{
        echo '<li><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></li>';
    }
    
    if (isset($_SESSION['name']) || isset($_SESSION['FBID'])){
        echo '<li><a href="order.php" id="cart" class="logout">Back To Cart</a></li>';
    }else{
        echo '';
    }

?>
                </ul>
		</nav>
        </div>
    </header>
    <!-- /header -->

     <!-- Sign In Modal -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="modal_header">
			<h3>Sign In</h3>
		</div>
		<form action="authenticate.php" method="post">
			<div class="sign-in-wrapper">
            
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control"  name="username" placeholder="Username" id="username" required>
					<i class="ti-email"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="ti-lock"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right"><a href="reset-password.php">Forgot Password?</a></div>
				</div>
				<div class="text-center">
					<input type="submit" value="Login" class="btn_1 full-width mb_5">
                    <a href="fbconfig.php" class="social_bt facebook">Login with Facebook</a>
					Don’t have an account? <a href="register.php">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Modal -->
