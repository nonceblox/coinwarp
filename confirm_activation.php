<?php 
    include 'pdo_class_data.php';
    include 'connection.php';   
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $table = "users";
    $result = $pdo->exec("UPDATE $table SET `verified`='Yes'  WHERE `activation_code`='".$_REQUEST['codes']."'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Entercoin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="tyle.css">
  </head>
  <body style="background-image: url('img/backss.jpg');background-size: cover;">
    <div style="height: 10vh"></div>
    <div class="container" style="width: 1000px;">
      <h1 class="century" style="color: #fff;margin-bottom: 4px;">Holla! You're <b>Account</b> Has been Activated</h1>
      <div class="century" style="font-size: 24px;">Secure and Easiest Way to Store ENTRC</div>
      <div style="padding-bottom: 40px;"></div>
      <div style="background-color: #eee;box-shadow: 0px 0px 40px rgba(100,100,100,.4)">
        <div class="row">
          <div class="col-sm-4">
            <div style="padding: 50px;background-color: #fff;text-align: center;">
                <div style="padding: 20px;"></div>
                <img src="img/entc_llogo.jpg" style="width: 150px;"><br/>
                <div style="padding: 5px;"></div>
                <div class="century" style="font-size: 20px;color: #999">Welcome to the EnterCoin Official Wallet</div>

                <div style="padding: 25px;"></div>
                <div class="century">Already have an account?<br/> <a href="" style="color: #2fc57b">LogIn</a></div>               
            </div>
          </div>

          <div class="col-sm-8">
            <div style="padding: 50px;background-color: #eee;text-align: center;">
               <div style="padding: 40px;"></div>
                <img src="img/success.svg" style="width: 110px;">
                <div style="padding: 10px;"></div>
                <div class="century" style="font-size: 25px;">Activation Confirmed</div>
                <div style="padding: 10px;"></div>
                <center> <a href="sign_in.php"><button class="inputss">SignIn</button></a></center>
            </div>
          </div>
        </div>
      </div>
      <div style="padding: 1px;"></div>
      <a href="#" style="padding: 10px 10px;display: block;float: left;color: #fff">Home </a>
      <a href="#" style="padding: 10px 10px;display: block;float: left;color: #fff">Buy ENTRC </a>
      <a href="#" style="padding: 10px 10px;display: block;float: left;color: #fff">Sell ENTRC </a>
      <a href="#" style="padding: 10px 10px;display: block;float: left;color: #fff">KYC </a>
      <a href="#" style="padding: 10px 10px;display: block;float: left;color: #fff">Support </a>
      <div class="clearfix"></div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>