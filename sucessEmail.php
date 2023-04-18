<?php
include('dbconn.php');

session_start();
echo $_SESION['variable'];
$name = $_SESSION['variable'];
$email = $_SESSION['variable'];
$output='<p>Dear $name,</p>';
$output.='<p>Welcome to Eat at United.</p>';
$output.='<p>You have registered successfully! We offer quick delivery in Namibia.</p>';
$output.='<p>-------------------------------------------------------------</p>';
  	
$output.='<p>Thanks and enjoy,</p>';
$output.='<p>Eat@United Team</p>';
$body = $output; 
$subject = "Welcome - Eat@United.com";
$body = $output; 
$subject = "Password Recovery - Eat@United.com";

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

   header('location: success.php');
	}
    ?>