<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';

?>
<!DOCTYPE html>
<html>
<head>
  <?php include 'head.php'; ?>
    </head>
  <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

      <div class="content-wrapper " style=";">
         <div class="page-title" style="padding: 32px;background-color: #333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Transaction </div>Details</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>

        <?php  

        $data = file_get_contents("http://ropsten.etherscan.io/api?module=account&action=txlist&address=0x6addcfc2c792396f460679a83c0136cb5b8e64f1&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71"); 
        //echo $data;

          //  Initiate curl
          //$url = "http://rinkeby.etherscan.io/api?module=account&action=txlist&address=0x06f0591FfADA777E95A17Cb865021849a457C2b6&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71";
          // $ch = curl_init();
          // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // curl_setopt($ch, CURLOPT_URL,$url);
          // $result=curl_exec($ch);
          // curl_close($ch);
          // var_dump(json_decode($result, true));

        
          $mata = json_decode($data, true);
          $pata = array_reverse($mata['result']);
         // print_r($pata);
          $count =  count($pata);
        ?>

        <div style="padding: 20px;"></div>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example">
                  <thead>
                    <tr style="color:#555">
                      <th>#</th>
                      <th>Block</th>
                      <th>Age</th>
                      <th>Transactions</th>
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
                          
                                                 
                        echo '<tr>
                              <td>'.$i.'</td>
                              <td>'.$pata[$i]['blockNumber'].'</td>
                              <td>'.humanTiming ($timestamp).' Ago </td>
                              <td title="'.$pata[$i]['hash'].'"><b>Hash : </b>'.$pata[$i]['hash'].'<br/> <b>From : </b>'.$pata[$i]['from'].'<br/> <b>To: </b> : '.$pata[$i]['to'].'</td>                              
                              <td>'.$marak.'</td>
                              <td>'.$status.'</td>
                            </tr>'; 
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
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#ddd;">Whitelisted Users</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="meko">
                  <thead>
                    <tr style="color:#ddd;">
                      <th>#</th>
                      <th> Name</th>
                      <th>Email</th>
                      <th>Tx Address</th>
                      <th>Password</th>
                      <th>File </th>
                      <th>Gender </th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `users`  ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td>'.$value['name'].'</td>
                                <td>'.$value['email'].'</td>
                                 <td>'.$value['tx_address'].'</td>
                                <td>'.$value['password'].'</td>
                                <td>'.$value['file'].'</td>
                                <td>'.$value['gender'].'</td>
                                <td>'.$value['verified'].'</td>
                                <td>                                 
                                  <a href="delete_user.php?id='.$value['id'].'"  onclick="return confirm(\'Are You Sure You want to Remove This User?\')"><button class="btn btn-info btn-sm" title="Delete"><i class="icon-remove-sign"></i></button>
                                </td>
                              </tr>';
                              $i++;
                      }
                     ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
       
        <?php include 'footer.php'; ?>        
      </div>
    </div>
    
    <!-- Javascripts-->
    <!--<div style="padding: 30px;"></div>-->
    <?php include 'modal.php'; ?>
    <?php include 'scripts.php';  ?>
<?php include 'update_modal.php'; ?>?>   
    
    <script type="text/javascript">
      $(document).ready(function() {
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