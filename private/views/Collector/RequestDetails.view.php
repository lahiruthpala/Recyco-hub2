<?php $this->view('include/head') ?>


<body>
    <body>
        <div class="layout js-layout layout--fixed-header is-small-screen">
            <?php $this->view('include/CollectorHeader') ?>
            <main class="layout__content">
                <div class="grid ui-cards"
                    style="display: flex;flex-direction: row;flex-wrap: wrap; justify-content: center;">
                    <?php
                    if (is_array($rows) && !empty($rows)):

                        foreach ($rows as $pickup):
                            ?>
                            <div class="cell cell--4-col-desktop cell--4-col-tablet cell--2-col-phone"
                                style="min-width: 350px;">
                                <div class="card shadow--2dp">
                                    <img src="<?= ROOT ?>/images/trash-truck.png"
                                        style="width: 100px; height: 100px; display: block; margin: 0 auto;">
                                    <div class="card__supporting-text">
                                        <h4 style="color:black">Pickup Details</h4>
                                        <table class="data-table js-data-table" style="width: 100%;">
                                            <tbody>
                                                <!-- <tr>
                                                    <td class="data-table__cell--non-numeric">Job No.</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Job_ID ?>
                                                    </td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <td class="data-table__cell--non-numeric">Request No.</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Pickup_ID ?>
                                                    </td>
                                                </tr> -->

                                                <tr>
                                                    <td class="data-table__cell--non-numeric">Weight</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Weight ?>
                                                    </td>
                                                </tr>
                                                <!-- <tr>
                                                    <td class="data-table__cell--non-numeric">Inventory_ID</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Inventory_ID ?? "Not yet Collected"; ?>
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td class="data-table__cell--non-numeric">Job status</td>
                                                    <td class="data-table__cell--non-numeric">
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
                                                    <td class="data-table__cell--non-numeric">Waste Type</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->waste_type ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="data-table__cell--non-numeric">Assigned Date</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Requested_Date ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="data-table__cell--non-numeric">Completed Date</td>
                                                    <td style="text-align: left;">
                                                        <?= $pickup->Completed_Date ?? "Not Completed"; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if ($pickup->Status == 'Assigned'): ?>
                                        <div class="card__actions">
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/AcceptJob/<?= $pickup->Job_ID ?>/<?= $pickup->Pickup_ID ?>/Accepted"
                                                style="margin-right: 10px;background-color: #027855; color:white;">Accept</a>
                                            <a style="background-color: #ff5746;color:white;"
<<<<<<< HEAD
                                                 class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/AcceptJob/<?= $pickup->Job_ID ?>/<?= $pickup->Pickup_ID ?>/Accepted">Reject</a>
=======
                                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/AcceptJob/<?= $pickup->Job_ID ?>/<?= $pickup->Pickup_ID ?>/Rejected">Reject</a>
>>>>>>> 8a286ca09f538667a68d6f08b64b23c7d88f46e1
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green pull-right"
                                                 href="https://www.google.com/maps/dir/?api=1&origin=My%20location&destination=<?= $pickup->latitude ?? '' ?>,<?= $pickup->longitude ?? '' ?>&travelmode=driving"
                                                target="_blank">
                                                Show on map
                                            </a> 
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($pickup->Status == 'Accepted'): ?>
                                        <div class="card__actions">
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/form/<?= $pickup->Pickup_ID ?? '' ?>"
                                                style="margin-right: 10px;background-color: #027855; color:white;">Collect</a>
                                            <a style="background-color: #ff5746;color:white;"
                                                class="button js-button button--raised js-ripple-effect button--colored-green"
                                                href="<?= ROOT ?>/collector/jobs/<?= $pickup->Inventory_ID ?>/<?= $pickup->Job_ID ?>/Rejected/">Decline</a>
                                            <a class="button js-button button--raised js-ripple-effect button--colored-green pull-right"
                                                href="https://www.google.com/maps/dir/?api=1&origin=My%20location&destination=<?= $pickup->latitude ?? '' ?>,<?= $pickup->longitude ?? '' ?>&travelmode=driving"
                                                target="_blank">
                                                Show on map
                                            </a>
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