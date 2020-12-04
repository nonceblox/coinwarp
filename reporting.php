<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
     $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <title>Reporting : ENTRC Stock Exchange</title>   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
  </head>
  <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'header.php'; ?>
      <!-- Side-Nav-->
      <?php include 'sidebar.php'; ?>
      <div class="content-wrapper">
        <div class="page-title" style="padding: 32px">
          <div class="row" style="width: 100%;margin-left:0px">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 30px;font-weight: normal;">Blockchain Transaction</h1>                
              </div>
           </div>
           <div class="col-sm-6"></div>
           <div class="col-sm-3 rgt">
              <div class="rgt_pad">
                  <?php include 'price_panel.php'; ?>
              </div>
           </div>
          </div>
        </div>

        <?php  

        $data = file_get_contents("http://rinkeby.etherscan.io/api?module=account&action=txlist&address=0x06f0591FfADA777E95A17Cb865021849a457C2b6&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");              
          $mata = json_decode($data, true);
          $pata = array_reverse($mata['result']);
          $count =  count($pata);
          //print_r($pata);
        ?>


        <div style="padding: 20px;"></div>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>TXHash</th>
                      <th>Block</th>
                      <th>Age</th>
                       <th>From</th>
                       <th>To</th>
                         <th>TValue</th>
                         <th>ENTRC</th>
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
		
		


                      $j=1;
                        for($i=0;$i<$count;$i++){
                          $current_time = date("U");
                          $timestamp = $pata[$i]['timeStamp'];
                          //echo $timestamp;
                          //echo humanTiming($timestamp);
                           $secs = number_format((($current_time-$timestamp)/3600),2);  
                          //print_r($pata[$i]['from']);
                          //echo "<hr/>".$pdo_auth['tx_address'];
                           $eth = $pata[$i]['value']/1000000000000000000;
                          if(strtolower($pdo_auth['tx_address'])==$pata[$i]['from']){
                          $status =  '<label class="label label-success">Success</label>';
                          //echo $pata[$i]['txreceipt_status'];
                          if($pata[$i]['txreceipt_status']==0){
                            $status =  '<label class="label label-danger">Failed</label>';
                          }
                             echo '<tr>
                                <td>'.$j.'</td>
                                <td>'.$pata[$i]['blockNumber'].'</td>
                                <td>'.humanTiming($timestamp).' Ago </td>
                                <td title="'.$pata[$i]['hash'].'">'.substr($pata[$i]['hash'],0,24).'...</td>
                                <td title="'.$pata[$i]['from'].'">'.substr($pata[$i]['from'],0,24).'...</td>
                                <td title="'.$pata[$i]['to'].'">'.substr($pata[$i]['to'],0,24).'...</td>
                                <td>'.($eth).'</td>
                                <td>'.($eth*3000).'</td>
                                <td>'.$status.'</td>
                              </tr>'; $j++;
                          }  
                        }
                       ?>        
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#800">Pending Buy Token Requests</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="meko">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> Name</th>
                      <th>Email</th>
                      <th>Tx Address</th>
                      <th>No_of_Ethers</th>
                      <th>No of ENTRC</th>
                      <th>Status</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try {
                            $stmt = $pdo->prepare('SELECT * FROM `buy_token` WHERE `user_id`="'.$pdo_auth['id'].'"  ORDER BY date DESC');
                        } catch(PDOException $ex) {
                            echo "An Error occured!"; 
                            print_r($ex->getMessage());
                        }
                        $stmt->execute();
                        $user = $stmt->fetchAll();   
                        $i=1; 
                        foreach($user as $key=>$value){
                            $statys = '<label class="label label-danger">Pending</label>';
                            if($value['status']!="Pending"){
                            $statys = '<label class="label label-success">Approved</label>';
                          }

                          echo '<tr>
                              <td>'.$i.'</td>
                              <td>'.$value['user_name'].'</td>
                              <td>'.$value['email'].'</td>
                              <td>'.$value['tx_address'].'</td>
                              <td>'.$value['no_ethers'].'</td>
                              <td>'.$value['no_of_tokens'].'</td>
                              <td>'.$statys.'</td>
                            </tr>';
                            $i++;
                      }           
                    ?>                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <div style="padding-left:30px;">
	         <?php include 'footer.php'; ?>
        </div>        
      </div>
    </div>
    
    <div style="padding: 30px;"></div>
     <?php include 'user_update_modal.php'; ?>



    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
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
          
          $('#meko').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );
      } );
    </script>
  </body>
</html>