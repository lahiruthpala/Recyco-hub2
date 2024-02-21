<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content">
            <div class="card card__login shadow--2dp">
                <div class="card__supporting-text color--dark-gray">
                    <form method="POST">
                        <div class="grid">
                            <div class="cell cell--12-col cell--4-col-phone">
                                <span class="card__title-text text-color--smooth-gray">Recyco_HUB</span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <span class="login-name text-color--white">Password Reset</span>
                                <span class="login-secondary-text text-color--smoke">Enter Your New Password</span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="pwd1" name="pwd1">
                                    <label class="textfield__label" for="pwd1">Password</label>
                                </div>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="pwd2" name="pwd2">
                                    <label class="textfield__label" for="pwd2">Retype-Password</label>
                                </div>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone submit-cell">
                                <div class="layout-spacer"></div>
                                <button type="submit" class="button js-button button--raised color--light-blue">
                                    Set
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <?php $this->view('include/footer') ?>