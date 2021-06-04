<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<?php require 'includes/header_end.php'; ?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Buy <?php echo token_names(); ?></h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo wallet_names(); ?></a>
                            </li>
                            <li class="active">
                                Buy Tokens
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-8 col-xs-3">
                    <div class="card-box items">
                       <ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Buy via wire transfer</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="gatar-tabs" data-toggle="tab" href="#gatars" role="tab" aria-controls="gatars" aria-expanded="false">Buy via USDT (Tether)</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="false">Buy via Bitcoin</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="gatar-tab" data-toggle="tab" href="#gatar" role="tab" aria-controls="gatar" aria-expanded="false">Buy via Ethereum</a>
                          </li>

                           

                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab" aria-expanded="true">
                              <div style="padding: 10px;text-align: left;">
                                  <h3 style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 24px;">Buy via wire transfer</h3>
                                  <hr style="opacity: .1" />
                                  <!-- <p style="font-family: 'Didact Gothic', sans-serif;color:#006599;font-size: 16px;"><b>Min. 10,000 USD and Max 50,000,000 USD</b></p> -->
                                  <p style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 16px;font-weight: bold;">Processing Time : 1 to 5 Working Days</p>
                                  <hr style="opacity: .1" />
                                  <table class="table table-hover table-striped">
                                      <thead>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Company </td>
                                              <td style="text-transform: uppercase;"><?php echo wallet_names(); ?></td>
                                          </tr>
                                      </thead>
                                      <tbody style="font-size: 12px;">
                                          <tr>
                                              <td>Company Address</td>
                                              <td>7B, Oye Balogun Street, Freedom Way, Lekki Phase 1,Lagos, Nigeria 100001</td>
                                          </tr>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Bank Address</td>
                                              <td>87B, Oye Balogun Street, Freedom Way, Lekki Phase 1, Lagos, Nigeria 100001</td>
                                          </tr>
                                          <tr>
                                              <td>Bank Name</td>
                                              <td>Community Nigeria Savings Bank</td>
                                          </tr>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Account No. </td>
                                              <td>8310332735989</td>
                                          </tr>
                                          <tr style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 12px;">
                                              <td>Wire routing number </td>
                                              <td>02604573008</td>
                                          </tr>
                                          <tr>
                                              <td>SWIFT Code. </td>
                                              <td>CMFGGHY2234GUS33</td>
                                          </tr>
                                      </tbody>
                                  </table>

                                  <div style="padding: 10px;background-color:#006599;color: #fff;">
                                    <b>Note: Permitted countries of banks to receive USD funds are below. Please contact our support team if your bank doesn’t locate in these countries:</b>
                                    Americas: United States, Canada. Asia: China, Hong Kong, India, Japan, Philippines, Singapore, Taiwan, United Arab Emirates. Oceania: Australia, New Zealand. Europe: 
Austria, Belgium, Bulgaria, Croatia, Czech Republic, Denmark, Estonia, Finland, France, Germany, Gibraltar, Guernsey, Greece, Hungary, Iceland, Ireland, Isle of Man, Italy, Jersey, Latvia, Liechtenstein, Luxembourg, Malta, Netherlands, Norway, Poland, Portugal, Romania, Slovakia, Slovenia, Spain, Sweden, Switzerland, United Kingdom. 

                                  </div>

                                  <hr style="opacity: .1" />
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal22">Deposit Amount</button>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" aria-expanded="false">
                              <div style="color: #444;">
                                <center>
                                  <!-- <img src="img/qr_btc.png" width="200px" /> -->
                                  <br/>
                                  <br/>
                                  <b>Bitcoin Address</b> : 1EWTceugub9LC2vjXsFYbCa1PpUnYKcYJ1K
                                  <br/>
                                  <br/>
                                  <div style="padding: 14px;background-color:#006599;color:#fff;width: 80%">
                                     Please insert your purchase amount and other details by clicking on Transfer BTC. Then transfer your BTC to above address. Once we get your BTC in our wallet, we will recharge your wallet with an equivalent amount of <?php echo token_names(); ?>.
                                  </div>

                                  <hr style="opacity: .1" />
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal224">Transfer BTC</button>
                                </center>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="gatar" role="tabpanel" aria-labelledby="gatar-tab" aria-expanded="false">
                              <div style="text-align: center;color: #333;">
                                  <center>
                                      <!-- <img src="img/qr_eth.png" width="200px" /> -->
                                      <br/>
                                      <br/>
                                      <b>Ethereum Address</b> : 0x9489c2c2524609069d1f394a1730661ea769d4027
                                      <br/>
                                      <br/>
                                      <div style="padding: 14px;background-color:#006599;width: 80%;color: #fff;">
                                          Please insert your purchase amount and other details by clicking on Transfer BTC. Then transfer your Ether to above address. Once we get your Ether in our wallet, we will recharge your wallet with an equivalent amount of <?php echo token_names(); ?>.
                                      </div>

                                      <hr style="opacity: .1" />
                                      <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal223">Transfer ETH</button>

                                  </center>
                              </div>
                          </div>

                          <div class="tab-pane fade" id="gatars" role="tabpanel" aria-labelledby="gatar-tab" aria-expanded="false">
                              <div style="text-align: center;color: #333;">
                                  <center>
                                      <!-- <img src="img/qr_eth.png" width="200px" /> -->
                                      <br/>
                                      <br/>
                                      <b>USDT Address (Transfer network ERC20/Ethereum):</b> : 0xacc7013d075b50e52041244e9fc8615cd27eb5006
                                      <br/>
                                      <br/>
                                      <div style="padding: 14px;background-color:#006599;width: 80%;color: #fff;">
                                          Please insert your purchase amount and other details by clicking on Transfer USDT. Then transfer your USDT to above address. Please select Transfer or Transport network as Ethereum (ERC20) when you withdraw your USDT to this address. Once we get your USDT in our wallet, we will recharge your wallet with an equivalent amount of  <?php echo token_names(); ?>.
                                      </div>

                                      <hr style="opacity: .1" />
                                      <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal2232">Transfer USDT</button>

                                  </center>
                              </div>
                          </div>

                      </div>
                   </div>
                </div><!-- end col-->


                <div class="col-xl-4 col-xs-3">
                    <div class="card-box items" style="min-height: 580px">

                        <h4 class="header-title m-t-0 m-b-20">RECENT <?php echo token_names(); ?> Transactions</h4>
                        <?php 
                            $host=get_blockchain_host();
                            $curl = curl_init();
                              curl_setopt_array($curl, array(
                                CURLOPT_URL => $host."/wallet/user/events?email=".$pdo_auth['email'],
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
                              $response=json_decode($response, true); 
                         ?>
                          <table class="table table-striped table-hover">
                            <thead  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;">
                               <tr>
                                 <th>S.No.</th>
                                 <th>Amount</th>
                                 <th>Tokens</th>
                                 <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php 
                              // try {
                              //       $stmt = $pdo->prepare('SELECT * FROM `buy_token` WHERE `user_id`="'.$pdo_auth['id'].'" ORDER BY date DESC');
                              //   } catch(PDOException $ex) {
                              //       echo "An Error occured!"; 
                              //       print_r($ex->getMessage());
                              //   }
                              //   $stmt->execute();
                              //   $user = $stmt->fetchAll();   
                                $i=1; 
                                foreach($response['data'] as $key=>$value){
                                  
                                  if ($value['event']!=="Deposit Tokens") {
                                   continue;
                                  }
                                  
                                  $statys = '<label class="label label-primary">Pending</label>';
                                  if($value['status']!="pending"){
                                    $statys = '<label class="label label-success">Approved</label>';
                                  }

                                  $rea = $value['transactionType'];
                                  if ($rea =="Paypal") {
                                    $rea = "USD";
                                  }

                                  echo '<tr>
                                      <td>'.$i.'</td>
                                      <td title="'.$value['transactionId'].'">'.round($value['tokenAmount'],2)." ".$rea.'</td>
                                      <td>'.round($value['amount'],2).' '.token_names().'</td>
                                      <td>'.$statys.'</td>                              
                                    </tr>';
                                    $i++;
                              }           
                            ?>                    
                          </tbody>
                     </table>
                    </div>
                </div><!-- end col-->


            </div>
           

        </div> <!-- container -->

    </div> <!-- content -->


</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>


<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>

 <!-- Modal -->
      <div id="myModal22" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <?php    
            $btc = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=1");
            $price_bbt = get_data_id("entrc_price");
            $data = json_decode($btc, TRUE);
            //print_r($price_bbt);
            //print_r($btc);
            $btc = 1/$btc;
            //echo $btc;
            $price_bbt = $price_bbt['price'];
            //echo $price_bbt;

            $no_of_bbt_by_btc = ($btc/$price_bbt);            
        ?>

          <!-- Modal content-->
          <div class="modal-content" style="border-radius: 0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 <?php echo token_names(); ?> = <?php echo round($price_bbt,4); ?> USD</p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="amty" value="000" class="form-control" placeholder="Enter Amount Here">
                 </div>
                 <div class="form-group">
                   <label>Total <?php echo token_names(); ?></label>
                   <input type="text" name="bbt" value="000" id="bbty" class="form-control" placeholder="Enter No. of <?php echo token_names(); ?> to Buy">
                 </div>
                 <input type="hidden" name="currency" value="Paypal">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>


                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>


      <!-- Etherium  -->
       <!-- Modal -->
      <div id="myModal223" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <?php    
            $ether = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD");
           // $ether = json_decode($ether,TRUE);
           // print_r($ether);
            $data = json_decode($ether, TRUE);
            //print_r($data);
            $ether = $data['USD'];
            $price_bbt = $price_bbt;

            $no_of_bbt_by_ether = ($ether/$price_bbt);   

        ?>
          <!-- Modal content-->
          <div class="modal-content" style="border-radius:0px;">  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 Ether = <?php echo  round($no_of_bbt_by_ether,2); ?> <?php echo token_names(); ?></p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="eamty" value="000" class="form-control" placeholder="Enter Ethereum Here">
                 </div>
                 <div class="form-group">
                   <label>Total <?php echo token_names(); ?></label>
                   <input type="text" name="bbt" value="000" id="ebbty" class="form-control" placeholder="Enter No. of <?php echo token_names(); ?> to Buy">
                 </div>
                 <input type="hidden" name="currency" value="ETH">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>



                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>


       <div id="myModal2232" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <?php    
            $ether = file_get_contents("https://api.coincap.io/v2/rates/tether");
           // $ether = json_decode($ether,TRUE);
           // print_r($ether);
            $data = json_decode($ether, TRUE);
            //print_r($data);
            $ether = $data['data']['rateUsd'];
            //echo $ether;
            $price_bbt = get_data_id("entrc_price");
            $price_bbt = $price_bbt['price'];

            $no_of_bbt_by_ethers = ($ether/$price_bbt);   

        ?>
          <!-- Modal content-->
          <div class="modal-content" style="border-radius:0px;">  
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 USDT = <?php echo  round($no_of_bbt_by_ethers,2); ?> <?php echo token_names(); ?></p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="eamtyas" value="000" class="form-control" placeholder="Enter USDT Here">
                 </div>
                 <div class="form-group">
                   <label>Total <?php echo token_names(); ?></label>
                   <input type="text" name="bbt" value="000" id="ebbtys" class="form-control" placeholder="Enter No. of <?php echo token_names(); ?> to Buy">
                 </div>
                 <input type="hidden" name="currency" value="USDT">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idds"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>



                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>

      <!-- Etherium Ends Here -->


       <!-- Modal -->
      <div id="myModal224" class="modal fade" role="dialog">
        <div class="modal-dialog">
           <div class="modal-dialog">
            <?php    
                $btc = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=1");
                $price_bbt = get_data_id("entrc_price");
                $data = json_decode($btc, TRUE);
                //print_r($data);
                $btc = 1/$btc;;
                
                $price_bbt = $price_bbt['price'];
                //echo $price_bbt;

                $no_of_bbt_by_btc = ($btc/$price_bbt);            
            ?>
          <!-- Modal content-->
          <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Please Enter Details</h4>
              <p>1 BTC = <?php echo round($no_of_bbt_by_btc,2); ?> <?php echo token_names(); ?></p>
            </div>
            <div class="modal-body">
             <form action="buy_handle.php" method="POST">
               <div style="padding: 30px;">
                 <div class="form-group">
                   <label>Enter Amount</label>
                   <input type="text" name="amount" id="bamty" value="000" class="form-control" placeholder="Enter Bitcoin Here">
                 </div>
                 <div class="form-group">
                   <label>Total <?php echo token_names(); ?></label>
                   <input type="text" name="bbt" value="000" id="bbbty" class="form-control" placeholder="Enter No. of <?php echo token_names(); ?> to Buy">
                 </div>
                 <input type="hidden" name="currency" value="BTC">

                   <div class="form-group">
                   <label>Enter Transaction Id</label>
                   <input type="text" name="tx_idd" id="tx_idd"  class="form-control" placeholder="Enter Transaction Id Here">
                 </div>


                  <div class="form-group">
                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
                 </div>
               </div>
             </form>
            </div>
           
          </div>

        </div>
      </div>

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

       $("#amty").keyup(function(){
        var price = parseFloat(<?php echo $price_bbt; ?>);
        //alert(price);
        var amt = $("#amty").val(); 
        var bbt = amt/price;
        $("#bbty").val(bbt.toFixed(2));
       });

       $("#bbty").keyup(function(){
        var price = parseFloat(<?php echo $price_bbt; ?>);
        //alert(price);
        var bbt = $("#bbty").val(); 
        var amt = bbt*price;
        $("#amty").val(amt.toFixed(2));
       });


       // ether Starts Here
        $("#eamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var amt = $("#eamty").val(); 
          var bbt = price*amt;
          $("#ebbty").val(bbt.toFixed(2));
         });

         $("#ebbty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ether; ?>);
          //alert(price);
          var bbt = $("#ebbty").val(); 
          var amt = bbt/price;
          $("#eamty").val(amt.toFixed(2));
         });
       //Ether Ends Here

       // Bitcoin Starts Here
        $("#bamty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var amt = $("#bamty").val(); 
          var bbt = amt*price;
          $("#bbbty").val(bbt.toFixed(2));
         });

         $("#bbbty").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_btc; ?>);
          //alert(price);
          var bbt = $("#bbbty").val(); 
          var amt = bbt/price;
          $("#bamty").val(amt.toFixed(2));
         });
       //Bitcoin Ends Here
        

        // Tether Starts Here
        $("#eamtyas").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ethers; ?>);
          //alert(price);
          var amt = $("#eamtyas").val(); 
          var bbt = price*amt;
          $("#ebbtys").val(bbt.toFixed(2));
         });

         $("#ebbtys").keyup(function(){
          var price = parseFloat(<?php echo $no_of_bbt_by_ethers; ?>);
          //alert(price);
          var bbt = $("#ebbtys").val(); 
          var amt = bbt/price;
          $("#eamtys").val(amt.toFixed(2));
         });
       //Tether Ends Here
      });
    </script>
<?php require 'includes/footer_end.php' ?>
