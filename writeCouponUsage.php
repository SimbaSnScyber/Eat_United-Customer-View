<?php

$host = "localhost"; 
$user = "root"; 
$password = "c0Prdg3gJqMW!"; 
$dbname = "eatatun1_new";

$conn = mysqli_connect($host, $user, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$userID = "";
$promoCode = "";

if(isset($_COOKIE['currentUser'])){
    $userID = $_COOKIE['currentUser'];
}
if(isset($_COOKIE['promoCodeName'])){
    $promoCode = $_COOKIE['promoCodeName'];
}

$insert_query = "INSERT INTO user_coupons (`user_id`,`couponCode`) VALUES ('".$userID."','".$promoCode."')";
$result = mysqli_query($conn,$insert_query);
if($result){
    echo "Successfully added";
}
else {
    echo "Problem occured while adding promo code";
}
?>