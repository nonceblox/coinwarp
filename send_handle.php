<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);

extract($_REQUEST);

  $balan = round( getWalletBalance($pdo_auth['tx_address']),2);
  if($balan<$_REQUEST['token_no']){
    header('Location:sell.php?choice=error&value=You don’t have enough funds to transfer');
    exit();
  }

  if($_REQUEST['to_address']==""){
    header('Location:sell.php?choice=error&value=Please enter a wallet address for transaction');
    exit();
  }

  if($_REQUEST['token_no']<=0){
    header('Location:sell.php?choice=error&value=Amount of Token Must be Greater That Zero');
    exit();
  }
  
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => get_blockchain_host()."/wallet/transfer",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\r\n    \"email\":\"".$pdo_auth['email']."\",\r\n    \"to\": \"".$to_address."\",\r\n    \"amount\" : \"".$token_no."\"\r\n}",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);
  $response = json_decode($response, true);
  if ($response['success']=="true") {
    $tx_hash = $response['transactionHash'];

     //  Record in Transfer Table Database
    $table = "transfer";
    $from_address = $pdo_auth['tx_address'];
    $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`";
    $value_list = "'".$to_address."',";
    $value_list.= "'".$from_address."',";
    $value_list.="'".$tx_hash."',";
    $value_list.="'".$token_no."',";
    $value_list.="'Success',";
    $value_list.="'Sent Tokens'";
    try {
        $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }
    $stmt->execute();

    //  Record in Sell Table Database
    $table = "sell_requests";
    $from_address = $pdo_auth['tx_address'];


    $key_list = "`to_address`,`from_address`, `token`, `user_id`, `user_name`, `tx_hash`";
    $value_list = "'".$to_address."',";
    $value_list.= "'".$from_address."',";
    $value_list.="'".$token_no."',";
    $value_list.="'".$pdo_auth['id']."',";
    $value_list.="'".$pdo_auth['name']."',";
    $value_list.="'".$tx_hash."'";   

      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
     $stmt->execute();

      add_notification_user("A Send Request Executed to $to_address", "user", $pdo_auth['id']);
      add_notification("A Send Request Exected from $from_address to $to_address from User", "admin");
      header('Location:sent_tokens.php?choice=success&value=Your token has been transferred to desired address');
  }
  else{
     header('Location:sell.php?choice=error&value=Something went wrong'.$response['message']);
      exit();
  }
  
  

?>