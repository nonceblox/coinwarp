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
                        <h4 class="page-title">Send Carbon Credits</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                                Send Carbon Credits
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
                       <div class="century" style="font-size: 24px;color: #333">Send SX Token to another SX Token address</div>
                          <div class="century" style="font-size: 15px;color: #666">You can now Send  <b style="color: #ddd">SX Token</b> From Below.</div>
                          <hr style="opacity: 1" />
                          <div style="padding: 10px;"></div>
                          
                          
                       
                           <form method="POST" action="send_carbon_credits_handle.php">
                              <div class="form-group" >
                                <label>Enter SX Token Address</label>
                                <input type="text" class="form-control" name="to_address"  placeholder="Enter SX Token Address address">
                             </div>
                            
                             <div class="form-group" >
                                <label>Your SX Token Address</label>
                                <input type="text" class="form-control" name="tx_addresss"  readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Your Carbon Credits Address">
                             </div>
                            
                             <div class="form-group" >
                                <label>No. of Carbon Credits To Send <span  style="color: cream;">(You have : <?php echo $pdo_auth['carbon_credits']; ?> Carbon Credits)</span></label><br/>
                                <input type="number" min="0" class="form-control"  step=".0001" name="token_no" max="<?php echo $maya['carbon_credits']; ?>"  placeholder="Enter No. of SX Token to Send">
                             </div>
                             <div style="padding:5px;"></div>

                             <input type="hidden" name="balance" value="<?php echo $pdo_auth['carbon_credits']; ?>">
                             
                            <div style="padding:5px;"></div>

                             <button class="btn btn-primary btn-lg" style="width: 100%" >SEND Carbon Credits</button>
                           </form>
                           <!-- <div style="color: #999;">SX Token Fee : Fee: 0.5% of the total amount or 0.5 SX Token </div> -->
                        

                         <div style="padding:20px;"></div>                     
                   </div>
                </div><!-- end col-->


                <div class="col-xl-8 col-xs-12">
                    <div class="card-box items">
                        <h4 class="header-title m-t-0 m-b-20">How Carbon Credit Trading Works</h4>
                         <h3  style="font-family: 'Didact Gothic', sans-serif;font-weight:bold;color:#3445bf;font-size: 20px;">Caution! </h3>
                         <h4  style="font-family: 'Didact Gothic', sans-serif;color: #777;font-size: 16px;">Please use the following while logging in to SX Token account:</h4>
                         <hr/>
                         <p>A reduction in emissions entitles the entity to a credit in the form of a Certified Emission Reduction (CER) certificate. The CER is tradable and its holder can transfer it to an entity which needs Carbon Credits to overcome an unfavourable position on carbon credits.  Carbon trading, sometimes called emissions trading, is a market-based tool to limit GHG. The carbon market trades emissions under cap-and-trade schemes or with credits that pay for or offset GHG reductions.<br/><br/>

                        Cap-and-trade schemes are the most popular way to regulate carbon dioxide (CO2) and other emissions. The scheme's governing body begins by setting a cap on allowable emissions. It then distributes or auctions off emissions allowances that total the cap. Member firms that do not have enough allowances to cover their emissions must either make reductions or buy another firm's spare credits. Members with extra allowances can sell them or bank them for future use. Cap-and-trade schemes can be either mandatory or voluntary.<br/><br/>

                        A successful cap-and-trade scheme relies on a strict but feasible cap that decreases emissions over time. If the cap is set too high, an excess of emissions will enter the atmosphere and the scheme will have no effect on the environment. A high cap can also drive down the value of allowances, causing losses in firms that have reduced their emissions and banked credits. If the cap is set too low, allowances are scarce and overpriced. Some cap and trade schemes have safety valves to keep the value of allowances within a certain range. If the price of allowances gets too high, the scheme's governing body will release additional credits to stabilize the price. The price of allowances is usually a function of supply and demand.<br/><br/>

                        Credits are similar to carbon offsets except that they're often used in conjun­ction with cap-and-trade schemes. Firms that wish to reduce below target may fund preapproved emissions reduction projects at other sites or even in other countries.</p>
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
