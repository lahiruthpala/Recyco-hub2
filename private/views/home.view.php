<!DOCTYPE html>
<html lang="en">
	 <head>
	 <title>Home</title>
	 <meta charset="utf-8">
	 <meta name = "format-detection" content = "telephone=no" />
	 <link rel="icon" href="<?= ROOT ?>/images/favicon.ico" type="image/x-icon">
	 <link rel="shortcut icon" href="<?= ROOT ?>/images/favicon.ico" type="image/x-icon" />
	 <link rel="stylesheet" href="<?= ROOT ?>/css/camera.css"> 
	 <link rel="stylesheet" href="<?= ROOT ?>/css/style.css">
	 <link rel="stylesheet" href="<?= ROOT ?>/css/font-awesome.css">
	 <link href="<?= ROOT ?>/css/owl.carousel./css" rel="stylesheet">
	 <script src="<?= ROOT ?>/js/jquery.js"></script>
	 <script src="<?= ROOT ?>/js/jquery-migrate-1.2.1.js"></script>
	 <script src="<?= ROOT ?>/js/jquery.easing.1.3.js"></script>
	 <script src="<?= ROOT ?>/js/script.js"></script>
	 <script src="<?= ROOT ?>/js/jquery.equalheights.js"></script>
	 <script src="<?= ROOT ?>/js/jquery.ui.totop.js"></script>
	 <script src="<?= ROOT ?>/js/owl.carousel.js"></script>      
	 <script src="<?= ROOT ?>/js/superfish.js"></script>
	 <script src="<?= ROOT ?>/js/jquery.mobilemenu.js"></script>
	 <script src="<?= ROOT ?>/js/camera.js"></script>
	 <!--[if (gt IE 9)|!(IE)]><!-->
	 <script src="js/jquery.mobile.customized.min.js"></script>
	 <!--<![endif]-->
	 <!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
		<link href='//fonts.googleapis.com/css?family=Asap:400' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Asap:700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:700' rel='stylesheet' type='text/css'>
	   <div style=' clear: both; text-align:center; position: relative;'>
		 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
		   <img src="http://storage.ie6countdown.com/assets/100/<?= ROOT ?>/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		 </a>
	  </div>
	<![endif]-->
	<!--[if lt IE 9]>
		   <script src="js/html5shiv.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
		<script>
			$(document).ready(function(){
				jQuery('#camera_wrap').camera({
					loader: true,
					pagination: true,
					minHeight: '200',
					thumbnails: false,
					height: '37.55208333333333%',
					caption: true,
					navigation: true,
					fx:  'scrollBottom'
				});
				$("#owl").owlCarousel({
					items : 7,
					itemsDesktop : [1599,6],
					itemsDesktopSmall : [1299, 5],
					itemsTablet: [995, 4],
					itemsTabletSmall: [767, 3],
					itemsMobile : [479, 1],
					lazyLoad : true,
					pagination: false,
					navigation : true
				});
				$("#owl1").owlCarousel({
					items : 1,
					itemsDesktop : [995,1],
					itemsDesktopSmall : [767, 1],
					itemsTablet: [700, 1],
					itemsMobile : [479, 1],
					lazyLoad : true,
					pagination: true,
					navigation : true
				});
				/*Back to Top*/
				$().UItoTop({ easingType: 'easeOutQuart' });
			 });
		</script>
	 </head>
<body id="top">
<?php $this->view('Include/WebHeader') ?>
<!--=======slider================================-->

	<div class="slider_wrapper">
		<div id="camera_wrap">
		   <div data-src="<?= ROOT ?>/images/slide1.jpg">
			   <div class="camera_caption">
				   <h2>We are responsible for our <br>sustainable environment</h2>
				   <a href="#" class="link">click here</a>
			   </div>
		   </div>
		   <div data-src="<?= ROOT ?>/images/slide2.jpg">
				<div class="camera_caption">
				   <h2>We are here to protect our <br>environment from our own harm</h2>
				   <a href="#" class="link">click here</a>
			   </div>
		   </div>
		   <div data-src="<?= ROOT ?>/images/slide3.jpg">
				<div class="camera_caption">
				   <h2>We offer efficient recycling and waste <br>management services </h2>
				   <a href="#" class="link">click here</a>
			   </div>
		   </div>
		</div>
	</div>
	<div class="clear"></div>

<!--=======content================================-->

<div id="content">
<div class="bg_3 p76">
	<div class="container">
		<div class="row">     
			<div class="grid_4">
				<div class="box">
					<div class="image">
						<img src="<?= ROOT ?>/images/page1_ico1.png" alt="">
					</div>
					<div class="clear"></div>
					<a href="#">perspiciatis unde omnis</a>
					<div class="divider"></div>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo invtatis et quasi architecto beatae.</p>
				</div>
			</div>
			<div class="grid_4">
				<div class="box">
					<div class="image">
						<img src="<?= ROOT ?>/images/page1_ico2.png" alt="">
					</div>
					<div class="clear"></div>
					<a href="#">voluptatem accusant</a>
					<div class="divider"></div>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo invtatis et quasi architecto beatae.</p>
				</div>
			</div>
			<div class="grid_4">
				<div class="box">
					<div class="image">
						<img src="<?= ROOT ?>/images/page1_ico3.png" alt="">
					</div>
					<div class="clear"></div>                    
					<a href="#">laudantium totam</a>
					<div class="divider"></div>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo invtatis et quasi architecto beatae.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg_2 p76">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<h3 class="col6">Think Green – Clean up the World!</h3>
				<div class="divider"></div>
			</div>
		</div>
	</div>
		<div id="owl" class="owl-carousel">
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img1.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img1.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img2.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img2.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img3.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img3.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>                    
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img4.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img4.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>                     
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img5.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img5.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>                      
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img6.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img6.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>                     
					</div>
				</div>
			</div>
			<div class="item">
				<div class="thumbs">
					<img src="<?= ROOT ?>/images/page1_img7.jpg" class="lazyOwl img_box" data-src="<?= ROOT ?>/images/page1_img7.jpg" alt="">
					<div class="capture">
						<time datetime="2014-12-14">14 Dec, 2014</time>
						<span>Sed ut pe oluptatem accusantium remque laudantium, to rem ap.</span>
						<img src="<?= ROOT ?>/images/comment.png" alt=""><a href="#">3 Comments</a>                     
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="grid_12">
					<a href="#" class="link1">read more</a>                  
				</div>
			</div>
		</div>
</div>
<div class="bg_4 p60">
	<div class="container">
		<div class="row">
			<div class="grid_6">
				<h3 class="align-l">What we do</h3>
				<ul class="list">
					<li><i class="fa fa-plus-square"></i><a href="#">Epsum factorial non deposit quid pro quo hic escorol</a></li>
					<li><i class="fa fa-plus-square"></i><a href="#">Olypian quarrel  gorilla congolium</a></li>
					<li><i class="fa fa-plus-square"></i><a href="#">Gorilla congolium sic ad nauseum uvlaki ignitus</a></li>
					<li><i class="fa fa-plus-square"></i><a href="#">Defacto lingo est igpay atinlay quee</a></li>
				</ul>
			</div>
			<div class="grid_6">
				<h3 class="align-l">Our services</h3>
				  <ul class="list-1">
					<li class="border-none">
						<i class="fa fa-thumbs-o-up"></i>
						<a href="#">Epsum factorial non deposit quid pro quo hic escorol</a>
					</li>
					<li class="border1"></li>
					<li class="border-none">
						<i class="fa fa-leaf"></i>
						<a href="#">Deposit quid pro quo hic escorolan quarrel  gorilla congolium</a>
					</li>
					<li class="border2"></li>                    
					<li class="border-none">
						<i class="fa fa-certificate"></i>
						<a href="#">Olypian quarrel  gorilla congolium sic ad</a>
					</li>
					<li class="border3"></li>                    
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="bg_2 p80">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<h3>Transforming waste into a resource</h3>
				<div class="divider"></div>
			</div>
		</div>
		<div class="row">
			<div class="grid_6">
				<div class="block">
					<div class="image1">
						<img src="<?= ROOT ?>/images/page1_img8.jpg" alt="">
					</div>
					<div class="text">
						<a class="link2" href="#">Vestibulum iaculis lacinia</a>
						<div class="time-block">
							<time datetime="2014-11-05">15 Nov, 2014</time>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
							<a href="#">3 Comments</a>
						</div>
						<div class="divider-1"></div>
						<p>Vestibulum iaculis lacinia est. Pro. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue ntum nisl. Mauris accumsan nulla vel diam.</p>
					</div>
				</div>
				<div class="block">
					<div class="image1">
						<img src="<?= ROOT ?>/images/page1_img9.jpg" alt="">
					</div>
					<div class="text">
						<a class="link2" href="#">Vestibulum iaculis lacinia</a>
						<div class="time-block">
							<time datetime="2014-11-05">15 Nov, 2014</time>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
							<a href="#">3 Comments</a>
						</div>
						<div class="divider-1"></div>
						<p>Vestibulum iaculis lacinia est. Pro. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue ntum nisl. Mauris accumsan nulla vel diam.</p>
					</div>
				</div>
			</div>
			<div class="grid_6">
				<div class="block">
					<div class="image1">
						<img src="<?= ROOT ?>/images/page1_img10.jpg" alt="">
					</div>
					<div class="text">
						<a class="link2" href="#">Vestibulum iaculis lacinia</a>
						<div class="time-block">
							<time datetime="2014-11-05">15 Nov, 2014</time>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
							<a href="#">3 Comments</a>
						</div>
						<div class="divider-1"></div>
						<p>Vestibulum iaculis lacinia est. Pro. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue ntum nisl. Mauris accumsan nulla vel diam.</p>
					</div>
				</div>
				<div class="block">
					<div class="image1">
						<img src="<?= ROOT ?>/images/page1_img11.jpg" alt="">
					</div>
					<div class="text">
						<a class="link2" href="#">Vestibulum iaculis lacinia</a>
						<div class="time-block">
							<time datetime="2014-11-05">15 Nov, 2014</time>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
							<a href="#">3 Comments</a>
						</div>
						<div class="divider-1"></div>
						<p>Vestibulum iaculis lacinia est. Pro. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue ntum nisl. Mauris accumsan nulla vel diam.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg_3 p76">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<h3>Delivering the best waste and recycling solutions</h3>
				<div class="divider"></div>
			</div>
		</div>
		<div class="row">
			<div class="block1_holder">        
			<div class="grid_4">
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico4.png" alt="">
					</div>
					<div class="text">
						<a href="#">Accusantium doloremque</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico5.png" alt="">
					</div>
					<div class="text">
						<a href="#">Totam rem aperiam</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico6.png" alt="">
					</div>
					<div class="text">
						<a href="#">Eaque ipsa quae ab illo</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
			</div>
			<div class="grid_4">
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico7.png" alt="">
					</div>
					<div class="text">
						<a href="#">Laudantium, totam rem</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico8.png" alt="">
					</div>
					<div class="text">
						<a href="#">Accusantium doloremque</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico9.png" alt="">
					</div>
					<div class="text">
						<a href="#">Enventore veritatis et quas</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
			</div>
			<div class="grid_4">
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico10.png" alt="">
					</div>
					<div class="text">
						<a href="#">Veritatis et quasi archite</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico11.png" alt="">
					</div>
					<div class="text">
						<a href="#">Rem aperiam, eaque ipsa</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="block1">
					<div class="image2">
						<img src="<?= ROOT ?>/images/page1_ico12.png" alt="">
					</div>
					<div class="text">
						<a href="#">Accusantium doloremque</a>
						<p>Sed ut perspiciatis unde oiste natus error sit voluptatem accusantiu doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="grid_12">
				<a href="#" class="link1">learn more</a>
			</div>
		</div>
	</div>
</div>
			<div class="banner">
				<div id="owl1" class="owl-carousel">
					<div class="item">
					<h3>Testimonials</h3>
						<blockquote><span class="bq1"><img src="<?= ROOT ?>/images/bq1.png" alt=""></span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum. primis in faucibus orci luctus et ultrices posuere cubilia.</p>
						</blockquote>
						<a href="#">Mark Bridges</a>
					</div>
					<div class="item">
					<h3>Testimonials</h3>
						<blockquote><span class="bq1"><img src="<?= ROOT ?>/images/bq1.png" alt=""></span>
						<p>FVestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum. primis in faucibus orci luctus et ultrices posuere cubilia.</p>
						</blockquote>
						<a href="#">Mark Bridges</a>
					</div>
					<div class="item">
					<h3>Testimonials</h3>
						<blockquote><span class="bq1"><img src="<?= ROOT ?>/images/bq1.png" alt=""></span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum. primis in faucibus orci luctus et ultrices posuere cubilia.</p>
						</blockquote>
						<a href="#">Mark Bridges</a>
					</div>
					<div class="item">
					<h3>Testimonials</h3>
						<blockquote><span class="bq1"><img src="<?= ROOT ?>/images/bq1.png" alt=""></span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum. primis in faucibus orci luctus et ultrices posuere cubilia.</p>
						</blockquote>
						<a href="#">Mark Bridges</a>
					</div>
					<div class="item">
					<h3>Testimonials</h3>
						<blockquote><span class="bq1"><img src="<?= ROOT ?>/images/bq1.png" alt=""></span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum. primis in faucibus orci luctus et ultrices posuere cubilia.</p>
						</blockquote>
						<a href="#">Mark Bridges</a>
					</div>
				</div>
			</div>
<div class="bg_2 p72">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<h3>Let's preserve our world together!</h3>
				<div class="divider"></div>
			</div>
		</div>
		<div class="row">
			<div class="grid_3">
				<div class="thumbnail">
					<div><img src="<?= ROOT ?>/images/page1_img12.jpg" alt=""></div>
					<div class="caption1">
						<a href="#">Robert Smith</a>
						<span>Vivamus eget nibh</span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi.</p>
						<ul class="social-links1">
							<li><a href="#" class="col1"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="col2"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="col3"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="col4"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="col5"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_3">
				<div class="thumbnail">
					<div><img src="<?= ROOT ?>/images/page1_img13.jpg" alt=""></div>
					<div class="caption1">
						<a href="#">Andy Taylor</a>
						<span>Vivamus eget nibh</span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi.</p>
						<ul class="social-links1">
							<li><a href="#" class="col1"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="col2"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="col3"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="col4"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="col5"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_3">
				<div class="thumbnail">
					<div><img src="<?= ROOT ?>/images/page1_img14.jpg" alt=""></div>
					<div class="caption1">
						<a href="#">Paul Greenway</a>
						<span>Vivamus eget nibh</span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi.</p>
						<ul class="social-links1">
							<li><a href="#" class="col1"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="col2"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="col3"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="col4"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="col5"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="grid_3">
				<div class="thumbnail">
					<div><img src="<?= ROOT ?>/images/page1_img15.jpg" alt=""></div>
					<div class="caption1">
						<a href="#">Sandra White</a>
						<span>Vivamus eget nibh</span>
						<p>Vestibnisl, porta vel, sceleris lesuada at, neque. Vivamus eget nibh. Etiam curs leo vel metus. Nulla facilisi.</p>
						<ul class="social-links1">
							<li><a href="#" class="col1"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="col2"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="col3"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="col4"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" class="col5"><i class="fa fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="grid_12">
				<ul class="list-2">
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico13.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico14.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico15.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico16.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico17.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico18.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico19.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico20.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico21.jpg" alt=""></a></li>
					<li><a href="#"><img src="<?= ROOT ?>/images/page1_ico22.jpg" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
	<div class="map">
		<iframe class="wide_map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094" style="border:0"></iframe>
	</div>
<div class="bg_5 p21">
	<div class="container">
		<div class="row">     
			<div class="grid_3">
				<h6>Products</h6>
				<ul class="list-3">
					<li><a href="#">Vestibulum</a></li>
					<li><a href="#">Culis lacinia</a></li>
					<li><a href="#">Proin dictum</a></li>
					<li><a href="#">Fusce euismod</a></li>
					<li><a href="#">Consequat</a></li>
					<li><a href="#">Adipiscing elit</a></li>
				</ul>
				<h6>New Solutions</h6>
				<ul class="list-3">
					<li><a href="#">Sed ut perspiciatis unde</a></li>
					<li><a href="#">Omnis iste natus</a></li>
				</ul>
			</div>
			<div class="grid_3">
				<h6>Technology</h6>
				<ul class="list-3">
					<li><a href="#">Vatus error sivolu</a></li>
					<li><a href="#">Tatem accus</a></li>
				</ul>
				<h6>Information</h6>
				<ul class="list-3">
					<li><a href="#">Press</a></li>
					<li><a href="#">Terms</a></li>
					<li><a href="#">Clients</a></li>
					<li><a href="#">Partners</a></li>
					<li><a href="#">Reseller</a></li>
					<li><a href="#">Support</a></li>
				</ul>
			</div>
			<div class="grid_3">
				<h6>Company</h6>
				<ul class="list-3">
					<li><a href="index.html">Home</a></li>
					<li><a href="index-1.html">About Us</a></li>
					<li><a href="index-2.html">Recycling</a></li>
					<li><a href="index-3.html">Services</a></li>
					<li><a href="index-4.html">Environment</a></li>
					<li><a href="index-5.html">Contacts</a></li>
				</ul>
				<h6>Follow Us</h6>
				<ul class="list-3">
					<li><i class="fa fa-google-plus"></i><a href="#">Google +</a></li>
					<li><i class="fa fa-twitter"></i><a href="#">Twitter</a></li>
					<li><i class="fa fa-facebook"></i><a href="#">Facebook</a></li>
					<li><i class="fa fa-linkedin"></i><a href="#">LinkedIn</a></li>
					<li><i class="fa fa-rss"></i><a href="#">RSS</a></li>
				</ul>
			</div>            
			<div class="grid_3 align-r">
				<h6>Contact</h6>
					<address class="address">
						<dl>
						<dt></dt>
						<dd><span>Telephone:&nbsp;&nbsp;&nbsp;</span>+1 959 603 6035</dd>
						<dd><span>FAX:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>+ 1 504 889 9898</dd>
						<dd><span class="col7">E-mail: </span><a href="#">mail@demolink.org</a></dd>
						</dl>
					</address>
				<h6>Headquoter</h6>
				  <address class="address">
					<p>8901 Marmora Road <br>Glasgow, D04 89GR.</p>
				</address>
			</div>  
		</div>
	</div>
</div>            
</div>

<!--==================footer=======================-->

<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="grid_12">
				<div class="copy"><a class="link3" href="index.html">Waste Management Co.</a>&nbsp;&copy;&nbsp;<span id="copyright-year"></span>&nbsp;
				<a class="link4" href="index-6.html">Privacy policy</a> <!--{%FOOTER_LINK} --></div>
			</div>
		</div>
		<div class="row">
			<div class="grid_12">
				<ul class="list-4">
					<li><a href="#">Sed ut</a><span>|</span></li>
					<li><a href="#">Perspiciatis unde</a><span>|</span></li>
					<li><a href="#">Omnis iste natus</a><span>|</span></li>
					<li><a href="#">Sit voluptatem</a><span>|</span></li>
					<li><a href="#">Accusantium</a><span>|</span></li>
					<li><a href="#">Doloremque laudantium</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

</body>
</html>