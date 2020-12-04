<?php
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   // Add User Starts Here
    if(isset($_REQUEST['add_user'])){
      //print_r($_REQUEST);
      $table = "users";
      $key_list = "`name`, `email`, `tx_address`, `verified`, `password`";
      $value_list = "'".$_REQUEST['name']."',";
      $value_list.="'".$_REQUEST['email']."',";
      $value_list.="'".$_REQUEST['tx_address']."',";
      $value_list.="'Yes',";
      $value_list.="'".$_REQUEST['password']."'";
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

      add_notification("A New User Created", "admin");
      header('Location:users.php?choice=success&value=Added News');
    }




   //Add User Ends Here
?>