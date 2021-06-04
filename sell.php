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
                        <h4 class="page-title">Send <?php echo token_names(); ?></h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo wallet_names(); ?></a>
                            </li>
                            <li class="active">
                                Send Tokens
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
                       <div class="century" style="font-size: 24px;color: #333">Send <?php echo token_names();  ?> </div>
                          
                          <hr style="opacity: 1" />
                          <div style="padding: 10px;"></div>
                          
                          
                       
                           <form method="POST" action="send_handle.php">
                              <div class="form-group" >
                                <label>Recipient’s <?php echo token_names();  ?> address (To)   Address</label>
                                <input type="text" class="form-control" name="to_address"  placeholder="Enter <?php echo token_names();  ?>  address">
                             </div>
                            
                             <div class="form-group" >
                                <label>Your <?php echo token_names();  ?> Address (From)</label>
                                <input type="text" class="form-control" name="tx_addresss"  readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Your <?php echo token_names();  ?> Address (From)">
                             </div>
                            
                             <div class="form-group" >
                                <label>Amount of <?php echo token_names();  ?> to be sent <span  style="color: cream;">(You have : <?php echo round( getWalletBalance($pdo_auth['tx_address']),2);   ?> <?php echo token_names();  ?>)</span></label><br/>
                                <input type="number" min="0" class="form-control"  step=".0001" name="token_no" max="<?php echo $maya['balance']; ?>"  placeholder="Enter <?php echo token_names();  ?> amount">
                             </div>
                             <div style="padding:5px;"></div>

                             <input type="hidden" name="balance" value="<?php echo $pdo_auth['balance']; ?>">
                             
                            <div style="padding:5px;"></div>

                             <button class="btn btn-primary btn-lg" style="width: 100%" >SEND <?php echo token_names();  ?></button>
                           </form>
                           <!-- <div style="color: #999;"><?php echo token_names();  ?> Fee : Fee: 0.5% of the total amount or 0.5 <?php echo token_names();  ?> </div> -->
                        

                         <div style="padding:20px;"></div>                     
                   </div>
                </div><!-- end col-->


                <div class="col-xl-6 col-xs-12">
                    <div class="card-box items">
                        <!-- <h4 class="header-title m-t-0 m-b-20">Amount of <?php echo token_names();  ?> to be sent </h4> -->
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:red;font-size: 20px;">Caution! </h3>                         
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
