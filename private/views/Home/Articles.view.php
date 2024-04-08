<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RecycoHub</title>
    <!-- Stylesheets -->
    <link href="<?= ROOT ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?= ROOT ?>/css/style.css" rel="stylesheet">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="<?= ROOT ?>/css/responsive.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper">

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
                            <li><span class="icon flaticon-interface"></span><a href="#">companyname@mail.com</a></li>
                            <li><span class="icon flaticon-technology-5"></span><a href="#">(732) 803-010-03</a></li>
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
                <div class="auto-container clearfix">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="images/logo-1.png" alt="Greenture"></a>
                    </div>

                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">

                        <a href="#" class="theme-btn btn-donate" data-toggle="modal" data-target="#donate-popup">Donate
                            Now!</a>

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

                                    <li class="dropdown"><a href="#">Home</a>
                                        <ul>
                                            <li><a href="index.html">Homepage One</a></li>
                                            <li><a href="index-2.html">Homepage Two</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li class="dropdown"><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="services.html">Services</a></li>
                                            <li class="dropdown"><a href="#">Projects</a>
                                                <ul>
                                                    <li><a href="projects.html">Projects</a></li>
                                                    <li><a href="projects-two-column.html">Projects Two Column</a></li>
                                                    <li><a href="project-single.html">Single Project</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Events</a>
                                                <ul>
                                                    <li><a href="events-list.html">Events List View</a></li>
                                                    <li><a href="events-grid.html">Events Grid View</a></li>
                                                    <li><a href="event-single.html">Single Event</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="team.html">Our Team</a></li>
                                            <li><a href="team-single.html">Team Single</a></li>
                                            <li><a href="faqs.html">FAQs Page</a></li>
                                            <li><a href="error.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Events</a>
                                        <ul>
                                            <li><a href="events-list.html">Events List View</a></li>
                                            <li><a href="events-grid.html">Events Grid View</a></li>
                                            <li><a href="event-single.html">Single Event</a></li>
                                        </ul>
                                    </li>
                                    <li class="current dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Classic</a></li>
                                            <li><a href="blog-three-column.html">Blog Three Column</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Gallery</a>
                                        <ul>
                                            <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                            <li><a href="gallery-three-column.html">Gallery Three Column</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                    </div>

                </div>
            </div>
            <!-- Header Top End -->

        </header>
        <!--End Main Header -->


        <!--Page Title-->
        <section class="page-title" style="background-image:url(<?= ROOT ?>/images/page-title-bg.jpg);">
            <div class="auto-container">
                <div class="sec-title">
                    <h1>Our <span class="normal-font">Blog</span></h1>
                    <div class="bread-crumb"><a href="index.html">Home</a> / <a href="#" class="current">Blog</a></div>
                </div>
            </div>
        </section>


        <!--Blog News Section-->
        <section class="blog-news-section latest-news">
            <div class="auto-container">

                <div class="row clearfix">

                    <!--News Column-->
                    <?php
                    if (is_array($articles) && !empty($articles)) {
                        foreach ($articles as $article) {
                            // Your table row generation code here
                            $timestamp = strtotime($article->Published_Date);
                            $date = new DateTime();
                            $date->setTimestamp($timestamp);
                            $monthShort = $date->format('M');
                            $day = $date->format('d');
                            ?>
                            <div class="column blog-news-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <article class="inner-box">
                                    <figure class="image-box">
                                        <a href="#"><img src="<?= ROOT ?>/images/Article/<?= $article->Article_ID ?>"
                                                alt=""></a>
                                        <div class="news-date"><?= $day ?><span class="month"><?= $monthShort ?></span></div>
                                    </figure>
                                    <div class="content-box">
                                        <h3><a href="#">
                                                <?= $article->Article_Title ?>
                                            </a></h3>
                                        <div class="post-info clearfix">
                                            <div class="post-author">
                                                <?= $article->Partner_ID ?>
                                            </div>
                                            <div class="post-options clearfix">
                                                <a href="#" class="comments-count"><span
                                                        class="icon flaticon-communication-2"></span> 6</a>
                                                <a href="#" class="fav-count"><span class="icon flaticon-favorite-1"></span>
                                                    14</a>
                                            </div>
                                        </div>
                                        <div class="text"><?= $article->Description ?></div>
                                        <a href="#" class="theme-btn btn-style-three">Read More</a>
                                    </div>
                                </article>
                            </div>
                            <?php
                        }
                    } else {
                        // If $rows is not an array or is empty
                        echo "No data available.";
                    }
                    ?>
                </div>

                <!-- Styled Pagination -->
                <div class="styled-pagination text-center padd-top-20 margin-bott-40">
                    <ul>
                        <li><a class="prev" href="#"><span class="fa fa-angle-left"></span>&ensp;Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a class="next" href="#">Next&ensp;<span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>

            </div>
        </section>


        <!--Parallax Section-->
        <section class="parallax-section" style="background-image:url(images/parallax/image-1.jpg);">
            <div class="auto-container">
                <div class="text-center">
                    <h2>The Best time to <span class="theme_color">plant tree</span> is now</h2>
                    <div class="text">Some lorem ipsum subtitle will be here ipsum dolor</div>
                    <a href="#" class="theme-btn btn-style-two">Donate Now!</a>
                    <a href="#" class="theme-btn btn-style-one">Join Event</a>
                </div>
            </div>
        </section>


        <!--Intro Section-->
        <section class="subscribe-intro">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="column col-md-9 col-sm-12 col-xs-12">
                        <h2>Subcribe for Newsletter</h2>
                        There are many variations of passages of Lorem Ipsum available but the majority have
                    </div>
                    <!--Column-->
                    <div class="column col-md-3 col-sm-12 col-xs-12">
                        <div class="text-right padd-top-20">
                            <a href="#" class="theme-btn btn-style-one">Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Main Footer-->
        <footer class="main-footer" style="background-image:url(images/background/footer-bg.jpg);">

            <!--Footer Upper-->
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="row clearfix">

                        <!--Two 4th column-->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-lg-8 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget about-widget">
                                        <div class="logo"><a href="index.html"><img src="images/logo-2.png"
                                                    class="img-responsive" alt=""></a></div>
                                        <div class="text">
                                            <p>Lorem ipsum dolor sit amet, eu me.</p>
                                        </div>

                                        <ul class="contact-info">
                                            <li><span class="icon fa fa-map-marker"></span> 60 Grant Ave. Carteret NJ
                                                0708</li>
                                            <li><span class="icon fa fa-phone"></span> (880) 1723801729</li>
                                            <li><span class="icon fa fa-envelope-o"></span> example@gmail.com</li>
                                        </ul>

                                        <div class="social-links-two clearfix">
                                            <a href="#" class="facebook img-circle"><span
                                                    class="fa fa-facebook-f"></span></a>
                                            <a href="#" class="twitter img-circle"><span
                                                    class="fa fa-twitter"></span></a>
                                            <a href="#" class="google-plus img-circle"><span
                                                    class="fa fa-google-plus"></span></a>
                                            <a href="#" class="linkedin img-circle"><span
                                                    class="fa fa-pinterest-p"></span></a>
                                            <a href="#" class="linkedin img-circle"><span
                                                    class="fa fa-linkedin"></span></a>
                                        </div>

                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="col-lg-4 col-sm-6 col-xs-12 column">
                                    <h2>Our Project</h2>
                                    <div class="footer-widget links-widget">
                                        <ul>
                                            <li><a href="#">Water Surve</a></li>
                                            <li><a href="#">Education for all</a></li>
                                            <li><a href="#">Treatment</a></li>
                                            <li><a href="#">Food Serving</a></li>
                                            <li><a href="#">Cloth</a></li>
                                            <li><a href="#">Selter Project</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Two 4th column End-->

                        <!--Two 4th column-->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <!--Footer Column-->
                                <div class="col-lg-7 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget news-widget">
                                        <h2>Latest News</h2>

                                        <!--News Post-->
                                        <div class="news-post">
                                            <div class="icon"></div>
                                            <div class="news-content">
                                                <figure class="image-thumb"><img src="images/resource/post-thumb-4.jpg"
                                                        alt=""></figure><a href="#">If you need a crown or lorem an
                                                    implant you will pay it gap it</a>
                                            </div>
                                            <div class="time">July 2, 2014</div>
                                        </div>

                                        <!--News Post-->
                                        <div class="news-post">
                                            <div class="icon"></div>
                                            <div class="news-content">
                                                <figure class="image-thumb"><img src="images/resource/post-thumb-5.jpg"
                                                        alt=""></figure><a href="#">If you need a crown or lorem an
                                                    implant you will pay it gap it</a>
                                            </div>
                                            <div class="time">July 2, 2014</div>
                                        </div>

                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget links-widget">
                                        <h2>Quick Links</h2>
                                        <ul>
                                            <li><a href="#">Water Surve</a></li>
                                            <li><a href="#">Education for all</a></li>
                                            <li><a href="#">Treatment</a></li>
                                            <li><a href="#">Food Serving</a></li>
                                            <li><a href="#">Cloth</a></li>
                                            <li><a href="#">Selter Project</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Two 4th column End-->

                    </div>

                </div>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container clearfix">
                    <!--Copyright-->
                    <div class="copyright text-center">Copyright 2016 &copy; Theme Created By <a
                            href="#">Template_path</a> with love</div>
                </div>
            </div>

        </footer>

    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span>
    </div>


    </div>
    <!-- /.modal -->

    <script src="<?= ROOT ?>/js/jquery.js"></script>
    <script src="<?= ROOT ?>/js/bootstrap.min.js"></script>
    <script src="<?= ROOT ?>/js/jquery.fancybox.pack.js"></script>
    <script src="<?= ROOT ?>/js/jquery.fancybox-media.js"></script>
    <script src="<?= ROOT ?>/js/owl.js"></script>
    <script src="<?= ROOT ?>/js/wow.js"></script>
    <script src="<?= ROOT ?>/js/script.js"></script>
</body>

</html>