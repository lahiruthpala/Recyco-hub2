<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

                    <!-- Pie chart-->
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Inventory Breakdown</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Warehouse Capacity</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Sorting rate</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('PendingInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Inventory</Button>
                                <button onclick="loadComponent('RawInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Raw Inventory</Button>
                                <!-- <button id="newstock"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Inventory</Button> -->
                                <button onclick="loadComponent('SortedInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Sorted Inventory</Button>
                                <button id="newstock"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"> Add New Stock</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTital" class="mdl-card__title-text">Assign</h1>
                            </div>
                            <div class="mdl-card__supporting-text no-padding">
                                <section id="content">
                                    <div style="display: flex">
                                        <div
                                            class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone">
                                            <div class="mdl-card mdl-shadow--2dp">
                                                <div class="mdl-card__title">
                                                    <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
                                                </div>
                                                <div class="mdl-card__supporting-text">
                                                    <form class="form form--basic">
                                                        <div class="mdl-grid">
                                                            <div
                                                                class="mdl-cell mdl-cell--3-col-desktop mdl-cell--3-col-tablet mdl-cell--1-col-phone">
                                                                <div
                                                                    class="profile-image color--smooth-gray profile-image--round">
                                                                    <img src="images/Bobby.PNG">
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                                                                <div
                                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                                    <input class="mdl-textfield__input" type="text"
                                                                        value="Lakidu"
                                                                        id="profile-floating-first-name">
                                                                    <!-- <label class="mdl-textfield__label" for="profile-floating-first-name">First Name</label> -->
                                                                </div>
                                                                <div
                                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                                    <input class="mdl-textfield__input" type="text"
                                                                        value="ABC-4645" id="profile-floating-last-name">
                                                                    <!-- <label class="mdl-textfield__label" for="profile-floating-last-name">Last Name</label> -->
                                                                </div>
                                                                <div
                                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                                    <input class="mdl-textfield__input" type="text"
                                                                        value="Colombo-5"
                                                                        id="profile-floating-e-mail">
                                                                    <!-- <label class="mdl-textfield__label" for="floating-e-mail">Email</label> -->
                                                                </div>
                                                                <div
                                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                                                                    <input class="mdl-textfield__input" type="text"
                                                                        value="Active"
                                                                        id="profile-floating-e-mail">
                                                                    <!-- <label class="mdl-textfield__label" for="floating-e-mail">Email</label> -->
                                                                </div>
                                                                <button
                                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                                                                    style="border-radius: 99px;">Assign</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
    <script src="<?= ROOT ?>/js/GeneralManager.js"></script>
    <!-- endinject -->
</body>

</html>