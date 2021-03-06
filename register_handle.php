<?php include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo=new PDO($dsn, $user, $pass, $opt); //print_r($_REQUEST);
extract($_REQUEST);
  try {
      $stmt=$pdo->prepare('SELECT * FROM `users` WHERE `email`="'.$email.'"  ORDER BY date DESC ');
  }

  catch(PDOException $ex) {
      echo "An Error occured!";
      print_r($ex->getMessage());
  }

  if (empty($_POST["email"])) {
      $emailErr="Email is required";
  }

  else {
      $email=($_POST["email"]); // check if e-mail address is well-formed
      if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header('Location:sign_in.php?choice=error&value=Incorrect Email, Please Enter Valid Email Address');
      }
  }

  $stmt->execute();
  $user=$stmt->fetchAll();
  $count=count($user);
  if($count>0) {
      header('Location:register.php?choice=error&value=A User with Either Same Email or Same Transaction Address Already Exist');
      exit();
  } 

  //Generate address and Associate with this account 
  if(empty($_REQUEST['tx_address'])) {
      $stmt=$pdo->prepare('SELECT * FROM `tx_addresses` WHERE `status`="Pending" LIMIT 1');
      $stmt->execute();
      $fata=$stmt->fetch(); //print_r($fata);
      $table="tx_addresses";
      $result=$pdo->exec("UPDATE $table SET `status`='Used', `email`='".$email."'  WHERE id=".$fata['id']);
      $tx_address=$fata['tx_address'];
  } // add Member to the List
  if(isset($_REQUEST['add_user'])) {
      $curl=curl_init();
      $host=get_blockchain_host();
      curl_setopt_array($curl, array( 
        CURLOPT_URL=> $host."/wallet/register", 
        CURLOPT_RETURNTRANSFER=> true, 
        CURLOPT_ENCODING=> "", 
        CURLOPT_MAXREDIRS=> 10, 
        CURLOPT_TIMEOUT=> 0, 
        CURLOPT_FOLLOWLOCATION=> true, 
        CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST=> "POST", 
        CURLOPT_POSTFIELDS=>"{\r\n    \"email\":\"".$_REQUEST['email']."\",\r\n    \"password\": \"".$_REQUEST['password']."\"\r\n}", 
        CURLOPT_HTTPHEADER=> array( "Content-Type: application/json"), ));
      
      $response=curl_exec($curl);
      curl_close($curl); 
      $response=json_decode($response, true); 
      if (isset($response['success'])) {
          $curl=curl_init();
          curl_setopt_array($curl, array( 
            CURLOPT_URL=> $host."/wallet/login", 
            CURLOPT_RETURNTRANSFER=> true, 
            CURLOPT_ENCODING=> "", 
            CURLOPT_MAXREDIRS=> 10, 
            CURLOPT_TIMEOUT=> 0, 
            CURLOPT_FOLLOWLOCATION=> true, 
            CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1, 
            CURLOPT_CUSTOMREQUEST=> "POST", CURLOPT_POSTFIELDS=>"{\r\n    \"email\":\"".$_REQUEST['email']."\",\r\n    \"password\": \"".$_REQUEST['password']."\"\r\n}", 
            CURLOPT_HTTPHEADER=> array( "Content-Type: application/json"), ));
          $response=curl_exec($curl);
          $response2=json_decode($response, true); 

          //print_r($response2);
          //curl_close($curl);
          # code... $secret=""; //print_r($_REQUEST);

          $table="users";
          $name=explode("@", $email);
          $uniq=uniqid();
          $key_list="`name`, `email`, `tx_address`, `verified`, `password`,`activation_code`";
          $value_list="'".$name[0]."',";
          $value_list.="'".$email."',";
          $value_list.="'".$response2['data']['walletAddress']."',";
          $value_list.="'Yes',";
          $value_list.="'".$_REQUEST['password']."',";
          $value_list.="'".$uniq."'";
          $result=$pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)"); //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
          add_notification("A New User Created", "admin");


          $email = $_REQUEST['email'];
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "http://3.21.231.199:3001/smtp/forHtml",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n\t\"_to\" : \"".$email."\",\n\t\"_subject\" : \"COINNEST REGISTRATION SUCCESSFULL\",\n\t\"_htmlText\" : \"<!DOCTYPE html><html> <head> <meta name=\\\"viewport\\\" content=\\\"width=device-width\\\"/> <meta http-equiv=\\\"Content-Type\\\" content=\\\"text/html; charset=UTF-8\\\"/> <title>COINNEST REGISTRATION SUCCESSFULL</title> <style>/* ------------------------------------- GLOBAL RESETS ------------------------------------- */ /*All the styling goes here*/ img{border: none; -ms-interpolation-mode: bicubic; max-width: 100%;}body{background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table{border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;}table td{font-family: sans-serif; font-size: 14px; vertical-align: top;}/* ------------------------------------- BODY & CONTAINER ------------------------------------- */ .body{background-color: #f6f6f6; width: 100%;}/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */ .container{display: block; margin: 0 auto !important; /* makes it centered */ max-width: 580px; padding: 10px; width: 580px;}/* This should also be a block element, so that it will fill 100% of the .container */ .content{box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;}/* ------------------------------------- HEADER, FOOTER, MAIN ------------------------------------- */ .main{background: #ffffff; border-radius: 3px; width: 100%;}.wrapper{box-sizing: border-box; padding: 20px;}.content-block{padding-bottom: 10px; padding-top: 10px;}.footer{clear: both; margin-top: 10px; text-align: center; width: 100%;}.footer td, .footer p, .footer span, .footer a{color: #999999; font-size: 12px; text-align: center;}/* ------------------------------------- TYPOGRAPHY ------------------------------------- */ h1, h2, h3, h4{color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px;}h1{font-size: 35px; font-weight: 300; text-align: center; text-transform: capitalize;}p, ul, ol{font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;}p li, ul li, ol li{list-style-position: inside; margin-left: 5px;}a{color: #3498db; text-decoration: underline;}/* ------------------------------------- BUTTONS ------------------------------------- */ .btn{box-sizing: border-box; width: 100%;}.btn > tbody > tr > td{padding-bottom: 15px;}.btn table{width: auto;}.btn table td{background-color: #ffffff; border-radius: 5px; text-align: center;}.btn a{background-color: #ffffff; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; color: #3498db; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize;}.btn-primary table td{background-color: #3498db;}.btn-primary a{background-color: #3498db; border-color: #3498db; color: #ffffff;}/* ------------------------------------- OTHER STYLES THAT MIGHT BE USEFUL ------------------------------------- */ .last{margin-bottom: 0;}.first{margin-top: 0;}.align-center{text-align: center;}.align-right{text-align: right;}.align-left{text-align: left;}.clear{clear: both;}.mt0{margin-top: 0;}.mb0{margin-bottom: 0;}.preheader{color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;}.powered-by a{text-decoration: none;}hr{border: 0; border-bottom: 1px solid #f6f6f6; margin: 20px 0;}/* ------------------------------------- RESPONSIVE AND MOBILE FRIENDLY STYLES ------------------------------------- */ @media only screen and (max-width: 620px){table[class=\\\"body\\\"] h1{font-size: 28px !important; margin-bottom: 10px !important;}table[class=\\\"body\\\"] p, table[class=\\\"body\\\"] ul, table[class=\\\"body\\\"] ol, table[class=\\\"body\\\"] td, table[class=\\\"body\\\"] span, table[class=\\\"body\\\"] a{font-size: 16px !important;}table[class=\\\"body\\\"] .wrapper, table[class=\\\"body\\\"] .article{padding: 10px !important;}table[class=\\\"body\\\"] .content{padding: 0 !important;}table[class=\\\"body\\\"] .container{padding: 0 !important; width: 100% !important;}table[class=\\\"body\\\"] .main{border-left-width: 0 !important; border-radius: 0 !important; border-right-width: 0 !important;}table[class=\\\"body\\\"] .btn table{width: 100% !important;}table[class=\\\"body\\\"] .btn a{width: 100% !important;}table[class=\\\"body\\\"] .img-responsive{height: auto !important; max-width: 100% !important; width: auto !important;}}/* ------------------------------------- PRESERVE THESE STYLES IN THE HEAD ------------------------------------- */ @media all{.ExternalClass{width: 100%;}.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{line-height: 100%;}.apple-link a{color: inherit !important; font-family: inherit !important; font-size: inherit !important; font-weight: inherit !important; line-height: inherit !important; text-decoration: none !important;}#MessageViewBody a{color: inherit; text-decoration: none; font-size: inherit; font-family: inherit; font-weight: inherit; line-height: inherit;}.btn-primary table td:hover{background-color: #34495e !important;}.btn-primary a:hover{background-color: #34495e !important; border-color: #34495e !important;}}</style> </head> <body class=\\\"\\\"> <span class=\\\"preheader\\\">Registration Success</span> <table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"body\\\"> <tr> <td>&nbsp;</td><td class=\\\"container\\\"> <div class=\\\"content\\\"> <table role=\\\"presentation\\\" class=\\\"main\\\"> <tr> <td class=\\\"wrapper\\\"> <table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\"> <tr> <td> <img src=\\\"http://3.21.240.123/Coinnest/logo.png\\\" style=\\\"width: 160px;\\\"/> <br/> <br/> <p>Hi there,</p><h2>Registration Complete.</h2> <p>Your Registration with COINNEST has been complete. You can log into the system anytime now clicking on below link.</p><table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"btn btn-primary\\\"> <tbody> <tr> <td align=\\\"left\\\"> <table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\"> <tbody> <tr> <td><a href=\\\"http://3.21.240.123/Coinnest\\\" style=\\\"background-color: #ff6600; border: 0;\\\" target=\\\"_blank\\\">Login Here</a></td></tr></tbody> </table> </td></tr></tbody> </table> <p>COINNEST is an easy to participate and simple to use unified communication and Money exchange hub underpinned by blockchain and IoT for Payment System.</p><p>Good luck!</p></td></tr></table> </td></tr></table> <div class=\\\"footer\\\"> <table role=\\\"presentation\\\" border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\"> <tr> <td class=\\\"content-block\\\"> <span class=\\\"apple-link\\\">7B Oye Balogun Street,Freedom Way, Lekki Phase 1,Lagos State.</span> <br/> Dont like these emails? <a href=\\\"http://i.imgur.com/CScmqnj.gif\\\">Unsubscribe</a>. </td></tr><tr> <td class=\\\"content-block powered-by\\\">Powered by <a href=\\\"http://nonceblox.com\\\">Nonceblox</a>.</td></tr></table> </div></div></td><td>&nbsp;</td></tr></table> </body></html>\"\n}",
            CURLOPT_HTTPHEADER => array(
              "Content-Type: application/json",
              "Cookie: connect.sid=s%3AK010Dl8DPOw7mP_mJVW4FDdluYeYDnyI.TUitZ4PcIqHjvCZifnHolh5HY873xy7901ZapCz0KpE"
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);
          //echo $response;


          header('Location:index.php?choice=success&value=Registration complete ! We have sent you a confirmation email. Please check your inbox or spam folder.&passcode='.base64_encode($email));
          exit();
      }
      else {
          header('Location:register.php?choice=error&value=A User with Either Same Email or Same Transaction Address Already Exist');
          exit();
      }
      header('Location:index.php?choice=success&value=Registration complete ! We have sent you a confirmation email. Please check your inbox or spam folder.&passcode='.base64_encode($email));
      exit();
  }

?>