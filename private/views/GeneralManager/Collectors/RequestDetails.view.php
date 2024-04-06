<?php
global $activeTab;
$activeTab = 4;
$this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <header>
            <?php $this->view('include/header') ?>
        </header>

        <head>
            <link rel="stylesheet" href="<?= ROOT ?>/css/chat.css">
        </head>

        <main class="layout__content">
            <div>
                <div class="card__supporting-text no-padding" id="UserAccounts" style="display: block;">
                    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="data-table__cell--header">User Name</th>
                                <th class="data-table__cell--header">Location</th>
                                <th class="data-table__cell--header">Type</th>
                                <th class="data-table__cell--header">Weight</th>
                                <th class="data-table__cell--header">Requested Date</th>
                                <th class="data-table__cell--header" style="padding-left: 70px;">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($rows) && !empty($rows)) {
                                foreach ($rows as $row) {
                                    ?>
                                    <tr>
                                        <td class="data-table__cell--non-numeric">
                                            <?= $row->UserName ?? '' ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric">
                                            <?= $row->pickup_address ?? 'Not Define' ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric">
                                            <?= $row->waste_type ?? '' ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric">
                                            <?= $row->weight ?? '' ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric">
                                            <?= $row->Requested_Date ?? '' ?>
                                        </td>
                                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                                            <?= $row->Note ?? 'No Special Notes' ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                // If $rows is not an array or is empty
                                echo "No data available.";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    </main>
    </div>
    <?php $this->view('include/footer') ?>