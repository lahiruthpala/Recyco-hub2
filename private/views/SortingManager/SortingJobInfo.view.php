<?php $this->view('include/head') ?>

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
                <div class="card__title">
                    <h1 class="card__title-text">Current Progress</h1>
                </div>

                <div class="bar__container">
                    <ul class="bar" id="bar">
                        <li class="active">New</li>
                        <li class="<?php if ($data->statusint >= 1)
                            echo 'active'; ?>">Assigned</li>
                        <li class="<?php if ($data->statusint >= 2)
                            echo 'active'; ?>">Collected</li>
                        <li class="<?php if ($data->statusint >= 3)
                            echo 'active'; ?>">In whorehouse</li>
                        <li class="<?php if ($data->statusint >= 4)
                            echo 'active'; ?>">Sorting</li>
                        <li class="<?php if ($data->statusint >= 5)
                            echo 'active'; ?>">Sorted</li>
                        <li class="<?php if ($data->statusint >= 6)
                            echo 'active'; ?>">Ready To Sell</li>
                        <li class="<?php if ($data->statusint >= 7)
                            echo 'active'; ?>">Sold</li>
                    </ul>
                </div>
            </div>
            <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone">
                <div class="card__title">
                    <h1 class="card__title-text" id="tableTitle">
                        <?= $data->Status ?>
                    </h1>
                </div>
                <section id="cards" style="background-color: var(--light-gray);">
                    <form class="form form--basic" method="POST">
                        <div>
                            <div class="grid" style="justify-content: center;">
                                <div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Sorting_Job_ID -> </h6>
                                        <h6>
                                            <?php echo $data->Sorting_Job_ID; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Created BY -> </h6>
                                        <h6>
                                            <?= $data->User_ID; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Started Date -> </h6>
                                        <h6>
                                            <?= $data->Start_Date; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Finished Date -> </h6>
                                        <h6>
                                            <?= $data->End_Date ?? "Still Sorting"; ?>
                                        </h6>
                                    </div>
                                </div>
                                <div style="margin-left: 10vw;">
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Description -> </h6>
                                        <h6>
                                            <?= $data->Description ?? "Routing Sort process"; ?>
                                        </h6>
                                    </div>
                                    <div style="flex: ;display: flex;gap: 10px;color: aliceblue;">
                                        <h6>Assigned Machine -> </h6>
                                        <h6>
                                            <?= $data->Line_No ?? "Not assigned"; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card__supporting-text no-padding" id="NewInventory" style="display: block;">
                                <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr style="background-color: #333;width: 100%;">
                                            <th class="data-table__cell--non-numeric">Inventory_ID</th>
                                            <th class="data-table__cell--non-numeric" style="text-align: center;">Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <h5>Sorting Inventories</h5>
                                    <?php
                                    if (is_array($rows) && !empty($rows)) {
                                        $id = 1; // Initialize ID counter
                                        foreach ($rows as $row) {
                                            ?>
                                            <tr
                                                onclick="loadScreen('Inventory/InventoryProgress', '<?= $row->Inventory_ID ?>')">
                                                <td class="data-table__cell--non-numeric" name="Inventory_ID"
                                                    id="batch<?= $id ?>">
                                                    <?= $row->Inventory_ID ?>
                                                </td>
                                                <td class="data-table__cell--non-numeric" style="text-align: center;">
                                                    <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
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
                        </div>
                        <div class="card__supporting-text no-padding" id="NewInventory" style="display: block;">
                            <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                                <thead>
                                    <tr style="background-color: #333;width: 100%;">
                                        <th class="data-table__cell--non-numeric">Inventory_ID</th>
                                        <th class="data-table__cell--non-numeric" style="text-align: center;">Status
                                        </th>
                                    </tr>
                                </thead>
                                <h5>Inventories generated form the sorting</h5>
                                <?php
                                if (is_array($rows) && !empty($rows)) {
                                    $id = 1; // Initialize ID counter
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr onclick="loadScreen('Inventory/InventoryProgress', '<?= $row->Inventory_ID ?>')">
                                            <td class="data-table__cell--non-numeric" name="Inventory_ID" id="batch<?= $id ?>">
                                                <?= $row->Inventory_ID ?>
                                            </td>
                                            <td class="data-table__cell--non-numeric" style="text-align: center;">
                                                <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
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
            </div>
    </div>
    </form>
    </section>
    </div>
    </main>
    </div>
    <script src="<?= ROOT ?>/js/material.min.js"></script>
    <script src="<?= ROOT ?>/js/loadcomponent.js"></script>
    <script src="<?= ROOT ?>/js/progress.js"></script>
</body>

</html>