<?php session_start();
    include 'pdo_class_data.php';
    include 'add_notification_user.php';
    include 'connection.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $table = "users";
    if($_REQUEST['new_pass']===$_REQUEST['conf_pass']){
      $result = $pdo->exec("UPDATE $table SET `password`='".$_REQUEST['new_pass']."', `name`='".$_REQUEST['name']."', `tx_address`='".$_REQUEST['tx_address']."',`phone`='".$_REQUEST['phone']."'  WHERE id=".$pdo_auth['id']);

      add_notification_user("Your Profile has been Updated", "user", $pdo_auth['id']);
      header('Location:dashboard.php?choice=success&value= Your Profile  has been Updated');
    }
    else{
      header('Location:dashboard.php?choice=error&value=New password and Confirm Password Must be Same.');
    }
   
?>

