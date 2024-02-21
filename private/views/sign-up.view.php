<?php $this->view('include/head') ?>
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
<body>
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <form method="post">
                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="mdl-card__title-text text-color--smooth-gray">Recyco-HUB</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="login-name text-color--white">Sign up</span>
                            </div>
                            <?php if (count($errors) > 0): ?>
                                <div style="ml-10px" role="alert">
                                    <strong>Errors:</strong>
                                    <?php foreach ($errors as $error): ?>
                                        <br>
                                        <?= $error ?>
                                    <?php endforeach; ?>
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <!-- <span aria-hidden="true">&times;</span> -->
                                        <i class="material-icons">close</i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="name" name="UserName"
                                        value="<?= get_var("name") ?>">
                                    <label class="mdl-textfield__label" for="name">UserName</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="password" id="pwd1" name="pwd1"
                                        value="<?= get_var('pwd1') ?>">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="password" id="pwd2" name="pwd2"
                                        value="<?= get_var("pwd2") ?>">
                                    <label class="mdl-textfield__label" for="password">Retype Password</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="e-mail" name="Email"
                                        value="<?= get_var("Email") ?>">
                                    <label class="mdl-textfield__label" for="e-mail">Email</label>
                                </div>
                                <label
                                    class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect checkbox--colored-light-blue checkbox--inline"
                                    for="checkbox-1">
                                    <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>

                                </label>
                                <span class="login-link">I agree all statements in <a href="#" class="underlined">terms
                                        of
                                        service</a></span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <a href="login.html" class="login-link">I have already signed up</a>
                                <br>
                                <div class="mdl-layout-spacer"></div><br>
                                <div>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                        SIGN UP
                                    </button>
                                    <a href="home">
                                        <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php $this->view('include/footer') ?>

</body>

</html>