<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/GeneralManager.php");
$generalmanager = new GeneralManager();
?>

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
                                    <h2 class="mdl-card__title-text">Active Collectors</h2>
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
                                    <h2 class="mdl-card__title-text">Daily collection</h2>
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
                                    <h2 class="mdl-card__title-text">Summary</h2>
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
                                <button onclick="loadComponent('Collectors')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Collectors</Button>
                                <button onclick="loadComponent('Collections')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Collections</Button>
                                <button onclick="loadComponent('PendingCollections')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Collections</Button>
                                <button onclick="loadComponent('ComplaintsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">Complaints</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTitle" class="mdl-card__title-text">Collectors</h1>
                                <button onclick="loadComponent('Collect')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin: 0 25px 0 auto;">Collect</button>
                            </div>
                            <?php $this->view('GeneralManager/Collectors/Collectors', ['collectors' => $collectors]);
                            $generalmanager->PendingPickups();
                            $generalmanager->collections();
                            $generalmanager->complaints();
                            $this->view('GeneralManager/Collectors/Collect');
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>