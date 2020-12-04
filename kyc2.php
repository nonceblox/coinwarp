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
    <link rel="stylesheet" href="hover.css" />
    <style type="text/css">
      .fileUpload {
          position: relative;
          overflow: hidden;
          margin: 10px;
      }
      .fileUpload input.upload {
          position: absolute;
          top: 0;
          right: 0;
          margin: 0;
          padding: 0;
          font-size: 20px;
          cursor: pointer;
          opacity: 0;
          filter: alpha(opacity=0);
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
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{border-top: 1px solid #393e44;}
      table.dataTable.no-footer{    border-bottom: 1px solid #03a9f4;}
      .dataTables_wrapper .dataTables_filter input{padding: 5px;border:solid 1px #2253b5;background-color: transparent;}
      .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current{
        background-image: none;
        background-color: #3e4349;
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
      .table>thead>tr>th{
        border-bottom: #02478c;
        text-align: center;
      }
    </style>
    </style>
  </head>
  <body>
    <?php include 'sidebar.php'; ?>

    <div class="content_wrapper">
     <?php include 'header.php'; ?>

      <div style="padding:30px;">
        <?php see_status2($_REQUEST); ?>
        <h1 style="padding:10px;padding-top:0px;font-family: 'Didact Gothic', sans-serif;color: #55b3dd;font-size: 20px;">MY DOCUMENTS BBT</h1>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="cards items" style="text-align: left;">
                <div style="padding:10px"></div>               
                <div class="century" style="font-size: 20px;color: #55b3dd"> Upload your KYC Documents</div>
                <div class="century" style="font-size: 13px;color: #ddd">You Must Upload a Government Authorised   <b style="color: #ddd">Document</b><br/> For Trading in BBT</div>
                <div style="padding:20px"></div>
               <center>
                 <form method="POST" action="kyc_handle.php" enctype="multipart/form-data">
                   <div class="form-group">
                      <input type="text" class="input" style="height: 50px; color: #ddd;" value="<?php echo $pdo_auth['name']; ?>" name="name" placeholder="Enter Your Name">
                   </div>
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text" class="input" style="height: 50px; color: #ddd;" readonly name="email" value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <input type="text" class="input" style="height: 50px; color: #ddd;" name="tx_address" readonly="" value="<?php echo $pdo_auth['tx_address']; ?>" placeholder="Enter ETH Address">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <input type="file" class="input" style="height: 50px; color: #ddd;" name="file" placeholder="Upload Your Original KYC Document">
                   </div>
                   <div style="padding:5px;"></div>

                   <button class="mol hvr-bounce-to-right" type="sumbit" name="submit" style="background-color: #55b3dd;height:50px;padding: 7px 14px;color:#fff;border:0;width: 100%">UPLOAD YOUR DOCUMENTS</button>
                 </form>
               </center>
               <div style="padding:10px;"></div>
              </div>
            </div>

           

           <div class="col-lg-5 ">
              <div class="cards items" style="text-align: center;">                   
                   <h3 style="color: #ddd;text-align:left">KYC Documents </h3><hr style="opacity: .1" />
                   <table  style="color: #ddd;" class="table table-striped table-hover">
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
                              <td><a target="_blank" href="kyc_documents/'.$value['file'].'" style="color:#fff">Document'.$i.'</a></td>
                              <td>'.$statys.'</td>                              
                            </tr>';
                            $i++;
                      }           
                    ?>                    
                  </tbody>
                </table>
              </div>
           </div>

            <div class="col-lg-3">
              <div class="cards items" style="text-align: left;padding:40px">
                <div style="padding: 10px"></div>
                   <div class="century" style="font-size: 20px;color: #55b3dd"> KYC Documents Rules</div>
                  <div class="century" style="font-size: 15px;color: #848d98">Know Your Customer - KYC enables BB to know/ understand their customers and their financial dealings, to be able to serve them better and manage its risks prudently.</div>

                  <hr/>
                  <h3 style="color: #55b3dd;font-size:20px;">Purpose : </h3>
                  <ul style="color: #848d98;text-align:left;font-sixe:10px;">
                    <li>Verify the legal status of the legal person/ entity</li>
                    <li>Verify identity of the authorized signatories and</li>
                    <li>Verify identity of the Beneficial owners/ controllers of the account</li></li>
                  </ul>

                  <h3 style="color: #55b3dd;font-size:20px;">What can be used</h3>
                  <ul style="color: #848d98;text-align:left;">
                    <li>Passport</li>
                    <li>Voter's Identity Card</li>
                    <li>Driving Licence</li>
                    <li>Citizen Card</li>
                    <li>Account Number Card</li>

                  </ul>
                  <div style="padding:20px"></div>
              </div>
            </div>
      </div>

        <div class="row">
           <div class="clearfix"></div>
          <?php include 'footer.php';  ?>
        </div>

   
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="pace.js"></script>
  
    <script type="text/javascript" src="match.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
       $(function() {
        $('.mon').matchHeight({
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