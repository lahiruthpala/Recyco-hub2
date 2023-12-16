<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/Inventory.php");
require_once(APP_ROOT . "/controllers/GeneralManager.php");
$inventory = new Inventory();
$generalManager = new GeneralManager();
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
                                <div class="mdl-card__title" style="align-items: center; justify-content: center;">
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
                                <div class="mdl-card__title" style="align-items: center; justify-content: center;">
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
                                <div class="mdl-card__title" style="align-items: center; justify-content: center;">
                                    <h2 class="mdl-card__title-text">Sorting Rate</h2>
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
                                <button onclick="loadComponent('NewInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    >Pending Inventory</Button>
                                    <button onclick="loadComponent('RawInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    >Raw Inventory</Button>
                                <button onclick="loadComponent('SortedInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    >Sorted Inventory</Button>
                                <button onclick="loadComponent('CreateInventory')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="margin-left: auto;">Add New Stock</button>
                            </div>
                            <div class="mdl-card__title" style="border-radius: 0;">
                                <h1 id="tableTitle" class="mdl-card__title-text">Pending Inventory</h1>
                            </div>
                                <?php
                                $generalManager->Generate();
                                $inventory->InventoryBatch();
                                $inventory->SortedInventory();
                                $inventory->RawInventory();
                                $inventory->Assign() ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <?php $this->view('include/footer') ?>