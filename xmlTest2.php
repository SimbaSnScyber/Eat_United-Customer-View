<?php

$url = "https://centineltest.cardinalcommerce.com/maps/txns.asp";

$xmlRequest = 
'
<CardinalMPI>
<MsgType>cmpi_lookup</MsgType>
<ProcessorId>1000</ProcessorId>
<MerchantId>1233253248</MerchantId>
<OrderNumber>IVERI00001</OrderNumber>
<TransactionPwd>12345678</TransactionPwd>
<CardNumber>4007382082302933</CardNumber>
<CardExpMonth>01</CardExpMonth>
<CardExpYear>2026</CardExpYear>
<AcquirerId>428448</AcquirerId>
<AcquirerMerchantId>980020230994</AcquirerMerchantId>
<ACSWindowSize>05</ACSWindowSize>
<BillingAddress1>8100 Tyler Blvd</BillingAddress1>
<BillingAddress2 />
<BillingCity>Mentor</BillingCity>
<BillingCountryCode>SA</BillingCountryCode>
<BillingFirstName>Chris</BillingFirstName>
<BillingLastName>Brown</BillingLastName>
<BillingPostalCode>K44060</BillingPostalCode>
<BillingState>OH</BillingState>
<UserAgent>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36</UserAgent>
<DFReferenceId>12345678</DFReferenceId>
<BrowserHeader>text/html,application/xhtml+xml,application/xml;q=0.9,/;q=0.8</BrowserHeader>
<BrowserJavaEnabled>True</BrowserJavaEnabled>
<BrowserLanguage>en-US</BrowserLanguage>
<BrowserColorDepth>24</BrowserColorDepth>
<BrowserScreenHeight>864</BrowserScreenHeight>
<BrowserScreenWidth>1536</BrowserScreenWidth>
<BrowserTimeZone>300</BrowserTimeZone>
<CategoryCode>5999</CategoryCode>
<CurrencyCode>ZAR</CurrencyCode>
<Amount>12</Amount>
<DeviceChannel>Browser</DeviceChannel>
<Email>support@cardinalcommerce.com</Email>
<IPAddress>1.12.123.255</IPAddress>
<TransactionMode>S</TransactionMode>
<TransactionType>C</TransactionType>
<Version>1.7</Version>
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