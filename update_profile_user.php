<?php
   session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'add_notification_user.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);

    if(isset($_REQUEST['update_user'])){
      $table = "users";
      //echo "UPDATE $table SET `name`='".$_REQUEST['name']."', `email`='".$_REQUEST['email']."', `password`='".$_REQUEST['password']."',`tx_address`='".$_REQUEST['tx_address']."'  WHERE id=".$_REQUEST['id'];
      $result = $pdo->exec("UPDATE $table SET `name`='".$_REQUEST['name']."', `email`='".$_REQUEST['email']."', `password`='".$_REQUEST['password']."',`tx_address`='".$_REQUEST['tx_address']."'  WHERE id=".$_REQUEST['id']);
       add_notification_user("Your Profile has been Updated", "user", $_REQUEST['id']);
      header('Location:dashboard.php?choice=success&value=Your Profile has been Updated');
    }
?>