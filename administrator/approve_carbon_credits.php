<?php
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   // Add User Starts Here
      $table = "carbon_credits";
      $result = $pdo->exec("UPDATE $table SET `status`='Approved'  WHERE id=".$_REQUEST['id']);

       $data = get_data_id("carbon_credits", $_REQUEST['id']);
       $user_id = $data['user_id'];

       $user_data = get_data_id("users", $user_id);
       $balance = $user_data['carbon_credits'];

      $balance = $balance+$data['amount'];
      $result = $pdo->exec("UPDATE `users` SET `carbon_credits`='".$balance."'  WHERE id=".$user_id);
      $tx_hash = "0x".md5(date("U")).md5(date("Y"));


      $table = "transfer";
      $from_address = "0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433 : SXT ADMIN";

      $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `type`";
      $value_list = "'".$data['user_tx_id']."',";
      $value_list.= "'".$from_address."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$data['amount']."',";
      $value_list.="'Success',";
      $value_list.="'Buy Carbon Credits',"; 
      $value_list.="'Carbon Credits'";   

      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();

     add_notification("Carbon Credits Token Request Approved", "admin");
     add_notification_user("Your Carbon Credit Request of ".$data['amount']." Request Approved, Balance Has Been Added To Your Wallet", "user",$user_id);
     header('Location:carbon_credit_requests.php?choice=success&value= Carbon Credit Request Approved');
     exit();
?>