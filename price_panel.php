<div style="font-size: 18px;color: #004a8f">You Currently Have  </div></div>
 <?php $data = file_get_contents("http://rinkeby.etherscan.io/api?module=account&action=txlist&address=0x06f0591FfADA777E95A17Cb865021849a457C2b6&startblock=0&endblock=99999999&sort=asc&apikey=KN6UV25CEHMII57MUZ9BNZPTG8IXPNJF71");              
          $mata = json_decode($data, true);
          $pata = array_reverse($mata['result']);
          $count =  count($pata);
          //print_r($pata);
          
          $j=0;
        for($i=0;$i<$count;$i++){
                  
           $eth = $pata[$i]['value']/1000000000000000000;
          // echo $pata[$i]['txreceipt_status'];
          if(strtolower($pdo_auth['tx_address'])==$pata[$i]['from'] && $pata[$i]['txreceipt_status']==1 ){
          	$j+=$eth;          	
          	//echo "-".$j;         
          }  
        }
        $j=$j*3000;   
 ?>
        
<?php 
	try {
	      $stmt = $pdo->prepare('SELECT sum(no_of_tokens) as sum FROM `buy_token` WHERE `status`= "'."Approved".'" AND `user_id`="'.$pdo_auth['id'].'"');
	  } catch(PDOException $ex) {
	      echo "An Error occured!"; 
	    //  print_r($ex->getMessage());
	  }
	  $stmt->execute();
	  $user = $stmt->fetchAll();    
	  //print_r($user);                  
?>
<div style="font-size: 40px;color: #999"><span style="color: #900;font-size: 20px;"> </span><?php echo $j; //echo $user[0]['sum']; ?><span style="font-size: 18px;"> ENTRC</span> 
