<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    include 'add_notification_user.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($_REQUEST['sxt_amount']==""){
      redirectTo("buy_energy_credits.php","error","SXT Amount or Tokens cant be Less than Zero");
      exit();
    }
    if($_REQUEST['amount']==""){
      redirectTo("buy_energy_credits.php","error","energy Credits or Tokens cant be Less than Zero");
      exit();
    }
     
    if($_REQUEST['tx_idd']==""){
      redirectTo("buy_energy_credits.php","error","Please Enter a Valid Transaction Id");
      exit();
    }

    if($_REQUEST['sxt_amount']<=0){
      redirectTo("buy_energy_credits.php","error","SXT Amount or Tokens cant be Less than Zero");
      exit();
    }

    if($_REQUEST['amount']<=0){
      redirectTo("buy_energy_credits.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }


    $balance = $pdo_auth['balance'];
    $balance = $balance-$_REQUEST['sxt_amount'];

    $energy_credit_balance = $pdo_auth['energy_credits'];
    $energy_credit_balance = $energy_credit_balance+$_REQUEST['amount'];

    $result = $pdo->exec("UPDATE `users` SET `balance`='".$balance."', `energy_credits`='".$energy_credit_balance."'  WHERE id=".$pdo_auth['id']);


    $table = "energy_credits";
    $key_list   = "`user_id`, `user_tx_id`, `amount`, `process`, `status`";
    $value_list = "'".$pdo_auth['id']."',";
    $value_list.= "'".$pdo_auth['tx_address']."',";
    $value_list.="'".$_REQUEST['amount']."',";
    $value_list.="'Amount Requested / Buy EC',";
    $value_list.="'Approved'";



	
     $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");


    // Starts Here monitoring the Transactions
    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $table = "transfer";
    $from_address = "0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433 : SXT ADMIN";
    $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
    $value_list = "'".$pdo_auth['tx_address']."',";
    $value_list.= "'".$from_address."',";
    $value_list.="'".$tx_hash."',";
    $value_list.="'".$_REQUEST['sxt_amount']."',";
    $value_list.="'Success',";
    $value_list.="'Spent to But energy Credits',";   
    $value_list.="'SXT'";   
    try {
        $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }    
    $stmt->execute();



    //For energy Credits
    $table = "transfer";
    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
    $value_list = "'".$pdo_auth['tx_address']."',";
    $value_list.= "'".$from_address."',";
    $value_list.="'".$tx_hash."',";
    $value_list.="'".$_REQUEST['amount']."',";
    $value_list.="'Success',";
    $value_list.="'Buy energy Credits',"; 
    $value_list.="'energy Credits'";   

    try {
        $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }
    $stmt->execute();

     add_notification_user("A energy Credit of".$_REQUEST['amount'].", Buy Request has Been Initiated from you", "user", $pdo_auth['id']);
     add_notification("A energy Credit Buy Request has been Initiated", "admin");
     header('Location:buy_energy_credits.php?choice=success&value=Your Buy Request has Been Initiated');
     exit();
?>