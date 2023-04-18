<?php

if(isset($_POST["contactform"])){
$name_contact     = $_POST['name_contact'];
$email_contact    = $_POST['email_contact'];
$message_contact = $_POST['message_contact'];
$verify_contact   = $_POST['verify_contact'];

if(trim($name_contact) == '') {
	echo '<div class="error_message">You must enter your Name.</div>';
	exit();
} else if(trim($email_contact) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email_contact)) {
	echo '<div class="error_message">You have enter an invalid e-mail address, try again.</div>';
	exit();
} else if(trim($message_contact) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
} else if(!isset($verify_contact) || trim($verify_contact) == '') {
	echo '<div class="error_message"> Please enter your number.</div>';
	exit();
} 

//if(get_magic_quotes_gpc()) {
//	$message_contact = stripslashes($message_contact);
//}


$output='<p>You have been contacted by '.$name_contact.' with additional message is as follows.</p>';
$output.='<p>'.$message_contact.'</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>You can contact '.$name_contact.' via email at '.$email_contact.'</p>';
$output.='<p>Eat@United Team</p>';
$body = $output; 
$subject = 'You\'ve been contacted by ' . $name_contact . '.';

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
	
		$subject2 = "Thank You";
	
		$message2 = "Thank you for contact Eat@United. We will reply shortly!";
		$message2.='<p><a href="https://197.234.75.240/main/"><img src="http://197.234.75.240/main/img/logo_sticky.png"></a></p>';
     
$message2.='<p>Thanks and enjoy,</p>';
$message2.='<p>Eat@United Orders Team</p>';
$body = $message2; 
	
	
		$headers = "From: " . $fromserver;
	 
		$headers2 = "From: " . $email_to;
	 
	 
		mail($fromserver,$subject2,$body,$headers2); // sends a copy of the message to the sender
			// Success message
	echo "<div id='success_page' style='padding:25px 0'>";
	echo "<strong >Email Sent.</strong><br>";
	echo "Thank you <strong>$name_contact</strong>,<br> your message has been submitted. We will contact you shortly.";
	echo "</div>";
		
		

	}
 

}
