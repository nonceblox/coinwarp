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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style type="text/css">
      #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      background: $background
    }
    
    body{
      overflow:hidden;
    }

    .modal-backdrop
    {
        opacity:.9 !important;
    }

    .poik{
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 30px;
      margin:6px;
      background-color: #204dfb;
      z-index: 1000;
      border:solid 1px #4dd1ff;
      transition: all .2s ease-in-out 0s;
      width: 200px;
      overflow: hidden;
    }

    .poik:hover{
      padding: 10px 30px;
      font-size: 14px;
      margin:6px;
      background-color: #204dfb;
      border:solid 1px #204dfb;
      transition: all .2s ease-in-out 0s;
      overflow: hidden;
    }

    .flip-clock {
        display: inline-block;
        width: auto;        
    }

    .clock{
      zoom:1;
    }

     @media only screen and (max-width: 980px) {
     .clock{zoom:.60;}
}

   @media only screen and (max-width: 480px) {
     .clock{zoom:.40;}
}

    </style>
    <!-- <link rel="stylesheet" type="text/css" href="counter1.css">
    <link rel="stylesheet" type="text/css" href="counter2.css"> -->
   <!--  <link rel="stylesheet" type="text/css" href="counter3.css"> -->
    <link rel="stylesheet" type="text/css" href="css/flipclock.css">
    <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('img/poi34.jpg');background-size: cover;">
    
    <div style="height: 15vh"></div>
       
    <div class="container" >
     <div style="background-color: #fff;width:340px;margin:0 auto">
        <?php include 'administrator/function.php';
              see_status2($_REQUEST);
         ?>
        <div style="padding: 20px;text-align: center;position: relative;z-index: 10">
           <form method="POST" action="login_redirect.php"  novalidate onsubmit="return validate();">
             <div style="padding: 10px;background-color: #fff">
                 <img src="logo.png" style="width:180px;">
                  <div style="padding: 5px;"></div>
                <div style="padding: 10px;"></div>

                <div class="row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control inputs" name="user" placeholder="Enter Email Address">
                      <input type="hidden" name="role" value="User-Agent-x">
                    <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                    <div style="padding: 4px;" class="mobs"></div>
                  </div>
                </div>
                  <div style="padding: 5px;"></div>

                <div class="row">

                   <div class="col-sm-12">
                     <input type="password" class="form-control inputs" name="pass" placeholder="Enter Password">
                     <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                     <div style="padding: 4px;" class="mobs"></div>
                  </div>
                </div>
                <div style="padding: 5px;"></div>

               <input type="hidden" name="tx_address" >
              <!-- <div style="padding: 10px;"></div>-->
             
               

                <div class="row">
                  <div class="col-sm-12">
                   <button class="inputss hvr-bounce-to-right" name="login" style="width: 100%;background-color: #0199ca">LogIn</button>
                  </div>
                </div>
                <br/>
                 <div style="color: #333;cursor: pointer;"  data-toggle="modal" data-target="#myModal">Register Now</div>
            </div>

            </form>

          <center>
           
            <!-- <button class="btn btn-info poik hvr-bounce-to-right"  data-toggle="modal" data-target="#myModal" style="font-weight: bold;">BUY TOKENS</button>
            <button class="btn btn-info poik hvr-bounce-to-right" data-toggle="modal" data-target="#myModal2" style="background-color: transparent;font-weight: bold;">LOGIN</button>
             -->
          </center>
        </div>
      </div>
      <div style="padding: 1px;"></div>

     <div id="myModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="margin-top: 20vh">
        <div class="modal-dialog modal-sm" style="width:400px">
          <div class="modal-content">
            <form method="POST" action="register_handle.php" novalidate onsubmit="return validate();">
             <div style="padding: 40px;background-color: #fff">
                  <center><img src="logo.png" style="width:180px;"></center>
                  <div style="padding: 20px;"></div>

                    <div class="row">
                      <div class="col-sm-12">
                        <input type="text" class="form-control inputs" name="email" id="email" required="" placeholder="Enter Email Address">
                        <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                        <div style="padding: 4px;" class="mobs"></div>
                      </div>
                    </div>
                      <div style="padding: 5px;"></div>

                    <div class="row">

                       <div class="col-sm-12">
                         <input type="password" class="form-control inputs" name="password" id="password" required="" placeholder="Enter Password">
                         <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                         <div style="padding: 4px;" class="mobs"></div>
                      </div>
                    </div>
                    <div style="padding: 5px;"></div>

                   <input type="hidden" name="tx_address" >
                  <!-- <div style="padding: 10px;"></div>-->
                  

                <div class="row">
                  <div class="col-sm-12">
                   <button class="inputss  hvr-bounce-to-right" style="width: 100%;background-color:#0199ca" type="submit" name="add_user">Register</button>
                  </div>
                </div>

              <br/>
            </div>

            </form>
          </div>
        </div>
      </div>
     

     <div id="myModal2" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="margin-top: 20vh">
        <div class="modal-dialog modal-sm" style="width:400px">
          <div class="modal-content">
            <form method="POST" action="login_redirect.php"  novalidate onsubmit="return validate();">
             <div style="padding: 40px;background-color: #fff">
                 <img src="logo.png" style="width:180px;">
                <div style="padding: 5px;"></div>
                <div style="padding: 10px;"></div>

                <div class="row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control inputs" name="user" placeholder="Enter Email Address">
                      <input type="hidden" name="role" value="User-Agent-x">
                    <div id="email_error" style="color: red;font-size: 12px;display: none;">Enter Correct Email Address</div>
                    <div style="padding: 14px;" class="mobs"></div>
                  </div>
                </div>
                  <div style="padding: 5px;"></div>

                <div class="row">

                   <div class="col-sm-12">
                     <input type="password" class="form-control inputs" name="pass" placeholder="Enter Password">
                     <div id="password_error" style="color: red;font-size: 12px;display: none;">Enter Password</div>
                     <div style="padding: 14px;" class="mobs"></div>
                  </div>
                </div>
                <div style="padding: 5px;"></div>

               <input type="hidden" name="tx_address" >
              <!-- <div style="padding: 10px;"></div>-->
               <div class="g-recaptcha" data-sitekey="6LcVE1YUAAAAABnLtRy9kgvkyyL-4OE0gWOcrsot"></div>
                <div style="padding: 16px;"></div>
               
               

                <div class="row">
                  <div class="col-sm-12">
                   <button class="inputss hvr-bounce-to-right" name="login" style="width: 100%;background-color: #204dfb">LogIn</button>
                  </div>
                </div>
                <br/>
                 <center><a href="forgot_password.php">Forgot Password? Click Here </a></center>
            </div>

            </form>
          </div>
        </div>
      </div>


    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
  </body>
</html>