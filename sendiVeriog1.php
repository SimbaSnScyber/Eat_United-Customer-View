<?php
include("dbconn.php");
//The URL of the API.
$url = 'https://portal.nedsecure.co.za/api/transactions';
$Card = $_POST["payment_type"];

if(!empty ($_POST["address"]) && ($_POST["cname"]) && ($_POST["email"])){

if(!empty($_POST["card_number"]) && $Card == "Card") {
    //Initiate cURL.
    $ch = curl_init($url);
    $merchRef = uniqid();
    $merchTrace = uniqid();
    $amt = $_POST['Amount'];
    $seccode = $_POST['ccv'];
    $cnumber = $_POST['card_number'];
    $expire_year = $_POST['expire_year'];
    

//The JSON data.

$jsonData = array(
    "CertificateID" => "{41BB710E-B813-4F5C-8558-702A7751B92B}",
    "ProductType" => "Enterprise",
    "ProductVersion" => "mPress",
    "Direction" => "Request",
    "Transaction" => array(
    "ApplicationID" => "{3197f355-b411-4ff1-b0a7-34971a68eb67}",
    "Command" => "Debit",
    "Mode" => "Test",
    "MerchantReference"=> "{$merchRef}",
    "MerchantTrace" => "{$merchTrace}",
    "Currency"=> "ZAR",
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
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {
    die("Error: call to URL $url failed with status $status, response $result, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch));
} else {
    if(isset($_POST['orderPost'])){
        $Amount = $_POST['amount1'];
        $seccode = $_POST['ccv'];
        $cnumber = $_POST['card_number'];
        $orderItem = $_POST["name"];
        $items = $_POST['total_quantity'];
        $address = $_POST['address'];
        $cname = $_POST['cname'];
        $type = $_POST['type'];
        $rest = $_POST['rest'];
        $payment = $_POST['payment_type'];
        $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, payment_type)
        VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$payment')";
        
        if (mysqli_query($conn, $sql)) {
           header("Location: sendiVeri.php");
        } else {
           echo "Error: " . $sql . "
   " . mysqli_error($conn);
        }
        mysqli_close($conn);
   }

    // sends a copy of the message to the sender
   // You can also use header('Location: thank_you.php'); to redirect to another page.
    header("Location: confirm.php?action=empty");
}


curl_close($curl);

$response = json_decode($result, true);
} 
elseif ($Card == "EFT" || $Card == "Cash"){
    if(isset($_POST['orderPost'])){
        $Amount = $_POST['amount1'];
        $seccode = $_POST['ccv'];
        $cnumber = $_POST['card_number'];
        $orderItem = $_POST["name"];
        $items = $_POST['total_quantity'];
        $address = $_POST['address'];
        $cname = $_POST['cname'];
        $type = $_POST['type'];
        $rest = $_POST['rest'];
        $payment = $_POST['payment_type'];
        $email = $_POST["email"];
        $orderRef = rand ( 10000 , 99999 );
        $day = $_POST['day'];
        $time = $_POST['time'];
        $sql = "INSERT INTO orders (Amount, orderItem, items, address, customername, status, rest, payment_type,orderRef)
        VALUES ('$Amount','$orderItem','$items','$address','$cname', '$type', '$rest', '$payment', '$orderRef')";
        
        if (mysqli_query($conn, $sql)) {
           //header("Location: sendiVeri.php");
        } else {
           echo "Error: " . $sql . "
   " . mysqli_error($conn);
        }
        mysqli_close($conn);
   }

  
   // You can also use header('Location: thank_you.php'); to redirect to another page.
    header("Location: confirm.php?action=empty");
    
}

elseif(empty($Card)){
    header('location: order.php?message=Please Select a payment type!');
}
else {
    header('location: order.php?message=Please Enter Valid Card Number!');

}
} else {
    header('location: order.php?message1=Please enter all the delivery details!');
}