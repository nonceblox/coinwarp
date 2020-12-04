<?php     include 'connection.php';
	  include 'add_notification_user.php';
	  include 'administrator/function.php';
	  $pdo = new PDO($dsn, $user, $pass, $opt);
	  //print_r($_REQUEST);
	  extract($_REQUEST);
	
  ?>
  
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include 'connection.php'; include 'random_function.php';  include 'pdo_class_data.php'; ?>
    <title><?php include 'title.php'; ?></title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rajdhani:400,600,700" rel="stylesheet">

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
    <div class="container" >
     
      <div style="padding-bottom: 40px;"></div>
       
      <div style="">
        
        <div class="row">
          
          <div class="col-sm-12">
            <center>
              <div style="padding: 40px;background-color: #fff;width: 300px;">
              <center><img src="img/bigg.png" style="width:80%"></center>
              <br/>
              <?php echo $piyush; ?>
              <form class="login-form" action="forgot_password_handle.php" method="post">
                <div style="padding: 10px;"></div>
                <div style="">
                  <div class="century">Sign In <a href="index.php" style="color: #142F60;font-weight: bold;"> Here </a></div>
                  <div style="padding: 5px;"></div>
		
		    <div class="form-group">
                      <input type="text" class="input" style="height: 50px; color: #333;width:100%;padding:10px" name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                   </div>
                   <div style="padding:5px;"></div>
                   <button class="mol" type="sumbit" name="submit" style="background-color: #064a73;height:50px;padding: 7px 14px;color:#fff;border:0;width: 100%">Send Password</button>
                 
              </div>
            </form>             
            </div>
            </center>
          </div>
        </div>
      </div>
      <div style="padding: 1px;"></div>
     
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>