<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <div class="mdl-card__supporting-text color--dark-gray">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="mdl-card__title-text text-color--smooth-gray">DARKBOARD</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <span class="login-name text-color--white">Forgot password?</span>
                            <span class="login-secondary-text text-color--smoke">Enter your email below to recieve your
                                password</span>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="e-mail">
                                <label class="mdl-textfield__label" for="e-mail">Email</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                            <div class="mdl-layout-spacer"></div>
                            <a href="index.html">
                                <buttons class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
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