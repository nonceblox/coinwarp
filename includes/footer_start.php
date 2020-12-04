<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <div class="nicescroll">
        <ul class="nav nav-tabs text-xs-center">
            <li class="nav-item">
                <a href="#home-2" class="nav-link active" data-toggle="tab" aria-expanded="false">
                    Activity
                </a>
            </li>
           
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade in active" id="home-2">
                <div class="timeline-2">
                    <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `notification` WHERE `user_id`='.$pdo_auth['id'].' AND `status`="Unread" ORDER BY date DESC LIMIT 20');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }


                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $count=count($user);
                      $i=1;
                      foreach ($user as $key => $value) {
                        //print_r($value);
                        echo '<a href="notifications.php"><div class="time-item">
                                <div class="item-info">
                                    <small class="text-muted">'.$value['date'].'</small>
                                    <p><strong><a href="#" class="text-info">'.token_names().' :</a></strong> '.$value['notification'].'</strong>
                                    </p>
                                </div>
                            </div></a>';
                            }
                        ?>
                  </div>
            </div>

           
        </div>
    </div> <!-- end nicescroll -->
</div>
<!-- /Right-bar -->

<footer class="footer text-right">
    <?php echo date("Y"); ?> &copy; <?php echo wallet_names(); ?> 
</footer>
</div>
<script>
    var resizefunc = [];
</script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>
<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

<!-- Knob -->
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
<!-- multi select -->
<script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<!-- Peity chart js -->
<script src="assets/plugins/peity/jquery.peity.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>