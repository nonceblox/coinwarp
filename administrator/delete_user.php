<?php
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);
   $table = "users";
   $id= $_REQUEST['id'];
   try {
    $stmt = $pdo->prepare('DELETE FROM  '.$table.'  WHERE id = :id');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        return ($ex->getMessage());
    }
   $stmt->execute(['id' => $id]);
   add_notification("A User has been Deleted", "admin");
   header('Location:users.php?choice=success&value=Deleted Successfully');   
?>