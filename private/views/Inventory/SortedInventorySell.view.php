<?php $this->view('include/head'); ?>

<head>
    <link rel="stylesheet" href="<?= ROOT ?>/css/progress.css">
</head>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>
        <main class="layout__content">
            <div class="Progressbackground">
                <h6 class="title">Current Progress</h6>
                <div class="bar__container">
                    <ul class="bar" id="bar">
                        <li class="active">Sorting</li>
                        <li class="<?php if ($data->statusint >= 1)
                            echo 'active'; ?>">Sorted</li>
                        <li class="<?php if ($data->statusint >= 2)
                            echo 'active'; ?>">Approved to sell</li>
                        <li class="<?php if ($data->statusint >= 3)
                            echo 'active'; ?>">Posted</li>
                        <li class="<?php if ($data->statusint >= 4)
                            echo 'active'; ?>">Soled</li>
                    </ul>
                </div>
            </div>
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <h6 class="card__title-text" id="tableTitle" style="color: black;margin: 15px;font-size: 15px;">
                    Inventory Details
                </h6>
                <form class="form form--basic" method="POST">
                    <div class="grid"
                        style="background-color: white;color: black;border-radius: 20px;justify-content: space-between;">
                        <div style="margin: 0 15px 20px 40px;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Inventory_ID</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Inventory_ID ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created BY</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Machine_ID; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Created Date</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Start_Date; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Type</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Type; ?>
                                </h6>
                            </div>
                        </div>
                        <div style="margin-left: 10vw;">
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Status</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Status ?? "Error"; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Sorting_Job_ID</h6>
                                <a class="linkinfo"
                                    href="<?= isset($data->Sorting_Job_ID) ? ROOT . 'SortingManager/SortingJobProgress?id=' . $data->Sorting_Job_ID : 'javascript:void(0)'; ?>">
                                    <h6 style="margin: 0;font-weight: bold;">
                                        <?= $data->Sorting_Job_ID ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>

                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Waste weight</h6>
                                <h6 style="margin: 0;font-weight: bold;">
                                    <?= $data->Weight . "Kg" ?? "Not assigned"; ?>
                                </h6>
                            </div>
                            <div style="display: flex;flex-direction: column;margin-top: 27px;">
                                <h6 style="margin: 0px;">Sorting Job</h6>
                                <a class="linkinfo"
                                    href="<?= isset($data->Sorting_Job_ID) ? ROOT . '/SortingManager/SortingJobProgress?id=' . $data->Sorting_Job_ID : 'javascript:void(0)'; ?>">
                                    <h6 style="margin: 0;font-weight: bold;">
                                        <?= $data->Sorting_Job_ID ?? "Not assigned"; ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                        <div style="margin-left: 10vw;display: flex;align-items: end;">
                            <?php if ($data->statusint == 1) { ?>
                                <a href="<?=ROOT?>/Inventory/UpdateStatusSortedItems/Approved to sell/<?= $data->Inventory_ID ?>"><button type="button"
                                        class="button js-button button--raised js-ripple-effect button--colored-teal"
                                        style="border-radius: 99px;align-self: end;margin: 0 25px 25px auto;background-color: #027855;"
                                        id="publishbutton" readonly>
                                        <img style="padding: 2px 10px 6px 0;" src="<?= ROOT ?>/images/Printer.svg">Ready to
                                        sell</button></a>
                            <?php } ?>
                            <?php if ($data->statusint >= 2) { ?>
                                <a href="<?=ROOT?>/Inventory/UpdateStatusSortedItems/Sorted/<?= $data->Inventory_ID ?>"><button type="button"
                                        class="button js-button button--raised js-ripple-effect button--colored-teal"
                                        style="border-radius: 99px;align-self: end;margin: 0 25px 25px auto;background-color: red;"
                                        id="Recallbutton" readonly>
                                        <img style="padding: 2px 10px 6px 0;" src="<?= ROOT ?>/images/Printer.svg">Re-call</button></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card__supporting-text no-padding" id="NewInventory" style="display: block;">
                        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th class="data-table__cell--header">Inventory_ID</th>
                                    <th class="data-table__cell--header" style="text-align: center;">Status
                                    </th>
                                </tr>
                            </thead>
                            <?php
                            if (is_array($inventory) && !empty($inventory)) {
                                $id = 1; // Initialize ID counter
                                foreach ($inventory as $row) {
                                    ?>
                                    <tr onclick="loadScreen('Inventory/InventoryProgress', '<?= $row->Inventory_ID ?>')">
                                        <td class="data-table__cell--non-numeric" name="Inventory_ID" id="batch<?= $id ?>">
                                            <?= $row->Inventory_ID ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric" style="text-align: center;">
                                            <span class="label label--mini"
                                                style="background-color: <?= statuscolor($row->Status) ?>">
                                                <?= $row->Status ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                    $id++; // Increment ID for the next row
                                }
                            } else {
                                echo "No data available.";
                            }
                            ?>
                        </table>
                    </div>
                </form>
                </section>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
</body>

</html>