<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);


 try {
          $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `tx_address`="'.$_REQUEST['data'].'"');
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      $dara = $stmt->rowCount();

if ($dara>=1) {
	echo "<div style='color:green;font-weight:bold'>".$user['name']." (".$user['email'].")</div>";
}
else{
	echo "<div style='color:red;font-weight:bold'>This Address is invalid</div>";
}

?>