<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content">
            <div class="card card__login shadow--2dp" style="margin-top: 65px;width: fit-content;">
                <div class="card__supporting-text color--dark-gray">
                    <form method="POST">
                        <div style="display: flex;flex-direction: column;align-items: center;color: black;width: 415px;">
                            <div style="align-self: flex-start;color: green;margin-bottom: 30px;">
                                <span class="card__title-text text-color--smooth-gray" style="font-size: 22px;">Recyco_HUB</span>
                            </div>
                            <div style="align-self: flex-start;">
                                <span class="login-name text-color--white" style="font-size: 17px;">Password Reset</span>
                                <span class="login-secondary-text text-color--smoke">Enter Your New Password</span>
                            </div>
                            <div style="align-self: flex-start;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="pwd1" name="pwd1">
                                    <label class="textfield__label" for="pwd1">Password</label>
                                </div>
                            </div>
                            <div style="align-self: flex-start;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="pwd2" name="pwd2">
                                    <label class="textfield__label" for="pwd2">Retype-Password</label>
                                </div>
                            </div>
                            <div style="align-self: flex-end;">
                                <div class="layout-spacer"></div>
                                <button type="submit" class="button js-button button--raised" style="background-color: green;">
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