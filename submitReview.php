<?php

include("dbconn.php");


// Insert
if(isset($_POST['reviewsPost']))
{	 
	 $restaurant = $_POST['restaurant'];
	 $foodquality = $_POST['foodquality'];
	 $service = $_POST['service'];
	 $cname = $_POST['cname'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $price = $_POST['price'];
     $title = $_POST['title'];
     $review = $_POST['review'];
	 $reviewID = rand ( 10000 , 99999 );
	 $average = ($foodquality + $service + $price) / 3;
	 $sql = "INSERT INTO reviews (restaurant, foodquality, service, price, title, review, average, name, email, phone, reviewID)
	 VALUES ('$restaurant','$foodquality','$service','$price','$title','$review','$average','$cname','$email','$phone','$reviewID')";

	 if (mysqli_query($conn, $sql)) {

		$output='<p>A review has been left by '.$cname.' with the review details as follows:</p>';
		$output.='<p>Title: '.$title.'</p>';
		$output.='<p>Review Message:'.$review.'</p>';
		$output.='<p>'.$restaurant.'</p>';
		$output.='<p>Food Quailty '.$foodquality.'/10</p>';
		$output.='<p>Service '.$service.' /10</p>';
		$output.='<p>Price '.$price.' /10</p>';
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p>You can contact '.$phone.' via email at '.$email.'</p>';
		$output.='<p>Please click on the following to publish review.</p>';
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p><a href="http://197.234.75.240/main/review-accept.php?reviewID='.$reviewID.'&accept=1" target="_blank">
		http://197.234.75.240/main/review-accept.php?reviewID='.$reviewID.'&accept=1</a></p>';		
		$output.='<p>Eat@United Team</p>';
		$output.='<p><a href="https://197.234.75.240/main/"><img src="http://197.234.75.240/main/img/logo_sticky.png"></a></p>';
   
		$body = $output; 
		$subject = 'You\'ve been reviewed by ' . $cname . '.';
		
		$email_to = "info@eatatunited.com.na";
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

		//message for admin 

// Remove previous recipients
$mail->ClearAllRecipients();
// alternative in this case (only addresses, no cc, bcc): 
// $mail->ClearAddresses();

$mail->Body = $output;
//$adminemail = $generalsettings[0]["admin_email"]; 

// Add the admin address
$mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
$mail->AddAddress('cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
$mail->AddAddress('tobiass@united.com.na', 'Tobias');
$mail->Send();
		
		if(!$mail->Send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
			}else{	
		
				header("Location: confirm-review.php");
			}
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>


