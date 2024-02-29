<?php $this->view('include/head') ?>
<body>
    <div class="layout js-layout color--gray is-small-screen login">
        <main class="layout__content" style="padding: 50px;">
            <div class="card card__login shadow--2dp">
                <form method="post">
                    <div class="card__supporting-text color--dark-gray">
                        <div class="grid" style="display: flex;flex-direction: column;">
                            <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                                <span class="card__title-text text-color--smooth-gray">Recyco-HUB</span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                                <span class="login-name text-color--white">Sign up</span>
                            </div>
                            <?php if (count($errors) > 0): ?>
                                <div style="ml-10px" role="alert">
                                    <strong>Errors:</strong>
                                    <?php foreach ($errors as $error): ?>
                                        <br>
                                        <?= $error ?>
                                    <?php endforeach; ?>
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <!-- <span aria-hidden="true">&times;</span> -->
                                        <i class="material-icons">close</i>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="cell cell--12-col cell--4-col-phone" style="width: 93%;">
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="name" name="UserName"
                                        value="<?= get_var("name") ?>">
                                    <label class="textfield__label" for="name">UserName</label>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="password" id="pwd1" name="pwd1"
                                        value="<?= get_var('pwd1') ?>">
                                    <label class="textfield__label" for="password">Password</label>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="password" id="pwd2" name="pwd2"
                                        value="<?= get_var("pwd2") ?>">
                                    <label class="textfield__label" for="password">Retype Password</label>
                                </div>
                                <div class="textfield js-textfield textfield--floating-label full-size">
                                    <input class="textfield__input" type="text" id="e-mail" name="Email"
                                        value="<?= get_var("Email") ?>">
                                    <label class="textfield__label" for="e-mail">Email</label>
                                </div>
                                <label
                                    class="checkbox js-checkbox js-ripple-effect checkbox--colored-light-blue checkbox--inline"
                                    for="checkbox-1">
                                    <input type="checkbox" id="checkbox-1" class="checkbox__input" checked>
                                </label>
                                <span class="login-link">I agree all statements in <a href="#" style="color: white;" class="underlined">terms
                                        of
                                        service</a></span>
                            </div>
                            <div class="cell cell--12-col cell--4-col-phone submit-cell" style="width: 93%;">
                                <a href="login.html" class="login-link">I have already signed up</a>
                                <br>
                                <div class="layout-spacer"></div><br>
                                <div>
                                    <button type="submit"
                                        class="button js-button button--raised color--light-blue">
                                        SIGN UP
                                    </button>
                                    <a href="home">
                                        <button type="button"
                                            class="button js-button button--raised color--light-blue">
                                            Cancel
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php $this->view('include/footer') ?>

</body>

</html>