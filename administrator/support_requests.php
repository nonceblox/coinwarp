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
  <title>View all Support Requests</title>
  </head>
 <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper" style="min-height: 100vh">
      <!-- Navbar-->
      <?php include 'navbar.php'; ?>

      <div class="content-wrapper " style="">
         <div class="page-title" style="padding: 32px;background-color: #333;box-shadow: 0px 2px 10px rgba(0,0,0,.2);">
          <div class="row" style="width: 100%;margin-left:0px;">
           <div class="col-sm-3 lft">
            <div style="padding: 20px;" class="mobss"></div>
              <div class="lft_pad">
                <div style="padding: 10px;"></div>
                <h1 style="font-family: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #ddd">Support </div>Requests</h1>
                
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
              <h3 style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;color:#555;">Support Requests Raised</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped  dataTable no-footer" id="example">
                  <thead>
                    <tr style="color:#555;">
                      <th>#</th>
                      <th> Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                      try {
                            $stmt = $pdo->prepare('SELECT * FROM `support`   ORDER BY date DESC');
                        } catch(PDOException $ex) {
                            echo "An Error occured!"; 
                            print_r($ex->getMessage());
                        }
                        $stmt->execute();
                        $user = $stmt->fetchAll();   
                        $i=1; 
                        foreach($user as $key=>$value){
                            $statys = '<a href="resolved.php?id='.$value['id'].'" title="Click to Change Status to Resolved"><button class="btn btn-info btn-sm">Pending</button></a>';
                            if($value['status']!="Pending"){
                            $statys = '<button class="btn btn-success btn-sm" style="background-color:green">Resolved</button>';
                          }

                          echo '<tr>
                              <td>'.$i.'</td>
                              <td>'.$value['name'].'<br/>'.$value['email'].'</td>
                              <td><b>'.$value['question'].'</b><br/>'.$value['description'].'<br/> <span style="color:green">Ans : '.$value['ans'].'</span><br/>'.$value['date'].'</td>
                              <td>'.$statys.'</td>
                              <td> <a href="delete_support.php?id='.$value['id'].'" onclick="return confirm(\'Are You Sure You Want To Delete This???\');"><button class="btn btn-info btn-sm" title="Delete"><i class="icon-remove-sign"></i></button></a> <button class="btn btn-success btn-sm" title="Answer" data-toggle="modal" data-target="#myModal221" data-id="'.$value['id'].'"><i class="icon-home" ></i></button></td>
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

    
<?php include 'update_modal.php'; ?>
    <!-- Modal -->
    <div id="myModal221" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" >
          <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="color: #03a9f4">Support Answer</h4>            
          </div>
          <div class="modal-body">
            <form action="answer_handle.php" method="POST">
              <div style="padding: 10px;" id="loppi">
                
              </div>
            </form>
          </div>          
        </div>

      </div>
    </div>
    
    <!-- Javascripts-->
    <?php// include 'modal.php'; ?>
    <?php include 'scripts.php'; ?> 
    
<?php include 'update_modal.php'; ?>   
    <script type="text/javascript">
    $(document).ready(function(){
      $('#myModal221').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var recipient = button.data('id');
       $("#loppi").load("info.php", {support_id:recipient});
      });
    });;
  </script>
 
  </body>
</html>