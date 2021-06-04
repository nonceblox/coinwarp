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
                            <h4 class="page-title">Transaction of Tokens</h4>
                            <ol class="breadcrumb p-0">
                                <li>
                                    <a href="#">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Transaction of Tokens</a>
                                </li>
                                <li class="active">
                                   Transaction of Tokens
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
                            <h4 class="m-t-0 header-title"><b>View Transaction of Tokens</b></h4>
                           

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%" style="color: #333">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Direction </th> 
                                    <th>Amount</th>
                                    <th>To Froms</th>
                                    <th>Status</th>
                                                      
                                  </tr>
                                </thead>
                                <?php//  echo $pdo_auth['email'];  ?>
                                <tbody>

                               <?php 
                               $curl = curl_init();
                               $host=get_blockchain_host();
                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => $host."/wallet/user/events?email=".$pdo_auth['email'],
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => "",
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => "GET",
                                ));

                                $response = curl_exec($curl);
                                $response=json_decode($response, true); 
                                curl_close($curl);
                                //print_r($response);
                                $i=1;
                                foreach ($response['data'] as $key => $value) {
                                    $times = time_elapsed_string($value['timestamp']/1000);

                                    if($value['event']=="Deposit Tokens"){
                                        $statys = '<label class="label label-info" style="color:#fff">'.$value['event'].'</label>';
                                    }else if($value['event']=="Withdraw Tokens"){
                                        $statys = '<label class="label label-success" style="color:#fff">'.$value['event'].'</label>';
                                    }else{
                                        $times = time_elapsed_string($value['timestamp']/1000000000);
                                        //echo $
                                        $statys = '<label class="label label-danger" style="color:#fff">'.$value['event'].'</label>';
                                    }
                                    
                                    $amount = "";
                                    $tx = "";
                                    $to_froms = "";
                                    if ($value['event']=="Deposit Tokens") {
                                        $amount = $value['amount'];
                                        $to_froms = 'To : '.$pdo_auth['tx_address'].'<br/> From : Administrator <br/><label class="label label-success">Tx  Id : '.$value['transactionId'].'</label>';
                                    }
                                    else{
                                        $amount = $value['amount'];
                                        $to_froms = '<b>To : </b>'.$value['to'].'<br/> <b>from : </b> '.$value['from'].'<br/><label class="label label-success">'.$value['transactionHash'].'</label> ';
                                    }
                                       
                                      echo ' <tr>
                                              <td>'.$i.'</td>
                                              <td>'.$statys.' <br/> <span style="font-size:12px;color:#999">'.$times.'</span></td>   
                                               <td><label class="">'.round($amount,2).' '.token_names().'</label></td>
                                               <td>'.$to_froms.'</td>
                                              <td><label class="label label-info" style="color:#fff">'.$value['status'].'</label></td>                                                                                                         
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