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
                        <h4 class="page-title">Exchange energy Credits</h4>
                        <ol class="breadcrumb p-0">
                            <li>
                                <a href="#"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                                Exchange energy Credits
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           

            <?php  see_status2($_REQUEST); ?>
            <div class="row">               

                <div class="col-xl-3 col-md-6 col-xs-12">
                    <div class="card-box items">

                       <h4 class="page-title">Exchange energy Credits</h4>
                       <span>You have a ballance of <?php  ?></span>
                       <hr/>
                       <form action="exchange_energy_credits_handle.php" method="POST">

                     <div style="padding: 10px;">

                       <div class="form-group">
                         <label> energy Credits to exchange </label>
                         <input type="number" name="amount" value="000" id="amount" min="0" step="1" class="form-control" placeholder="Enter energy Credits Here">
                       </div>

                        <div class="form-group">
                         <label>Amount of SXT you will get </label>
                         <input type="number" name="sxt_amount" readonly="" value="000" id="sxt_amount" min="0" step=".1" class="form-control" placeholder="Enter Amount Here">
                       </div>
                       
                       
                         <div class="form-group">
                         <label>Enter Transaction Id</label>
                         <input type="text" name="tx_idd" id="tx_idd" value="<?php echo md5(date("U")); ?>" class="form-control" placeholder="Enter Transaction Id Here">
                       </div>


                        <div class="form-group">
                         <button type="submit" class="btn btn-primary" > Exchange energy Credits </button>
                       </div>
                     </div>
                   </form>                      
                   </div>
                </div><!-- end col-->

                <div class="col-xl-2 col-xs-12">
                   <div class="card-box items" style="text-align: center;">
                    <div style="padding: 13px;"></div>
                      <div>Total Sx Token Ballance</div>
                      <h2 style="font-size: 35px;"><?php echo $pdo_auth['balance'];  ?></h2>
                      <hr>

                      <div>Total energy Credits Ballance</div>
                      <h2 style="font-size: 35px;"><?php echo $pdo_auth['energy_credits'];  ?></h2>  
                      <hr>

                      <div>Total Energy Units</div>
                      <h2 style="font-size: 35px;"><?php echo $pdo_auth['energy_credits'];  ?></h2>                      
                   </div>
                </div>
                <div class="col-xl-7 col-xs-12">
                    <div class="card-box items">

                        <h4 class="header-title m-t-0 m-b-20">RECENT energy Credits Exchanges</h4>
                          <table class="table table-striped table-hover">
                            <thead  style="font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 16px;">
                               <tr>
                                 <th>S.No.</th>
                                 <th>Credits</th>
                                 <th>Process</th>
                                 <th>Status</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php 
                              try {
                                    $stmt = $pdo->prepare('SELECT * FROM `energy_credits` WHERE `user_id`="'.$pdo_auth['id'].'" ORDER BY date DESC');
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
                                      <td title=""><b>'.$value['amount'].' CC</b></td>
                                      <td>'.$value['process'].'<br/>
                                      <b style="font-size:10px">Tx: '.$value['user_tx_id'].'</b></td>
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
        </div> 
    </div> 

</div>
<?php require 'includes/footer_start.php' ?>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>


<!-- Page specific js -->
<script src="assets/pages/jquery.dashboard.js"></script>

 <!-- Modal -->
      

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


       $("#amount").keyup(function(){
          var amount = $(this).val();
          amount = amount/20;
          $("#sxt_amount").val(amount);
       });
     });
    </script>
    
<?php require 'includes/footer_end.php' ?>
