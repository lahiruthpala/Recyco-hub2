<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--gray is-small-screen login">
        <main class="mdl-layout__content">
            <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <form>
                        <div class="mdl-card__title">
                            <h5 class="mdl-card__title-text text-color--white">Welcome!</h5>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <form class="form form--basic">
                                <div class="mdl-grid">
                                    <div
                                        class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                                        <h3 class="text-color--smooth-gray">INPUT WITH FLOATING LABEL</h3>
                                        <div class="flex-container">
                                            <div
                                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                    value="<?= get_var("email") ?>">
                                                <label class="mdl-textfield__label" for="e-mail">First Name</label>
                                            </div>
                                            <div
                                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                    value="<?= get_var("email") ?>">
                                                <label class="mdl-textfield__label" for="e-mail">Laste Name</label>
                                            </div>
                                        </div>
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                            <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                value="<?= get_var("email") ?>">
                                            <label class="mdl-textfield__label" for="e-mail">Phone Number</label>
                                        </div>
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                            <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                value="<?= get_var("email") ?>">
                                            <label class="mdl-textfield__label" for="e-mail">Address</label>
                                        </div>
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                            <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                value="<?= get_var("email") ?>">
                                            <label class="mdl-textfield__label" for="e-mail">Phone Number</label>
                                        </div>
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                            <input class="mdl-textfield__input" type="text" id="e-mail" name="email"
                                                value="<?= get_var("email") ?>">
                                            <label class="mdl-textfield__label" for="e-mail">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
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
                            </form>
                        </div>
                        <
                    </form>
                </div>
            </div>
        </main>
    </div>

    <?php $this->view('include/footer') ?>

</body>

</html>