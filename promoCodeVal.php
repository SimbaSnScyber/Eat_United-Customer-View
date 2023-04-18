<?php

$host = "localhost"; 
$user = "root"; 
$password = "c0Prdg3gJqMW!"; 
$dbname = "eatatun1_new";

$conn = mysqli_connect($host, $user, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$promoCodeInput = "";
$promoPercentage = "";
$promoExpiry = "";

if(!empty(isset($_POST['promoCodeNum'])) && isset($_POST['promoCodeNum'])){
  $promoCodeInput = $_POST['promoCodeNum'];
  $promoCode = strtoupper($promoCodeInput);
}

$promoCheckQuery = "SELECT * FROM coupons";

$result = mysqli_query($conn,$promoCheckQuery);

while ($row = mysqli_fetch_assoc($result))
 {
  $promoCheck = $row['code'];
  $promoValue = $row['amount'];
 }

 if($promoCheck){
  $comparison = strcasecmp($promoCheck, $promoCode);
  if($comparison == 0){
    echo $promoValue;
  }
  else{
    echo "<span style='color:red'>This promo code has either expired or is incorrect. Please double check</span>";
  }
}
?>

