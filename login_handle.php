<?php session_start();
	//date_default_timezone_set('Asia/Kolkata');
    include 'connection.php';
	$pdo = new PDO($dsn, $user, $pass, $opt);
	$user = $_REQUEST['email'];
	extract($_REQUEST); 
	
	if( $_REQUEST['otp']==""){
		header('Location:login_otp.php?choice=error&value=No OTP Entered,  Try Again.');
		exit();
	}

	require_once 'googleLib/GoogleAuthenticator.php';
	$ga = new GoogleAuthenticator();
	$secret = $_SESSION['secrets'];
	echo $secrets;
	$checkResult = $ga->verifyCode($secret, $otp, 2);    // 2 = 2*30sec clock tolerance
	
	if ($checkResult)
	{
		if(isset($_REQUEST['login'])){
			try {
			    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :user');
			} catch(PDOException $ex) {
			    echo "An Error occured!"; 
			    print_r($ex->getMessage());
			}
			
			$stmt->execute(['user' => $user]);
			$user = $stmt->fetch();
			$row_count = $stmt->rowCount();
			//print_r($user);
			//echo $row_count;
			if($row_count>0){
				$_SESSION['user'] = $user['email'];
				$_SESSION['role'] = "user";
			 	$_SESSION['loged_primitives'] = md5($user['password']);

			header('Location:dashboard.php?choice=success&value=Login Successful, Welcome to User Panel');
			exit();

			}else
			{
				header('Location:index.php?choice=error&value= Relogin, Previous Supplied Credentials Were Wrong');
				exit();
			}
		}
	}
	else
	{
		//header('Location:login_otp.php?choice=error&value=Invalid,  Try Again.&passcode='.base64_encode($_REQUEST['email']));
		exit();
	}
	
		// try {
		//     $stmt2 = $pdo->prepare('SELECT * FROM otp WHERE otp = "'.$secret.'" AND email="'.$email.'" ORDER BY date DESC');
		//     //echo  'SELECT * FROM otp WHERE otp = "'.$secret.'" AND email="'.$email.'" ORDER BY date DESC';
		//    } catch(PDOException $ex) {
		//     echo "An Error occured!"; 
		//     print_r($ex->getMessage());
		// }
		// $stmt2->execute();
		// $user2 = $stmt2->fetch();
		// $count = $stmt2->rowCount();
		// echo $count;
		
		
		// if($count<1){
		// 	//header('Location:index.php?choice=error&value=Invalid Authentication, Try Again!&passcode='.base64_encode($_REQUEST['email']));
		// 	exit();
		// }
		
?>