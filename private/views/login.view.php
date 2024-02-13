<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--white is-small-screen login">
        <header>

        </header>
        <main class="mdl-layout__content">
            <form method="post" onsubmit="validateForm()">
                <div style="margin-top:100px" class="mdl-card mdl-card__login mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="mdl-card__title-text text-color--smooth-gray">RecycoHUB</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="login-name text-color--white">Sign in</span>
                                <span class="login-secondary-text text-color--smoke">Enter fields to sign in to
                                    Recyco-HUB</span>
                            </div>
                            <?php if (count($errors) > 0): ?>
                                <div id="alert" class="mdl-textfield__error" role="alert">
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
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input type="email" placeholder="" id="Email" name="Email" class="mdl-textfield__input">
                                    <label class="mdl-textfield__label" for="e-mail">Email</label>
                                    <div class="mdl-textfield__error" id="emailerror"></div>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input type="password" placeholder="" id="pwd" name="pwd" class="mdl-textfield__input">
                                    <label class="mdl-textfield__label" for="password" id="pwderror">Password</label>
                                </div>
                                <a href="<?=ROOT?>/login/ForgotPassword" class="login-link">Forgot password?</a>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <a href="<?=ROOT?>/Signup" class="login-link">Don't have account?</a>
                                <div class="mdl-layout-spacer"></div>
                                <input type="submit" value="Login" name="login"
                                    class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById('Email').value;
            var emialerror = document.getElementById('emailerror').value;
            var pwd = document.getElementById('pwd').value;
            var pwderror = document.getElementById('pwderror').value;
            if (email.trim() === '' || pwd.trim() === ''){
                if(email.trim() === ''){
                    emialerror.style.visibility = "visible"
                    emialerror.innerHTML = "Enter a valid email"
                }
                if(pwd.trim() === ''){
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