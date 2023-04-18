<?php
include("dbconn.php");
include("css.php");
$url = 'https://portal.nedsecure.co.za/api/transactions';
$Card = $_POST["payment_type"];
$addressc = $_POST["address"];
$id = $_POST["userID"];

if (!empty($_POST["payment_type"])){
if (!empty($_POST["Amount"])){
if(!empty ($_POST["address"]) && ($_POST["cname"]) && ($_POST["phone"]) && ($_POST["email"])){

  if (isset($_POST['addressc'])) {

$conn->query("UPDATE users SET address = '$addressc' WHERE id= '$id'");
    
  }   

  if(!empty($_POST["card_number"]) && $Card == "Card") {

//Initiate cURL.
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

$merchRef = uniqid();

$merchTrace = uniqid();

$amt = $_POST['Amount'];

$seccode = $_POST['ccv'];

$cnumber = $_POST['card_number'];

$expire_year = $_POST['expire_year'];

die($amt.$seccode.$cnumber.$expire_year);


//The JSON data.

$jsonData = array(
"CertificateID" => "{172bc42c-7ffb-44d0-a1e4-441444e1274c}",
"ProductType" => "Enterprise",
"ProductVersion" => "mPress",
"Direction" => "Request",
"Transaction" => array(
"ApplicationID" => "{3a37835b-1436-420a-97c2-eaa83a90a510}",
"Command" => "Debit",
"Mode" => "Live",
"MerchantReference"=> "{$merchRef}",
"MerchantTrace" => "{$merchTrace}",
"Currency"=> "NAD",
  "Amount" => $amt,
  "ExpiryDate" => $expire_year,
  "CardSecurityCode" => $seccode,
  "PAN" => $cnumber,
  "ElectronicCommerceIndicator"=> "ThreeDSecureAttempted",
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

echo $body;

$code = get_code_between($body, $startCode, $endCode);

if($code == "0"){
  if(isset($_POST['orderPost'])){
    $Amount = $_POST['amount1'];
    $orderItem = $_POST['name'];
    $items = $_POST['total_quantity'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $type = $_POST['type'];
    $rest = $_POST['rest'];
    $restID = $_POST['restID'];
    $prodID = $_POST['prodID'];
    $phone = $_POST['phone'];
    $payment = $_POST['payment_type'];
    $email = $_POST['email'];
    $orderRef = rand ( 10000 , 99999 );
    $day = $_POST['day'];
    $time = $_POST['time'];
    $delivery = $_POST['delivery'];
    $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, restID, prodID, payment_type, orderRef, userID, phone, email)
    VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$restID', '$prodID','$payment', '$orderRef', '$id', '$phone', '$email')";
    

    if (mysqli_query($conn, $sql)) {

      

      $output='<h2>Hi '.$cname.' Your Order is on the way!</h2>';
      $output.='<p>You have scheduled an order for '.$day.' at '.$time.'</p>';
      $output.='<p>This is what you have ordered:</p>';
      $output.='<table style="width:100%; border: 1px solid black;" >';
      $output.='<tr style="border: 1px solid black;">';
      $output.='<th style="border: 1px solid black;">Order Reference</th>';
      $output.='<th style="border: 1px solid black;">Items</th>';
      $output.='<th style="border: 1px solid black;">Total Quantity</th>';
      $output.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';
      $output.='<th style="border: 1px solid black;">Total: N$</th>';
      $output.='<th style="border: 1px solid black;">Restaurant</th>';   
      $output.='</tr>';
      $output.='<tr style="border: 1px solid black; text-align:center;">';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$orderItem.'</td>';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'</td>';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
      $output.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
      $output.='</tr>';
      $output.='</table>';
$output.='</table>';


$output.='<p><a href="https://eatatunited.com.na/"><img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png"></a></p>';
     
$output.='<p>Thanks and enjoy,</p>';
$output.='<p>Eat@United Orders Team</p>';
$body = $output; 
$subject = "Order Confirmed! - Eat@United";


$subject2 = "New Order!";
	
$output2 =  '<h2>We have a new order!</h2>';
$output2.='<p>This is what has been ordered:</p>';
$output2.='<table style="width:100%; border: 1px solid black;" >';
$output2.='<tr style="border: 1px solid black;">';
$output2.='<th style="border: 1px solid black;">Order Reference</th>';
$output2.='<th style="border: 1px solid black;">Items</th>';
$output2.='<th style="border: 1px solid black;">Total Quantity</th>';
$output2.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';
$output2.='<th style="border: 1px solid black;">Total: N$</th>';
$output2.='<th style="border: 1px solid black;">Restaurant</th>'; 
$output2.='<th style="border: 1px solid black;">Customer Name</th>';
$output2.='<th style="border: 1px solid black;">Customer Address</th>';
$output2.='<th style="border: 1px solid black;">Customer Number</th>';
$output2.='<th style="border: 1px solid black;">Day</th>';  
$output2.='<th style="border: 1px solid black;">Time</th>';  
$output2.='<th style="border: 1px solid black;">Payment Type</th>';  
$output2.='<th style="border: 1px solid black;">Order Type </th>';  
$output2.='</tr>';
$output2.='<tr style="border: 1px solid black; text-align:center;">';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$orderItem.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'.00</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$cname.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$address.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$phone.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['day'].'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['time'].'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$payment.'</td>';
$output2.='<td style="border: 1px solid black; text-align:center;">'.$type.'</td>';
$output2.='</tr>';
$output2.='</table>';

$output2.='<p><a href="https://eatatunited.com.na/"><img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png"></a></p>';


$output2.='<p>Eat@United Orders Team</p>';


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
$mail->Send();

//message for admin 

// Remove previous recipients
$mail->ClearAllRecipients();
// alternative in this case (only addresses, no cc, bcc): 
// $mail->ClearAddresses();

$mail->Body = $output2;
//$adminemail = $generalsettings[0]["admin_email"]; 

// Add the admin address
if ($rest == 'Furstenhof Restaurant & Bar'){
  $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
  $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
  $mail->AddAddress('furstenhof@proteahotels.com.na', 'Furstenhof Reception');
  $mail->AddAddress('banq.furstenhof@proteahotels.com.na', 'banq.furstenhof');
  $mail->Send();
  } 
  elseif ($rest == 'Top Restaurant and Bar'){
    $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
  $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
  $mail->AddAddress('FNB.Thuringerhof@united.com.na', 'FNB Thuringerhof');
  $mail->AddAddress('Meseret@proteahotels.com.na', 'Meseret Desta');
  $mail->Send();
    } 
    elseif ($rest == 'Neptunes Coffee Shop'){
      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
  $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
  $mail->AddAddress('re.pelicanbay@proteahotels.com.na', 'Pelicanbay Reception');
  $mail->AddAddress('fom.pelicanbay@proteahotels.com.na', 'Front Office Pelicanbay');
  $mail->AddAddress('gm.pelicanbay@proteahotels.com.na', 'General Manager Pelicanbay');
  $mail->Send();
      } 
      elseif ($rest == 'Tafule Yaka Restaurant & Bar'){
        $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
        $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
        $mail->AddAddress('fom.zambezi@proteahotels.com.na', 'Sarah  Diergaart (FOM account)');
        $mail->AddAddress('fb.zambezi@proteahotels.com.na', 'Ben Shimukwenga');
        $mail->Send();
        } 
        elseif ($rest == 'Cresta Pandu Restaurant & Bar'){
          $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
  $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
  $mail->AddAddress('gm.ondangwa@proteahotels.com.na', 'GM Ondangwa');
  $mail->AddAddress('fom.ondangwa@proteahotels.com.na', 'Front Office Manager (Ondangwa)');
  $mail->Send();
          }


if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    
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

  echo $body;

  $reason = get_reason_between($body, $startReason, $endReason);

  header('location: Failed.php?messageF='.$reason.'');

}

  } elseif ($Card == "EFT" || $Card == "Cash"){

    if(isset($_POST['orderPost'])){
        $Amount = $_POST['amount1'];
        $orderItem = $_POST['name'];
        $items = $_POST['total_quantity'];
        $address = $_POST['address'];
        $cname = $_POST['cname'];
        $type = $_POST['type'];
        $rest = $_POST['rest'];
        $restID = $_POST['restID'];
        $prodID = $_POST['prodID'];
        $phone = $_POST['phone'];
        $payment = $_POST['payment_type'];
        $email = $_POST['email'];
        $orderRef = rand ( 10000 , 99999 );
        $day = $_POST['day'];
        $time = $_POST['time'];
        $delivery = $_POST['delivery'];
        $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, restID, prodID, payment_type, orderRef, userID, phone, email)
        VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$restID', '$prodID','$payment', '$orderRef', '$id', '$phone', '$email')";
        

        if (mysqli_query($conn, $sql)) {

           
          $output='<h2>Hi '.$cname.' Your Order is on the way!</h2>';
          $output.='<p>You have scheduled an order for '.$day.' at '.$time.'</p>';
          $output.='<p>This is what you have ordered:</p>';
          $output.='<table style="width:100%; border: 1px solid black;" >';
          $output.='<tr style="border: 1px solid black;">';
          $output.='<th style="border: 1px solid black;">Order Reference</th>';
          $output.='<th style="border: 1px solid black;">Items</th>';
          $output.='<th style="border: 1px solid black;">Total Quantity</th>';
          $output.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';
          $output.='<th style="border: 1px solid black;">Total: N$</th>';
          $output.='<th style="border: 1px solid black;">Restaurant</th>';   
          $output.='</tr>';
          $output.='<tr style="border: 1px solid black; text-align:center;">';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$orderItem.'</td>';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'</td>';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
          $output.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
          $output.='</tr>';
          $output.='</table>';


   $output.='<p><a href="https://eatatunited.com.na/"><img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png"></a></p>';
         
   $output.='<p>Thanks and enjoy,</p>';
   $output.='<p>Eat@United Orders Team</p>';
   $body = $output; 
   $subject = "Order Confirmed! - Eat@United";


   $subject2 = "New Order!";
	
   $output2 =  '<h2>We have a new order!</h2>';
   $output2.='<p>This is what has been ordered:</p>';
   $output2.='<table style="width:100%; border: 1px solid black;" >';
   $output2.='<tr style="border: 1px solid black;">';
   $output2.='<th style="border: 1px solid black;">Order Reference</th>';
   $output2.='<th style="border: 1px solid black;">Items</th>';
   $output2.='<th style="border: 1px solid black;">Total Quantity</th>';
   $output2.='<th style="border: 1px solid black;">Delivery Fee: N$</th>';
   $output2.='<th style="border: 1px solid black;">Total: N$</th>';
   $output2.='<th style="border: 1px solid black;">Restaurant</th>'; 
   $output2.='<th style="border: 1px solid black;">Customer Name</th>';
   $output2.='<th style="border: 1px solid black;">Customer Address</th>';
   $output2.='<th style="border: 1px solid black;">Customer Number</th>';
   $output2.='<th style="border: 1px solid black;">Day</th>';  
   $output2.='<th style="border: 1px solid black;">Time</th>';  
   $output2.='<th style="border: 1px solid black;">Payment Type</th>';  
   $output2.='<th style="border: 1px solid black;">Order Type </th>';  
   $output2.='</tr>';
   $output2.='<tr style="border: 1px solid black; text-align:center;">';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$orderRef.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$orderItem.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$items.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$delivery.'.00</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$Amount.'.00</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$rest.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$cname.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$address.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$phone.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['day'].'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$_POST['time'].'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$payment.'</td>';
   $output2.='<td style="border: 1px solid black; text-align:center;">'.$type.'</td>';
   $output2.='</tr>';
   $output2.='</table>';
  
   $output2.='<p><a href="https://eatatunited.com.na/"><img src="https://eatatunited.com.na/main-test/public/img/logo_sticky.png"></a></p>';


$output2.='<p>Eat@United Orders Team</p>';

   
   $email_to = $email;
   $cresta = "orders@eatatunited.com.na";
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
   $mail->Send();

//message for admin 

// Remove previous recipients
$mail->ClearAllRecipients();
// alternative in this case (only addresses, no cc, bcc): 
// $mail->ClearAddresses();

$mail->Body = $output2;
//$adminemail = $generalsettings[0]["admin_email"]; 

// Add the admin address
if ($rest == 'Furstenhof Restaurant & Bar'){
$mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
$mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
$mail->AddAddress('furstenhof@proteahotels.com.na', 'Furstenhof Reception');
$mail->AddAddress('banq.furstenhof@proteahotels.com.na', 'banq.furstenhof');
$mail->Send();
} 
elseif ($rest == 'Top Restaurant and Bar'){
  $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
$mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
$mail->AddAddress('FNB.Thuringerhof@united.com.na', 'FNB Thuringerhof');
$mail->AddAddress('Meseret@proteahotels.com.na', 'Meseret Desta');
$mail->Send();
  } 
  elseif ($rest == 'Neptunes Coffee Shop'){
    $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
$mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
$mail->AddAddress('re.pelicanbay@proteahotels.com.na', 'Pelicanbay Reception');
$mail->AddAddress('fom.pelicanbay@proteahotels.com.na', 'Front Office Pelicanbay');
$mail->AddAddress('gm.pelicanbay@proteahotels.com.na', 'General Manager Pelicanbay');
$mail->Send();
    } 
    elseif ($rest == 'Tafule Yaka Restaurant & Bar'){
      $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
      $mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
      $mail->AddAddress('fom.zambezi@proteahotels.com.na', 'Sarah  Diergaart (FOM account)');
      $mail->AddAddress('fb.zambezi@proteahotels.com.na', 'Ben Shimukwenga');
      $mail->Send();
      } 
      elseif ($rest == 'Cresta Pandu Restaurant & Bar'){
        $mail->AddAddress('quintin@proteahotels.com.na', 'Quintin Byloo');
$mail->AddAddress(' cro@proteahotels.com.na', 'Lempie M.H Mbwalala');
$mail->AddAddress('gm.ondangwa@proteahotels.com.na', 'GM Ondangwa');
$mail->AddAddress('fom.ondangwa@proteahotels.com.na', 'Front Office Manager (Ondangwa)');
$mail->Send();
        }

   if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
	}else{
	
        header("Location: confirm.php?action=empty");
		}

        } else {

           echo "Error: " . $sql . "

   " . mysqli_error($conn);

        }

        mysqli_close($conn);

   }

  // You can also use header('Location: thank_you.php'); to redirect to another page.
  

}

} else {
  header('location: order.php?message1=Please enter all the delivery details!');
}
} else{
  header('location: order.php?message=Please Have items in your cart!');
}

} else{
  header('location: order.php?message=Please Select a payment type!');
}
