<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($pdo_auth['kyc_approved']=="Pending"){
      header('Location:kyc.php?choice=error&value=Please Submit Your KYC Details, Once They Are Approved You will be able to Navigate');
    }   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php include 'title.php'; ?></title>
    <?php include 'head.php';  ?><link rel="stylesheet" href="hover.css" />
  </head>
  <body>
    <?php include 'sidebar.php'; ?>

    <div class="content_wrapper">
     <?php include 'header.php'; ?>

      <div style="padding:30px;">
        <?php see_status2($_REQUEST); ?>
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 25px;">Secure Your Account Here </h1>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="cards items" style="text-align: left;padding: 40px;">
               
                <div class="century" style="font-size: 24px;color: #ddd">Using Two-factor authentication is highly recommended.</div>
                <hr style="opacity: .1" />
                <img src="img/2faa.jpg" style="width: 100%">
                <br/><br/>

                <p style="color: #4fc0f2;">Please consider this option for increasing the security of your account. BB Token Wallet wants to give you every opportunity to be confident that your tokens are secure.
2FA doesn't take away the OTP or Captcha based authentications away and will be an added advantage to boost security stack of your wallet. Its highly recommended you enable this!</p>
               <div style="padding:20px;"></div>

              </div>
            </div>

            <div class="col-lg-3">
              <div class="cards items" style="background-color: #111">

                <?php if($pdo_auth['g_auth_key']==""){ ?>
                  <form action="2fa_handle.php" method="Post">
                   <h3  style="font-family: 'Didact Gothic', sans-serif;color: #4fc0f2;font-size: 20px;line-height: 27px;">Enable 2FA <img src="img/image.png" style="width: 80px;"> </h3>
                   <hr style="opacity: .2" />
                   <h4  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;line-height: 24px;">If you wish to Enable 2FA to this account, Just Scan the code Below in your Smartphone's Google Authenticator App for <a target="_blank" href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">iPhone</a> or <a target="_blank" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">Android</a> and Write The Code Below in text Feild.</h4>
                  
                  <?php
                    // add google Authentications
                    require_once 'googleLib/GoogleAuthenticator.php';
                    $ga = new GoogleAuthenticator();
                    $secret = $ga->createSecret(); //This function will create unique 16 digit secret key
                    $qrCodeUrl = $ga->getQRCodeGoogleUrl($pdo_auth['email'], $secret,'www.bbtokens.io');
                   ?><br/><br/>
                   <center><img src='<?php echo $qrCodeUrl; ?>' style="width:70%">
                   <br/><br/>
                   <input type="number" required  class="form-control input" style="width: 70%" name="otp" placeholder="Enter OTP">
                   <input type="hidden" name="secret" value="<?php echo $secret; ?>">
                    <br/>
                    <button class="mol sq-btn input hvr-bounce-to-right" type="submit" style="background-color: #5ddfff;width: 70%">SEND BB Token</button>
                   </center>
                </form>
                <?php } else{ ?>
                   <h3  style="font-family: 'Didact Gothic', sans-serif;color: #4fc0f2;font-size: 20px;line-height: 27px;text-align: center;">You are Now Protected  </h3>
                 <img src="img/prot.png" style="width: 100%">
                  <br/><br/>
               
                   <hr style="opacity: .2" />
                   <h4  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;line-height: 24px;">2 Factor Authentication is Now Enabled for Your Account</h4>
                   <button class="btn btn-success" style="width: 100%">2FA Enabled</button>

                  
                <?php } ?>
                
              </div>
            </div>

          
        </div>
      </div>

        <div class="row">
           <div class="clearfix"></div>
          <?php include 'footer.php';  ?>
        </div>

     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="pace.js"></script>
  
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );
      } );
    </script>   
    <script type="text/javascript" src="match.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
       $(function() {
        $('.items').matchHeight({
          byRow: true,
          property: 'height',
          target: null,
          remove: false
      });
      });
     });
    </script>

     <script type="text/javascript">
      $(document).ready(function(){
       $("#nots_btn").click(function(){
          $("#nots").slideToggle("fast");
        });

       $('html').click(function() {
         $("#nots").slideUp("fast");
       });

       $('#nots, #lopp').click(function(event){
           event.stopPropagation();
       });
        
      });
    </script>

  </body>
</html>