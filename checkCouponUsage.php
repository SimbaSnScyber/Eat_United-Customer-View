<?php

$host = "localhost"; 
$user = "root"; 
$password = "c0Prdg3gJqMW!"; 
$dbname = "eatatun1_new";
$couponCode = "";

$conn = mysqli_connect($host, $user, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

if(isset($_POST['couponCode'])){
    $couponCode = $_POST['couponCode'];
}

$checkQuery = "SELECT * FROM user_coupons WHERE couponCode = ".$couponCode;
$result = mysqli_query($conn,$checkQuery);

if($result){
    echo "It exists";
}
else{
    echo "It doesn't exist";
}

?>