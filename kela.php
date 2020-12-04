<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "20010",
  CURLOPT_URL => "http://185.181.116.136:20010",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"id\":\"1\",\n  \"jsonrpc\":\"2.0\",\n  \"method\": \"personal_newAccount\",\n  \"params\": [\"kishan\"]\n  \n}\n",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Content-Type: application/json",
    "Postman-Token: b6e80d89-7dc3-0ec7-a8ba-000f5fe3a441"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}