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
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 25px;">SEND BBT <a href="sent_tokens.php" style="font-size: 15px;color:#4fc0f2">View all</a></h1>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="cards items" style="text-align: center;padding: 40px;">
               
                <div class="century" style="font-size: 24px;color: #ddd">Send BBT to another BBT address</div>
                <div class="century" style="font-size: 15px;color: #ddd">You can now Send  <b style="color: #ddd">BBT</b> From Below.</div>
                <hr style="opacity: .1" />
                
                <div style="padding: 20px;"></div>
               <center>
                 <form method="POST" action="send_handle.php">
                    <div class="form-group" style="text-align: left; color: #ddd;">
                      <label>Enter BBT Address</label>
                      <input type="text" class="input" name="to_address" style="width: 100%;height: 50px;" placeholder="Enter BBT Address address">
                   </div>
                   <div style="padding: 10px;"></div>
                   <div class="form-group" style="text-align: left; color: #ddd;">
                      <label>Your BBT Address</label>
                      <input type="text" class="input" name="tx_addresss" style="width: 100%;height: 50px;" readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Your BBT Address">
                   </div>
                   <div style="padding: 10px;"></div>
                   <div class="form-group" style="text-align: left; color: #ddd;">
                      <label>No. of BBT To Send <span  style="color: cream;">(You have : <?php echo $pdo_auth['balance']; ?> BBT)</span></label><br/>
                      <input type="number" min="0" class="input"  step=".0001" name="token_no" max="<?php echo $maya['balance']; ?>" style="width: 100%;height: 50px;" placeholder="Enter No. of BBT to Send">
                   </div>
                   <div style="padding:5px;"></div>

                   <input type="hidden" name="balance" value="<?php echo $pdo_auth['balance']; ?>">
                   
                  <div style="padding:5px;"></div>

                   <button class="mol hvr-bounce-to-right" style="height:50px;padding: 7px 14px;color:#fff;border:0;width:100%;background-color:#4fc0f2">SEND BBT</button>
                 </form>
                 <!-- <div style="color: #999;">BBT Fee : Fee: 0.5% of the total amount or 0.5 BBT </div> -->
               </center>

               <div style="padding:20px;"></div>

              </div>
            </div>

            <div class="col-lg-3">
              <div class="cards items">
                 <h3  style="font-family: 'Didact Gothic', sans-serif;color: #4fc0f2;font-size: 20px;">Caution! </h3><hr style="opacity: .2" />
                   <h4  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;">Please use the following while logging in to BBT account:</h4>
                   <ul style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;">
                      <li style="padding: 4px;"> Ensure that your BBT Address ID and the associated Sender ID are correct.</li>
                      <li style="padding: 4px;"> Ensure that there are no white spaces in the BBT ID and the Sender ID.</li>
                      <li style="padding: 4px;">Ensure that there are no white spaces while you enter the dynamic access code.</li>
                      <li style="padding: 4px;">In case of any other difficulty, contact BBT Support</li>                      
                   </ul>              
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