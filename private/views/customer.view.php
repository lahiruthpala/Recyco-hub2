<?php $this->view('include/head') ?>

<body img src="images/Icon_header.png">
    <header>
        <?php $this->view('include/header') ?>
    </header>
    <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp" style="background-color: lightseagreen;">
            <div class="mdl-card__title" >
                <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form class="form form--basic">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                            <div class="profile-image color--smooth-gray profile-image--round">
                                <img src="images/Bobby.PNG">
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" value="Bob" id="profile-floating-first-name">
                                <label class="mdl-textfield__label" for="profile-floating-first-name">First Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" value="Kelso" id="profile-floating-last-name">
                                <label class="mdl-textfield__label" for="profile-floating-last-name">Last Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" value="BobbyK@darkboard.io" id="profile-floating-e-mail">
                                <label class="mdl-textfield__label" for="floating-e-mail">Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select full-size" >
                                <input class="mdl-textfield__input" type="text" id="location" readonly tabIndex="-1"/>

                                <label class="mdl-textfield__label" for="location">Location</label>

                                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu dark_dropdown" for="location" style="background: lightseagreen;">
                                    <li class="mdl-menu__item">Colombo</li>
                                    <li class="mdl-menu__item">Gampaha</li>
                                    <li class="mdl-menu__item">Kaluthara</li>
                                    <li class="mdl-menu__item">Kandy</li>
                                </ul>

                                <label for="location">
                                    <i class="mdl-icon-toggle__label material-icons">arrow_drop_down</i>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
        <div class="mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Text fields</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <form class="form form--basic">
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <h3 class="text-color--smooth-gray">BASIC INPUT</h3>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="text" id="first-name">
                                <label class="mdl-textfield__label" for="first-name">First Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="text" id="last-name">
                                <label class="mdl-textfield__label" for="last-name">Last Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="text" id="e-mail">
                                <label class="mdl-textfield__label" for="e-mail">Email</label>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone form__article">
                            <h3 class="text-color--smooth-gray">INPUT WITH FLOATING LABEL</h3>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="floating-first-name">
                                <label class="mdl-textfield__label" for="floating-first-name">First Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="floating-last-name">
                                <label class="mdl-textfield__label" for="floating-last-name">Last Name</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                <input class="mdl-textfield__input" type="text" id="floating-e-mail">
                                <label class="mdl-textfield__label" for="floating-e-mail">Email</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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