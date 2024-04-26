<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RecycoHUB</title>
    <!-- Stylesheets -->
    <link href="<?= ROOT ?>/css/indexgeneral.css" rel="stylesheet">
    <link href="<?= ROOT ?>/css/revolution-slider.css" rel="stylesheet">
    <link href="<?= ROOT ?>/css/style2.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>
    <div class="page-wrapper">
        <!-- <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a> -->
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header -->
        <header class="main-header">
            <div class="top-bar">
                <div class="top-container">
                    <!--Info Outer-->
                    <div class="info-outer">
                        <!--Info Box-->
                        <ul class="info-box clearfix">
                            <li><span class="icon flaticon-interface"></span><a href="#"
                                    class="google-plus img-circle">Recycohub@mail.com</a></li>
                            <li><span class="icon flaticon-technology-5"></span><a href="#">(+94) 76846992</a></li>
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
                <div class="auto-container clearfix" style="margin-left: 110px;display: flex;flex-direction: row;width: 100%;max-width: 1500px;">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo-1.png" alt="Greenture" style="border-radius: 30px;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);"></a>
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

                                    <li ><a href="#">Home</a></li>
                                    <li><a href="about.html">About</a></li>


                                    <li ><a href="#">Events</a>
                                        <!-- <ul>
                                            <li><a href="events-list.html">Events List View</a></li>
                                            <li><a href="events-grid.html">Events Grid View</a></li>
                                            <li><a href="event-single.html">Single Event</a></li>
                                        </ul> -->
                                    </li>
                                    <li ><a href="#">Blog</a>
                                        <!-- <ul>
                                            <li><a href="blog.html">Blog Classic</a></li>
                                            <li><a href="blog-three-column.html">Blog Three Column</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul> -->
                                  </li>
                                    <?php if(Auth::logged_in()) {?>
                                    <li class="dropdown"><a href="<?=ROOT?>/Customer/CreatePickups">Create a pickup request</a>
                                    <?php } ?>
                                    <li><a href="contact-info">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                        <?php if(!Auth::logged_in()) {?>
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


        <!--Main Slider-->
        <section class="main-slider revolution-slider">

            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="<?=ROOT?>images/resource/mainslider1.png" data-saveperformance="off" data-title="Awesome Title Here">
                            <img src="<?=ROOT?>images/resource/mainslider1.png" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="15" data-y="center"
                                data-voffset="-150" data-speed="1500" data-start="500" data-easing="easeOutExpo"
                                data-splitin="none" data-splitout="none" data-elementdelay="0.01"
                                data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <div class="circular-drop">0<sub>2</sub></div>
                            </div>

                            <div class="tp-caption sfr sfb tp-resizeme" data-x="left" data-hoffset="90" data-y="center"
                                data-voffset="-50" data-speed="1500" data-start="1000" data-easing="easeOutExpo"
                                data-splitin="none" data-splitout="none" data-elementdelay="0.01"
                                data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <h1><span class="normal-font">Go</span> Green</h1>
                            </div>

                            <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="90" data-y="center"
                                data-voffset="40" data-speed="1500" data-start="1500" data-easing="easeOutExpo"
                                data-splitin="none" data-splitout="none" data-elementdelay="0.01"
                                data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <h3 class="bg-color">Save the world by planting tree</h3>
                            </div>
                            <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="90" data-y="center" data-voffset="110" data-speed="1500" data-start="2000" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <div class="text" style="color: black;">Lorem ipsum dolor sit amet, debet dolore mollis his ad, ea usu <br>soleat detraxit.In vix agam moderatius. Modo partiendo.</div>
                            </div>

                        </li>

                        <li data-transition="slidedown" data-slotamount="1" data-masterspeed="1000" data-thumb="<?=ROOT?>images/resource/mainslider2.png" data-saveperformance="off" data-title="Awesome Title Here">
                            <img src="<?=ROOT?>images/resource/mainslider2.png" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


                            <div class="tp-caption sfl sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-120" data-speed="1500" data-start="500" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <h2 class="normal-font">Boost </h2>
                            </div>

                            <div class="tp-caption sfr sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="-30" data-speed="1500" data-start="1000" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <h2>Recycling Efforts</h2>
                            </div>

                            <div class="tp-caption sfl sfb tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="50" data-speed="1500" data-start="1500" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                                <h4 style="text-align:center; max: width 400px;margin: 0 auto;"> Reduce leakages to safeguard lives against land and sea-based marine plastic pollution.</h4>
                            </div>

                        </li>
                    <div class="tp-bannertimer" style="visibility:visible;width:auto;transform:translate3d(0px,0px,0px,0px)"></div>




                    </ul>

                </div>
            </div>
        </section>


        <!--Main Features-->
        <section class="main-features">
            <div class="auto-container">
                <div class="title-box text-center">
                    <h1>300+</h1>
                    <h2>People Working With US</h2>
                </div>

                <div class="row clearfix">

                    <!--Feature Column-->
                    <div class="features-column col-lg-3 col-md-6 col-xs-12">
                        <article class="inner-box">
                            <div class="icon-box">
                                <img style="position: relative;width: 124px;"
                                    src="<?= ROOT ?>/images/icons/eco-light.png">
                                <h3 class="title">ECO SYSTEM</h3>
                            </div>
                        </article>
                    </div>

                    <!--Feature Column-->
                    <div class="features-column col-lg-3 col-md-6 col-xs-12">
                        <article class="inner-box">
                            <div class="icon-box">
                                <img style="position: relative;width: 124px;"
                                    src="<?= ROOT ?>/images/icons/recycle_arrow.png">
                                <h3 class="title">Recycling</h3>
                            </div>
                        </article>
                    </div>

                    <!--Feature Column-->
                    <div class="features-column col-lg-3 col-md-6 col-xs-12">
                        <article class="inner-box">
                            <div class="icon-box">
                                <img style="position: relative;width: 124px;" src="<?= ROOT ?>/images/icons/water.png">
                                <h3 class="title">Water Refine</h3>
                            </div>
                        </article>
                    </div>

                    <!--Feature Column-->
                    <div class="features-column col-lg-3 col-md-6 col-xs-12">
                        <article class="inner-box">
                            <div class="icon-box">
                                <img style="position: relative;width: 124px;" src="<?= ROOT ?>/images/icons/Money.png">
                                <h3 class="title">Earn money</h3>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>


        <!--Featured Fluid Section-->
        <section class="featured-fluid-section">


            <div class="outer clearfix">

                <!--Image Column-->
                <div class="image-column" style="background-image:url(<?= ROOT ?>/images/Article/cleaners.jpeg);"></div>

                <!--Text Column-->
                <article class="column text-column dark-column wow fadeInRight" data-wow-delay="0ms"
                    data-wow-duration="1500ms" style="background-image:url(images/resource/fluid-image-2.jpg);">

                    <div class="content-box pull-left">
                        <h2>Join <span class="theme_color">our event</span> </h2>
                        <div class="text">"Join Event Clean Recycling" is an exciting initiative aimed at bringing
                            communities together to promote environmental stewardship and waste reduction.
                            Through organized events, participants will collaborate in cleaning up local areas while
                            focusing on recycling and proper waste management practices.
                            This initiative not only fosters a sense of community involvement but also contributes to
                            the preservation of natural habitats and the promotion of sustainable living.
                            Join us in making a positive impact on our environment </div>
                        <a href="#join-now" class="theme-btn btn-style-one">Join Now</a>
                        <!-- <a href="#" class="theme-btn btn-style-two">View details</a> -->
                    </div>

                    <div class="clearfix"></div>
                </article>

            </div>

        </section>

        <!--Events Section-->
        <section class="events-section latest-events">
            <div class="auto-container">

                <div class="sec-title text-center">
                    <h2>Latest <span class="normal-font theme_color">Event</span></h2>
                </div>
                <div class="row clearfix">
                    <?php
                    //var_dump($events);
                    foreach ($events as $event) {
                        ?>
                        <!--Featured Column-->
                        <div class="column default-featured-column style-two col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <article class="inner-box">
                                <figure class="image-box">
                                    <a href="#"><img src="<?= ROOT ?>/images/Events/<?= $event->Event_ID ?>.jpg" alt=""></a>
                                </figure>
                                <div class="content-box">
                                    <h3><a href="#"><?= $event->Event_Title ?></a></h3>
                                    <div class="column-info"><?= $event->Event_location ?></div>
                                    <div class="text"><?= $event->Description ?></div>
                                    <a href="#" class="theme-btn btn-style-three">Read More</a>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--Testimonials-->
        <section class="testimonials-section"
            style="background-image:url(<?= ROOT ?>/images/resource/testimonial.jpeg);">
            <div class="auto-container">

                <div class="sec-title text-center">
                    <h2>Testi<span class="normal-font theme_color">Monials</span></h2>
                    <div class="text">"Discover how our recycling website is empowering individuals to make a difference
                        in the world, one testimonial at a time." </div>
                </div>
                <!--Slider-->
                <div class="testimonials-slider testimonials-carousel">
                    <!--Slide-->
                    <?php foreach ($testimonials as $testimonial) { ?>
                        <article class="slide-item">
                            <div class="info-box">
                                <figure class="image-box"><img src="<?= ROOT ?>/images/Users/<?= $testimonial->User_ID ?>"
                                        alt=""></figure>
                                <h3><?= $testimonial->FirstName ?></h3>
                                <div style="display:flex; position:absolute; width: 30px;">
                                    <?php
                                    $i = $testimonial->Stars;
                                    while ($i > 0) {
                                        if ($i > 1) {
                                            ?>
                                            <img style="width: 20Px;height: 20px;" src="<?= ROOT ?>/images/icons/FullStar.png">
                                            <?php
                                        }
                                        if ($i < 1) {
                                            ?>
                                            <img style="width: 20Px;height: 20px;" src="<?= ROOT ?>/images/icons/HalfStar.png">
                                            <?php
                                        }
                                        $i -= 1;
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="slide-text">
                                <p><?= $testimonial->Data ?></p>
                            </div>
                        </article>
                    <?php } ?>


                </div>

            </div>
        </section>
        <!--Main Footer-->
        <footer class="main-footer" style="background-image:url(images/background/footer-bg.jpg); margin-top:40px">

            <!--Footer Upper-->
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!--Two 4th column-->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix"
                                style="display: flex; justify-content: space-between;align-items: center;">
                                <!-- <div class="col-lg-8 col-sm-6 col-xs-12 column"> -->
                                    <div class="footer-widget about-widget" style="width:100%">
                                        <div class="logo"><a href="index.html"><img src="images/logo-2.png" class="img-responsive" alt=""></a></div>
                                        <div class="text">
                                            <p>Better Tomorrow</p>
                                        </div>

                                        <ul class="contact-info" style="display: inline-flex;align-items: center;justify-content: space-between;flex-direction: row;width:100%">
                                            <li><span class="icon fa fa-map-marker"></span> UCSC, Reid avenue, colombo.</li>
                                            <li><span class="icon fa fa-phone"></span> (94) 12345678</li>
                                            <li><span class="icon fa fa-envelope-o"></span> recycohub@gmail.com</li>
                                        </ul>

                                        <div class="social-links-two clearfix" >
                                            <a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                            <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                            <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                                            <a href="#" class="linkedin img-circle"><span class="fa fa-pinterest-p"></span></a>
                                            <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                              </div>

                                    <ul class="contact-info"
                                        style="display: inline-flex;align-items: center;justify-content: space-between;flex-direction: row;width:100%">
                                        <li><span class="icon fa fa-map-marker"></span> UCSC, Reid avenue, colombo.</li>
                                        <li><span class="icon fa fa-phone"></span> (94) 12345678</li>
                                        <li><span class="icon fa fa-envelope-o"></span> recycohub@gmail.com</li>
                                    </ul>

                                    <div class="social-links-two clearfix">
                                        <a href="#" class="facebook img-circle"><span
                                                class="fa fa-facebook-f"></span></a>
                                        <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="google-plus img-circle"><span
                                                class="fa fa-google-plus"></span></a>
                                        <a href="#" class="linkedin img-circle"><span
                                                class="fa fa-pinterest-p"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                                    </div>

                                </div>
                                <!-- </div> -->


                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container clearfix">
                    <!--Copyright-->
                    <div class="copyright text-center">Copyright 2024 &copy; By <a href="#">Recycohub</a> with love
                    </div>
                </div>
            </div>

        </footer>

    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span>
    </div>

    <!-- /.modal -->

    <script src="<?=ROOT?>/js/default.js"></script>
    <script src="<?=ROOT?>/js/indexgeneral.min.js"></script>
    <script src="<?=ROOT?>/js/revolution.min.js"></script>
    <script src="<?=ROOT?>/js/pack.js"></script>
    <script src="<?=ROOT?>/js/media.js"></script>
    <script src="<?=ROOT?>/js/owl.js"></script>
    <script src="<?=ROOT?>/js/wow.js"></script>
    <script src="<?=ROOT?>/js/general.js"></script>
</body>

</html>