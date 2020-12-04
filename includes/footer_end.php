<!-- google analytic code -->


<!-- google analytic code ends here -->

<!-- following js will activate the menu in left side bar based on url -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar-menu a").each(function() {
            if (this.href == window.location.href) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });
    });
</script>

   <!--Change Password  Modal Starts Here -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Profile</h4>
                </div>
                <div class="modal-body">
                  <form method="post" action="change_password.php" style="padding: 30px;">
                    <div class="form-group">
                      <label style="color: #444">Enter Your Name</label>
                      <input type="text" placeholder="Enter Your Name" name="name" value="<?php echo $pdo_auth['name']; ?>" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                      <label style="color: #444">Enter Your Ethereum Address</label>
                      <input type="text" readonly placeholder="Enter Your Ethereum Address" value="<?php echo $pdo_auth['tx_address']; ?>" name="tx_address" class="form-control"  >
                    </div>

                    
                     <div class="form-group">
                      <label style="color: #444">Enter Your Phone Number</label>
                      <input type="text"  placeholder="Enter Your Contact Number" value="<?php echo $pdo_auth['phone']; ?>" name="phone" class="form-control"  >
                    </div>

                    
                    <div class="form-group">
                      <label style="color: #444">Enter New Password</label>
                      <input type="password" placeholder="Enter New Password" value="<?php echo $pdo_auth['password']; ?>" name="new_pass" class="form-control"  >
                    </div>

                    
                    <div class="form-group">
                      <label style="color: #444">Confirm New Password</label>
                      <input type="password" placeholder="Confirm New Password" name="conf_pass" value="<?php echo $pdo_auth['password']; ?>" class="form-control"  >
                    </div>
                    <br/>
                    
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary" style="width: 100%">Update Profile</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>

                </div>
               
              </div>

            </div>
          </div>
        <!-- Modal Ends Here -->


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


</body>
</html>