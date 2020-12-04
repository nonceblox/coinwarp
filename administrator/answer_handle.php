<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'function.php';
    include '../add_notification_user.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
	$data = get_data_id("support", $_REQUEST['support_id']);

   $table = "support";
   $result = $pdo->exec("UPDATE $table SET `ans`='".$_REQUEST['answer']."', `status`='Answered' WHERE `id`=".$_REQUEST['support_id'].""); 
   add_notification("A Support Request Was Answered", "admin");
   add_notification_user("Your Support Ticket Was Responded", "user", $data['user_id']);
   header('Location:support_requests.php?choice=success&value=Support Request Has Been Answered');  
?>