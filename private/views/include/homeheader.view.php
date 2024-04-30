<!-- Main Header -->
<header class="main-header">
            <div class="top-bar">
                <div class="top-container">
                    <!--Info Outer-->
                    <div class="info-outer">
                        <!--Info Box-->
                        <ul class="info-box clearfix">
                            <li><img src="<?=ROOT?>/images/email.png" style="margin-right: 10px;"><a href="#"
                                    class="google-plus img-circle">Recycohub@mail.com</a></li>
                            <li><img src="<?=ROOT?>/images/phone.png" style="margin-right: 10px;"></span><a href="#">(+94) 76846992</a></li>
                            <li class="social-links-one">
                                <a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                                <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container clearfix"
                    style="margin-left: 110px;display: flex;flex-direction: row;width: 100%;max-width: 1500px;">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="<?=ROOT?>/images/logo-1.png" alt="Greenture"
                                style="border-radius: 30px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);"></a>
                    </div>

                    <!--Nav Outer-->

                    <div class="nav-outer clearfix" style="display: flex;align-items: center;margin-left: auto;">
                        <!-- Main Menu -->
                        <nav class="main-menu">

                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation">
                                    <li><a href="<?=ROOT?>">Home</a></li>
                                    <li><a href="<?=ROOT?>/Home/Article">Articles</a></li>
                                    <li><a href="<?=ROOT?>/Home/Events">Events</a></li>
                                    <li><a href="<?=ROOT?>/Ecommercesite">Store</a></li>
                                    <?php if (Auth::logged_in()) { ?>
                                        <li><a href="<?= ROOT ?>/Customer/CreatePickups">Create a pickup
                                                request</a></li>
                                        <li><a href="<?= ROOT ?>/Logout" class="theme-btn btn-donate"  style="position: relative;background-color: red;"
                                    style="position: relative;">LogOut</a></li>
                                        <?php } ?>
                                    <?php if (Auth::logged_in()) { ?>
                                        <a href="<?= ROOT ?>/Customer/info">
                                            <img src="<?= ROOT ?>/images/Users/<?= Auth::getUser_ID() ?>.jpg"
                                                style="width: 60px;border-radius: 99px;margin-top: -14px;"></a>
                                    <?php } ?>
                                </ul>
                            </div>
                        </nav>
                        <?php if (!Auth::logged_in()) { ?>
                            <div>
                                <a href="<?= ROOT ?>/login" class="theme-btn btn-donate" data-toggle="modal"
                                    style="position: relative;">Login Now!</a>
                                <a href="<?= ROOT ?>/signup" class="theme-btn btn-donate" data-toggle="modal"
                                    style="position: relative;">Register Now!</a>
                            </div>
                        <?php } ?>
                        <!-- Main Menu End-->

                    </div>

                </div>
            </div>
            <!-- Header Top End -->

        </header>
        <!--End Main Header -->