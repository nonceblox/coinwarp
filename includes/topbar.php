<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="dashboard.php" class="logo" id="logo-tour">
            <img src="fac.png" style="width: 30px;"><span style="color:#060661">COINWARP</span></a>
    </div>


    <nav class="navbar navbar-custom" style="background-color: #274de2">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
           
        </ul>

        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown notification-list" id="notification-tour">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                   href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="zmdi zmdi-texture noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview" style="word-wrap:break-word; ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>
                            <small><span class="label label-danger pull-xs-right">0</span>Scan Qr Code</small>
                        </h5>
                    </div>
                     <center>
                        Your Wallet Address is : 
                    <div style="padding: 20px"><b><?php echo $pdo_auth['tx_address']; ?></b></div>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $pdo_auth['tx_address'];  ?>&choe=UTF-8" style="width: 100%" /></center>
                   

                </div>
            </li>


         

            <li class="nav-item dropdown notification-list">
                <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);" style="display: block;position: relative;">

                    <i class="zmdi zmdi-format-subject noti-icon"></i> <span style="background-color: red;color: #fff;border-radius:4px;margin-left:-10px;padding:3px;z-index: 1000">
                        <?php echo count_notification("notification", $pdo_auth['id']); ?></span>
                </a>
            </li>

            <li class="nav-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user"
                   data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="profile/<?php echo $pdo_auth['file']; ?>" alt="user" class="img-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown "
                     aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                            <small><?php echo $pdo_auth['name']; ?></small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a data-toggle="modal"  data-target="#myModal" style="cursor: pointer;" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                    </a>

                   

                    <!-- item-->
                    <a href="change_photo.php" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-lock-open"></i> <span>Change Photo</span>
                    </a>

                    <!-- item-->
                    <a href="logout.php" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

    </nav>

</div>
<!-- Top Bar End -->