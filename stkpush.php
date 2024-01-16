<!-- Generating an STK push  -->
<?php
// INCLUDES ACCESS TOKEN   FROM accessToken.php
include_once 'accessToken.php';


date_default_timezone_set('Africa/Nairobi');
$processRequestUrl ="https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
$callBack ="mpesatesting.free.nf/daraja/callback.php";
$passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = "174379";
$timestamp = date("YmdHis");
$password = base64_encode($BusinessShortCode.$passKey.$timestamp);
$phone = "254743297643";
$money = "1";
$PartyA = $phone;
$PartyB = "254743297643";
$AccountReference = "MAHAD SAID LTD";
$TransactionDesc = "Stk Push Testing";
$Amount = $money;
$stkPushHeader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

// INITIATING CURL 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processRequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkPushHeader); //setting custom header

$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $password,
  'Timestamp' => $timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $PartyB,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $callBack,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

echo $curl_response;