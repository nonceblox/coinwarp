<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'add_notification_user.php';
    include 'administrator/function.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt); 
  

    $balan = round( getWalletBalance($pdo_auth['tx_address']),2);
    if($balan<$_REQUEST['token_no']){
      header('Location:withdraw_tokens.php?choice=error&value=Please Enter Transfer Wallet Address');
      exit();
    }

    
    if($_REQUEST['withdraw_wallet_address']==""){
      header('Location:withdraw_tokens.php?choice=error&value=Please Enter Transfer Wallet Address');
      exit();
    }


    if($_REQUEST['token_no']<=0){
      header('Location:withdraw_tokens.php?choice=error&value=Amount of Token Must be Greater That Zero');
      exit();
    }

  
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => get_blockchain_host()."/wallet/withdraw",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>"{\r\n    \"email\":\"".$pdo_auth['email']."\",\r\n    \"withdrawalAddress\": \"".$_REQUEST['withdraw_wallet_address']."\",\r\n    \"amount\" : \"".$_REQUEST['token_no']."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
     $response = json_decode($response, true);
      if ($response['success']=="true") {
        $tx_hash = $response['transactionHash'];

        $table = "withdraw";
        $key_list = "`amount`, `user_id`, `user_name`, `withdraw_wallet_address`";
        $value_list = "'".$_REQUEST['token_no']."',";
        $value_list .="'".$pdo_auth['id']."',";
        $value_list.="'".$pdo_auth['name']."',";
        $value_list.="'".$_REQUEST['withdraw_wallet_address']."'";
        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

        add_notification("Withdraw Requests has been made From A User", "admin");
        add_notification_user("You raised Withdraw Request of ".$_REQUEST['token_no'], "user", $pdo_auth['id']);
        header('Location:view_withdraw.php?choice=success&value=Withdraw Request has been Made.');
      }
      else{
        header('Location:withdraw_tokens.php?choice=error&value='.$response['message']);
        exit();
      }
      add_notification("Withdraw Requests has been made From A User", "admin");
      add_notification_user("You raised Withdraw Request of ".$_REQUEST['token_no'], "user", $pdo_auth['id']);
      header('Location:view_withdraw.php?choice=success&value='.$response['message']);
?>