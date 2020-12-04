<?php require 'includes/header_start.php'; ?>

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>

<?php require 'includes/header_end.php'; ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Sent Tokens</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Sent Tokens</a>
                                </li>
                                <li class="active">
                                    Sent Tokens
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                  <?php see_status2($_REQUEST); ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>View Sent Tokens</b></h4>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Username</th>
                                      <th>To/From</th>
                                      <th>Token Amount</th>
                                      <th>Date </th>
                                      <th>Status </th>                                                        
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
                                                <td><b>To : </b>'.$value['to_address'].'<br/><b>From : </b>'.$value['from_address'].'<br/> <label class="label label-success">'.$value['tx_hash'].'</label></td>
                                                <td>'.$value['token'].''.token_names().'</td>
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
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
<?php require 'includes/footer_start.php' ?>

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });

    </script>

<?php require 'includes/footer_end.php' ?>  