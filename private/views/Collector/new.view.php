<?php $this->view('include/head') ?>
<body>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <?php $this->view('include/header') ?>
        <main class="mdl-layout__content">
    <div class="mdl-grid ui-cards">
        <?php
        $count = 0;
       
        foreach ($rows as $pickup):
            if ($count % 3 == 0 && $count > 0): // Start a new row after every three records, except for the first row
                ?>
                </div> <!-- Close the previous row -->
            <?php endif; ?>
            <?php if ($count % 3 == 0): // Start a new row for the first record or after every third record ?>
                <div class="mdl-cell mdl-cell--12-col"></div> <!-- Clear the previous row -->
            <?php endif; ?>
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <img src="<?= ROOT ?>/images/trash-truck.png" alt="City Image" style="width: 100px; height: 100px; display: block; margin: 0 auto;">
                    <div class="mdl-card__supporting-text">
                        <h4>Pickup Details</h4>
                        <table class="mdl-data-table mdl-js-data-table">
                            <tbody>
                               
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">Job No.</td>
                                    <td style="text-align: left;"><?= $pickup->jobId ?></td>
                                </tr>
                               
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">Weight</td>
                                    <td style="text-align: left;"><?= $pickup->weight ?></td>
                                </tr>
                                <tr>
                                <td class="mdl-data-table__cell--non-numeric">Job status</td>
                                <td class="mdl-data-table__cell--non-numeric">
                <?php
                $statusClass = ''; // Default class
                if ($pickup->jobstatus == 'Assigned') {
                    $statusClass = 'color--light-blue'; // Set class for Accepted status
                } elseif ($pickup->jobstatus == 'Accepted') {
                    $statusClass = 'color--green'; // Set class for Completed status
                }  elseif ($pickup->jobstatus== 'Pending') {
                    $statusClass = 'color--green'; // Set class for Completed status
                }  elseif ($pickup->jobstatus == 'Rejected') {
                    $statusClass = 'color--red'; // Set class for Completed status
                } 

                ?>
                <span class="label label--mini <?= $statusClass ?>"><?= $pickup->jobstatus ?? '' ?></span>
            </td>
                                
                                </tr>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">Waste Type</td>
                                    <td style="text-align: left;" ><?= $pickup->waste_type ?></td>
                                </tr>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">Assigned Date</td>
                                    <td style="text-align: left;"><?= $pickup->AssignedDate ?></td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                    <?php if ($pickup->jobstatus == 'Assigned') : ?>
                        <div class="mdl-card__actions">
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right"
                               href="https://www.google.by/maps/place/London,+UK/data=!4m2!3m1!1s0x47d8a00baf21de75:0x52963a5addd52a99?sa=X&ved=0ahUKEwig76SihPfSAhVCCpoKHTuzBDsQ8gEIeTAN"
                               target="_blank">
                                Show on map
                            </a>
                        </div>
                        <div class="mdl-card__actions">
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" href="<?= ROOT ?>/collector/jobs/<?= $pickup->InventoryId ?>/Pending/<?= $pickup->pickupId ?>" style="margin-right: 10px;">Accept</a>
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green" href="<?= ROOT ?>/collector/jobs/<?= $pickup->InventoryId ?>/Rejected/<?= $pickup->pickupId ?>">Reject</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $count++;
        endforeach;
        ?>
        </div> <!-- Close the last row -->
    </div>
</main>

</div>

<!-- inject:js -->

<!-- endinject -->

<?php $this->view('include/footer') ?>