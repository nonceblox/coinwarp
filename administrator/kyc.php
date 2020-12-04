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
  <title>View all KYC Requests</title>
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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">KYC </div>Requests</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>          

        <div style="padding: 20px;"></div>
        <?php see_status2($_REQUEST); ?>
         <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#666;">KYC Requests Raised</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example">
                  <thead>
                    <tr style="color:#666">
                      <th>#</th>
                      <th> Name</th>
                      <th>Doc. Type</th>
                      <th>File</th>
                      <th>Date</th>
                      <th>Status</th>
                      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                      try {
                            $stmt = $pdo->prepare('SELECT * FROM `kyc`   ORDER BY date DESC');
                        } catch(PDOException $ex) {
                            echo "An Error occured!"; 
                            print_r($ex->getMessage());
                        }
                        $stmt->execute();
                        $user = $stmt->fetchAll();   
                        $i=1; 
                        foreach($user as $key=>$value){
                            $statys = '<a href="resolved_kyc.php?id='.$value['id'].'"  title="Click to Change Status to Approved"><button style="background-color:#f00" class="btn btn-danger btn-sm">Pending</button></a>';
                            if($value['status']!="Pending"){
                            $statys = '<button class="btn btn-success btn-sm">Verified</button>';
                          }

                          echo '<tr>
                              <td>'.$i.'</td>
                              <td><b>'.$value['username'].'</b><br/>'.$value['email'].'</td>
                              <td>'.$value['document_name'].'</td>
                              <td><a target="_blank" class="btn btn-success btn-sm" href="../kyc_documents/'.$value['file'].'">View Document</a></td>
                              <td>'.$value['date'].'</td>
                              <td>'.$statys.'</td>
                              <td> <a href="delete_kyc.php?id='.$value['id'].'" onclick="return confirm(\' Are you Sure You want to delete this users KYC Document?\');"><button class="btn btn-info btn-sm" title="Delete"><i class="icon-remove-sign"></i></button></a></td>
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
    <?php// include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>