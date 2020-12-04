<?php

   include '../add_notification_user.php';
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   //print_r($_REQUEST);
   // Add User Starts Here
   if ($_REQUEST['user_id']=="") {
     header('Location:user_wallet.php?choice=error&value=Please Select a User');
     exit();
   }
    if(isset($_REQUEST['add_balance'])){

      $tx_hash = "0x".md5(date("U")).md5(date("Y"));

     //  print_r($_REQUEST);
      $table = "balance";
      $key_list = "`user_id`, `username`, `tx_address`, `tx_hash`, `carbon_credits`, `value`";
      $value_list = "'".$_REQUEST['user_id']."',";
      $value_list.="'".$_REQUEST['user_name']."',";
      $value_list.="'".$_REQUEST['tx_address']."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$_REQUEST['carbon_credits']."',";
      $value_list.="'".$_REQUEST['value']."'";
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

      $wallet_data = get_data_id_data("users", "id", $_REQUEST['user_id']);



      $total = $_REQUEST['balance']+$_REQUEST['value'];
      if($total!=$wallet_data['balance']){
          add_notification_user("A Sum of ".$_REQUEST['value']." Tokens have been added to your account", "user", $_REQUEST['user_id']);
      }

      $total_carbon_credits = $_REQUEST['carbon_credits_initial']+$_REQUEST['carbon_credits'];
      if($total_carbon_credits!=$wallet_data['carbon_credits']){
          add_notification_user("A Sum of ".$_REQUEST['carbon_credits']." Carbon Credits have been added to your account", "user", $_REQUEST['user_id']);
      }

      // Update in users Account
       try {
          $stmt = $pdo->prepare('UPDATE users SET `balance`= "'."".$total."".'", `carbon_credits`= "'."".$total_carbon_credits."".'" WHERE id='.$_REQUEST['user_id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      //$user = $stmt->fetch();
      add_notification("Amount has been Added to users Account", "admin");
     
      header('Location:user_wallet.php?choice=success&value=Added News');
    }

?>