<?php
global $activeTab;
$activeTab = 2;
$this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/SortingManager.php");
require_once(APP_ROOT . "/controllers/Charts.php");
$sortingManager = new SortingManager();
$chart = new Charts(); ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="layout__content">

            <div>
                <div style="width: 100%; display: flex; flex-direction: row;">
                    <?php $chart->SortingRate();
                    $chart->SortingEfficiency();
                    $chart->SortedItems();
                    ?>
                </div>
                <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                    <div class="card shadow--2dp">
                        <div id="buttonToggle" class="buttonToggle">
                            <button id="NewSortingJobs_Button" onclick="loadComponent('NewSortingJobs')"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 10px 4px 4px;">New Sorting Job</Button>
                            <button id="SortingJobs_Button" onclick="loadComponent('SortingJobs')"
                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                style="margin: 4px 10px 4px 4px;">Pending Sorting Jobs</Button>
                            <button id="SortedJobs_Button" onclick="loadComponent('SortedJobs')"
                                class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                style="margin: 4px 4px 4px 4px;">Finished Sorting Jobs</Button>
                        </div>
                        <section id="content">
                            <?php $sortingManager->CreateSortingJobs(); ?>
                            <?php $sortingManager->PendingSortingJobs(); ?>
                            <?php $sortingManager->SortedJobs(); ?>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <?php $this->view('include/footer') ?>