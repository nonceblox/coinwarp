<?php
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);
   $table = "notification";
   $id= $_REQUEST['id'];
   try {
    $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   add_notification("A Notification has been Deleted", "admin");
   header('Location:notifications.php?choice=success&value=Notification Deleted Successfully');   
?>