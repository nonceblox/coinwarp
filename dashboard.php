<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">

<?php require 'includes/header_end.php'; ?>
<script src="assets/js/jquery.min.js"></script>

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
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0">                           
                            <li> <a href="#"><?php echo $pdo_auth['name']; ?></a> </li>
                            <li class="active">  Dashboard  </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           
            <?php  see_status2($_REQUEST); ?>

            
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12">
                  <div class="row">
                            <div class="col-xs-12 col-md-12">
                             <a href="transfer.php">   <div class="card-box tilebox-one">
                                    <i class="icon-layers pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">Wallet Balance</h6>
                                    <h2 class="m-b-20" data-plugin="counterup" style="color:#333;"><?php echo round( getWalletBalance($pdo_auth['tx_address']),2);   ?></h2>
                                    <span class="label label-success"> <?php echo $pdo_auth['name']; ?> </span> <span class="text-muted">No Recent Records</span>
                                </div>
                              </a>
                            </div>

                           

                            <div class="col-xs-12 col-md-12">
                                <a href="buy.php">
                                  <div class="card-box tilebox-one">
                                      <i class="icon-rocket pull-xs-right text-muted"></i>
                                      <h6 class="text-muted text-uppercase m-b-20" >Buy Requests</h6>                                         
                                      <h2 class="m-b-20" data-plugin="counterup" style="color:#333;"><?php echo exist("buy_token", "user_id", $pdo_auth['id']);  ?></h2>
                                      <span class="label label-warning"> All Time </span> <span class="text-muted">No Recent Records</span>
                                  </div>
                                </a>
                            </div>

                            <div class="col-xs-12 col-md-12">
                                <a href="sent_tokens.php">
                                  <div class="card-box tilebox-one">
                                      <i class="icon-rocket pull-xs-right text-muted"></i>
                                      <h6 class="text-muted text-uppercase m-b-20"> Token Transferred</h6>                                         
                                      <h2 class="m-b-20" data-plugin="counterup" style="color:#333;"><?php 
                                      try {
                                            $stmt = $pdo->prepare('SELECT SUM(`token`) as summa FROM `sell_requests` WHERE `from_address`="'.$pdo_auth['tx_address'].'"');
                                           // echo 'SELECT SUM(`'.$col.'`) as summa FROM `'.$table.'`';
                                        } catch(PDOException $ex) {
                                            echo "An Error occured!"; 
                                            print_r($ex->getMessage());
                                        }
                                        $stmt->execute();
                                        $user = $stmt->fetch();
                                      echo round( $user['summa'],2);  ?></h2>
                                      <span class="label label-warning"> All Time </span> <span class="text-muted">No Recent Records</span>
                                  </div>
                                </a>
                            </div>
                        </div>
                </div><!-- end col-->

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="card-box items" style="height:500px;">
                    <div style="padding: 20px"></div>
                         <center> <img src="profile/<?php echo $pdo_auth['file']; ?>" style="width: 150px;;border-radius: 50%;filter:grayscale(1);">

                         <div style="padding:7px;"></div>
                          <div class="century" style="font-weight: bold;font-size: 24px;color: #333;text-transform: uppercase;"><?php echo $pdo_auth['name']; ?></div>
                          <div><?php echo wallet_names(); ?> Wallet Holder</div>
                          
                          <hr style="width: 60%;opacity: .1" />
                           <a href="" class="btn btn-primary btn-sm btn-info" data-toggle="modal" data-target="#myModal" data-step="3" data-intro="You can Update Profile Here" data-position='right'  >Update Profile</a>
                          <a href="change_photo.php"><button class="btn btn-sm btn-primary"  data-step="1" data-intro="Here You can Change Your Profile Photo " >Update Photo</button></a>

                         
                          <div style="padding:3px;"></div>
                          <div style="font-size:12px;color: #444;">Last Visited on <?php echo date("D-m-y : H:i:s"); ?></div>
                          <hr style="opacity: .1" />
                           
                          <b class="century" style="color: #333">Account Address : </b>
                          <div style="color: #999;word-wrap:break-word;width:170px"><?php echo $pdo_auth['tx_address']; ?></div>
                          <div style="padding:8px;"></div>                            
                        </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="card-box items" style="height: 500px" >
                        <h4 class="header-title m-t-0 m-b-20">Frequently Asked Questions</h4> <hr/>
                        <div style="padding: 10px;"></div>

                        <div class="panel-group" id="accordion">
                  			  <div class="panel panel-default">
                  			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
                  			      <h4 class="panel-title" style="font-size:18px">
                  			        <a data-toggle="collapse" data-parent="#accordion" style="color:#333" href="#collapse1">
                  			        Question 1 : What do I need to create a Blockchain Wallet?</a>
                  			      </h4>
                  			    </div>
                  			    <div id="collapse1" class="panel-collapse collapse in" style="padding:10px;">
                  			      <div class="panel-body">Creating a free Blockchain Wallet is quick and easy. All you need is a valid email address and a secure password.</div>
                  			    </div>
                  			  </div>
                  			  <div class="panel panel-default">
                  			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
                  			      <h4 class="panel-title" style="font-size:18px">
                  			        <a data-toggle="collapse" data-parent="#accordion" style="color:#333" href="#collapse2">
                  			         Question2 : What is an address?</a>
                  			      </h4>
                  			    </div>
                  			    <div id="collapse2" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
                  			      <div class="panel-body">Addresses are strings of letters and numbers, that are used to send you funds. For increased privacy, a new bitcoin address is generated for every transaction. Find the address for your next transaction by clicking Request in your wallet.</div>
                  			    </div>
                  			  </div>
                  			  
                  			  <div class="panel panel-default">
                  			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
                  			      <h4 class="panel-title" style="font-size:18px">
                  			        <a data-toggle="collapse" data-parent="#accordion" style="color:#333" href="#collapse4">
                  			         Question3 : Are there fees?</a>
                  			      </h4>
                  			    </div>
                  			    <div id="collapse4" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
                  			      <div class="panel-body">Yes. Transaction fees cover the mining network fees and the Blockchain infrastructure necessary to ensure fast and reliable transaction confirmation times. Miners prioritize transactions based on fees, so the higher the fee, the greater chance your transaction has of being completed quickly. A fee that’s too low runs the risk of never being confirmed. </div>
                  			    </div>
                  			  </div>
                  			  
                  			  
                  			  <div class="panel panel-default">
                  			    <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
                  			      <h4 class="panel-title" style="font-size:18px" >
                  			        <a data-toggle="collapse" data-parent="#accordion" style="color:#333" href="#collapse3">
                  			         Question 4:   What happens if my transaction is not completed?</a>
                  			      </h4>
                  			    </div>
                  			    <div id="collapse3" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
                  			      <div class="panel-body">If your transaction is rejected, the funds will remain in the sender’s wallet.</div>
                  			    </div>
                  			  </div>

                           <div class="panel panel-default">
                            <div class="panel-heading" style="padding:10px;border:solid 1px #eee;">
                              <h4 class="panel-title" style="font-size:18px" >
                                <a data-toggle="collapse" data-parent="#accordion" style="color:#333" href="#collapse6">
                                 How can I keep my wallet secure?</a>
                              </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse" style="padding:10px;border:solid 1px #eee;">
                              <div class="panel-body">When you create a Blockchain wallet, we recommend you use strong Password which could not be guessed.</div>
                            </div>
                          </div>
                			</div>

                    </div>
                </div><!-- end col-->


            </div>
          

            <div class="row">
                <div class="col-xs-12 col-lg-12 col-xl-12">
                   
                        <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-20">Blockchain Transactions</h4>

                                <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr style="color:#ddd">
                      <th>#</th>
                      <th> Name</th>
                      <th>Email</th>
                      <th>Wallet Address</th>
                      <th>File </th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email`="'.$pdo_auth['email'].'" ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetch();
                      $value = $user;
                      $i=1;
                      echo ' <tr>
                                <td>'.$i.'</td>
                                <td><b>'.$value['name'].'</b></td>
                                <td>'.$value['email'].'</td>
                                 <td>'.$value['tx_address'].'</td>
                                 <td><img src="profile/'.$value['file'].'" style="width:30px;" /></td>
                                 <td>'.getWalletBalance($value['tx_address'])." ".token_names().'</td>
                              </tr>';
                     ?>
                    
                  </tbody>
                </table>
                            
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->


</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>


<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>


<?php require 'includes/footer_end.php' ?>
