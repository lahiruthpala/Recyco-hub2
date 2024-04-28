<?php $this->view('include/head');?>

<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content">
            <form method="POST">
                <div class="card card__login shadow--2dp">
                    <div class="card__supporting-text color--dark-gray" style="display: flex;flex-direction: column;">
                        <div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <span class="card__title-text text-color--smooth-gray">RecycoHub</span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <span class="login-name text-color--white">Enter the OTP</span>
                                <span class="login-secondary-text text-color--smoke">Enter the otp to verify
                                    <?=$data['Phone']?></span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="otp" name="otp">
                                    <label class="textfield__label" for="otp">OTP</label>
                                </div>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone submit-cell">
                                <div class="layout-spacer"></div>
                                <input type="submit" value="Verify"
                                    class="button js-button button--raised color--light-blue">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <?php $this->view('include/footer') ?>