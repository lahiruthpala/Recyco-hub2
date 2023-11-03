<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout color--white is-small-screen login">
        <header>

        </header>
        <main class="mdl-layout__content">
            <form method="post">
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
                                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                                    <strong>Errors:</strong>
                                    <?php foreach ($errors as $error): ?>
                                        <br>
                                        <?= $error ?>
                                    <?php endforeach; ?>
                                    <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input type="email" placeholder="" name="Email" class="mdl-textfield__input">
                                    <label class="mdl-textfield__label" for="e-mail">Email</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                    <input type="password" placeholder="" name="pwd" class="mdl-textfield__input">
                                    <label class="mdl-textfield__label" for="password">Password</label>
                                </div>
                                <a href="forgot-password.html" class="login-link">Forgot password?</a>
                            </div>
                            <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                                <a href="sign-up.html" class="login-link">Don't have account?</a>
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

    <!-- inject:js -->
    <script src="<?= ROOT ?>/js/d3.min.js"></script>
    <script src="<?= ROOT ?>/js/getmdl-select.min.js"></script>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/nv.d3.min.js"></script>
    <script src="<?= ROOT ?>/js/layout/layout.min.js"></script>
    <script src="<?= ROOT ?>/js/scroll/scroll.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/employer-form/employer-form.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/map/maps.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/table/table.min.js"></script>
    <script src="<?= ROOT ?>/js/widgets/todo/todo.min.js"></script>
    <script src="<?= ROOT ?>/js/sortingManage.js"></script>
    <!-- endinject -->

</body>

</html>