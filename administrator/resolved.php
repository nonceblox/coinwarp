<?php
   include 'connection.php';
   include 'function.php';
    include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   // Add User Starts Here
      $table = "support";
      $result = $pdo->exec("UPDATE $table SET `status`='Resolved'  WHERE id=".$_REQUEST['id']);

      add_notification("Support Request Resolved", "admin");
       add_notification_user("Your Support Request Resolved", "user", $_REQUEST['id']);
      header('Location:support_requests.php?choice=success&value=Support Request Resolved');
?>