<?php

include("dbconn.php");

// Insert
if(isset($_POST['orderPost'])){
	 $Amount = $_POST['Amount'];
	 $seccode = $_POST['ccv'];
	 $cnumber = $_POST['card_number'];
     $orderItem = $_POST["name"];
     $items = $_POST['total_quantity'];
     $address = $_POST['address'];
     $cname = $_POST['cname'];
	 $sql = "INSERT INTO orders (Amount, seccode, cnumber, orderItem, items, address, customername)
	 VALUES ('$Amount','$seccode','$cnumber','$orderItem','$items','$address','$cname')";
	 if (mysqli_query($conn, $sql)) {
		header("Location: sendiVeri.php");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>

