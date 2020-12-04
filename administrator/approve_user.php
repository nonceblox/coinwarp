<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';
    include '../add_notification_user.php';

    try {
          $stmt = $pdo->prepare('UPDATE  `users` SET `verified`="Yes" WHERE id='.$_REQUEST['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();

      add_notification("A User Account was Approved", "admin");
      add_notification_user("Your Account Verification has Approved, Balance Has Been Added To Your Wallet", "user",$_REQUEST['id']);
     header('Location:users.php?choice=success&value=Your Account Verification Request Approved');
     exit();
?>