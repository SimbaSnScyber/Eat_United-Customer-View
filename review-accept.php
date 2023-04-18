<?php
include("dbconn.php");

$reviewID = $_GET['reviewID'];
$accept = $_GET['accept'];

if(isset ($reviewID) && $accept = 1) {
  mysqli_query($conn,
  "UPDATE `reviews` SET `accepted`= 1
  WHERE `reviewID`='".$reviewID."';"
);

header("Location: publish-review.php");

}

?>