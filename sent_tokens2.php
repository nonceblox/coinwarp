<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $pdo_auth = authenticate();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php include 'title.php'; ?></title>
    <?php include 'head.php';  ?>
    <style type="text/css">
       <style type="text/css">
      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{
        color: #fff
      }
      .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active{color: #fff;}
      label{
        color: #fff;
      }

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
    </style>
  </head>
  <body>
    <?php include 'sidebar.php'; ?>

    <div class="content_wrapper">
     <?php include 'header.php'; ?>

      <div style="padding:30px;">
        <?php see_status2($_REQUEST); ?>
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 30px;"> Token Transfer Details</h1>
        
    

        <div class="row">
          <div class="col-md-12">
            <div class="cards" style="margin:10px">
             <div class="table-responsive">
                 <table style="color:#ddd;" class="table table-hover table-striped" id="example">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>To Address</th>
                      <th>From Address</th>
                      <th>Token Amount</th>
                      <th>Date </th>
                      <th>Status </th>
                      <th>Transaction Hash</th>                     
                    </tr>
                  </thead>
                  <tbody>
                 <?php 
                     
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `sell_requests` WHERE `user_id`='.$pdo_auth['id'].' ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }
                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $i=1;
                      foreach ($user as $key => $value) {
                          $statys = '<label class="label label-danger">Pending</label>';
                            if($value['status']!="Pending"){
                            $statys = '<label class="label label-success">Approved</label>';
                          }
                        echo ' <tr>
                                <td>'.$i.'</td>
                                <td>'.$value['user_name'].'</td>
                                <td>'.$value['to_address'].'</td>
                                 <td>'.$value['from_address'].'</td>
                                <td>'.$value['token'].'</td>
                                <td>'.$value['date'].'</td>
                                <td>'.$statys.'</td>
                                <td>'.$value['tx_hash'].'</td>                                
                              </tr>';
                              $i++;
                      }
                     ?>          
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           <div class="clearfix"></div>
           <div style="padding:10px;"></div>
          <div style="padding-left:50px;">
               <div class="row">
           <div class="clearfix"></div>
          <?php include 'footer.php';  ?>
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