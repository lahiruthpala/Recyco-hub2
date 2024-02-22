<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--white is-small-screen login">
        <header>

        </header>
        <main class="layout__content">
            <div style="margin-top:100px;display: flex;flex-direction: row;flex-wrap: wrap;width: fit-content;"
                class="card card__login shadow--2dp">
                <img src="<?= ROOT ?>/images/login_page.png" style="max-width: 600px;">
                <form method="post" onsubmit="validateForm()">
                    <div class="card__supporting-text color--dark-gray"
                        style="border-radius: 0 15px 15px 0;max-width: 450px;">
                        <div class="grid" style="display: flex;flex-direction: column;">
                            <div class="cell cell--12-col cell--4-col-phone">
                                <span class="card__title-text text-color--smooth-gray">RecycoHUB</span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                                <span class="login-name text-color--white">Sign in</span>
                                <span class="login-secondary-text text-color--smoke">Enter fields to sign in to
                                    Recyco-HUB</span>
                            </div>
                            <?php if (count($errors) > 0): ?>
                                <div id="alert" class="textfield__error" role="alert">
                                    <strong>Errors:</strong>
                                    <div style="margin-left:10px">
                                        <?php foreach ($errors as $error): ?>
                                            <br>
                                            <?= $error ?>
                                        <?php endforeach; ?>
                                        <span type="button" style="margin-left:10px" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </span>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('alert').style.visibility = "visible";
                                </script>
                            <?php endif; ?>
                            <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input type="email" placeholder="" id="Email" name="Email" class="textfield__input">
                                    <label class="textfield__label" for="e-mail">Email</label>
                                    <div class="textfield__error" id="emailerror"></div>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input type="password" placeholder="" id="pwd" name="pwd" class="textfield__input">
                                    <label class="textfield__label" for="password" id="pwderror">Password</label>
                                </div>
                                <a href="<?= ROOT ?>/login/ForgotPassword" class="login-link">Forgot password?</a>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone submit-cell" style="width: 93%;">
                                <a href="<?= ROOT ?>/Signup" class="login-link">Don't have account?</a>
                                <div class="layout-spacer"></div>
                                <input type="submit" value="Login" name="login"
                                    class="button js-button button--raised color--light-blue">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById('Email').value;
            var emialerror = document.getElementById('emailerror').value;
            var pwd = document.getElementById('pwd').value;
            var pwderror = document.getElementById('pwderror').value;
            if (email.trim() === '' || pwd.trim() === '') {
                if (email.trim() === '') {
                    emialerror.style.visibility = "visible"
                    emialerror.innerHTML = "Enter a valid email"
                }
                if (pwd.trim() === '') {
                    pwderror.style.visibility = "visible"
                    pwderror.innerHTML = "Enter a valid password"
                }
                return false;
            } else {
                return true;
            }
        }
    </script>
    <?php $this->view('include/footer') ?>