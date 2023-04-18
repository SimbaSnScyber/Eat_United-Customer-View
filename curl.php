<?php
$url = 'https://portal.nedsecure.co.za/api/transactions';
//Initiate cURL.
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

$merchRef = uniqid();
$merchTrace = uniqid();
$amt = "2500";
$seccode = '123';
$cnumber = '4242424242424242';
$expire_year = '0124';


//The JSON data.

$jsonData = array(
"CertificateID" => "{87691807-f87a-408c-9427-1442b06bc0f6}",
"ProductType" => "Enterprise",
"ProductVersion" => "mPress",
"Direction" => "Request",
"Transaction" => array(
"ApplicationID" => "{31fb6e7f-ee59-4417-a342-8f317235710d} ",
"Command" => "Debit",
"Mode" => "Test",
"MerchantReference"=> "{$merchRef}",
"MerchantTrace" => "{$merchTrace}",
"Currency"=> "NAD",
  "Amount" => $amt,
  "ExpiryDate" => $expire_year,
  "CardSecurityCode" => $seccode,
  "PAN" => $cnumber,
    )
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.


//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);
echo $result;
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($result, 0, $header_size);
$body = substr($result, $header_size);

$startCode = '"Status":"';
$endCode = '","Code"';

function get_code_between($string,$startCode,$endCode){
  $string = ' ' . $string;
  $ini = strpos($string, $startCode);
  if ($ini == 0) return '';
  $ini += strlen($startCode);
  $len = strpos($string, $endCode, $ini) - $ini;
  return substr($string, $ini, $len);
}

$code = get_code_between($body, $startCode, $endCode);

if($code == "0"){
  if(isset($_POST['orderPost'])){

    $Amount = $_POST['amount1'];

    $orderItem = $_POST["name"];

    $items = $_POST['total_quantity'];

    $address = $_POST['address'];

    $cname = $_POST['cname'];

    $type = $_POST['type'];

    $rest = $_POST['rest'];

    $phone = $_POST['phone'];

    $email = $_POST["email"];

    $orderRef = rand ( 10000 , 99999 );

    $day = $_POST['day'];

    $time = $_POST['time'];

    $payment = $_POST['payment_type'];
    $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, payment_type, orderRef)
    VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$payment', '$orderRef')";

    

    if (mysqli_query($conn, $sql)) {

      

$output='<h2>Hi '.$cname.' Your Order is on the way!</h2>';
$output.='<p>You have scheduled an order for '.$day.' at '.$time.'</p>';
$output.='<p>This is what you have ordered:</p>';
$output.='<table style="width:100%; border: 1px solid black;" >';
$output.='<tr style="border: 1px solid black;">';
$output.='<th style="border: 1px solid black;">Order Reference</th>';
$output.='<th style="border: 1px solid black;">Items</th>';
$output.='<th style="border: 1px solid black;">Total Quantity</th>';
$output.='<th style="border: 1px solid black;">Total: N$</th>';
$output.='<th style="border: 1px solid black;">Restaurant</th>';   
$output.='</tr>';
$output.='<tr style="border: 1px solid black; text-align:center;">';
$output.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
$output.='<td style="border: 1px solid black; text-align:center;">'.$orderItem.'</td>';
$output.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
$output.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
$output.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
$output.='</tr>';
$output.='</table>';


$output.='<p><a href="https://eatatunited.com.na/"><img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png"></a></p>';
     
$output.='<p>Thanks and enjoy,</p>';
$output.='<p>Eat@United Orders Team</p>';
$body = $output; 
$subject = "Order Confirmed! - Eat@United";

$email_to = $email;
$fromserver = "orders@eatatunited.com.na"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
//$mail->IsSMTP();
$mail->Host = "eatatunited.com.na"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "orders@eatatunited.com.na"; // Enter your email here
$mail->Password = "$)?LrSC,Pz8I"; //Enter your password here
$mail->Port = 000003e1;
$mail->IsHTML(true);
$mail->From = "orders@eatatunited.com.na";
$mail->FromName = "Eat@United Orders";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);

if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{

    $subject2 = "New Order!";

    $message2 = "We have a new order! " . "\n\n" . "Total Quantity: " . $_POST['total_quantity']. "\n\n" . "Items: " . $_POST['name']. "\n\n" . "Total: N$" . $_POST['amount1']. ".00" . "\n\n" . "Restaurant: " . $_POST['rest']. "\n\n" . "Customer Name: " . $_POST['cname']. "\n\n" . "Customer Address: " . $_POST['address']. "\n\n" . "Customer Number: " . $_POST['phone']. "\n\n" . "Day: " . $_POST['day']. "\n\n" . "Time: " . $_POST['time']. "\n\n" . "Payment Type : " . $_POST['payment_type']. "\n\n" . "Order Ref : " . $orderRef;


    $headers = "From: " . $fromserver;
 
    $headers2 = "From: " . $email_to;
 
 
    mail($fromserver,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
    header("Location: confirm.php?action=empty");
}

    } else {

       echo "Error: " . $sql . "

" . mysqli_error($conn);

    }

    mysqli_close($conn);

}
}
else{
  
  $startReason = '"Description":"';
  $endReason = '","Source":"';

  function get_reason_between($string,$startReason,$endReason){
    $string = ' ' . $string;
    $ini = strpos($string, $startReason);
    if ($ini == 0) return '';
    $ini += strlen($startReason);
    $len = strpos($string, $endReason, $ini) - $ini;
    return substr($string, $ini, $len);
  }

  $reason = get_reason_between($body, $startReason, $endReason);

  header('location: Failed.php?messageF='.$reason.'');

}
