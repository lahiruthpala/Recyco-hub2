<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--white is-small-screen login">
        <div style="display: flex;height: 100%;flex-direction: row;flex-wrap: wrap;width: 100%;border-radius: 0;padding: 20px auto;background-color: #EDEDED;justify-content: space-between;"
            class="card card__login" style="background-color: #EDEDED;">
            <form method="post" onsubmit="validateForm(event)" id="SignupForm"
                style="background-color: #EDEDED;align-self: center;margin-left: 197px;">
                <div class="card__supporting-text color--dark-gray"
                    style="border-radius: 0 15px 15px 0;max-width: 450px;color: black;"">
                        <div class=" grid" style="display: flex;flex-direction: column;">
                    <div class="cell cell--12-col cell--4-col-phone">
                        <span class="login-name" style="color:Green;font-weight: bold;">RecycoHUB</span>
                    </div>
                    <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                        <span class="login-name">Hi!!! There 👋</span>
                        <span class="login-secondary-text">Today is a new day. It's your day. Join Our Community. Make a
                            impact 🌎</span>
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
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="UserName"
                                placeholder="" id="UserName" name="UserName" class="textfield__input">
                            <label class="textfield__label" for="UserName">UserName</label>
                            <label class="textfield__error" id="UserNameError" for="UserName"></label>
                        </div>
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="e-mail"
                                placeholder="" id="Email" name="Email" class="textfield__input">
                            <label class="textfield__label" for="Email">E mail</label>
                            <label class="textfield__error" id="EmailError" for="Email"></label>
                        </div>
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="password"
                                placeholder="" id="pwd1" name="pwd1" class="textfield__input">
                            <label class="textfield__label" for="pwd1">Password</label>
                            <label class="textfield__error" id="pwderror1" for="pwd"></label>
                        </div>
                        <div class="textfield js-textfield textfield--floating-label full-size">
                            <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;" type="password"
                                placeholder="" id="pwd2" name="pwd2" class="textfield__input">
                            <label class="textfield__label" for="pwd2">Confirm Password</label>
                            <label class="textfield__error" id="pwderror2" for="pwd"></label>
                        </div>
                        <div>
                            <label
                                class="checkbox js-checkbox js-ripple-effect checkbox--colored-light-blue checkbox--inline"
                                for="checkbox-1">
                                <input type="checkbox" id="checkbox-1" class="checkbox__input">
                            </label>
                            <span class="login-link" style="color: black;">I agree all statements in <a href="#"
                                    style="color: green;" class="underlined">terms
                                    of
                                    service</a></span>
                        </div>
                    </div>
                    <div class="cell cell--12-col cell--4-col-phone submit-cell" style="width: 93%;">
                        <input style="width: 100%;background-color: #027855;" type="submit" value="SIGN UP"
                            name="SIGN UP" class="button js-button button--raised">
                    </div>
                    <div class="cell cell--12-col cell--4-col-phone submit-cell" style="width: 93%;">
                        <a href="<?= ROOT ?>/home" style="width: 100%;">
                            <input style=";background-color: #0064ff;width: 92%;" value="HOME" name="HOME"
                                class="button js-button button--raised">
                        </a>
                    </div>
                </div>
        </div>
        </form>
        <img src="<?= ROOT ?>/images/Login-SignUp.png" style="max-width: 600px;padding-top: 20px;">
    </div>
    </div>
    <script>
        function validateForm(e) {
            e.preventDefault();
            var count = 0;
            var form = document.getElementById('SignupForm');
            var username = document.getElementById('UserName').value;
            var usernameerror = document.getElementById('UserNameError');
            var email = document.getElementById('Email').value;
            var emialerror = document.getElementById('EmailError');
            var pwd1 = document.getElementById('pwd1').value;
            var pwderror1 = document.getElementById('pwderror1');
            var pwd2 = document.getElementById('pwd2').value;
            var pwderror2 = document.getElementById('pwderror2');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
            console.log(pwd1, pwd2);
            if (email.trim() === '' || pwd1.trim() === '') {
                if (email.trim() === '') {
                    emialerror.style.visibility = "visible";
                    emialerror.innerHTML = "Enter a valid email";
                    count++;
                }
                if (pwd1.trim() === '') {
                    pwderror1.style.visibility = "visible";
                    pwderror1.innerHTML = "Enter a valid password";
                    count++;
                }
            }
            if (username.length < 4 || username.length > 10) {
                usernameerror.style.visibility = "visible";
                usernameerror.innerHTML = "Username must be between 4 and 10 characters";
                count++;
            }
            if (!emailRegex.test(email)) {
                emialerror.style.visibility = "visible";
                emialerror.innerHTML = "Enter a valid email";
                count++;
            }
            if (pwd1.length < 6) {
                pwderror1.style.visibility = "visible";
                pwderror1.innerHTML = "Password must be at least 6 characters long";
                count++;
            }
            if (pwd1 != pwd2) {
                pwderror2.style.visibility = "visible";
                pwderror2.innerHTML = "Password does not match";
                count++;
            }
            // if (!passwordRegex.test(pwd1)) {
            //     pwderror1.style.visibility = "visible";
            //     pwderror1.innerHTML = "Enter a valid password";
            //     count++;
            // }
            if (count == 0) {
                form.submit();
            }
        }
    </script>
    <?php $this->view('include/footer') ?>