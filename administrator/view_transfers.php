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

       <div class="content-wrapper " style="">
         <div class="page-title" style="padding: 32px;background-color: #333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">View Transfers</div></h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>
           
           
       <?php   ?>

        <div style="padding: 20px;"></div>        
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;Color:#555">
               View Transfers </h3>
               
              <hr/>
              <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"  width="100%" style="color: #333">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Direction </th> 
                        <th>Amount</th>
                        <th>To Froms</th>
                        <th>Token Amount</th>
                                          
                      </tr>
                    </thead>
                    <?php//  echo $pdo_auth['email'];  ?>
                    <tbody>

                   <?php 
                   $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => get_blockchain_host()."/wallet/admin/allTransactions",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                    ));

                    $response = curl_exec($curl);

                    $response=json_decode($response, true); 
                    curl_close($curl);
                    //print_r($response);
                    $i=1;
                    foreach ($response['data'] as $key => $value) {
                        if($value['event']=="Deposit Tokens"){
                            $statys = '<label class="label label-info" style="color:#fff">'.$value['event'].'</label>';
                        }else if($value['event']=="Withdraw Tokens"){
                            $statys = '<label class="label label-success" style="color:#fff">'.$value['event'].'</label>';
                        }else{
                            $statys = '<label class="label label-danger" style="color:#fff">'.$value['event'].'</label>';
                        }
                        
                        $amount = "";
                        $tx = "";
                        $to_froms = "";
                        if ($value['event']=="Deposit Tokens") {
                            $amount = $value['tokenAmount'];
                            $to_froms = 'To : '.$pdo_auth['tx_address'].'<br/> From : Administrator <br/><label class="label label-success">Tx  Id : '.$value['transactionId'].'</label>';
                        }
                        else{
                            $amount = $value['amount'];
                            $to_froms = '<b>To : </b>'.$value['to'].'<br/> <b>from : </b> '.$value['from'].'<br/><label class="label label-success">'.$value['transactionHash'].'</label> ';
                        }

                        if ($value['event']=="Deposit Tokens") {
                          continue;
                        }
                           
                          echo ' <tr>
                                  <td>'.$i.'</td>
                                  <td>'.$statys.' <br/> <span style="font-size:12px;color:#999">'.time_elapsed_string($value['timestamp']/1000).'</span></td>   
                                   <td><label class="">'.round($amount,2).' '.token_names().'</label></td>
                                   <td>'.$to_froms.'</td>
                                  <td><label class="label label-info" style="color:#fff">'.$value['status'].'</label></td>
                                                                                             
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

    <?php include 'add_modal.php';  ?>
    <?php include 'update_modal.php';  ?>

    <?php include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>