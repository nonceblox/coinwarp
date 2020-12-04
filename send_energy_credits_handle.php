<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);

 extract($_REQUEST);

 $dara = exist("users", "tx_address", $_REQUEST['to_address']);
 if ($dara<=0) {
    header('Location:transfer_energy_credits.php?choice=error&value=Invalid Address');
    exit();
 }

  if($pdo_auth['energy_credits']<$_REQUEST['token_no']){
    header('Location:transfer_energy_credits.php?choice=error&value=You dont have enough Funds to transfer');
    exit();
  }

  if($_REQUEST['to_address']==""){
    header('Location:transfer_energy_credits.php?choice=error&value=Please Enter Transfer Wallet Address');
    exit();
  }

  if($_REQUEST['token_no']<=0){
    header('Location:transfer_energy_credits.php?choice=error&value=Amount of Token Must be Greater That Zero');
    exit();
  }




  // per energy credit par .5 carbon credits milenge 

  $carbon_credits = $pdo_auth['carbon_credits'];
  $add_cc = .5*$token_no;

  $carbon_credits =$carbon_credits+$add_cc;
  
  // Starts Here monitoring the Transactions
    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $table = "transfer";
    $from_address = $pdo_auth['tx_address'];
      $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
      $value_list = "'".$to_address."',";
      $value_list.= "'".$from_address."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$token_no."',";
      $value_list.="'Success',";
      $value_list.="'Transfer energy Credits',";
      $value_list.="'energy Credits'";   

      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();

    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $table = "send_energy_credits_requests";
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

     //decrese from senders account
     // $total = $_REQUEST['balance']-$_REQUEST['token_no']-0.5;  
     $total = $_REQUEST['balance']-$_REQUEST['token_no']-0;  
     // Deduct .5BBT as Transaction Cost
     //echo $total;   
      try {
        //echo "UPDATE users SET `balance`= '".$total."' WHERE id=".$pdo_auth['id'];
          $stmt = $pdo->prepare("UPDATE users SET `energy_credits`= '".$total."', `carbon_credits`='".$carbon_credits."' WHERE id=".$pdo_auth['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
     // $user = $stmt->fetch();
     
     // add into recievers account
      try {
          $stmt = $pdo->prepare("SELECT id,energy_credits FROM users WHERE tx_address LIKE '".$to_address."'");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
     // int_r($user);


      $total = $user['energy_credits']+$_REQUEST['token_no'];  
      //echo $total;   
      try {
          $stmt = $pdo->prepare('UPDATE users SET `energy_credits`= "'."".$total."".'" WHERE id='.$user['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();  
      

      $tx_hash = "0x".md5(date("U")).md5(date("Y"));
      $table = "transfer";
      $from_address = "0xAf55F3B7DC65c8f8577cf00C8C5CA7b6E8Cc4433 : Admin";
      $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
      $value_list = "'".$pdo_auth['tx_address']."',";
      $value_list.= "'".$from_address."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$add_cc  ."',";
      $value_list.="'Success',";
      $value_list.="'Earned Via Energy Trading',";
      $value_list.="'Carbon Credits'";   

      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();



      add_notification_user("You Transferred ".$_REQUEST['token_no']." energy Credits to $to_address", "user", $pdo_auth['id']);
      add_notification_user("You Recieved ".$_REQUEST['token_no']." energy Credits from $from_address", "user", $user['id']);

      add_notification("A Send Request Exected from $from_address to $to_address from User", "admin");
      header('Location:transfer_energy_credits.php?choice=success&value=Your Token Has been Transferred to Desired Address');
      exit();
//}

?>