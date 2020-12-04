   <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content"  style="border-radius: 0px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-family: 'Century Gothic'">Update Your Profile</h4>
          </div>
          <div class="modal-body">
           <div style="padding: 30px;">
             <form method="POST" action="update_profile_user.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label">Enter Name</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" type="text" name="name" value="<?php echo $pdo_auth['name']; ?>" >
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="email" name="email" value="<?php echo $pdo_auth['email']; ?>">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Enter Password</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="password" value="<?php echo md5($pdo_auth['password']); ?>">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Enter Ethereum Address</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="tx_address" value="<?php echo $pdo_auth['tx_address']; ?>">
                  </div>

                  <input type="hidden" value="<?php echo $pdo_auth['id']; ?>" name="id" >
              
                  <div class="form-group">
                    <label class="control-label">Upload Photo <span style="color: #800">Leave if you dont want to upload</span></label>                    
                    <input class="form-control"  type="file" name="file" >
                  </div>

                  <hr/>
                  <input type="submit" name="update_user" value="Update Profile" class="btn btn-success">
                  

                </form>
           </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger btn-sm" title="Delete"  data-dismiss="modal"><i class="fa fa-window-close-o"></i></button>
           
          </div>
        </div>

      </div>
    </div>
    