<?php require 'includes/header_start.php'; ?>
<!--Morris Chart CSS -->
<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
                        <h4 class="page-title"> Change Profile Photo</h4>
                        <ol class="breadcrumb p-0">
                           
                            <li>
                                <a href="#"><?php echo $pdo_auth['name']; ?></a>
                            </li>
                            <li class="active">
                                Change Profile Photo
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           


            <div class="row">               

                <div class="col-xl-12 col-xs-3">
                    <div class="card-box">
                    	 <div class="row">
                  
                  <div class="col-sm-4" data-step="2" data-intro="This Shows Your Basic Informations" data-position='right'>
                    <div style="padding: 10px;">
                        <form action="change_photo_handle.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <div style="padding:10px"></div>
                            <label style="color: #333;">Please Upload File</label><br/>
                            <input type="file" class="input" style="color: #333;" name="file" placeholder="Please Select File">
                          </div>

                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Photo">
                          </div>
                        </form>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div style="padding: 10px;text-align: left;border-right: solid 1px #eee">
                      <div class="century" style="font-weight: bold;font-size: 24px;color: #333;text-transform: uppercase;"><?php echo $pdo_auth['name']; ?></div>
                      <!--<div class="century" style="opacity: .5;font-size: 15px;">Member</div>-->
                      <div style="padding:3px;"></div>
                      <label class="label label-primary"  data-step="1" data-intro="Here You can Change Your Profile Photo ">Verified Member</label>
                      <div style="padding:3px;"></div>
                      <div style="color:#039cfd;">Last Visited on<br/>
                      <?php echo date("D-m-y : H:i:s"); ?></div>
                    </div>
                  </div>

                  <div class="col-sm-4" data-step="2" data-intro="This Shows Your Basic Informations" data-position='right'>
                    <div style="padding: 10px;">
                        <b class="century" style="color: #039cfd">Email Address : </b>
                        <div style="color: #333"><?php echo $pdo_auth['email']; ?> (Primary Email)</div>
                        <div style="padding:4px;"></div>

                        <b class="century" style="color: #039cfd">Contact Number : </b>
                        <div style="color: #333"><?php echo $pdo_auth['phone']; ?> </div>
                        <div style="padding:8px;"></div>

                        <!--<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-step="3" data-intro="You can Update Profile Here" data-position='right'>Update Profile</a>-->
                    </div>
                  </div>

                  

                </div>     
                    </div>
                </div><!-- end col-->
            </div>                    
        </div> <!-- container -->
    </div> <!-- content -->


</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


<?php require 'includes/footer_start.php' ?>
<?php require 'includes/footer_end.php' ?>
