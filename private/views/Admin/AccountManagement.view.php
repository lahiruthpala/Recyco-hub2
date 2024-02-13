<?php
global $activeTab;
$activeTab = 2;
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
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green">User
                                    Accounts</Button>
                                <button onclick="loadComponent('UserAccountCreation')"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green">Add
                                    New Account</Button>
                            </div>
                            <div class="mdl-card__title" style="border-radius: 0;display: flex;justify-content: space-between;">
                                <h1 id="tableTitle" class="mdl-card__title-text" style="margin-left:20px">User Accounts
                                </h1>
                                <div style="margin-right:30px" id="UserAccountSort" hidden>
                                    <form method="POST" class="align-right" style="padding-left:10vw">
                                        <select name="Role" onchange="this.form.submit()"
                                            style="background-color: #333; color: #fff; border: none; padding: 5px; margin-right:50px">
                                            <option value="ALL" <?php if (!isset($_POST['Role'])) {
                                                echo 'selected';
                                            } ?>>ALL
                                            </option>
                                            <option value="GeneralManager" <?php if (isset($_POST['Role']) && $_POST['Role'] == 'GeneralManager') {
                                                echo 'selected';
                                            } ?>>General Manager
                                            </option>
                                            <option value="SortingManager" <?php if (isset($_POST['Role']) && $_POST['Role'] == 'SortingManager') {
                                                echo 'selected';
                                            } ?>>Sorting Manager
                                            </option>
                                            <option value="SellingManager" <?php if (isset($_POST['Role']) && $_POST['Role'] == 'SellingManager') {
                                                echo 'selected';
                                            } ?>>Selling Manager
                                            </option>
                                            <option value="Collector" <?php if (isset($_POST['Role']) && $_POST['Role'] == 'Collector') {
                                                echo 'selected';
                                            } ?>>Collector</option>
                                            <option value="Customer" <?php if (isset($_POST['Role']) && $_POST['Role'] == 'Customer') {
                                                echo 'selected';
                                            } ?>>Customer</option>
                                        </select>
                                        <select name="Status" onchange="this.form.submit()"
                                            style="background-color: #333; color: #fff; border: none; padding: 5px; margin-right:50px">
                                            <option value="ALL" <?php if (!isset($_POST['Status'])) {
                                                echo 'selected';
                                            } ?>>
                                                ALL</option>
                                            <option value="Active" <?php if (isset($_POST['Status']) && $_POST['Status'] == 'Active') {
                                                echo 'selected';
                                            } ?>>Active</option>
                                            <option value="InActive" <?php if (isset($_POST['Status']) && $_POST['Status'] == 'InActive') {
                                                echo 'selected';
                                            } ?>>In Active</option>
                                        </select>
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable" style="padding: 0;">
                                            <label class="mdl-button mdl-js-button mdl-button--icon" for="UserSearch" style="top: 0;">
                                                <i class="material-icons">search</i>
                                            </label>

                                            <div class="mdl-textfield__expandable-holder">
                                                <input class="mdl-textfield__input" type="text" id="UserSearch" name="Name" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
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