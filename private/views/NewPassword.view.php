<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content">
            <div class="card card__login shadow--2dp" style="margin-top: 65px;width: fit-content;">
                <div class="card__supporting-text color--dark-gray">
                    <form method="POST" id="passwordForm">
                        <div
                            style="display: flex;flex-direction: column;align-items: center;color: black;width: 415px;">
                            <div style="align-self: flex-start;color: green;margin-bottom: 30px;">
                                <span class="card__title-text text-color--smooth-gray"
                                    style="font-size: 22px;">Recyco_HUB</span>
                            </div>
                            <div style="align-self: flex-start;">
                                <span class="login-name text-color--white" style="font-size: 17px;">Password
                                    Reset</span>
                                <span class="login-secondary-text text-color--smoke">Enter Your New Password</span>
                            </div>
                            <div style="align-self: flex-start;">
                                <input name="Action" value="Reset" hidden>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;"
                                        type="password" placeholder="" id="pwd1" name="pwd1" class="textfield__input">
                                    <label class="textfield__label" for="pwd1">Enter new password</label>
                                </div>
                            </div>
                            <div style="align-self: flex-start;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input style="border: 1px solid#8897AD;border-radius: 8px;margin-top: 7px;"
                                        type="password" placeholder="" id="pwd2" name="pwd2" class="textfield__input">
                                    <label class="textfield__label" for="pwd2">Re-type new password</label>
                                </div>
                            </div>
                            <div style="align-self: flex-end;">
                                <div class="layout-spacer"></div>
                                <button type="submit" class="button js-button button--raised"
                                    style="background-color: green;">
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
    <script>
        function checkPasswords(e) {
            e.preventDefault();
            var pwd1 = document.getElementById('pwd1').value;
            var pwd2 = document.getElementById('pwd2').value;

            if (pwd1 === pwd2) {
                document.getElementById('passwordForm').submit();
            } else {
                SideNotification(["Passwords doesn't match", 'error']);
                return;
            }
        }
    </script>