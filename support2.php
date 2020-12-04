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

      button.dt-button, div.dt-button, a.dt-button{background-color: #38add0;background-image: none;border-color: transparent;color: #fff;opacity: 1}
      button.dt-button:hover, div.dt-button, a.dt-button{background-color: #38add0;background-image: none;border-color: transparent;color: #fff;opacity: 1}
      .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate{color: #fff;}
      .table-striped>tbody>tr:nth-of-type(odd){
        background-color: transparent;
        color: #fff;
        opacity: 1
      }

      .table-striped>tbody>tr:nth-of-type(even){
        background-color: transparent;
        opacity: 1;
        color:#35aff1
      }
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: 1px solid #235dc3;}
      table.dataTable.no-footer{    border-bottom: 1px solid #4fc0f2;}
      .dataTables_wrapper .dataTables_filter input{padding: 5px;border:solid 1px #4fc0f2;background-color: transparent;}
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
       <div class="container-fluid">
         
       </div>
         <div style="padding:30px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-sm-6"><h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #ddd;font-size: 20px;">SUPPORT </h1></div>
                  <div class="col-sm-6" style="text-align: right;"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#supportModal" style="color:#ffff">New Support Request</button> </div>
                </div>
              
              <div class="cards" style="text-align: left;">
                <div style="padding:20px"></div>
                <table  style="color: #ddd;" class="table table-hover table-striped" id="example">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> Name</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Status</th>
                     
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
                            $statys = '<a href="resolved.php?id='.$value['id'].'" title="Click to Change Status to Resolved"><button class="btn btn-primary btn-sm">Pending</button></a>';
                            if($value['status']!="Pending"){
                            $statys = '<button class="btn btn-info btn-sm">Resolved</button>';
                          }

                          echo '<tr>
                              <td>'.$i.'</td>
                              <td >'.$value['name'].'<br/>'.$value['email'].'</td>
                              <td "><b>'.$value['question'].'</b><br/>'.$value['description'].'<br/> <span style="color:green">Ans : '.$value['ans'].'</span></td>
                              <td>'.$value['date'].'</td>
                              <td>'.$statys.'</td>
                             
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
            <div class="modal-content" style="border-radius: 0px;background-color: #051631">
              <div class="modal-header" style="border-bottom: solid 1px #13284c">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #0e55cc">Need help?</h4>
              </div>
              <div class="modal-body">
               
                <div class="century" style="font-size: 20px;color: #fff;padding-left:30px;"> HELP DESK</div>
                <div class="century" style="font-size: 15px;color: #fff;padding-left: 30px;">For help fill out the form below</div>
                <div style="padding:20px"></div>
               <center>
                 <form action="support_request.php" method="POST">
                  <div class="form-group">
                      <input type="text" class="input" name="name" readonly="" style="width: 500px;height: 50px;" value="<?php echo $pdo_auth['name']; ?>" placeholder="Enter Your Name">
                   </div>
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text" class="input" name="email" readonly="" style="width: 500px;height: 50px;" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <input type="text" class="input" name="question" style="width: 500px;height: 50px;" placeholder="Enter Question">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <textarea class="input" name="answer" style="width: 500px;" placeholder="Type question here"></textarea>
                   </div>
                   <div style="padding:5px;"></div>

                   <button class="mol" style="background-color: #0c2e67;height:50px;padding: 7px 14px;color:#fff;border:0;width:500px;">Submit</button>
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
                 'excel', 'print'
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