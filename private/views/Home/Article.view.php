<!DOCTYPE html>
<html>
<?php $this->view("include/homehead")?>

<body>
    <div class="page-wrapper">
        <!-- <div class="preloader"></div> -->
        <?php $this->view("include/homeheader")?>
        <!--Page Title-->
        <section class="page-title" style="background-image:url(<?=ROOT?>/images/Background_login_internal.jpg);">
            <div class="auto-container">
                <div class="sec-title">
                    <h1>Articles</h1>
                    <div class="bread-crumb"><a href="index.html">Home</a> / <a href="#" class="current">Articles</a></div>
                </div>
            </div>
        </section>


        <!--Blog News Section-->
        <section class="blog-news-section latest-news">
            <div class="auto-container">

                <div class="row clearfix">

                    <!--News Column-->
                    <?php foreach($articles as $article){?>
                    <div class="column blog-news-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <article class="inner-box">
                            <figure class="image-box">
                                <a href="#"><img src="<?=ROOT?>/images/Article/<?=$article->Article_ID?>" alt="" style="object-fit: cover; width: 350px; height: 250px;"></a>
                                <div class="news-date"><?= date('d', strtotime($article->Published_Date)) ?><span class="month"><?= date('M', strtotime($article->Published_Date)) ?></span></div>
                            </figure>
                            <div class="content-box">
                                <h3><a href="#"><?=$article->Article_Title?></a></h3>
                                <div class="post-info clearfix">
                                    <div class="post-author">Posted by <?=$article->Company_Name?></div>
                                </div>
                                <div class="text"><?=$article->Description?></div>
                                <a href="<?=ROOT?>/Home/ArticleDetail/<?=$article->Article_ID?>" class="theme-btn btn-style-three">Read More</a>
                            </div>
                        </article>
                    </div>
                    <?php }?>
                </div>

                <!-- Styled Pagination -->
                <div class="styled-pagination text-center padd-top-20 margin-bott-40">
                    <ul>
                        <li><a class="prev" href="#"><span class="fa fa-angle-left"></span>&ensp;Prev</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a class="next" href="#">Next&ensp;<span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>

            </div>
    </section>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span>
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