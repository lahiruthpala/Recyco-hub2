<?php
global $activeTab;
$activeTab = 4;
$this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/GeneralManager.php");
require_once(APP_ROOT . "/controllers/Charts.php");
$charts = new Charts();
$generalmanager = new GeneralManager();
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <head>
            <link rel="stylesheet" href="<?= ROOT ?>/css/chat.css">
        </head>

        <main class="layout__content">
            <div>
                <div style="width: 100%; display: flex; flex-direction: row;">
                    <?php
                    $charts->CollectionRate();
                    $charts->WarehouseCapacity();
                    ?>
                </div>
                <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                    <div style="display: flex;flex-direction: column;">
                        <div id="buttonToggle" class="buttonToggle">
                            <button onclick="loadComponent('Collectors')" id="Collectors_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                style="margin: 4px 10px 4px 4px;">Collectors</Button>
                            <button onclick="loadComponent('PendingRequests')" id="PendingRequests_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 10px 4px 4px;">Pending Requests</Button>
                            <button onclick="loadComponent('PendingCollections')" id="PendingCollections_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 10px 4px 4px;">Pending Collections</Button>
                            <button onclick="loadComponent('ComplaintsTable')" id="ComplaintsTable_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 10px 4px 4px;">Complaints</button>
                            <button onclick="loadComponent('Collect')" id="Collect_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 10px 4px 4px;">Collect</button>
                        </div>
                        <?php $this->view('GeneralManager/Collectors/Collectors', ['collectors' => $collectors]);
                        $generalmanager->PendingPickups();
                        $generalmanager->PendingRequests();
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
    <script src="<?= ROOT ?>/js/chat.js"></script>
    <?php $this->view('include/footer') ?>