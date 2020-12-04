<?php
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   $table = "notification";
   $result = $pdo->exec("UPDATE $table SET `status`='Read' WHERE `for`='admin'"); 
   //echo "Hello";   
?>