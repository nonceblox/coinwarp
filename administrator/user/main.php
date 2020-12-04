<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <title>Gibraltar Stock Exchange</title>   
  </head>
  <body class="sidebar-mini fixed  pace-done sidebar-collapse">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print" style="box-shadow: 0px 0px 10px rgba(100,100,100, .2)"><a class="logo" style="background-color: #fff" href="index.html"><img src="img/gibral_logo12.jpg" style="width: 140px;margin-top:-15px;"></a>
        <nav class="navbar navbar-static-top" style="background-color: #fff;">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas" style="color: #ccc"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Notification <i class="fa fa-bell-o fa-lg"></i><span class="label label-danger" style="position: absolute;top:10px;">8</span></a>
                <ul class="dropdown-menu">
                 
                  <li><a style="padding: 20px;" class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary" style="color: #ccc" ></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a  style="padding: 20px;" class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger" style="color: #ccc"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a  style="padding: 20px;" class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-default" style="color: #ccc"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>
              <!-- User Menu-->


              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logout &nbsp;&nbsp;<i class="fa fa-sign-out fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a  data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="index6.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>


            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="img/48.jpg" alt="User Image"></div>
            <div class="pull-left info">
              <p>Vinshu Gupta</p>
              <p class="designation" style="opacity: .4">Frontend Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>Reporting</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="reporting.html"><i class="fa fa-circle-o"></i> Transactions</a></li>
               <!--  <li><a href="http://fontawesome.io/icons/" target="_blank"><i class="fa fa-circle-o"></i> Sell Tokens</a></li> -->
              
              </ul>
            </li>
            <li><a href="charts.html"><i class="fa fa-pie-chart"></i><span>Buy Process</span></a></li>
              <ul class="treeview-menu">
                <li><a href="form-components.html"><i class="fa fa-circle-o"></i> Registration</a></li>
                <li><a href="form-custom.html"><i class="fa fa-circle-o"></i> Whitelisting</a></li>
              </ul>
            </li>
         
            <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>Support</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Level One</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="blank-page.html"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i><span> Level Two</span></a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title" style="padding: 32px">
          <div>
            <h1 style="font-family: 'Century Gothic';color: #999;font-size: 30px;font-weight: normal;">Dashboard</h1>
            <p>Widgets for Token Market</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>UI</li>
              <li><a href="#">Widgets</a></li>
            </ul>
          </div>
        </div>

        <div style="padding: 20px;"></div>

        <div class="row">
          <div class="col-sm-3">
            <div class="card" style="background-color: #004a8f">
              <div class="row">
                <div class="col-sm-4">
                  <img src="img/speedometer.svg" style="width: 80%;opacity: 1">
                </div>
                <div class="col-sm-8">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;text-align: right;color: #fff">TOTAL SUPPLY</div>
                  <div style="font-size: 25px;text-align: right;color: #fff;font-family: 'Century Gothic';">500000897897</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card">
              <div class="row">
                <div class="col-sm-4">
                  <img src="img/ava.svg" style="width: 80%;opacity: .1">
                </div>
                <div class="col-sm-8">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;text-align: right;">AVAILABLE TOKENS</div>
                  <div style="font-size: 25px;text-align: right;color: #777">256786788</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card">
              <div class="row">
                <div class="col-sm-4">
                  <img src="img/coin.svg" style="width: 80%;opacity: .1">
                </div>
                <div class="col-sm-8">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;text-align: right;">USed Tokens</div>
                  <div style="font-size: 25px;text-align: right;color: #777">108799</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card">
              <div class="row">
                <div class="col-sm-4">
                  <img src="img/use.svg" style="width: 80%;opacity: .1">
                </div>
                <div class="col-sm-8">
                  <div style="padding: 10px;"></div>
                  <div style="font-size: 12px;text-align: right;">Users</div>
                  <div style="font-size: 25px;text-align: right;color: #777">5000</div>
                </div>
              </div>
            </div>
          </div>

        </div>


          <!-- <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Total supply</h4>
                <p><b>500000897897</b></p>
              </div>
            </div>

            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Available Tokens</h4>
                <p><b>256786788</b></p>
              </div>
            </div>

            <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>USed Tokens</h4>
                <p><b>108799</b></p>
              </div>
            </div>

            <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p><b>5000</b></p>
              </div>
            </div>
          </div> -->

        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <h3 class="card-title"  style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;">Payment vs ETH</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <h3 class="card-title"  style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;">Users Holdings</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card">
              <h3 class="card-title"  style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;">Managment token distribution</h3>
              <div class="embed-responsive embed-responsive-16by9" >
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
              </div>
            </div>

          </div>
          
        </div>
        

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title" style="font-family: 'Century Gothic';font-weight: normal;font-size: 20px;">Etherscan scanner</h3>
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>TXHash</th>
                      <th>Block</th>
                      <th>Age</th>
                       <th>From</th>
                       <th>To</th>
                         <th>TValue</th>
                         <th>TxnFee</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>4568692</td>
                      <td>27 secs ago</td>
                      <td> 0xe52ca1c69f39f9ef2d</td>
                      <td> 0x446498095b870e93a8</td>
                      <td>0.002 Ether</td>
                      <td>  0.00003491</td>
                      <td>767</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>4565492</td>
                      <td>33 secs ago</td>
                      <td> 0xe52cf3469f39f9ef2d</td>
                      <td> 0x443465395b870e93a8</td>
                      <td>0.007 Ether</td>
                      <td>  0.00703491</td>
                      <td>767</td>
                    </tr>
                     <tr>
                      <td>3</td>
                      <td>4565652</td>
                      <td>73 secs ago</td>
                      <td> 0xe524562f69f39f9ef2d</td>
                      <td> 0x4434fr35b870e93a8</td>
                      <td>0.003 Ether</td>
                      <td>767</td>
                      <td>  0.00023491</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Jacob</td>
                      <td>767</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td>767</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <ul class="pagination">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="disabled"><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </div>
          </div>
        </div>
      
        
      </div>
    </div>
    <!-- Javascripts-->

     <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content"  style="border-radius: 0px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-family: 'Century Gothic'">Update Your Profile</h4>
          </div>
          <div class="modal-body">
           <div style="padding: 30px;">
             <form>
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;" type="text" placeholder="Enter full name">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="email" placeholder="Enter email address">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Enter Phone no. (Optional)</label>
                    <input class="form-control" style="border-radius: 0px;border:solid 1px #ddd;"  type="email" placeholder="Enter Phone no. address">
                  </div>
                 <!--  <div class="form-group">
                    <label class="control-label">Enter Phone no.</label>
                    <textarea class="form-control" rows="4" placeholder="Enter your phnoe no."></textarea>
                  </div> -->
                  <div class="form-group">
                    <label class="control-label">Gender</label>
                    <div class="radio">
                      <label>
                        <input type="radio"  name="gender">Male
                      </label>
                       <label>
                        <input type="radio" name="gender">Female
                      </label>
                    </div>
                    <div class="radio">
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Identity Proof</label>
                    <input class="form-control" 
                    <input class="form-control"  type="file">
                  </div>
                  <div class="form-group">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox">I accept the terms and conditions
                      </label>
                    </div>
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





    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
        labels: ["0-2 ETH", "2-7ETH", "7-15ETH", "15-40ETH", "40+ ETH"],
        datasets: [
          {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56]
          },
          {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86]
          }
        ]
      };
      var pdata = [
        {
          value: 300,
          color:"#23305a",
          highlight: "#123962",
          label: "#Etherium"
        },
        {
          value: 50,
          color: "#7e0108",
          highlight: "#4d0510",
          label: "Bitcoin"
        },
        {
          value: 100,
          color: "#004a8f",
          highlight: "#32228f",
          label: "Dellas"
        }
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");      
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      
    
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxp).Pie(pdata);
      
    </script>
  </body>


</html>