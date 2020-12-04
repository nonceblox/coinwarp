<?php session_start();
	
	include '../pdo_class_data.php';
	include '../connection.php';
	
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	try {
	    $stmt = $pdo->prepare('SELECT * FROM `administrator_super_user`  WHERE `email` = "'.$user.'" AND `password`="'.$pass.'"');
	   // echo 'SELECT * FROM administrator_super_user  WHERE email = "'.$user.'" AND password="'.$pass.'"';
	} catch(PDOException $ex) {
	    echo "An Error occured!"; 
	    print_r($ex->getMessage());
	}
	
	$stmt->execute();
	$user = $stmt->fetchAll();
	$row_count = $stmt->rowCount();
	//echo $row_count;
	if($row_count>0){
		$_SESSION['administrator'] = $_REQUEST['user'];
	 	$_SESSION['loged_primitives'] = md5($_REQUEST['pass']);
	 	header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to Your Own Admin Panel');
	}else
	{
		header('Location:index.php?choice=error&value=Please Relogin, Previous Supplied Credentials Were Wrong');
	}
?>