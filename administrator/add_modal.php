<!-- Modal -->
    <div id="myModal_add" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"  style="border-radius: 0px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New User</h4>
          </div>
          <div class="modal-body">
            <div style="padding: 30px;">
             <form action="add_user_handle.php" method="POST">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" type="text" name="name" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="email" name="email" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter Transaction Address</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="text" name="tx_address"  placeholder="Transaction Address">
                  </div>

                  <div class="form-group">
                    <label class="control-label">Enter Password</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" name="password"  type="text" placeholder="Password">
                  </div>

                 
                  <div class="form-group">
                    <label class="control-label">Enter Status</label>
                    <select class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  name="status">
                      <option value="Yes">Verified</option>
                      <option value="No">Not Verified</option>
                    </select>
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-success" name="add_user" value="Create User">
                  </div>                  
                                 
                </form>
           </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger btn-sm" title="Delete" data-dismiss="modal"><i class="icon-remove-sign"></i></button>
          </div>
        </div>

      </div>
    </div>