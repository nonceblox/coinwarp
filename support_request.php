<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'add_notification_user.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
   	$pdo = new PDO($dsn, $user, $pass, $opt);

   	$table = "support";
	  $key_list = "`user_id`,`name`, `email`, `question`, `description`";
	  $value_list = "'".$pdo_auth['id']."',";
	  $value_list.= "'".$_REQUEST['name']."',";
	  $value_list.="'".$_REQUEST['email']."',";
	  $value_list.="'".$_REQUEST['question']."',";
	  $value_list.="'".$_REQUEST['answer']."'";
	  //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
	  $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      add_notification_user("A Support Request Initiated", "user", $pdo_auth['id']);
      add_notification("A Support is Requested from User", "admin");
     header('Location:support.php?choice=success&value=Support Requested, we will get back to you shortly');
     exit();
?>
