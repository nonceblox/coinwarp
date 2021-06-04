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
                        <h4 class="page-title">KYC</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#" style="text-transform: capitalize;"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                               KYC
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
                      <div style="padding:10px"></div>               
                        <div class="century" style="font-size: 20px;color: #333"> Upload your KYC Documents</div>
                        <div class="century" style="font-size: 13px;color: #222">Know Your Customer-KYC enables <?php echo wallet_names(); ?> to know the clients and their financial dealings for better services and risk management.</div>
                        <div style="padding:20px"></div>
                        <a href="Coinnest_SAFT.pdf" target="_blank" class="btn btn-primary">Download SAFT Document</a> 
                        <div style="padding:20px"></div>
                        <h5>Fill it with correct information and upload below</h5>
                        
                       <center>
                         <form method="POST" action="kyc_handle.php" enctype="multipart/form-data">
                           <div class="form-group">
                              <input type="text" class="form-control" value="<?php echo $pdo_auth['name']; ?>" name="name" placeholder="Enter Your Name">
                           </div>

                            <div class="form-group">
                              <input type="text" class="form-control" required="" name="doc_name" placeholder="Enter Document's Name">
                           </div>
                           

                           <div class="form-group">
                              <input type="text" class="form-control" readonly name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                           </div>
                           

                            <div class="form-group">
                              <input type="text" class="form-control" name="tx_address" readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Enter ETH Address">
                           </div>
                           

                            <div class="form-group">
                              <input type="file" class="form-control" name="file" placeholder="Upload Your Original KYC Document">
                           </div>
                           

                           <button class="btn btn-primary btn-lg" style="width: 100%" type="sumbit" name="submit" >UPLOAD SAFT DOCUMENTS</button>
                         </form>
                       </center>
                       
                   </div>
                </div><!-- end col-->


                <div class="col-xl-4 col-xs-12">
                    <div class="card-box items">
                      <div style="padding: 10px;"></div>
                       <h3 style="color: #333;text-align:left;font-size: 20px">KYC Documents </h3>
                         <table  style="color: #333;" class="table table-striped table-hover">
                          <thead>
                             <tr>
                               <th>S.No.</th>
                               <th>Document</th>
                               <th>Status</th>
                             </tr>
                          </thead>
                          <tbody>
                            <?php 
                            try {
                                  $stmt = $pdo->prepare('SELECT * FROM `kyc` WHERE `user_id`="'.$pdo_auth['id'].'"  ORDER BY date DESC');
                              } catch(PDOException $ex) {
                                  echo "An Error occured!"; 
                                  print_r($ex->getMessage());
                              }
                              $stmt->execute();
                              $user = $stmt->fetchAll();   
                              $i=1; 
                              foreach($user as $key=>$value){
                                  $statys = '<label class="label label-info">Pending</label>';
                                  if($value['status']!="Pending"){
                                  $statys = '<label class="label label-default">Approved</label>';
                                }

                                echo '<tr>
                                    <td>'.$i.'</td>
                                    <td><a target="_blank" href="kyc_documents/'.$value['file'].'" style="color:#555;text-decoration:underline">'.$value['document_name'].'</a></td>
                                    <td>'.$statys.'</td>                              
                                  </tr>';
                                  $i++;
                            }           
                          ?>                    
                        </tbody>
                      </table>
                    </div>
                </div><!-- end col-->

                 <div class="col-xl-4 col-xs-12">
                    <div class="card-box items">
                      <div style="padding: 10px;"></div>
                       <div class="century" style="font-size: 20px;color: #64b0f2"> KYC Documents Rules</div>
                          <div class="century" style="font-size: 15px;color: #848d98">Know Your Customer - KYC enables <?php echo wallet_names(); ?> to know/ understand their customers and their financial dealings, to be able to serve them better and manage its risks prudently.</div>

                          <hr/>
                          <h3 style="color: #64b0f2;font-size:20px;">Purpose : </h3>
                          <ul style="color: #848d98;text-align:left;font-sixe:10px;">
                            <li>Verify the legal status of the legal person/ entity</li>
                            <li>Verify identity of the authorized signatories and</li>
                            <li>Verify identity of the Beneficial owners/ controllers of the account</li></li>
                          </ul>

                          <h3 style="color: #64b0f2;font-size:20px;">What can be used</h3>
                          <ul style="color: #848d98;text-align:left;">
                            <li>SAFT </li>

                          </ul>
                          <div style="padding:20px"></div>
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
