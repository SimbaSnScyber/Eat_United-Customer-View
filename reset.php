<?php
include('dbconn.php');
if(isset($_POST["email_forgot"]) && (!empty($_POST["email_forgot"]))){
$email = $_POST["email_forgot"];
if (!$email) {
   $error .="<p>Invalid email address please type a valid email address!</p>";
   }else{
   $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
   $results = mysqli_query($conn,$sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error .= "<p>No user is registered with this email address!</p>";
   }
  }
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5($email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

$output='<p>Dear user,</p>';
$output.='<p>Please click on the following link to reset your password.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="http://197.234.75.240/main/reset-link.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
http://197.234.75.240/main/reset-link.php
?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png" alt="" class="logo_sticky">';
$output.='<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
$output.='<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';   	
$output.='<p>Thanks,</p>';
$output.='<p>Eat@United Team</p>';
$body = $output; 
$subject = "Password Recovery - Eat@United";

$email_to = $email;
$fromserver = "info@eatatunited.com.na"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
//$mail->IsSMTP();
$mail->Host = "eatatunited.com.na"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "info@eatatunited.com.na"; // Enter your email here
$mail->Password = "SuyACmNlwN8E"; //Enter your password here
$mail->Port = 000003e1;
$mail->IsHTML(true);
$mail->From = "info@eatatunited.com.na";
$mail->FromName = "Eat@United";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{

   header('location: reset-password.php?message=An email has been sent to you with instructions on how to reset your password.');
	}
   }
 ?>