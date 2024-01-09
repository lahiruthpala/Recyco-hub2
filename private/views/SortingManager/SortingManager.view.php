<?php $this->view('include/head') ?>
<?php require_once(APP_ROOT . "/controllers/SortingManager.php");
$sortingManager = new SortingManager(); ?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div style="width: 100%; display: flex; flex-direction: row;">
                        <?php $sortingManager->SortingRate();
                        $sortingManager->SortingEfficiency();
                        $sortingManager->SortedItems();
                        ?>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button id="stock" onclick="loadComponent('newsortingjobs')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">New Sorting Job</Button>
                                <button onclick="loadComponent('SortingJobs')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Pending Sorting Jobs</Button>
                                <button onclick="loadComponent('SortedJobs')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Finished Sorting Jobs</Button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 class="mdl-card__title-text" id="tableTitle" style="border-radius: 0;">Sorting Jobs</h1>
                            </div>
                            <section id="content">
                                <?php $sortingManager->CreateSortingJobs(); ?>
                                <?php $sortingManager->PendingSortingJobs(); ?>
                                <?php $sortingManager->SortedJobs(); ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <?php $this->view('include/footer') ?>