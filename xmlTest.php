<?php

$url = "https://centineltest.cardinalcommerce.com/maps/txns.asp";

$xmlRequest = 
'
<CardinalMPI>
    <MsgType>cmpi_lookup</MsgType>
    <Version>1.7</Version>
    <MsgType>cmpi_lookup</MsgType>
    <TransactionType>C</TransactionType>
    <ProcessorId>1000</ProcessorId>
    <MerchantId>1233253248</MerchantId>
    <OrderNumber>IVERI00001</OrderNumber>
    <Amount>1000</Amount>
    <CurrencyCode>710</CurrencyCode>
    <CardNumber>4242424242424242</CardNumber>
    <CardExpMonth>07</CardExpMonth>
    <CardExpYear>2024</CardExpYear>
    <TransactionMode></TransactionMode>
    <DFReferenceId></DFReferenceId>
    <TransactionPwd></TransactionPwd>
    <BillingAddress1></BillingAddress1>
    <BillingCity></BillingCity>
    <BillingCountryCode></BillingCountryCode>
    <BillingFirstName></BillingFirstName>
    <BillingLastName></BillingLastName>
    <BillingPhone></BillingPhone>
    <BillingPostalCode></BillingPostalCode>
    <BillingState></BillingState>
    <ShippingAddress1></ShippingAddress1>
    <ShippingCity></ShippingCity>
    <ShippingCountryCode></ShippingCountryCode>
    <ShippingFirstName></ShippingFirstName>
    <ShippingLastName></ShippingLastName>
    <ShippingMethodIndicator></ShippingMethodIndicator>
    <ShippingPostalCode></ShippingPostalCode>
    <ShippingState></ShippingState>
    <ShippingAmount></ShippingAmount>
    <MobilePhone></MobilePhone>
    <Email></Email>
</CardinalMPI>
';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, "xmlRequest=" . $xmlRequest);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 500);

$result = curl_exec($ch);
curl_close($ch);

$array_result = json_decode(json_encode(simplexml_load_string($result)), true);

print_r('<pre>');
print_r($array_result);
print_r('</pre>');

?>