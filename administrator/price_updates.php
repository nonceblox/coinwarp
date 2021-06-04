<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    $pdo_auth = authenticate_admin();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    include 'function.php';

?><!DOCTYPE html>
<html>
<head>
    <?php include 'head.php'; ?>
    <title><?php include 'title.php'; ?></title>   
    
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
                <h1 style="font-Ahrvo: 'Century Gothic';color: #999;font-size: 25px;font-weight: normal;"><div style="font-weight: bold;color: #55b3dd"><?php echo wallet_names(); ?> Wallet </div><span style="font-size: 14px;">Sale Dashboard</span></h1>
                
              </div>
           </div>
           <div class="col-sm-9">
             <?php include 'price_panel.php';  ?>
           </div>
          </div>
        </div>
        <?php see_status2($_REQUEST); ?>
        <div class="content-wrapper">
           <div class="row">
            <div class="col-md-6">
              <div class="card">
                  <h3>Control The Token Supply </h3><hr/>
                  <?php $rada = getTokenDetails();  ?>
                  <form action="token_supply.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <h2>Total Supply is : <?php echo $rada['data']['totalSupply']; ?> </h2>
                        <hr/>
                        <label class="control-label" style="font-size: 16px;">Increase Token Supply By</label>
                        <input class="form-control"  style="border-radius: 0px;border:solid 1px #ddd;" value="0"  type="number" name="token_supply"  min="0"   placeholder="Enter Tokens">
                      </div>

                      <div class="form-group">
                        <?php $prices = get_data_id_data("entrc_price", "id", 1); //print_r($prices); ?>
                        <label class="control-label" style="font-size: 16px;">Price per token (USD)</label>
                        <input class="form-control"  style="border-radius: 0px;border:solid 1px #ddd;" step=".0001" type="number" name="price" value="<?php echo $prices['price']; ?>" min="0"  placeholder="Price per token (USD)">
                      </div>

                     
                      
                    <hr/>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_admin" value="Update Token Supply">

                        <?php// echo extract_total("users", "balance"); ?>
                    </div> 
                  </form>
              </div>
            </div>
          </div>
        </div>
       
     <?php include 'footer.php'; ?>
      
      
      </div>
    </div>
    <div id="gora" ></div>
    


<?php include 'update_modal.php'; ?>
    

    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
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


          $('#example23').DataTable( {
              dom: 'Bfrtip',
              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]
          } );


          $("#mota").click(function(){
            //alert("hello");
            $("#gora").load("change_notif_status.php");
          });

      } );
    </script>    
  </body>


</html>