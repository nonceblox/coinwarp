<div class="col-lg-6 itemsop">
              <div class="cards">
                <div class="row">
                  <div class="col-lg-4 col-sm-6">
                    <div style="padding-right: 10px;text-align:center">
                     <center> <img src="profile/<?php echo $pdo_auth['file']; ?>" style="width: 140px;;border-radius: 50%">
                     <br/> <label class="label label-success" style="padding-right: 7px;">ICO Member</label>
                    </div>
                  </div>

                  <div class="col-lg-8 col-sm-6">
                    <div style="padding-right: 10px;text-align: left;">
                      <div style="padding:7px;"></div>
                      <div class="century" style="font-weight: bold;font-size: 24px;color: #34495e;text-transform: uppercase;"><?php echo $pdo_auth['name']; ?></div>
                      
                      <div style="padding:3px;"></div>
                      <a href="change_photo.php"><button class="btn btn-sm btn-success"  data-step="1" data-intro="Here You can Change Your Profile Photo ">Change Profile Photo</button></a>
                      <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-step="3" data-intro="You can Update Profile Here" data-position='right'>Update Profile</a>
                      <div style="padding:3px;"></div>
                      <div style="font-size:10px;">Last Visited on <?php echo date("D-m-y : H:i:s"); ?></div>
                      
                       
                        <div> <b class="century" style="color: #15be87">Email Address : </b> <?php echo $pdo_auth['email']; ?> <span style="color:green">(Prmary Email)</span></div>
                        <div style="padding:4px;"></div>

                       
                        <div> <b class="century" style="color: #15be87">Contact Number : </b> <?php echo $pdo_auth['phone']; ?> </div>
                        <div style="padding:8px;"></div>                        
                    </div>
                  </div>

                </div>
              </div>


              <div class="cards">
                <div class="row">
                   <div class="col-lg-4 col-sm-6">
                    <div style="padding-right: 10px;">
                     <center> <img src="img/qr.png" data-step="4" data-intro="Scan this QR Code To Transfer Tokens" data-position='right' style="width: 140px"><br/> <label class="label label-success" style="padding-right: 7px;">Scan QR Code</label></center>
                    </div>
                  </div>

                 <div class="col-lg-8 col-sm-6">
                    <div>
                    <div style="padding: 10px;padding-left:0px;">
                    <div class="century" style="font-weight: bold;font-size: 24px;color: #34495e;text-transform: uppercase;">Your Wallet Details</div>
                    <div style="margin:5px;border-bottom:solid 1px #eee;"></div>
                        <b class="century" style="color: #1b5895">Account Address : </b>
                        <div data-step="5" data-intro="This is your wallet Address, You can change i from Update Profile Button" data-position='right' style="color: #999;word-wrap: break-word;"><?php echo $pdo_auth['tx_address']; ?></div>
                        <div style="margin:5px;border-bottom:solid 1px #eee;"></div>
			<div><b class="century" style="color: #1b5895">Account Type : </b> ICO INVESTOR</div>
	                <div> <b class="century" style="color: #1b5895">Account Status: </b>Verified</div>
                        
                        <div style="padding:8px;"></div>
                 
                    </div>
                   </div>
                </div>

                 
                  
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                 <?php  
                  $cata = file_get_contents("http://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433&address=".$pdo_auth['tx_address']."&tag=latest&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");
                  $lata = json_decode($cata, true);
                  //print_r($lata);
               ?>

                <div class="cards items" style="text-align: center;">
                   <div class="price" style="color: #17be86;font-size: 25px;">ASK SUPPORT</div>
                    <div class="century" style="color: #333;font-weight: bold;">In case you need support Fill the form Below </div>
                    <hr/>
                   <form action="support_request.php" method="POST">
                  <div class="form-group">
                      <input type="text"  class="input" name="name" style="height: 50px;" value="<?php echo $pdo_auth['name']; ?>" placeholder="Your Name">
                   </div>
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text"  class="input"  name="question" style="height: 50px;" placeholder="Question Here">
                       <input type="hidden"  class="input"  name="email" style="height: 50px;" value="<?php echo $pdo_auth['email']; ?>">
                   </div>                   
                   <div style="padding:5px;"></div>

                   <div class="form-group">
                      <input type="text" class="input" name="answer" style="height: 50px;" placeholder="Description Here">
                   </div>

                 <button class="mol sq-btn input" type="submit" >Send Query</button>
                <div class="clearfix"></div>
                
               </form>
               
                </div>
              </div>
               <div class="col-lg-6">
                <div class="cards items grad " style="text-align: center;">
               <?php  
                  $cata = file_get_contents("http://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433&address=".$pdo_auth['tx_address']."&tag=latest&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");
                  $lata = json_decode($cata, true);
                  //print_r($lata);
               ?>
              <div style="padding:10px"></div>
              <div class="price" style="font-size: 50px;"><?php echo $lata['result']/100000000; ?><span style="font-size: 20px;"></span></div>
              <div class="century" style="color: #fff;font-weight: bold;">YOUR ENTRC ACCOUNT BALANCE </div>
              <div style="padding:10px"></div>
              

              <hr style="opacity: .4" />
               <div class="price">2.12<span style="font-size: 30px;">USD</span></div>
              <div class="century" style="color: #fff;font-weight: bold;">Todays Market Price</div>
            </div>
              </div>
            </div>
          </div>