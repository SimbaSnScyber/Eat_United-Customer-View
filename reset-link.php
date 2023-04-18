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
<?php
error_reporting(E_ERROR | E_PARSE);
include('dbconn.php');
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) 
&& ($_GET["action"]=="reset") && !isset($_POST["action"])){
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($conn,
  "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
  );
  $row = mysqli_num_rows($query);
  if ($row==""){
  $error .= '
  <aside>
			<figure>
				<a href="home.php"><img src="img/logo_sticky.png" width="177" height="52" alt="" class="logo_sticky"></a>
			</figure>
  <h2>Invalid Link</h2>
<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="public/reset-password.php">
Click here</a> to reset password.</p>
            <input type="submit" value="Reset Password" class="btn_1">
          </div>';
	}else{
  $row = mysqli_fetch_assoc($query);
  $expDate = $row['expDate'];
  if ($expDate >= $curDate){
  ?>
	<div id="register" style="padding-top: 10%";>
		<aside>
			<figure>
				<a href="home.php"><img src="img/logo_sticky.png" width="177" height="52" alt="" class="logo_sticky"></a>
			</figure>
       <form method="post" action="" name="update">
       <input type="hidden" name="action" value="update" />
            <label>Please Enter New Password:</label>
					<div class="form-group">
          <input type="password" name="pass1" class="form-control" placeholder="Password" id="password" required>
          <i class="icon_lock_alt"></i>
					</div>
					<div class="text-center">
          <input type="hidden" name="email" value="<?php echo $email;?>"/>
            <input type="submit" value="Reset Password" class="btn_1">
          </div>
                </form>
			<div class="copy">© 2021 Eat@United</div>
		</aside>
	</div>
<?php
}else{
$error .= "
<div id='register' style='padding-top: 20%';>
		<aside>
			<figure>
				<a href='home.php'><img src='img/logo_sticky.png' width='177' height='52'  class='logo_sticky'></a>
			</figure>
      <h2>Link Expired</h2>
<p>The link is expired. You are trying to use the expired link which 
as valid only 24 hours (1 days after request).<br /><br /></p>
			<div class=copy'>© 2021 Eat@United</div>
		</aside>
	</div>";
            }
      }
if($error!=""){
  echo "
  <div id='register'style='padding-top: 10%';>
		<aside>
			<figure>
				<a href='home.php'><img src='img/logo_sticky.png' width='177' height='52'  class='logo_sticky'></a>
			</figure>".$error."</h2>
			<div class=copy'>© 2021 Eat@United</div>
		</aside>
	</div>";
  }			
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) &&
 ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");

  if($error!=""){
echo "<div id='register'style='padding-top: 10%';>
<aside>
  <figure>
    <a href='home.php'><img src='img/logo_sticky.png' width='177' height='52'  class='logo_sticky'></a>
  </figure>".$error."</h2>
  <div class=copy'>© 2021 Eat@United</div>
</aside>
</div>";;
}else{
$pass1 = password_hash($pass1, PASSWORD_DEFAULT);
mysqli_query($conn,
"UPDATE `users` SET `password`='".$pass1."'
WHERE `email`='".$email."';"
);

mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
header("Location: success-reset.php");
	  }		
}
?>


	<!-- COMMON SCRIPTS -->
  <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>	
  
</body>
</html>