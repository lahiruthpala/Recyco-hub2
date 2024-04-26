<?php global $activeTab;
$activeTab = 3;
$this->view('include/head');
require_once (APP_ROOT . "/controllers/Partner.php");
$partner = new Partner(); ?>

<body>
    <div class="layout js-layout layout--fixed-header">
        <header class="layout__header">
            <?php $this->view('include/partnerheader') ?>
        </header>
        <main class="layout__content">
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card shadow--2dp">
                    <div id="buttonToggle" class="buttonToggle">
                        <button onclick="loadComponent('UpcomingEvents')" style="margin: 4px 10px 4px 4px;"
                            id="UpcomingEvents_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-green">Upcoming
                            Events</Button>
                        <button onclick="loadComponent('OnGoingEvents')" style="margin: 4px 10px 4px 4px;"
                            id="OnGoingEvents_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">OnGoing
                            Events</Button>
                        <button onclick="loadComponent('FinishedEvents')" style="margin: 4px 10px 4px 4px;"
                            id="FinishedEvents_Button"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">Finished
                            Events</Button>
                        <button id="stock" onclick="window.location.href = '<?= ROOT ?>/Partner/AddNewEvent'"
                            style="margin: 4px 10px 4px 4px;"
                            class="button js-button button--raised js-ripple-effect button--colored-smoke">New
                            Events</Button>
                    </div>
                    <?php
                    $partner->UpcomingEvents();
                    ?>
                </div>
            </div>
        </main>
    </div>
    <?php $this->view('include/footer') ?>