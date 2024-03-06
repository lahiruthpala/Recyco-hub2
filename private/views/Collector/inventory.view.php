<?php $this->view('include/head') ?>

<body>
    <div class="layout js-layout layout--fixed-header is-small-screen">
        <?php $this->view('include/header') ?>
        <main class="layout__content">
            <div class="grid grid--no-spacing dashboard">

                <div>





                    <div class="cell cell--12-col-desktop cell--12-col-tablet cell--4-col-phone"
                        style="margin-top: 100px;">
                        <div class="card shadow--2dp">
                            <div class="layout__header-row">
                                <button class="button js-button button--raised js-ripple-effect button--colored-green"
                                    style="border-radius: 99px; margin-left: 1vw; width: 400px;">Assigned
                                    Inventories</button>


                            </div>

                            <div class="card__supporting-text no-padding">
                                <table class="data-table js-data-table" id="assignedTable"
                                    style="width: 100%; table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th class="data-table__cell--non-numeric">Inventory ID</th>
                                            <th class="data-table__cell--non-numeric">Content</th>
                                            <th class="data-table__cell--non-numeric">Weight</th>
                                            <th class="data-table__cell--non-numeric">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (is_array($rows) && !empty($rows)) {
                                            foreach ($rows as $row) {
                                                ?>
                                                <tr>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $row->InventoryId ?? '' ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $row->waste_type ?? '' ?>
                                                    </td>
                                                    <td class="data-table__cell--non-numeric">
                                                        <?= $row->weight ?? '' ?>Kg
                                                    </td>

                                                    <td class="data-table__cell--non-numeric">
                                                        <?php
                                                        $statusClass = '';
                                                        if ($row->jobstatus == 'Accepted') {
                                                            $statusClass = 'color--green';
                                                        } elseif ($row->jobstatus == 'Pending') {
                                                            $statusClass = 'color--light-blue';
                                                        } elseif ($row->jobstatus == 'Rejected') {
                                                            $statusClass = 'color--red';
                                                        }

                                                        ?>
                                                        <span class="label label--mini <?= $statusClass ?>">
                                                            <?= $row->jobstatus ?? '' ?>
                                                        </span>
                                                    </td>





                                                    <?php

                                                    if ($row->jobstatus == 'Pending') {
                                                        ?>
                                                        <td class="data-table__cell--non-numeric">
                                                            <form action="<?= ROOT ?>/collector/form/<?= $row->InventoryId ?? '' ?>"
                                                                method="POST">

                                                                <input type="hidden" name="id" value="<?= $row->Job_ID ?? '' ?>">

                                                                <button type="submit"
                                                                    class="button js-button button--raised js-ripple-effect button--colored-green"
                                                                    style="border-radius: 99px;">Proceed</button>
                                                            </form>
                                                        </td>
                                                        <td class="data-table__cell--non-numeric">
                                                            <form
                                                                action="<?= ROOT ?>/collector/inven/<?= $row->InventoryId ?? '' ?>/Rejected/<?= $row->Job_ID ?? '' ?>"
                                                                method="POST">
                                                                <input type="hidden" name="id" value="<?= $row->Job_ID ?? '' ?>">
                                                                <button type="submit"
                                                                    class="button js-button button--raised js-ripple-effect button--colored-red"
                                                                    style="border-radius: 99px;">Reject</button>
                                                            </form>
                                                        </td>

                                                        <?php
                                                    }
                                                    ?>




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
                </div>
            </div>

        </main>

    </div>

    <?php $this->view('include/footer') ?>