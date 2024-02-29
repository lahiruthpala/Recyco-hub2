<div class="card__supporting-text no-padding" id="FinishedJobs" style="display: none;">
    <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Pickup ID</th>
                <th class="data-table__cell--header">Assigned Date</th>
                <th class="data-table__cell--header">Status</th>
                <th class="data-table__cell--header"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Job_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>


                        <td class="data-table__cell--non-numeric">
                            <?php
                            $statusClass = ''; // Default class
                            if ($row->Status == 'Assigned') {
                                $statusClass = 'color--light-blue'; // Set class for Accepted status
                            } elseif ($row->Status == 'Completed') {
                                $statusClass = 'color--green'; // Set class for Completed status
                            } elseif ($row->Status == 'Accepted') {
                                $statusClass = 'color--green'; // Set class for Completed status
                            } elseif ($row->Status == 'Rejected') {
                                $statusClass = 'color--red'; // Set class for Completed status
                            }

                            ?>
                            <span class="label label--mini <?= $statusClass ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->waste_type ?? '' ?>
                        </td>

                        <?php

                        if ($row->Status == 'Assigned') {
                            ?>
                            <td class="data-table__cell--non-numeric">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Accepted"
                                    style="margin-right: 10px;">Accept</a>

                            </td>
                            <td class="data-table__cell--non-numeric">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Rejected"
                                    style="margin-right: 10px;">Reject</a>

                            </td>

                            <?php
                        }
                        ?>

                        <?php

                        if ($row->Status == 'Accepted') {
                            ?>
                            <td class="data-table__cell--non-numeric">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/details/<?= $row->Job_ID ?>" style="margin-right: 10px;">View</a>

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