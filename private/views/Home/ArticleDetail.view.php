<!DOCTYPE html>
<html>
<?php $this->view("include/homehead") ?>

<body>
    <div class="page-wrapper">
        <?php $this->view("include/homeheader") ?>
        <!--Page Title-->
        <section class="page-title" style="background-image:url(<?= ROOT ?>/images/Background_login_internal.jpg);">
            <div class="auto-container">
                <div class="sec-title">
                    <h1>Article</h1>
                </div>
            </div>
        </section>


        <!--Sidebar Page-->
        <div class="sidebar-page">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side-->
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                        <!--Projects Section-->
                        <section class="blog-news-section blog-detail no-padd-bottom no-padd-top padd-right-20">

                            <!--News Column-->
                            <div class="column blog-news-column">
                                <article class="inner-box">
                                    <?= $article_html ?>
                                </article>
                            </div>
                        </section>


                    </div>
                    <!--Content Side-->

                    <!--Sidebar-->
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <aside class="sidebar">
                            <!-- Recent Posts -->
                            <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms"
                                data-wow-duration="1500ms">
                                <div class="sidebar-title">
                                    <h3>Latest Posts</h3>
                                </div>
                                <?php foreach ($articles as $article) { ?>
                                    <article class="post">
                                        <figure class="post-thumb"><img src="<?=ROOT?>/images/Article/<?=$article->Article_ID?>" alt="">
                                        </figure>
                                        <h4><a href="<?=ROOT?>/Home/ArticleDetail/<?=$article->Article_ID?>"><?=$article->Description?></a></h4>
                                        <div class="post-info"><img src="<?=ROOT?>/images/userIcon.png"style="margin-right: 2px;height: 13px;"></span> By <?=$article->Company_Name?>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script src="js/jquery.fancybox-media.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>
</body>

</html>