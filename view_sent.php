<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Withdraw EnterCoin : A New ICO</title>
    <?php include 'head.php';  ?>
     <style type="text/css">
      button.dt-button, div.dt-button, a.dt-button{background-color: #103f8e;background-image: none;border-color: transparent;color: #fff;opacity: .5}
      button.dt-button:hover, div.dt-button, a.dt-button{background-color: #103f8e;background-image: none;border-color: transparent;color: #fff;opacity: .5}
      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{color: #fff;}
      .table-striped>tbody>tr:nth-of-type(odd){
        background-color: transparent;
        color: #fff;
        opacity: .5
      }

      .table-striped>tbody>tr:nth-of-type(even){
        background-color: transparent;
        color: #fff;
        opacity: .5
      }
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: 1px solid #235dc3;}
      table.dataTable.no-footer{    border-bottom: 1px solid #03a9f4;}
      .dataTables_wrapper .dataTables_filter input{padding: 5px;border:solid 1px #2253b5;background-color: transparent;}
      .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current{
        background-image: none;
        background-color: #193b86;
        border-color: transparent;
        color: #fff;
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
        background-image: none;
        background-color: #193b86;
        border-color: transparent;
        color: #fff;
      }
      .label-default {
          background-color: #0076dc;
          opacity: 1;
      }

      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
        background-color: #064971;
        color: #fff;
        border-color: #0d4b6f;
      }

      .nav>li>a:focus, .nav>li>a:hover{
        background-color: #0484d0;color: #fff;
      }

      .nav-tabs>li>a:hover{
        border-color: #0a70ad;
      }

      .nav-tabs{border-color: #093282}
      .table>thead>tr>th{border-color: #0d4b6f}
    </style>
  </head>
  <body>
    <?php include 'sidebar.php'; ?>

    <div class="content_wrapper">
     <?php include 'header.php'; ?>

      <div style="padding:30px;"> 
        <?php see_status2($_REQUEST); ?>
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #fff;opacity:.7;font-size: 20px;">WITHDRAW </h1>
          <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="cards" style="text-align: left;">
                <div style="padding:20px"></div>
                <table class="table">
                 <thead>
                    <tr>
                      <th style="color:#fff;opacity: .4">S.No</th>
                       <th style="color:#fff;opacity: .4">To</th>
                      <th style="color:#fff;opacity: .4">From </th>
                      <th style="color:#fff;opacity: .4">Token</th>
                      <th style="color:#fff;opacity: .4">Date</th>
                      <th style="color:#fff;opacity: .4">Status</th>
                    </tr>
                 </thead>
                 <tbody>
                   <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `sell_requests` WHERE `user_id`='.$pdo_auth['id'].' ORDER BY date DESC');
                          echo 'SELECT * FROM `sell_requests` WHERE `user_id`='.$pdo_auth['id'].' ORDER BY date DESC';
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                        $status = '<label class="label label-success" style="padding-right: 7px;">Resolved</label>';
                        if($value['status']=="Pending"){
                          $status = '<label class="label label-danger" style="padding-right: 7px;">Pending</label>';
                        }
                        echo ' <tr style="color:#fff">
                               <td>'.$i.'</td>
                               <td> to : '.$value['to_address'].'<br/><b>From : </b>'.$value['from_addresss'].'</td>
                               <td><b style="font-size:12px;text-transform:capitalize">'.$value['amount'].'</b>
                               
                               </td>
                               <td>'.$value['date'].'</td>
                               <td>'.$status.'</td>
                             </tr>';
                              $i++;
                      }
                     ?>                   
                 </tbody>
                </table>
               
               <div style="padding:30px;"></div>

              </div>
            </div>

         
        </div>
      </div>

        <div class="row">
           <div class="clearfix"></div>
          <?php include 'footer.php';  ?>
        </div>

        <!--Support Modal -->
        <div id="supportModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Looking for Support?</h4>
              </div>
              <div class="modal-body">
               
                <div class="century" style="font-size: 20px;color: #0c5e8d;padding-left:30px;"> SUPPORT DESK</div>
                <div class="century" style="font-size: 15px;color: #999;padding-left: 30px;">if you find any difficulty in trading  <b style="color: green">BBT</b> Ask us for Support</div>
                <div style="padding:20px"></div>
               <center>
                 <form action="support_request.php" method="POST">
                   <div class="form-group">
                      <input type="text" class="input" name="name" style="width: 500px;height: 50px;" value="<?php echo $pdo_auth['name']; ?>" placeholder="Enter Your Name">
                   </div>
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text" class="input" name="email" style="width: 500px;height: 50px;" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <input type="text" class="input" name="question" style="width: 500px;height: 50px;" placeholder="Enter Question">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <textarea class="input" name="answer" style="width: 500px;" placeholder="Query Description"></textarea>
                   </div>
                   <div style="padding:5px;"></div>

                   <button class="mol" style="background-color: #0d6674;height:50px;padding: 7px 14px;color:#fff;border:0;width:500px;">Ask for Support</button>
                 </form>
               </center>
              </div>
            <div style="padding:20px;"></div>
            </div>
          </div>
        </div>

     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="pace.js"></script>
  
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

     <script type="text/javascript">
      $(document).ready(function(){
       $("#nots_btn").click(function(){
          $("#nots").slideToggle("fast");
        });

       $('html').click(function() {
         $("#nots").slideUp("fast");
       });

       $('#nots, #lopp').click(function(event){
           event.stopPropagation();
       });
        
      });
    </script>

  </body>
</html>