<!-- MY MPESA KEYS -->
<?php
$consumerKey= 'gRmSH9RKAXIf53rggZWLT4R4NsclYHtKUbAM0MODHiKr3scp';
$consumerSecret = "5Ll7AsNFlbVcBiUBGIum9Nagddm8yp9nneThvlieLjaYPxJCWvWtVvoYrgLTPU6i";

// ACCESS TOKEN URL
$accessTokenURL = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
//ACCESS TOKE CURL
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
echo $access_token = $result->access_token;
curl_close($curl);

