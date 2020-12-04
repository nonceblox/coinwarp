 <div class="col-sm-12 rgt">
              <div class="rgt_pad">
              	<?php $fatay = get_data_id2("entrc_price"); ?>

              	<?php 
              		$ether = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD");
			            $data = json_decode($ether, TRUE);
			            $ether = $data['USD'];
			            $price_bbt = $fatay['price'];

			            $no_of_bbt_by_ether = ($ether/$price_bbt);  


			              $btc = file_get_contents("https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD");
				            $price_bbt = get_data_id("entrc_price");
				            $data = json_decode($btc, TRUE);
				            //print_r($data);
				            $btc = $data['USD'];
				            
				            $price_bbt = $fatay['price'];
				            $no_of_bbt_by_btc = ($btc/$price_bbt); 
              	 ?>

              	<div class="ticket">1<i class="fa fa-fw" aria-hidden="true" title="Copy to use bitcoin"></i> = <?php echo round($no_of_bbt_by_btc,2); ?> <?php echo token_names(); ?></div>

              	<div class="ticket">1 Ether = <?php echo round($no_of_bbt_by_ether,2); ?> <?php echo token_names(); ?></div>
              	<div class="ticket">1 <?php echo token_names(); ?> = $<?php echo round($fatay['price'],2); ?></div>
              	<div class="clearfix"></div>
              </div>
           </div>