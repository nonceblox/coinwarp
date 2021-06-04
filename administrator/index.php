<?php include 'pdo_class_data.php'; ?>
<!DOCTYPE html>
<html>
  
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php include 'title.php'; ?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('../img/poi34.jpg');background-size: cover;">
     
    <section class="login-content">     
      <div class="login-box">
        <?php see_status2($_REQUEST); ?>
        <form class="login-form" action="login_handle.php" method="post">
          <div style="padding: 10px;"></div>
         <center> <img src="../fac.png" style="width: 60px"></center>
         <div style="padding: 10px;"></div>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" style="border-radius: 0px;border:solid 1px #ccc" name="user" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control"  style="border-radius: 0px;border:solid 1px #ccc"  name="pass" type="password" placeholder="Password">
          </div>
          <div style="padding:10px;"></div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" style="background-color: #00ccff"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="index.html">
          <h3 class="login-head" style="font-family: 'Century Gothic';"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" style="background-color: #00ccff"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip" style="color: #999"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>

</html>