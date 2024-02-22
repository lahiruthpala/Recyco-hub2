<?php
global $activeTab;
$activeTab = 1;
$this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/Inventory.php");
require_once(APP_ROOT . "/controllers/GeneralManager.php");
require_once(APP_ROOT . "/controllers/Charts.php");
$inventory = new Inventory();
$generalManager = new GeneralManager();
$charts = new Charts();
?>

<body>
    <div class="layout js-layout">
        <?php $this->view('include/header') ?>

        <main class="layout__content">
            <div>
                <div style="width: 100%; display: flex; flex-direction: row;">
                    <?php $inventory->InventoryBreakdown();
                    $charts->WarehouseCapacity();
                    $charts->WarehouseInsOuts()
                        ?>
                </div>
                <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                    <div class="card shadow--2dp">
                        <div id="buttonToggle" class="buttonToggle">
                                <button onclick=" loadComponent('NewInventory')" style="margin: 4px 10px 4px 4px;"
                            id="NewInventory_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-green">Pending
                            Inventory</Button>
                            <button onclick="loadComponent('RawInventory')" style="margin: 4px 10px 4px 4px;"
                                id="RawInventory_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke">Raw
                                Inventory</Button>
                            <button onclick="loadComponent('SortedInventory')" style="margin: 4px 4px 4px 4px;"
                                id="SortedInventory_Button"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke">Sorted
                                Inventory</Button>
                            <?php if (Auth::getRole() == 'GeneralManager') {
                                echo ('<button onclick="loadComponent(\'CreateInventory\')" 
                                        id="CreateInventory_Button"
                                        class="button js-button button--raised js-ripple-effect button--colored-smoke" style="margin: 4px 4px 4px 4px;">
                                        Generate Inventory</button>
                                        ');
                            } ?>
                        </div>
                        <!-- <div class="card__title">
                            <h1 id="tableTitle" class="card__title-text">Pending Inventory</h1>
                        </div> -->
                        <?php
                        if ((Auth::getRole() == 'GeneralManager')) {
                            $generalManager->Generate();
                        }
                        $inventory->InventoryBatch();
                        $inventory->SortedInventory();
                        $inventory->RawInventory();
                        $inventory->Assign() ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>