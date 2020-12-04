<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php include 'title.php'; ?></title>
    <?php include 'head.php';  ?>

  </head>
  <body>
    <?php include 'sidebar.php'; ?>

    <div class="content_wrapper">
     <?php include 'header.php'; ?>

      <div style="padding:30px;">
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #2a0b79;font-size: 30px;">Transaction Details</h1>
        
     <?php  
            $data = file_get_contents("http://ropsten.etherscan.io/api?module=account&action=txlist&address=0x6addcfc2c792396f460679a83c0136cb5b8e64f1&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");         
            $mata = json_decode($data, true);
            $pata = array_reverse($mata['result']);
            $count =  count($pata);
        ?>

        <div class="row">
          <div class="col-md-12">
            <div class="cards" style="margin:10px">
             <div class="table-responsive">
                 <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Block</th>
                      <th>Age</th>
                      <th>Wallet Address</th>
                      <th>From</th>
                      <th>To</th>
                      <th>TValue</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                     function humanTiming ($time)
                      {
              
                          $time = time() - $time; // to get the time since that moment
                          $time = ($time<1)? 1 : $time;
                          $tokens = array (
                              31536000 => 'year',
                              2592000 => 'month',
                              604800 => 'week',
                              86400 => 'day',
                              3600 => 'hour',
                              60 => 'minute',
                              1 => 'second'
                          );
              
                          foreach ($tokens as $unit => $text) {
                              if ($time < $unit) continue;
                              $numberOfUnits = floor($time / $unit);
                              return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
                          }
              
                      }
                    $i=1;
                    $non_zero = array();

                    $array1 = array();
                    $array2 = array();
                    $array3 = array();
                    $array4 = array();
                    $array5 = array();

                     for($i=0;$i<$count;$i++){
                        $current_time = date("U");
                        $timestamp = $pata[$i]['timeStamp'];

                         $marak = ($pata[$i]['value']/1000000000000000000);
                        // echo $current_time;
                        $secs = number_format((($current_time-$timestamp)/3600),2); 

                        if($marak!=0){
                          $non_zero[] = ($pata[$i]['value']/1000000000000000000);
                        }

                        if($marak>0 && $marak<1){ $array1[]=$marak; }
                        if($marak>1 && $marak<3){ $array2[]=$marak; }
                        if($marak>3 && $marak<4){ $array3[]=$marak; }
                        if($marak>4 && $marak<5){ $array4[]=$marak; }
                        if($marak>5){ $array5[]=$marak; }
                        
                         $status =  '<label class="label label-success">Success</label>'; 
                        if($pata[$i]['txreceipt_status']==0){
                            $status =  '<label class="label label-danger">Failed</label>';
                          }
                          
                       
                         
                         $b = 1;
                          if(strtoupper($pata[$i]['from'])==strtoupper($pdo_auth['tx_address']) || strtoupper($pata[$i]['to'])==strtoupper($pdo_auth['tx_address'])){
                          //echo "kjkljhjlhjkhjhj";
                          	echo '<tr>
	                              <td>'.$b.'</td>
	                              <td>'.$pata[$i]['blockNumber'].'</td>
	                              <td>'.humanTiming ($timestamp).' Ago </td>
	                              <td title="'.$pata[$i]['hash'].'">'.substr($pata[$i]['hash'],0,24).'...</td>
	                              <td title="'.$pata[$i]['from'].'">'.substr($pata[$i]['from'],0,24).'...</td>
	                              <td title="'.$pata[$i]['to'].'">'.substr($pata[$i]['to'],0,24).'...</td>
	                              <td>'.$marak.'</td>
	                              <td>'.$status.'</td>
	                            </tr>'; 
	                            $b++;
                      			}

                          }
                          
                                                 
                        
                      //print_r($array5);
                      $non_zero = array_reverse($non_zero);
                     ?>                                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           <div class="clearfix"></div>
           <div style="padding:10px;"></div>
          <div style="padding-left:50px;">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                    <div style="font-size: 12px;text-align:left" class="resp">Copyright ©2017, All Rights Reserved.  Powered By <a href=""><img src="img/nimbus.png" style="height: 20px;">  </a></div>
                  </div>
                </div>
            </div>
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