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
                        ?>
                </div>
            </div>
        </main>
    </div>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>