<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <div class="mdl-card mdl-card__login mdl-shadow--2dp">
                <form method="post">
                    <div class="mdl-card__supporting-text color--dark-gray">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <span class="mdl-card__title-text text-color--smooth-gray">Recyco-HUB</span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
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
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="name" name="UserName"
                                        value="<?= get_var("name") ?>">
                                    <label class="mdl-textfield__label" for="name">UserName</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="pwd1" name="pwd1"
                                        value="<?= get_var('pwd1') ?>">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="pwd2" name="pwd2"
                                        value="<?= get_var("pwd2") ?>">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                        value="<?= get_var("email") ?>">
                                    <label class="mdl-textfield__label" for="e-mail">Email</label>
                                </div>
                                <label
                                    class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect checkbox--colored-light-blue checkbox--inline"
                                    for="checkbox-1">
                                    <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>

                                </label>
                                <span class="login-link">I agree all statements in <a href="#" class="underlined">terms
                                        of
                                        service</a></span>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <a href="login.html" class="login-link">I have already signed up</a>
                                <br>
                                <div class="mdl-layout-spacer"></div><br>
                                <div>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
                                        SIGN UP
                                    </button>
                                    <a href="home">
                                        <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised color--light-blue">
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