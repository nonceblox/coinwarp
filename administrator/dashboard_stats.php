<?php   $radac = getTokenDetails(); //print_r($radac) 
        $members = count_it("users");
?>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4" style="text-align: center;">
                  <img src="img/profits.svg" class="ico" style="opacity: 1">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">TOTAL TOKEN SUPPLY</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;word-wrap: break-word;height:183px"><?php echo number_format((float)$radac['data']['totalSupply'], 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/available.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">TOKENS WITHDRAWN</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;word-wrap: break-word;height:183px"><?php echo number_format((float)$radac['data']['totalWithrawals'], 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/sold.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">TOTAL DEPOSITS</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;word-wrap: break-word;height:183px"><?php echo number_format((float)$radac['data']['totalDeposits'], 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/use.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">USERS/CONTRIBUTORS</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;height:183px"><?php echo $members; ?></div>
                </div>
              </div>
            </div>
          </div>

        </div>

         <!-- <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4" style="text-align: center;">
                  <img src="img/profits.svg" class="ico" style="opacity: 1">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">TOTAL CARBON CREDITS</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo number_format((float)$carbs, 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/available.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">CARBON CREDITS SOLD</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo number_format((float)$carbs_sold, 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/sold.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">Energy Units</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo number_format((float)$total_energy, 2, '.', '');; ?></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-sm-4 lft">
                  <img src="img/use.svg" class="ico" style="opacity: .8">
                </div>
                <div class="col-sm-8 rgt">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;color: #000db3;">CARBON REQUESTS</div>
                  <div style="font-size: 25px;color: #777;font-family: 'Century Gothic';font-weight: bold;"><?php echo $credit_requests; ?></div>
                </div>
              </div>
            </div>
          </div>

        </div> -->