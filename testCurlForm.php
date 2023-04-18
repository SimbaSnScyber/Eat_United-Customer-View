<?php

$applicationID = "449f3659-b68c-431b-986e-623cb5f53e39";
$certificateID = "41BB710E-B813-4F5C-8558-702A7751B92B";
$command = "Debit";
$mode= "Live";
$orderTotal = 25;
$merchRef = uniqid();
$merchTrace = uniqid();
$timestamp = date('ymdhis');
$orderNum = uniqid();
$quantity = "3";
$processorId = 1000;
$currency = "NAD";
$cardTypeString = "VISA";
$formattedTotal = $currency.$orderTotal;
$version = "1.3";


?>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://portal.nedsecure.co.za/scripts/bootstrap/css/bootstrap.min.css" />
<script src="https://portal.nedsecure.co.za/scripts/jquery/js/jquery.min.js"></script>
<script src="https://portal.nedsecure.co.za/scripts/bootstrap/js/bootstrap.min.js"></script>
<script src="https://portal.nedsecure.co.za/scripts/jquery/js/jquery.litebox.js"></script>

<head></head>

<body > 
<form id="PAEnrollForm" action="https://portal.nedsecure.co.za/Lite/Authorise.aspx" method="post” target="paInlineFrame">
<!-- /box_order_form -->
<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Personal Details</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
					        <div class="form-group">
					            <label>Address Line 1</label>
					            <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="123 Test Road">
					        </div>
					        <div class="form-group">
					            <label>City/Town</label>
					            <input type="text" id="city" name="city" class="form-control" placeholder="Pretoria">
							</div>
							<div class="form-group">
					            <label>State/Province</label>
					            <input type="text" id="state" name="state" class="form-control" placeholder="Gauteng">
							</div>
							<div class="form-group">
					            <label>Postal Code</label>
					            <input type="text" id="postCode" name="postCode" class="form-control" placeholder="0042">
							</div>
					        <div class="form-group">
					            <label>Country</label>
					            <input type="text" id="country" name="country" class="form-control" placeholder="South Africa">
							</div>a
                            <div class="form-group" hidden>
					            <label>message type</label>
					            <input hidden type="text" id="MsgType" name="MsgType" class="form-control" value="cmpi_lookup">
							</div>
                            <div class="form-group" hidden>
					            <label>version</label>
					            <input hidden type="text" id="Version" name="Version" class="form-control" value="<?php echo $version;?>">
							</div>
                            <div class="form-group" hidden>
					            <label>processor id</label>
					            <input hidden type="text" id="ProcessorId" name="ProcessorId" class="form-control" value="<?php echo $processorId;?>">
							</div>
							<div class="form-group" hidden>
					            <label>order total</label>
					            <input hidden type="text" id="PurchaseAmount" name="PurchaseAmount" class="form-control" value="<?php echo $formattedTotal;?>">
							</div>
                             <div class="form-group" hidden>
					            <label>raw order total</label>
					            <input hidden type="text" id="RawAmount" name="RawAmount" class="form-control" value="<?php echo $orderTotal;?>">
							</div>
                            <div class="form-group" hidden>
					            <label>order Id</label>
					            <input hidden type="text" id="OrderNumber" name="OrderNumber" class="form-control" value="<?php echo $orderNum;?>">
							</div>
                            <div class="form-group" hidden>
					            <label>merchant ref</label>
					            <input hidden type="text" id="MerchantId" name="MerchantId" class="form-control" value="<?php echo $merchRef;?>">
							</div>
                            <div class="form-group" hidden>
					            <label>currency</label>
					            <input hidden type="text" id="PurchaseCurrency" name="PurchaseCurrency" class="form-control" value="<?php echo $currency;?>">
							</div>
					    </div>
					</div>  
<!-- /box_order_form -->
<div class="box_order_form">
					    <div class="head">
					        <div class="title">
					            <h3>Card Payment</h3>
					        </div>
					    </div>
					    <!-- /head -->
					    <div class="main">
					        <div class="form-group">
					            <label>Name on card</label>
					            <input type="text" class="form-control" id="cardholderName" name="cardholderName" placeholder="First and last name">
					        </div>
							<div class="form-group">
					            <label>Email address</label>
					            <input type="text" class="form-control" id="email" name="email" placeholder="john@testing.com">
					        </div>
					        <div class="form-group">
					            <label>Card number</label>
					            <input type="text" id="PAN" name="PAN" class="form-control" placeholder="Card number">
							</div>
					        <div class="row">
					            <div class="col-md-6">
					                <label>Expiration date</label>
					                <div class="row">
					                    <div class="col-md-6 col-6">
					                        <div class="form-group">
					                            <input type="text" id="PANExpr" name="PANExpr" class="form-control" placeholder="mmyy e.g. 0224">
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <div class="col-md-6 col-sm-12">
					                <div class="form-group">
					                    <label>Security code</label>
					                    <div class="row">
					                        <div class="col-md-4 col-6">
					                            <div class="form-group">
					                                <input type="text" id="cvv" name="cvv" class="form-control">
					                            </div>
                                                <div class="form-group">
					                                <input type="submit" id="submit" name="submit" class="form-control">
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <!--End row -->
					    </div>
					</div>    
</form> 
<!-- Button HTML -->
<a id="iveri-litebox-button">Make Payment</a>
<input type="submit" id="iveri-litebox-button" name="iveri-litebox-button" class="form-control">
 <!-- Modal HTML -->
 <div id="iveri-litebox"></div>

 
</body>  
<script>
 liteboxInitialise(portal.nedsecure.co.za/api/transactions); // pass the appropriate gateway address or endpoint
 function liteboxComplete(data) {
 //Place your code to handle the response here
 }
</script>
