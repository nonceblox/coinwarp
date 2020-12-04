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
                        <h4 class="page-title">Request Carbon Credits</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                                Request Carbon Credits
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
                       <form action="buy_carbon_credits_handle.php" method="POST">
			               <div style="padding: 30px;">
			                 <div class="form-group">
			                   <label>Enter Required Carbon Credits </label>
			                   <input type="number" name="amount"  value="000" min="0" class="form-control" placeholder="Enter Amount Here">
			                 </div>
			                 
			                 
			                   <div class="form-group">
			                   <label>Enter Transaction Id</label>
			                   <input type="text" name="tx_idd" id="tx_idd" value="<?php echo md5(date("U")); ?>" class="form-control" placeholder="Enter Transaction Id Here">
			                 </div>


			                  <div class="form-group">
			                   <button type="submit" class="btn btn-primary" >Request Buy Token </button>
			                 </div>
			               </div>
			             </form>                    	
                   </div>
                </div><!-- end col-->


                <div class="col-xl-8 col-xs-12">
                    <div class="card-box items">

                        <h4 class="header-title m-t-0 m-b-20">RECENT Carbon Credits Transactions</h4>
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
                                    $stmt = $pdo->prepare('SELECT * FROM `carbon_credits` WHERE `user_id`="'.$pdo_auth['id'].'" ORDER BY date DESC');
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
     });
    </script>
    
<?php require 'includes/footer_end.php' ?>
