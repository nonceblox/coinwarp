<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    include 'add_notification_user.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($_REQUEST['amount']==""){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }

     if($_REQUEST['bbt']==""){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }

     if($_REQUEST['tx_idd']==""){
      redirectTo("buy.php","error","Please enter a valid Transaction ID");
      exit();
    }

    if($_REQUEST['amount']<=0){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }

    if($_REQUEST['bbt']<=0){
      redirectTo("buy.php","error","You cant Buy SX Tokens Less than Zero Value");
      exit();
    }

    $host=get_blockchain_host();

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $host."/wallet/deposit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n    \"email\":\"".$pdo_auth['email']."\",\r\n    \"transactionId\": \"".$_REQUEST['tx_idd']."\",\r\n    \"amount\" : \"".$_REQUEST['bbt']."\",\r\n    \"tokenAmount\": \"".$_REQUEST['amount']."\",\r\n    \"transactionType\": \"".$_REQUEST['currency']."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
   // echo $response;
    $response = json_decode($response, true);
    if ($response['success']=="true") {
         $table = "buy_token";
          $key_list = "`user_id`,`user_name`, `email`, `tx_address`, `amount`, `no_of_tokens`, `buy_tx_id`, `currency`";
          $value_list = "'".$pdo_auth['id']."',";
          $value_list.= "'".$pdo_auth['name']."',";
          $value_list.="'".$pdo_auth['email']."',";
          $value_list.="'".$pdo_auth['tx_address']."',";
          $value_list.="'".$_REQUEST['bbt']."',";
          $value_list.="'".$_REQUEST['amount']."',";
          $value_list.="'".$_REQUEST['tx_idd']."',";
          $value_list.="'".$_REQUEST['currency']."'";
          
         $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
          add_notification_user("A Buy Request has Been Initiated", "user", $pdo_auth['id']);
          add_notification("A Buy Request has been Initiated", "admin");
          header('Location:buy.php?choice=success&value=Your Buy request has been initiated ');
          exit();
    }else{
      header('Location:buy.php?choice=error&value=Something Went Wrong, Please Try Again,'.$response['message']);
      exit();
    }
    

  
     
?>