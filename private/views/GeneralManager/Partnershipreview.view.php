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
                <div>
                    <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone" style="max-width: calc(100vw - 32px);">
                        <div class="mdl-card mdl-shadow--2dp line-chart" style="margin-right: 16px;">
                            <div class="mdl-card__title">
                                <button onclick="loadComponent('PartnerTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin: 0;">Partnerships</Button>
                            </div>
                            <?php $this->view('GeneralManager/Partner/Dashboardevents') ?>
                        </div>
                    </div>
                </div>
                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('PartnerTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Partnerships</Button>
                                <button onclick="loadComponent('EventsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Events</Button>
                                <button onclick="loadComponent('ArticlesTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Articles</Button>
                                <button onclick="loadComponent('ComplaintsTable')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1VW;">Complaints</Button>
                                <button onclick="loadComponent('NewPartnership')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;">New Partnerships</button>
                            </div>
                            <div class="mdl-card__title">
                                <h1 id="tableTitle" class="mdl-card__title-text">Partnerships</h1>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable"
                                    style="margin-left: 50%; padding:0;">
                                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search1"
                                        style="top:0px;">
                                        <i class="material-icons">search</i>
                                    </label>

                                    <div class="mdl-textfield__expandable-holder">
                                        <input class="mdl-textfield__input" type="text" id="search1" />
                                        <label class="mdl-textfield__label" for="search1">Enter your query...</label>
                                    </div>
                                </div>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_left</i></button>
                                <button onclick="loadComponent('GeneralManager/Generate')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: auto;"><i
                                        class="material-icons">keyboard_arrow_right</i></button>
                            </div>
                            <?php $generalmanager->partnershipTable(); ?>
                            <?php $generalmanager->TodayArticle(); ?>
                            <?php $generalmanager->partnerEvents(); ?>
                            <?php $generalmanager->complaints(); ?>
                            <?php $generalmanager->NewPartnership(); ?>
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