<?php
global $activeTab;
$activeTab = 2;
$this->view('include/head');
require_once(APP_ROOT . "/controllers/Admin.php");
$admin = new Admin();
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/Adminheader') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div style="width: 100%;">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadComponent2('UserAccounts',['UserAccountSort'],[])"
                                id="UserAccounts_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="margin: 4px 10px 4px 4px;">User
                                    Accounts</Button>
                                <button onclick="loadComponent2('UserAccountCreation',[],['UserAccountSort'])" id="UserAccountCreation_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke"
                                    style="margin: 4px 10px 4px 4px;">Add
                                    New Account</Button>
                                <div style="margin-right:30px" id="UserAccountSort">
                                    <form method="POST" class="align-right" style="padding-left:10vw">
                                        <select name="Role" onchange="this.form.submit()" class="dropdown">
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
                                            } ?>>Sorting   Manager
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
                                        <select name="Status" onchange="this.form.submit()" class="dropdown">
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
                                        <div class="textfield js-textfield textfield--expandable" style="padding: 0;">
                                            <label class="button js-button button--icon" for="UserSearch"
                                                style="top: 0;">
                                                <i class="material-icons">search</i>
                                            </label>

                                            <div class="textfield__expandable-holder">
                                                <input class="textfield__input" type="text" id="UserSearch"
                                                    name="Name" />
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