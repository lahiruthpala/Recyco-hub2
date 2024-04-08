<?php
global $activeTab;
$activeTab = 3;
$this->view('include/head');
require_once (APP_ROOT . "/controllers/Admin.php");
$admin = new Admin();
?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/Adminheader') ?>
        </header>

        <main class="layout__content">

            <div class="grid grid--no-spacing dashboard">

                <div style="width:100%">
                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                        <div class="card shadow--2dp">
                            <div id="buttonToggle" class="buttonToggle">
                                <button onclick="loadComponent('SortingCenter')" style="margin: 4px 10px 4px 4px;"
                                    id="SortingCenter_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-green">Sorting
                                    Center</Button>
                                <button onclick="loadComponent('MachineTable')" style="margin: 4px 10px 4px 4px;"
                                    id="MachineTable_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Machines</Button>
                                <button onclick="loadComponent('AddNewMachine')" style="margin: 4px 10px 4px 4px;"
                                    id="AddNewMachine_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">Add
                                    New Machine</Button>
                                <button onclick="loadComponent('Sectors')" style="margin: 4px 10px 4px 4px;"
                                    id="Sectors_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">
                                    Sectors</Button>
                                <button onclick="loadComponent('Automation')" style="margin: 4px 10px 4px 4px;"
                                    id="Automation_Button"
                                    class="button js-button button--raised js-ripple-effect button--colored-smoke">
                                    Automation</Button>
                            </div>
                            <?php
                            $admin->AddMachine();
                            $admin->showAllMachines();
                            $admin->SortingCenterInfo();
                            $admin->Automation();
                            $admin->SectorsView();
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