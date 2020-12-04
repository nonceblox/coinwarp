<?php
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);
   $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => get_blockchain_host()."/wallet/admin/update/status",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n    \"status\":\"Approved\",\r\n    \"id\": \"".$_REQUEST['id']."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response,true);
    if ($response['success']=="true") {
      add_notification("Buy Token Request Approved", "admin");
     // add_notification_user("Your Buy Token Request Approved, Balance Has Been Added To Your Wallet", "user",$user_id);
     header('Location:buy_requests.php?choice=success&value= Buy Token Request Approved');
    }
    else{
      header('Location:buy_requests.php?choice=error&value='.$response['message']);
      exit();
    }      
     add_notification("Buy Token Request Approved", "admin");
     //add_notification_user("Your Buy Token Request Approved, Balance Has Been Added To Your Wallet", "user",$user_id);
     header('Location:buy_requests.php?choice=success&value= Buy Token Request Approved');
?>