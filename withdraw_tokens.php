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
                        <h4 class="page-title">Withdraw <?php echo token_names(); ?></h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo wallet_names(); ?></a>
                            </li>
                            <li class="active">
                                Withdraw Tokens
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                      <div style="padding: 10px;"></div>
                        <div class="century" style="font-size: 24px;color: #444">WITHDRAW/SELL <?php echo token_names(); ?> TOKENS</div>
                        <div class="century" style="font-size: 12px;color: #444">You can withdraw tokens from <?php echo wallet_names(); ?> anytime.</div>
                        <hr style="opacity: 1" />
                      
                        
                       <center>
                         <form method="POST" action="withdraw_handle.php">
                           <div class="form-group" style="text-align: left;color: #444;">
                            <label>Wallet Balance</label><br/>

                              <input type="number" min="0" class="form-control" value="<?php echo round( getWalletBalance($pdo_auth['tx_address']),2); ?>" disabled  placeholder="Your Wallet Ballance">
                           </div>
                           

                           <div class="form-group" style="text-align: left;color: #444;">
                            <label>Tokens to Withdraw</label><br/>
                              <input type="text" class="form-control"  name="token_no"  placeholder="Token to Withdraw">
                           </div>
                          
                          
                           <div class="form-group" style="text-align: left;color: #444;">
                             <label>Withdraw Wallet Address</label><br/>
                              <input type="text" class="form-control"  name="withdraw_wallet_address"  placeholder="Withdraw Wallet Address">
                              <div style="font-size: 11px;color: cream;padding-top:20px;">Make sure you enter correct Withdraw address. Once transferred tokens cannot be recovered. Please make sure you are entering correct token address to withdraw.</div>
                           </div>
                          

                           <button class="btn btn-primary btn-lg" style="width: 100%">WITHDRAW TOKENS</button>
                         </form>
                         <div style="padding: 10px;"></div>
                         <!-- <div style="color: #444;">*<?php echo token_names(); ?> Fee : Fee: 0.5% of the total amount or 0.5 <?php echo token_names(); ?> </div> -->
                       </center>

                       <div style="padding:10px;"></div>
                    
                   </div>
                </div><!-- end col-->


                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                        <!-- <h4 class="header-title m-t-0 m-b-20">Amount of <?php echo token_names();  ?> to be sent </h4> -->
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:#004c65;font-size: 20px;">Caution! </h3>                         
                         <hr/>
                         <ul style="font-family: 'Didact Gothic', sans-serif;color: #444;font-size: 16px;">
                            <li style="padding: 4px;"> Ensure that your <?php echo token_names(); ?> address ID (From) and the Recipient’s <?php echo token_names(); ?> address (To) are correct.</li>
                            <li style="padding: 4px;">   Do not send <?php echo token_names(); ?> tokens to BTC, ETH or other crypto currency addresses. <?php echo token_names(); ?> tokens sent to other crypto currency addresses except <?php echo token_names(); ?> addresses will be lost.  </li>
                            <li style="padding: 4px;"> Ensure that there are no white spaces in both <?php echo token_names(); ?> addresses.</li>
                            <li style="padding: 4px;"> Ensure that there are no white spaces while you enter the dynamic access code. </li>                            
                            <li style="padding: 4px;">   In case of other issues and questions, please contact <?php echo token_names(); ?> support via Support page or e-mail to info@<?php echo wallet_names(); ?>.io </li>                            
                         </ul>
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
<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>    
<?php require 'includes/footer_end.php' ?>
