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
                        <h4 class="page-title">Send energy Credits</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                                Send energy Credits
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-4 col-xs-12">
                    <div class="card-box items">
                       <div class="century" style="font-size: 20px;color: #333">Send SX Token (energy) to another SX Token address</div>
                          <div class="century" style="font-size: 15px;color: #666">You can now Send  <b style="color: #ddd">SX Token</b> From Below.</div>
                          <hr style="opacity: 1" />
                          <div style="padding: 10px;"></div>
                          
                          
                       
                           <form method="POST" action="send_energy_credits_handle.php">
                              <div class="form-group" >
                                <label>Enter Beneficiary Address</label>
                                <input type="text" class="form-control" name="to_address" id="to_address"  placeholder="Enter SX Token Address address">
                                <div id="kanam"></div>
                             </div>
                            
                             <div class="form-group" >
                                <label>Your Address</label>
                                <input type="text" class="form-control" name="tx_addresss"  readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Your energy Credits Address">
                             </div>
                            
                             <div class="form-group" >
                                <label>No. of energy Credits To Send <span  style="color: cream;">(You have : <?php echo $pdo_auth['energy_credits']; ?> energy Credits)</span></label><br/>
                                <input type="number" min="0" class="form-control"  step=".0001" name="token_no" max="<?php echo $maya['energy_credits']; ?>"  placeholder="Enter No. of SX Token to Send">
                             </div>
                             <div style="padding:5px;"></div>

                             <input type="hidden" name="balance" value="<?php echo $pdo_auth['energy_credits']; ?>">
                             
                            <div style="padding:5px;"></div>

                             <button class="btn btn-primary btn-lg" style="width: 100%" >SEND energy Credits</button>
                           </form>
                           <!-- <div style="color: #999;">SX Token Fee : Fee: 0.5% of the total amount or 0.5 SX Token </div> -->
                        

                         <div style="padding:20px;"></div>                     
                   </div>
                </div><!-- end col-->


                <div class="col-xl-8 col-xs-12">
                    <div class="card-box items">
                        <h4 class="header-title m-t-0 m-b-20">How energy Credit Trading Works</h4>
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:#3445bf;font-size: 20px;">Caution! </h3>
                         <h4  style="font-family: 'Didact Gothic', sans-serif;color: #777;font-size: 16px;">Please use the following while logging in to SX Token account:</h4>
                         <hr/>
                         <p>Wholesale electricity and natural gas are traded as commodities, much like corn or copper and other minerals. Commodity markets are frequently volatile, meaning that, unlike B.C., where BC Hydro’s retail prices are regulated and set by a tariff, the price of energy bought and sold in the wholesale marketplace can change often, and at times dramatically.<br/><br/>

                          Wholesale energy prices are set by the basic market forces of supply and demand.  In North America, the price of energy is typically higher during the cold winter months, with an increased need for heating, and again during the warmer summer months when the use of air conditioning increases in warmer climates. Daily price fluctuations also exist. Demand and prices generally increase during working hours (“peak” hours) and drop overnight when activity is low (“off-peak” hours).<br/><br/>

                          To move energy across markets, traders and marketers must purchase transmission and gas transportation rights/space from transmission providers and pipeline owners respectively. In B.C., for the movement of electricity, this means purchases of transmission space from  BC Hydro Transmission which operates BC Hydro’s high-voltage transmission system.  Such transmission space becomes available from time to time when BC Hydro doesn’t require it to meet the needs of its customers.<br/><br/>

                        As a participant in these energy markets, Powerex buys and sells physical electricity and natural gas at market-based rates with a wide variety of energy suppliers and buyers across North America. We also hold transmission and gas transportation space to get the energy from where it is produced to our customers.</p>
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

       $("#to_address").keyup(function(){
        var data = $(this).val();
          $("#kanam").load("load_names.php", {"data":data});
       });
     });
    </script>
<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>    
<?php require 'includes/footer_end.php' ?>
