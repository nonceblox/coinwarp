<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);

   $table = "notification";
   $result = $pdo->exec("UPDATE $table SET `status`='Read' WHERE `user_id`=".$pdo_auth['id'].""); 
   //echo "UPDATE $table SET `status`='Read' WHERE `user_id`=".$pdo_auth['id']."";
   //echo "Hello";   
?>