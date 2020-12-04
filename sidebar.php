<div class="container-fluid webs" style="padding: 0px;">
      <aside class="main_sidebar">
        <div class="logo"><center><a href="dashboard.php"><img src="img/biggs.png" style="width: 180px;opacity: .8"></a></center></div>
        <div style="padding: 20px; background-color: #020915;min-height: 100vh">
          <div style="padding: 10px;"></div>
          <a href="dashboard.php" data-step="10" data-intro="Dashboard Here, First Page to Step in or Home" data-position='right' class="side_links"><i  style="color: #dedede" class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
          <a href="buy.php" data-step="11" data-intro="From Here you request to Buy Tokens" data-position='right' class="side_links"><i style="color: #dedede" class="fa fa-connectdevelop" aria-hidden="true"></i> Buy BBT</a>
          <a href="sell.php" data-step="12" data-intro="You can Sell Tokens Here" data-position='right' class="side_links"><i  style="color: #dedede" class="fa fa-paper-plane-o" aria-hidden="true"></i> Send BBT</a>
          <a href="withdraw_tokens.php" data-step="16" data-intro="This is Where you get list of all sent tokens and Details" data-position='right' class="side_links"><i style="color: #dedede"  class="fa fa-money" aria-hidden="true"></i> Withdraw</a>
         <!--  <a href="transaction.php" data-step="13" data-intro="View All Transactions Here" data-position='right' class="side_links"><i  style="color: #dedede" class="fa  fa-file-text-o" aria-hidden="true"></i>  Statement </a> -->
          <a href="sent_tokens.php" data-step="16" data-intro="This is Where you get list of all sent tokens and Details" data-position='right' class="side_links"><i style="color: #dedede"  class="fa fa-share-square-o" aria-hidden="true"></i> Token Transfer</a>
          
           <a href="kyc.php" data-step="15" data-intro="Upload Your KYC Here and Get Verified" data-position='right' class="side_links"><i style="color: #dedede"  class="fa fa-balance-scale" aria-hidden="true"></i> My Document </a>

           
           <a href="support.php" data-step="14" data-intro="Ask for Support Here" data-position='right' class="side_links"><i  style="color: #dedede" class="fa fa-life-ring" aria-hidden="true"></i> Support </a>

            <a href="transfer.php" data-step="14" data-intro="Transfer Details" data-position='right' class="side_links"><i class="fa fa-exchange"  style="color: #dedede"></i> Transaction Details </a>
         
          <div style="padding:10px"></div>
          <?php include 'morha.php';  ?>
              <div style="color: #fff;opacity: .4;font-size: 20px;"> <?php  echo round( $pdo_auth['balance'],2); ?> BBT</div>
              <div class="century" style="color: #fff;font-weight: bold;opacity: .2">YOUR BB BALANCE </div>
              <div style="padding:10px"></div>              

              <!--- <hr style="opacity: .1;margin: 10px 0px;" />

              <div style="color: #fff;opacity: .4;font-size: 20px;"> <?php  $daya = get_data_id_popo("entrc_price", $pdo_auth['id']); echo number_format($daya['price'],2); ?> USD</div>
              <div class="century" style="color: #fff;font-weight: bold;opacity: .2">TOKEN Price </div>-->
              <div style="padding:10px"></div>  
              <hr style="opacity: .0;margin: 10px 0px;" />
              <a href="" class="btn btn-primary btn-sm btn-primary" data-toggle="modal" data-target="#myModaler" data-step="3" data-intro="You can Update Profile Here" data-position='right' style="margin-bottom: 4px;background-color: #0c357b">View QR Code</a>
                        
        </div>
      </aside>
    </div>