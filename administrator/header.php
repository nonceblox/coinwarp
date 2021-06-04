 <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <div class="century" style="font-size: 16px;padding-top: 10px;">You can Now Buy/Sell <?php echo token_names(); ?> From <a target="_blank" href="http://r">Any Exchange You Need</a></div>              
            </div>

            <div class="col-sm-6">
              <div class="century" style="font-size: 16px;">
                
                <a href="bibang.com" target="_blank"><img src="img/homee.svg" data-toggle="tooltip" data-placement="bottom" title="Go to Website" class="links"></a>

                <div  style="display: block;position: relative;cursor: pointer;float:right" id="lopp"><img data-toggle="tooltip" data-placement="bottom" title="Notifications!" src="img/bell.svg" title="Notifications" id="nots_btn" class="links">
                  <div style="padding: 10px;box-shadow: 0px 10px 10px rgba(33,33,33,.1);width: 300px;position: absolute;right:0px;top:45px;z-index: 1000;background-color: #fff;display: none;  word-wrap: break-word;" id="nots">
                     <?php                      
                      try {
                          $stmt = $pdo->prepare('SELECT * FROM `notification` WHERE `user_id`='.$pdo_auth['id'].' AND `status`="Unread" ORDER BY date DESC');
                      } catch(PDOException $ex) {
                          echo "An Error occured!"; 
                          print_r($ex->getMessage());
                      }


                      $stmt->execute();
                      $user = $stmt->fetchAll();
                      $count=count($user);
                      $i=1;
                      foreach ($user as $key => $value) {
                        echo '<a href="notifications.php" style="text-decoration:none"><div style="padding: 10px;border-bottom: solid 1px #eee;color:#333;" class="mop">'.$value['notification'].'<div style="color:#888;font-size:11px;">Date : '.$value['date'].'</div></div></a>';
                              $i++;
                      }
                     ?>
                  </div>
                  <?php 
                      if($count!=0){?>
                      <div id="kiopl" style="background-color: #ff6600;padding: 1px 5px;right: 10px;position: absolute;color: #fff;font-size: 10px;border-radius: 4px;"><?php echo $count; ?></div>
                      <?php } ?>
                  
                </div>
                 <a target="_blank" href="white_paper.pdf"><img src="img/116313.svg" title="Read White Paper" data-toggle="tooltip" data-placement="bottom" title="White Paper" class="links"></a>
                <a href="logout.php"><img src="img/402593.svg" title="Logout" class="links" data-step="9" data-toggle="tooltip" data-placement="bottom" title="Logout" data-intro="Logout Here" data-position='right'></a>
                <?php //echo 'SELECT * FROM `notification` WHERE `user_id`='.$pdo_auth['id'].' AND  `status`="Unread" ORDER BY date DESC'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>