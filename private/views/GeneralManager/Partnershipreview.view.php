<?php $this->view('include/head') ?>
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
                    <div class="cell cell--6-col-desktop cell--6-col-tablet cell--12-col-phone"
                        style="width: calc(93% - 32px);">
                        <div class="card shadow--2dp line-chart" style="margin-right: 16px;">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadPreview('EventPreview')" id="EventPreview_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">Events</Button>
                                <button onclick="loadPreview('ArticlePreview')" id="ArticlePreview_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Articles</button>
                            </div>
                            <?php $this->view('GeneralManager/Partner/Dashboardevents') ?>
                            <?php $this->view('GeneralManager/Partner/DashboardArticles') ?>
                        </div>
                    </div>
                </div>
                <div>

                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadComponent('PartnerTable')" id="PartnerTable_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-green">Partnerships</Button>
                                <button onclick="loadComponent('EventsTable')" id="EventsTable_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Events</Button>
                                <button onclick="loadComponent('ArticlesTable')" id="ArticlesTable_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Articles</Button>
                                <button onclick="loadComponent('ComplaintsTable')" id="ComplaintsTable_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Complaints</Button>
                                <button onclick="loadComponent('NewPartnership')" id="NewPartnership_Button"
                                    style="margin: 4px 10px 4px 4px;"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">New
                                    Partnerships</button>
                            </div>
                            <?php $generalmanager->partnershipTable(); ?>
                            <?php $generalmanager->partnerArticle(); ?>
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