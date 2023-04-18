
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
    <link href="css/order-sign_up.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
    
</head>

<body id="register_bg">
<?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>
	<div id="register">
		<aside>
			<figure>
				<a href="home.php"><img src="img/logo_sticky.png" width="177" height="52" alt="" class="logo_sticky"></a>
			</figure>
			
            <div class="divider"><span>Enter your Information Below</span></div>
			<form action="postUser.php" method="post" >
				<div class="form-group">
					<input type="text" class="form-control"  name="firstName" placeholder="First Name" id="firstName" required>
					<i class="icon_pencil-edit"></i>
				</div>
				<div class="form-group">
					<input type="text" class="form-control"  name="lastName" placeholder="Last Name" id="lastName" required>
					<i class="icon_pencil-edit"></i>
				</div>
				<div class="form-group">
					<input type="text" class="form-control"  name="username" placeholder="Username" id="username" required>
					<h7 style="color:Red;"> <?php if(isset($_GET['message'])) {echo $_GET['message'];} ?> </h7>
					<i class="icon_profile"></i>
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
					<h7 style="color:Red;"> <?php if(isset($_GET['message1'])) {echo $_GET['message1'];} ?> </h7>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<input type="text" name="number" class="form-control" placeholder="Phone Number" id="number" required>
					<i class="icon_phone"></i>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password" id="password" required>
					<i class="icon_lock_alt"></i>
				</div>
				
				<input type="submit" class="btn_1 gradient full-width" value="Register"name="userPost">
				<div class="text-center mt-2"><small>Already have an acccount? <strong><a href="#sign-in-dialog" id="sign-in" class="login">Sign In</a></strong></small></div>
			</form>
			<div class="copy">© 2021 Eat@United</div>
		</aside>
	</div>
	<!-- /login -->

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
					<div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center">
					<input type="submit" value="Login" class="btn_1 full-width mb_5">
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
	
	<!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>	
  
</body>
</html>