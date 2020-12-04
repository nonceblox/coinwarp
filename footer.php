<div style="padding-left:70px;">
       <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
            <div style="font-size: 12px;text-align:left; color: #444;" class="resp">Copyright ©<?php echo date("Y"); ?>, All Rights Reserved.  Powered By <a href="" style="color:#4fc0f2"><?php echo wallet_names(); ?> </a></div>
          </div>
        </div>
    </div>

        <?php include 'modal.php'; ?>


   <!--Change Password  Modal Starts Here -->
          <div id="myModaler" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content" style="border-radius: 0px;padding:50px;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="font-weight: bold;color: #444">Scan This QR Code</h4>
                </div>
                <div class="modal-body">
                  <center>
                    <b><?php echo $pdo_auth['tx_address']; ?></b>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $pdo_auth['tx_address'];  ?>&choe=UTF-8" /></center>
                </div>
               
              </div>

            </div>
          </div>
        <!-- Modal Ends Here -->
