<?php 
global $activeTab;
$activeTab=1;
$this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/Inventory.php");
require_once(APP_ROOT . "/controllers/GeneralManager.php");
require_once(APP_ROOT . "/controllers/Charts.php");
$inventory = new Inventory();
$generalManager = new GeneralManager();
$charts = new Charts();
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/Adminheader') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div
                    >
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <?php $inventory->InventoryBreakdown(); 
                        $charts->WarehouseCapacity();
                        $charts->SortingRate()
                        ?>
                    </div>
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div class="layout__header-row">
                                <button onclick="loadComponent('NewInventory')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green">Pending
                                    Inventory</Button>
                                <button onclick="loadComponent('RawInventory')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green">Raw
                                    Inventory</Button>
                                <button onclick="loadComponent('SortedInventory')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green">Sorted
                                    Inventory</Button>
                                <button onclick="loadComponent('CreateInventory')"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin-left: auto;">Add New Stock</button>
                            </div>
                            <div class="card__title" style="border-radius: 0;">
                                <h1 id="tableTitle" class="card__title-text">Pending Inventory</h1>
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
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>