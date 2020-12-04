 <!-- Modal -->
   
  <?php                      
    try {
        $stmt = $pdo->prepare('SELECT * FROM `administrator_super_user`');
    } catch(PDOException $ex) {
        echo "An Error occured!"; 
        print_r($ex->getMessage());
    }
    $stmt->execute();
    $user_data= $stmt->fetch();   
   // print_r($user_data);

  ?>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content"  style="border-radius: 0px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-family: 'Century Gothic'">Update Yogfgdffdr Profile</h4>
          </div>
          <div class="modal-body">
           <div style="padding: 30px;">
             <form action="update_administrator.php" method="POST">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" type="text" name="name" value="<?php echo $user_data['name']; ?>" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="email" name="email" value="<?php echo $user_data['email']; ?>" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter Tx Address</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="tx_address" value="<?php echo $user_data['tx_address']; ?>" placeholder="Enter Transaction Address">
                  </div>

                   <div class="form-group">
                    <label class="control-label">Enter Password</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="password" value="<?php echo $user_data['password']; ?>" placeholder="Enter Password">
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-success" name="update_profile" value="Update Profile">
                  </div>     
                 
                </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

