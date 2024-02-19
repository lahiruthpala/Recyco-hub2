<?php $this->view('include/head') ?>


<body>

    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
            <?php $this->view('include/header') ?>
            <main class="mdl-layout__content">
                <div class="mdl-grid ui-cards" style="display: flex;flex-direction: row;flex-wrap: wrap; justify-content: center;">
                    <?php
                    if (is_array($rows) && !empty($rows)):

                        foreach ($rows as $pickup):
                            ?>
                            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone" style="min-width: 350px;">
                                <div class="mdl-card mdl-shadow--2dp">
                                    <img src="<?= ROOT ?>/images/trash-truck.png"
                                        style="width: 100px; height: 100px; display: block; margin: 0 auto;">
                                    <div class="mdl-card__supporting-text">
                                        <h4>Pickup Details</h4>
                                        <table class="mdl-data-table mdl-js-data-table">
                                            <tbody>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Job No.</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Job_ID ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Request No.</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Pickup_ID ?>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Weight</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->weight ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Inventory_ID</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->InventoryId ?? "Not yet Collected"; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Job status</td>
                                                    <td class="mdl-data-table__cell--non-numeric">
                                                        <?php
                                                        $statusClass = ''; // Default class
                                                        if ($pickup->Status == 'Assigned') {
                                                            $statusClass = 'color--light-blue'; // Set class for Accepted status
                                                        } elseif ($pickup->Status == 'Accepted') {
                                                            $statusClass = 'color--green'; // Set class for Completed status
                                                        } elseif ($pickup->Status == 'Pending') {
                                                            $statusClass = 'color--green'; // Set class for Completed status
                                                        } elseif ($pickup->Status == 'Rejected') {
                                                            $statusClass = 'color--red'; // Set class for Completed status
                                                        }

                                                        ?>
                                                        <span class="label label--mini <?= $statusClass ?>">
                                                            <?= $pickup->Status ?? '' ?>
                                                        </span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Waste Type</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->waste_type ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Assigned Date</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Requested_Date ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="mdl-data-table__cell--non-numeric">Completed Date</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Completed_Date ?? "Not Completed";?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mdl-card__actions">
                                        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right"
                                            href="https://www.google.com/maps/dir/?api=1&origin=My%20location&destination=<?=$pickup->latitude ?? ''?>,<?=$pickup->longitude ?? ''?>&travelmode=driving"
                                            target="_blank">
                                            Show on map
                                        </a>
                                    </div>
                                    <?php if ($pickup->Status == 'Assigned'): ?>
                                        <div class="mdl-card__actions">
                                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/form/<?= $pickup->Pickup_ID ?? '' ?>"
                                                style="margin-right: 10px;">Accept</a>
                                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/jobs/<?= $pickup->InventoryId ?>/Rejected/<?= $pickup->Pickup_ID ?>">Reject</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                <?php else: ?>
                    <p>No pickup jobs available.</p>
                <?php endif; ?>
        </div>
        </main>

        </div>

        <!-- inject:js -->

        <!-- endinject -->

        <?php $this->view('include/footer') ?>