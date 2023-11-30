<?php $this->view('include/head') ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="mdl-layout__content">
            <div class="mdl-grid ui-cards">
                <div class="mdl-layout__header-row" style="margin-top: 50px;">
                    <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/addNewEvent'"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW;">New Event</Button>
                    <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                    <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW;">Upcomming Events</Button>
                    <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW;">OnGoing Events</Button>
                    <button onclick="window.location.href = '<?= ROOT ?>/Partner/Articles'"
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                        style="border-radius: 99px; margin-left: 1VW;">Finished Events</Button>
                </div>
                <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                    <h3>Events</Article>
                    </h3>
                </div>
                <?php
                if (is_array($articles) && !empty($articles)) {
                    foreach ($articles as $article) {
                        // Your table row generation code here
                        ?>
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">
                                        <?= $article->Event_Title ?>
                                    </h2>
                                </div>
                                <div class="mdl-card__supporting-text mdl-card--expand">
                                    <?= $article->Discription ?><br><br>
                                </div>
                                <div class="mdl-card__actions">
                                    <a style="background-color: #16C784; border-radius: 20px; margin-left: 10px;"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                                        href="<?= ROOT ?>/Partner/addNew/<?= $article->Event_ID ?>">
                                        Edit
                                    </a>
                                    <a style="background-color: #16C784; border-radius: 20px;"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue pull-right"
                                        href="<?= ROOT ?>/Partner/ArticleDelete/<?= $article->Event_ID ?>">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // If $rows is not an array or is empty
                    echo "No data available.";
                }
                ?>
            </div>
        </main>

    </div>

    <!-- inject:js -->
    <script src="js/d3.min.js"></script>
    <script src="js/getmdl-select.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/nv.d3.min.js"></script>
    <script src="js/layout/layout.min.js"></script>
    <script src="js/scroll/scroll.min.js"></script>
    <script src="js/widgets/charts/discreteBarChart.min.js"></script>
    <script src="js/widgets/charts/linePlusBarChart.min.js"></script>
    <script src="js/widgets/charts/stackedBarChart.min.js"></script>
    <script src="js/widgets/employer-form/employer-form.min.js"></script>
    <script src="js/widgets/line-chart/line-charts-nvd3.min.js"></script>
    <script src="js/widgets/map/maps.min.js"></script>
    <script src="js/widgets/pie-chart/pie-charts-nvd3.min.js"></script>
    <script src="js/widgets/table/table.min.js"></script>
    <script src="js/widgets/todo/todo.min.js"></script>
    <!-- endinject -->

</body>

</html>