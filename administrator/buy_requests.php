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
  <title>View all Token Sell Requests</title>
  </head>
 <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

       <div class="content-wrapper ">
         <div class="page-title" style="padding: 32px;background-color: #333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Buy </div>Requests</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>

        

        <div style="padding: 20px;"></div>
        <?php see_status2($_REQUEST); ?>
         <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive">
                <!--<h3>Buy Requests </h3><hr/>-->
                   <table class="table table-striped table-hover">
                    <thead>
                       <tr style="color:#555">
                         <th>User</th>
                         <th>Amount</th>
                         <th>Tokens</th>
                         <th>Date</th>
                         <th>Status</th>
                         <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                      <?php 

                      $curl = curl_init();
                      curl_setopt_array($curl, array(
                        CURLOPT_URL => get_blockchain_host()."/wallet/admin/events/deposit",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                      ));

                      $response = curl_exec($curl);

                      curl_close($curl);
                      $response = json_decode($response,true);
                      //print_r($response);
                      
                      $i=1; 
                        foreach($response['data'] as $key=>$value){

                            $ds='<a href="approve_buy.php?id='.$value['id'].'"><button class="btn btn-success btn-sm" style="background-color:green">Approve</button></a>';
                           // echo $value['status'];
                            $statys = '<label class="label label-info">Pending</label>';
                            if($value['status']!="pending"){
                            $statys = '<label class="label label-success">Approved</label>';
                            $ds='<button class="btn btn-danger btn-sm">Already Approved</button>';                             
                          }
                          if($value['amount']==0){
                            continue;
                          }

                          $ratayo = get_data_id_data("users", "tx_address", $value['walletAddress']);
                          if($ratayo['name']==""){
                            continue;
                          } 
                          $sur = "";
                          if ($value['transactionType']=="Paypal") {
                            $sur = "USD";
                          }else {
                            $sur = $value['transactionType'];
                          }
                          
                          echo '<tr>
                              <td style="text-transform:capitalize"><b>'.$ratayo['name'].' (Id : '.$ratayo['id'].')</b><br/>'.$ratayo['tx_address'].'</td>
                              <td>'.$value['tokenAmount']." ".$sur.'</td>
                              <td><b>'.$value['amount']." ".token_names().'</b></td>
                              <td>'.time_elapsed_string($value['timestamp']/1000).'</td>
                              <td>'.$statys.'</td> 
                              <td>'.$ds.'</li></td>                            
                                                           
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

<?php include 'update_modal.php'; ?>
    
    <!-- Javascripts-->
    <?php// include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>