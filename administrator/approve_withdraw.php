<?php session_start();
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
      CURLOPT_POSTFIELDS =>"{\r\n    \"status\":\"Approved\",\r\n  \"id\": \"".$_REQUEST['id']."\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));

    // echo $_REQUEST['id'];

    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response,true);
    if ($response['success']=="true") {

      // Update withdraw
      $table = "withdraw";
      $daca = get_data_id_data_alll_mata("users",$_REQUEST['withdraw_id']);
      $result = $pdo->exec("UPDATE $table SET `status`='Approved'  WHERE `user_id`=".$daca['id']); 
      add_notification("Withdraw Token Request Approved", "admin");
      add_notification_user("Your Withdraw Token Request Approved", "user", $daca['id']);    
      header('Location:view_withdraw.php?choice=success&value='.$response['message']);
      exit();
    }else{
       header('Location:view_withdraw.php?choice=error&value='.$response['message']);
    }   

    add_notification("Withdraw Token Request Approved", "admin");
    add_notification_user("Your Withdraw Token Request Approved", "user", $daca['id']);    
    header('Location:view_withdraw.php?choice=success&value='.$response['message']);
     exit();
?>