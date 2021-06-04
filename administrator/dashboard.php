<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';

?><!DOCTYPE html>
<html>
<head>
    <?php include 'head.php'; ?>
    <title><?php include 'title.php'; ?></title>   
    
  </head>
<body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

      <div class="content-wrapper " style="">
         <div class="page-title" style="padding: 32px;background-color: #333333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #999"><?php echo wallet_names(); ?> Admin </div><span style="font-size: 14px;">Sale Dashboard</span></h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>

        
        <?php see_status2($_REQUEST); ?>
        <?php include 'dashboard_stats.php'; ?>          
        <!-- <?php include 'dashboard_chart.php'; ?> -->
        
        <div class="row">
         
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#666;">Whitelisted Users</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped" id="example">
                  <thead>
                    <tr style="color:#ddd">
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Wallet Address</th>
                      <th>File </th>
                      <th>Wallet Balance </th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `users` ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {

                         $statys = '<a href="approve_user.php?id='.$value['id'].'"  title="Click to Change Status to Approved"><button style="background-color:#f00" class="btn btn-danger btn-sm">Not Verified</button></a>';
                            if($value['verified']!="No"){
                            $statys = '<button class="btn btn-success btn-sm">Verified</button>';
                          }

                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td><b>'.$value['name'].'</b></td>
                                <td>'.$value['email'].'</td>
                                 <td>'.$value['tx_address'].'</td>
                                 <td><img src="../profile/'.$value['file'].'" style="width:30px;" /></td>
                                 <td>'. number_format((float)getWalletBalance($value['tx_address']),2)." ".token_names().'</td>
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
      
     <?php include 'footer.php'; ?>
      
      
      </div>
    </div>
    <div id="gora" ></div>
    


<?php include 'update_modal.php'; ?>
    

    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );


          $('#example23').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );


          $("#mota").click(function(){
            //alert("hello");
            $("#gora").load("change_notif_status.php");
          });

      } );
    </script>    
  </body>


</html>