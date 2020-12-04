<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    include 'add_notification_user.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($_REQUEST['sxt_amount']==""){
      redirectTo("exchange_carbon_credits.php","error","SXT Amount or Tokens cant be Less than Zero");
      exit();
    }
    if($_REQUEST['amount']==""){
      redirectTo("exchange_carbon_credits.php","error","Carbon Credits or Tokens cant be Less than Zero");
      exit();
    }
     
    if($_REQUEST['tx_idd']==""){
      redirectTo("exchange_carbon_credits.php","error","Please Enter a Valid Transaction Id");
      exit();
    }

    if($_REQUEST['sxt_amount']<=0){
      redirectTo("exchange_carbon_credits.php","error","SXT Amount or Tokens cant be Less than Zero");
      exit();
    }

    if($_REQUEST['amount']<=0){
      redirectTo("exchange_carbon_credits.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }


    $balance = $pdo_auth['balance'];
    $balance = $balance+$_REQUEST['sxt_amount'];

    $carbon_credit_balance = $pdo_auth['carbon_credits'];
    $carbon_credit_balance = $carbon_credit_balance-$_REQUEST['amount'];

    $result = $pdo->exec("UPDATE `users` SET `balance`='".$balance."', `carbon_credits`='".$carbon_credit_balance."'  WHERE id=".$pdo_auth['id']);


    $table = "carbon_credits";
    $key_list   = "`user_id`, `user_tx_id`, `amount`, `process`, `status`";
    $value_list = "'".$pdo_auth['id']."',";
    $value_list.= "'".$pdo_auth['tx_address']."',";
    $value_list.="'".$_REQUEST['amount']."',";
    $value_list.="'Amount Sent / Sold',";
    $value_list.="'Approved'";



	
     $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");


    // Starts Here monitoring the Transactions
    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $table = "transfer";
    $to_address = "0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433 : SXT ADMIN";
    $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
    $value_list = "'".$to_address."',";
    $value_list.= "'".$pdo_auth['tx_address']."',";
    $value_list.="'".$tx_hash."',";
    $value_list.="'".$_REQUEST['sxt_amount']."',";
    $value_list.="'Success',";
    $value_list.="'Credited in Exchange to Carbon Credits',";   
    $value_list.="'SXT'";   
    try {
        $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }    
    $stmt->execute();



    //For Carbon Credits
    $table = "transfer";
    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
    $value_list = "'".$to_address."',";
    $value_list.= "'".$pdo_auth['tx_address']."',";
    $value_list.="'".$tx_hash."',";
    $value_list.="'".$_REQUEST['amount']."',";
    $value_list.="'Success',";
    $value_list.="'Sell Carbon Credits',"; 
    $value_list.="'Carbon Credits'";   

    try {
        $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }
    $stmt->execute();

     add_notification_user("A Carbon Credit of".$_REQUEST['amount'].", Exchange Request has Been Initiated from you and Approved", "user", $pdo_auth['id']);
     add_notification("A Carbon Credit Exchange Request has been Initiated", "admin");
     header('Location:buy_carbon_credits.php?choice=success&value=Your Exchange Request has Been Initiated');
     exit();
?>