<?php
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);
   // print_r($_REQUEST);
   // Add User Starts Here
   $balance = extract_total("users", "balance");
   if ($_REQUEST['token_supply']<$balance) {
     header('Location:price_updates.php?choice=error&value=Token Supply Cannot be This less than '.$balance);
     exit();
   }


   $table = "entrc_price";
   $result = $pdo->exec("UPDATE $table SET `price`='".$_REQUEST['price']."'");
   //echo "UPDATE $table SET `price`='".$_REQUEST['price']."'";


   $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => get_blockchain_host()."/wallet/admin/mint",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n    \"amount\":\"".$_REQUEST['token_supply']."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    curl_close($curl);
    if ($response['success']=="true") {
       add_notification("Admin changed price settings ", "admin");
        header('Location:price_updates.php?choice=success&value=Total Supply has been changed ');
        exit();
    }else{
       header('Location:price_updates.php?choice=error&value='.$response['message']);
      exit();
    }
  
?>