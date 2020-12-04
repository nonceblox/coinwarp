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
  <title>View all Carbon Credit Requests</title>
  </head>
 <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

       <div class="content-wrapper ">
         <div class="page-title" style="padding: 32px;background-color: #333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd"> Carbon Credit </div>Requests</h1>
                
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
              <div class="table-responsive">
                <!--<h3>Buy Requests </h3><hr/>-->
                   <table class="table table-striped table-hover">
                    <thead>
                       <tr style="color:#555">
                         <th>User</th>
                         <th>Credits</th>
                         <th>Process</th>
                         <th>Status</th>
                         <th>Actions</th>
                       </tr>
                    </thead>
                    <tbody>
                     <?php 
                              try {
                                    $stmt = $pdo->prepare('SELECT * FROM `carbon_credits` ORDER BY date DESC');
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
                                      <td>
                                      <a href="delete_carbon_credits.php?id='.$value['id'].'" onclick="return confirm(\'Are You Sure You want to Remove This Entry?\')"><button class="btn btn-info btn-sm">Delete</button></a> 
                                      <a href="approve_carbon_credits.php?id='.$value['id'].'"><button class="btn btn-success btn-sm" style="background-color:green">Approve</button></a></li></td>                           
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