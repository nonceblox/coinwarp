<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    include 'add_notification_user.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($_REQUEST['amount']==""){
      redirectTo("request_carbon_credits.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }
     
    if($_REQUEST['tx_idd']==""){
      redirectTo("request_carbon_credits.php","error","Please Enter a Valid Transaction Id");
      exit();
    }

    if($_REQUEST['amount']<=0){
      redirectTo("request_carbon_credits.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }


   $table = "carbon_credits";
	  $key_list   = "`user_id`, `user_tx_id`, `amount`, `process`, `status`";
	  $value_list = "'".$pdo_auth['id']."',";
	  $value_list.= "'".$pdo_auth['tx_address']."',";
	  $value_list.="'".$_REQUEST['amount']."',";
	  $value_list.="'Amount Requested / Buy',";
	  $value_list.="'Pending'";
	
     $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
     add_notification_user("A Carbon Credit of".$_REQUEST['amount'].", Buy Request has Been Initiated from you", "user", $pdo_auth['id']);
     add_notification("A Carbon Credit Buy Request has been Initiated", "admin");
     header('Location:request_carbon_credits.php?choice=success&value=Your Buy Request has Been Initiated');
     exit();
?>