<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content">
            <div class="card card__login shadow--2dp">
                <div class="card__supporting-text color--dark-gray">
                    <div class="grid">
                        <div class="cell cell--12-col cell--4-col-phone">
                            <span class="card__title-text text-color--smooth-gray">DARKBOARD</span>
                        </div>
                        <div class="cell cell--12-col cell--4-col-phone">
                            <span class="login-name text-color--white">Forgot password?</span>
                            <span class="login-secondary-text text-color--smoke">Enter your email below to recieve your
                                password</span>
                        </div>
                        <div class="cell cell--12-col cell--4-col-phone">
                            <div class="textfield js-textfield textfield--floating-label full-size">
                                <input class="textfield__input" type="text" id="e-mail">
                                <label class="textfield__label" for="e-mail">Email</label>
                            </div>
                        </div>
                        <div class="cell cell--12-col cell--4-col-phone submit-cell">
                            <div class="layout-spacer"></div>
                            <a href="index.html">
                                <buttons class="button js-button button--raised color--light-blue">
                                    SEND PASSWORD
                                </buttons>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<?php $this->view('include/footer') ?>