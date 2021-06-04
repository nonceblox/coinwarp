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
                            <h4 class="page-title">User Support</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">User Support</a>
                                </li>
                                <li class="active">
                                   Support
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <?php see_status2($_REQUEST); ?>
              
                <div class="row">
                  <div class="col-sm-12" style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#supportModal" >New Support Request</button> </div>
                </div><div style="padding: 10px;"></div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>View Support Requests</b></h4>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%" style="color: #333">
                               <thead>
                                  <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                   
                                  </tr>
                                </thead>
                               <tbody>
                                 <?php 
                                    try {
                                          $stmt = $pdo->prepare('SELECT * FROM `support` WHERE `user_id`='.$pdo_auth['id'].'  ORDER BY date DESC');
                                      } catch(PDOException $ex) {
                                          echo "An Error occured!"; 
                                          print_r($ex->getMessage());
                                      }
                                      $stmt->execute();
                                      $user = $stmt->fetchAll();   
                                      $i=1; 
                                      foreach($user as $key=>$value){
                                          $statys = '<button class="btn btn-danger btn-sm">Pending</button>';
                                          if($value['status']!="Pending"){
                                          $statys = '<button class="btn btn-success btn-sm">Resolved</button>';
                                        }

                                        echo '<tr>
                                            <td>'.$i.'</td>
                                            <td >'.$value['name'].'<br/>'.$value['email'].'</td>
                                            <td "><b>'.$value['question'].'</b><br/>'.$value['description'].'<br/> <span style="color:green">Ans : '.$value['ans'].'</span><br/> <i>'.$value['date'].'</i></td>
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
    <!--Support Modal -->
        <div id="supportModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius: 0px;">
              <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Need help?</h4>
              </div>
              <div class="modal-body">
               
                <div class="century" style="font-size: 20px;" > HELP DESK</div>
                <div class="century" >For help fill out the form below</div>
                <hr/>
               <center>
                 <form action="support_request.php" method="POST" style="padding: 20px;">
                  <div class="form-group">
                      <input type="text" class="form-control" name="name" readonly=""  value="<?php echo $pdo_auth['name']; ?>" placeholder="Enter Your Name">
                   </div>
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text" class="form-control" name="email" readonly=""  value="<?php echo $pdo_auth['email']; ?>" placeholder="Enter Your Email Id">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <input type="text" class="form-control" name="question"  placeholder="Enter Question">
                   </div>
                   <div style="padding:5px;"></div>

                    <div class="form-group">
                      <textarea class="form-control" name="answer" placeholder="Type question here"></textarea>
                   </div>
                   <div style="padding:5px;"></div>

                   <button class="btn btn-primary" style="width: 100%">Submit Support Request</button>
                 </form>
               </center>
              </div>
            
            </div>
          </div>
        </div>

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