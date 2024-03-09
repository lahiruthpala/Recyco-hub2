<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--white is-small-screen login">
        <div style="display: flex;height: 100%;flex-direction: row;flex-wrap: wrap;width: 100%;border-radius: 0;padding: 20px auto;background-color: #EDEDED;justify-content: space-between;"
            class="card card__login" style="background-color: #EDEDED;">
            <form method="post" onsubmit="validateForm(event)" id="loginForm" class="loginForm">
                <div class="card__supporting-text color--dark-gray"
                    style="border-radius: 0 15px 15px 0;max-width: 450px;color: black;"">
                        <div class=" grid" style="display: flex;flex-direction: column;">
                    <div class="cell cell--12-col cell--4-col-phone">
                        <span class="login-name" style="color:Green;font-weight: bold;">RecycoHUB</span>
                    </div>
                    <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                        <span class="login-name">Welcome Back 👋</span>
                        <span class="login-secondary-text">Today is a new day. It's your day. You shape it. Sign in to
                            protect the world.</span>
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
                    <div style="width: 93%;margin-left: 16px;display: flex;flex-direction: column;">
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="email"
                                placeholder="" id="Email" name="Email" class="textfield__input">
                            <label class="textfield__label" for="Email">Email</label>
                        </div>
                        <label class="textfield__error" id="emailerror" for="Email"></label>
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="password"
                                placeholder="" id="pwd" name="pwd" class="textfield__input">
                            <label class="textfield__label" for="pwd" id="pwd">Password</label>
                        </div>
                        <label class="textfield__error" id="pwderror" for="pwd"></label>
                        <a href="<?= ROOT ?>/login/ForgotPassword" style="color: green;align-self: end;">Forgot
                            password?</a>
                    </div>
                    <div class="cell cell--12-col cell--4-col-phone submit-cell" style="width: 93%;">
                        <input style="width: 100%;background-color: #027855;" type="submit" value="Login" name="login"
                            class="button js-button button--raised">
                    </div>
                    <div style="display: flex;align-items: center;justify-content: center;">
                        <h6 style="margin: 0;margin-right: 16px;">Don't have an account?</h6>
                        <a style="color: #027855;" href="<?= ROOT ?>/Signup" class="login-link">Sign Up</a>
                    </div>
                </div>
        </div>
        </form>
            <img class="loginImage" src="<?= ROOT ?>/images/Login-SignUp.png">
    </div>
    </div>
    <script>
        function validateForm(e) {
            e.preventDefault();
            var form = document.getElementById('loginForm');
            var email = document.getElementById('Email').value;
            var emialerror = document.getElementById('emailerror');
            var pwd = document.getElementById('pwd').value;
            var pwderror = document.getElementById('pwderror');

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            if (email.trim() === '' || pwd.trim() === '') {
                if (email.trim() === '') {
                    emialerror.style.visibility = "visible";
                    emialerror.innerHTML = "Enter a valid email";
                }
                if (pwd.trim() === '') {
                    pwderror.style.visibility = "visible";
                    pwderror.innerHTML = "Enter a valid password";
                }
                return false;
            } else if (!emailRegex.test(email)) {
                emialerror.style.visibility = "visible";
                emialerror.innerHTML = "Enter a valid dfvdfv email";
                return false;
            } else if (!passwordRegex.test(pwd)) {
                // pwderror.style.visibility = "visible";
                // pwderror.innerHTML = "Enter a valid  advdsv password";
                form.submit();
            } else {
                form.submit();
            }
        }
    </script>
    <?php $this->view('include/footer') ?>