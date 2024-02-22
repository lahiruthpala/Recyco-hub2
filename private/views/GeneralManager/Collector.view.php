<?php
global $activeTab;
$activeTab = 4;
$this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/GeneralManager.php");
$generalmanager = new GeneralManager();
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div>
                    <!-- <div style="width: 100%; display: flex; flex-direction: row;">
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Active Collectors</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Daily collection</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone">
                            <div class="card shadow--2dp pie-chart">
                                <div class="card__title">
                                    <h2 class="card__title-text">Summary</h2>
                                </div>
                                <div class="card__supporting-text">
                                    <div class="pie-chart__container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadComponent('Collectors')" id="Collectors_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Collectors</Button>
                                <button onclick="loadComponent('Collections')" id="Collections_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Collections</Button>
                                <button onclick="loadComponent('PendingCollections')" id="PendingCollections_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Pending Collections</Button>
                                <button onclick="loadComponent('ComplaintsTable')" id="ComplaintsTable_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Complaints</button>
                                <button onclick="loadComponent('Collect')" id="Collect_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Collect</button>
                            </div>
                            <?php $this->view('GeneralManager/Collectors/Collectors', ['collectors' => $collectors]);
                            $generalmanager->PendingPickups();
                            $generalmanager->collections();
                            $generalmanager->CollectorComplaints();
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