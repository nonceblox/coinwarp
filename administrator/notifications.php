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
  <title>View all Notifications</title>
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
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">All  </div>Notifications</h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          
          </div>
        </div>  

        <div style="padding: 20px;"></div>
        <?php see_status($_REQUEST); ?>
         <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#555;">All Notifications</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example">
                  <thead>
                    <tr style="Color:#666;">
                      <th>#</th>
                      <th>Notification</th>
                      <th>For</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `notification`  ORDER BY date DESC LIMIT 100');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                        $for = '<label class="label label-primary">User</label>';
                        if($value['for']!="user"){
                          $for = '<label class="label label-success">Administrator</label>';
                        }
                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td>'.$value['notification'].'<br/><span style="color:#888;font-size:10px">'.$value['date'].'</span></td>
                                <td>'.$for.'</td>                                 
                                <td>
                                  <a href="delete_notification.php?id='.$value['id'].'"><button class="btn btn-danger btn-sm" title="Delete"><i class="icon-remove-sign"></i></button></a>
                                </td>
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
    </div><?php include 'update_modal.php'; ?>
    
    <!-- Javascripts-->
    <?php //include 'modal.php'; ?>
    <?php include 'scripts.php'; ?>    
  </body>
</html>