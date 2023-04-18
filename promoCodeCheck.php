<?php

$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "eatatun1_new";

$conn = mysqli_connect($host, $user, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$promoCodeInput = "";
$promoPercentage = "";
$couponLimitNum = "";
$couponLimit = "";
$promoExpiry = "";
$numUsed = "";
$today = date("d/m/Y");
$user_id = "";
$activeStatus = "active";

if(isset($_COOKIE['currentUser'])){
	$user_id = $_COOKIE['currentUser'];
}

if(!empty(isset($_POST['promoCodeVal'])) && isset($_POST['promoCodeVal'])){
  $promoCodeInput = $_POST['promoCodeVal'];
  $promoCode = strtoupper($promoCodeInput);
}

$numUsedByPersonQuery = "SELECT * FROM user_coupons WHERE user_id = ".$user_id;
$result2 = mysqli_query($conn,$numUsedByPersonQuery);
$rowcount= mysqli_num_rows($result2);

$promoCheckQuery = "SELECT * FROM coupons";
$result = mysqli_query($conn,$promoCheckQuery);

while ($row = mysqli_fetch_assoc($result))
 {
  $promoCheck = $row['code'];
  $promoValue = $row['amount'];
  $couponLimitNum = $row['couponLimitNum'];
  $couponLimit = $row['couponLimit'];
  $promoExpiry = $row['expiryDate'];
  $numUsed = $row['numUsed'];
  $status = $row['status'];
 }

 if($promoCheck){
  $codeComparison = strcasecmp($promoCheck, $promoCode);
  $dateComparison = strcasecmp($promoExpiry, $today);
  $limitComparison = strcasecmp($couponLimit, $numUsed);
  $personLimitComparison = strcasecmp($couponLimitNum, $rowcount);
  $statusComparison = strcasecmp($status, $activeStatus);
  if($codeComparison == 0 && $dateComparison >= 0 && $limitComparison != 0 && $personLimitComparison != 0 && $statusComparison == 0){
    echo "<span style='color:green'>Promo code applied successfully</span>";
  }
  else{
    echo "<span style='color:red'>This promo code has either expired or is incorrect. Please double check</span>";
  }
}
?>