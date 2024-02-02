<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <form method="POST">
                <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="mdl-card__title-text text-color--smooth-gray">RecycoHub</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="login-name text-color--white">Enter the OTP</span>
                                <span class="login-secondary-text text-color--smoke">Enter the otp to verify
                                    +94718696971</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="otp" name="otp">
                                    <label class="mdl-textfield__label" for="otp">OTP</label>
                                </div>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <div class="mdl-layout-spacer"></div>
                                <input type="submit" value="Verify"
                                    class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <?php $this->view('include/footer') ?>