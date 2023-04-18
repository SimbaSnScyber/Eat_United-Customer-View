<?php

include("dbconn.php");
include("css.php");
$name= $_POST['firstName'];
$email = $_POST['email'];

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['firstName'],$_POST['lastName'],$_POST['username'], $_POST['email'], $_POST['password'], $_POST['number'])) {
	// Could not get the data that should have been sent.
	echo"<SCRIPT LANGUAGE='javascript'>alert('Data Doesn't exist');</SCRIPT>";
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['number'])) {
	// One or more values are empty.
	echo"<SCRIPT LANGUAGE='javascript'>alert('Fields are empty');</SCRIPT>";
}

// We need to check if the account with that username exists.
if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
       // echo"<SCRIPT LANGUAGE='javascript'>alert('Username exists, please choose another!');</SCRIPT>";
	   header('location: register.php?message=Username already exists, please login...');
        
	} 
	elseif ($stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?')) {
		// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
		$stmt->bind_param('s', $_POST['email']);
		$stmt->execute();
		$stmt->store_result();
		// Store the result so we can check if the account exists in the database.
		if ($stmt->num_rows > 0) {
			// Username already exists
		   // echo"<SCRIPT LANGUAGE='javascript'>alert('Username exists, please choose another!');</SCRIPT>";
		   header('location: register.php?message1=Email already exists, please login...');
		}
	else {
		// Username doesnt exists, insert new account
if ($stmt = $conn->prepare('INSERT INTO users (firstName, lastName, username, password, email, number) VALUES (?, ?, ?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('ssssss', $_POST['firstName'], $_POST['lastName'], $_POST['username'], $password, $_POST['email'], $_POST['number']);
	$stmt->execute();
	


$output='<h2>Welcome to Eat at United '.$name.'! </h2>';
$output.='<h4>You have registered successfully!</h4>';
$output.='<h4>We offer quick and reliable delivery throughout Namibia, order today!</h4>';
$output.='<p><a href="https://197.234.75.240/main/"><img src="http://197.234.75.240/main/img/logo_sticky.png"></a></p>';
  	
$output.='<p>Thanks and enjoy,</p>';
$output.='<p>Eat@United Team</p>';
$body = $output; 
$subject = "Welcome - Eat@United";

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
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} }else {
	// Something is wrong with the sql statement, check to make sure users table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$conn->close();




?>
