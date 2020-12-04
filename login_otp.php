<?php session_start(); include 'connection.php';  $pdo = new PDO($dsn, $user, $pass, $opt); require_once 'googleLib/GoogleAuthenticator.php'; include 'administrator/function.php'; ?><!DOCTYPE html>
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
    <style type="text/css">
       #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background: $background
      }
    </style>
  </head>
  <?php $rand = mt_rand(1,4); ?>
  <body style="background-image: url('img/earth.jpg');background-size: cover;">
    <div id="particles-js"></div>
    <div style="height: 15vh"></div>
    <div class="container" >
     
      <div style="padding-bottom: 40px;"></div>
       
      <div style="">
        
        <div class="row">
          
          <div class="col-sm-12">
            <center>
              <div style="padding: 40px;background-color: #fff;width: 300px;">
              <center><img src="img/bigg.png" style="width:80%">
                <hr/>
                Scan this Qr and Write Generated Code in <b>Google 2FA</b> <a href=""></a><hr/>
                <?php see_status2($_REQUEST); ?>
                <?php 
                  $ga = new GoogleAuthenticator();

                   try {
                        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = "'.base64_decode($_REQUEST['passcode']).'"  ORDER BY date DESC ');
                    } catch(PDOException $ex) {
                        echo "An Error occured!"; 
                        print_r($ex->getMessage());
                    }
                    $stmt->execute();
                    $mota = $stmt->fetch();                   
                
                 ?>
                
              </center>
             
              <form class="login-form" action="login_handle.php" method="post">
                <div style="">
                  <div style="padding: 5px;"></div>

                  <div class="row">
                    <div class="col-sm-12">
                      <input type="text" class="form-control inputs" name="otp" placeholder="Enter OTP">
                       <input type="hidden" name="email" value="<?php echo base64_decode($_REQUEST['passcode']); ?>">
                    </div>
                  </div>
                  <div style="padding: 16px;"></div>

                  <div class="row">
                    <div class="col-sm-12">
                     <button class="inputss hvr-bounce-to-right" name="login" value="login" style="width: 100%;background-color: #55b3dd">Verify Login </button>
                    </div>
                  </div>
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
    <script type="text/javascript" src="particle.js"></script>
    <script type="text/javascript">
      particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 71,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#00298e"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 5,
        "color": "#01abab"
      },
      "polygon": {
        "nb_sides": 7
      },
      "image": {
        "src": "img/github.svg",
        "width": 80,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.8177401510414166,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 60.905790922600886,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "01abab",
      "opacity": 0.4,
      "width": 1.687847739990702
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "remove"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": false
});
    </script>
  </body>
</html>