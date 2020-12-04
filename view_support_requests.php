<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
     $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <title>Reporting : ENTRC Stock Exchange</title>   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
  </head>
  <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include 'header.php'; ?>
      <!-- Side-Nav-->
      <?php include 'sidebar.php'; ?>
      <div class="content-wrapper">
        <div class="page-title" style="padding: 32px">
          <div class="row" style="width: 100%;margin-left:0px">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding:10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 30px;font-weight: normal;">Support Requests</h1>                
              </div>
           </div>
           <div class="col-sm-6"></div>
           <div class="col-sm-3 rgt">
              <div class="rgt_pad">
                  <?php include 'price_panel.php'; ?>
              </div>
           </div>
          </div>
        </div>

      

        
           <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#800">Support Requests</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> User</th>
                      <th>Question</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Status</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try {
                            $stmt = $pdo->prepare('SELECT * FROM `support` WHERE `user_id`="'.$pdo_auth['id'].'"  ORDER BY date DESC');
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
                            $statys = '<label class="label label-success">Resolved</label>';
                          }

                          echo '<tr>
                              <td>'.$i.'</td>
                              <td>'.$value['name'].'<br/>'.$value['email'].'</td>
                              <td>'.$value['question'].'</td>
                              <td>'.$value['description'].'</td>
                              <td>'.$value['date'].'</td>
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
        <div style="padding-left:30px;">
           <?php include 'footer.php'; ?>
        </div>        
      </div>
    </div>
    
    <div style="padding: 30px;"></div>
     <?php include 'user_update_modal.php'; ?>

<?php include 'script.php'; ?>
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
      } );
    </script>
  </body>
</html>