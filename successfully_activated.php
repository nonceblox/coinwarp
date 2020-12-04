<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php include 'title.php'; ?></title>

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
    <link rel="stylesheet" type="text/css" href="hover.css">
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('img/poi<?php echo $rand;  ?>.jpg');background-size: cover;">
    <div style="height: 15vh"></div>
    <div class="container" style="width: 350px;" >
     
      <div style="padding-bottom: 20px;"></div>
      <div style="background-color: #eee;box-shadow: 0px 0px 40px rgba(100,100,100,.4)">
        <div class="row">
          <div class="col-sm-12">
            <div style="padding: 30px;background-color: #eee;text-align: center;">
               <div style="padding: 20px;"></div>
                <img src="img/rocket.svg" style="width: 90px;">
                <div style="padding: 10px;"></div>
                <div class="century" style="font-size: 25px;">Successfully Registered</div>
                <div style="color: #999;font-size: 12px;">A Confirmation Activation Links has been sent to Your Registered Email Address, Click on that link to activate your account.</div>
                <div style="padding: 10px;"></div>
                <center> <a href="sign_in.php"><button class="inputss hvr-bounce-to-right" style="width: 100%">Sign In</button></a></center>
                <div style="padding: 10px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div style="padding: 1px;"></div>
      
      <div class="clearfix"></div>
       <?php include 'footer2.php'; ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>