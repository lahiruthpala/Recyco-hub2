<?php
global $activeTab;
$activeTab=2;
$this->view('include/head');
require_once(APP_ROOT . "/controllers/Admin.php");
$admin = new Admin();
?>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/Adminheader') ?>
        </header>

        <main class="mdl-layout__content">

            <div class="mdl-grid mdl-grid--no-spacing dashboard">

                <div
                    class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--2dp">
                            <div class="mdl-layout__header-row">
                                <button onclick="loadComponent('UserAccounts')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green">User Accounts</Button>
                                <button onclick="loadComponent('UserAccountCreation')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green">Add New Account</Button>
                            </div>
                            <div class="mdl-card__title" style="border-radius: 0;">
                                <h1 id="tableTitle" class="mdl-card__title-text" style="margin-left:20px">User Accounts</h1>
                            </div>
                            <?php
                            $this->view("Admin/NewAccountCreation");
                            $admin->GetAccountinfo()
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php $this->view('include/footer') ?>