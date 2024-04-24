<div class="card__supporting-text no-padding" id="PendingJobs" style="display: block;">
    <?php
    if (is_array($rows) && !empty($rows)) {
        foreach ($rows as $row) {
            ?>
            <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
                <thead>
                    <tr>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px">Pickup ID</th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px">Assigned Date</th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px">Status</th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                        <th class="data-table__cell--header" style="padding:0 0 10px 20px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->Job_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
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
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <?= $row->waste_type ?? '' ?>
                        </td>
                        <?php
                        if ($row->Status == 'Assigned') {
                            ?>
                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/details/<?= $row->Job_ID ?>/Assigned"
                                    style="margin-right: 10px;">View</a>
                            </td>

                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Accepted"
                                    style="margin-right: 10px;">Accept</a>
                            </td>
                            <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/statusupdate/<?= $row->Job_ID ?>/Rejected"
                                    style="margin-right: 10px;">Reject</a>
                            </td>

                            <?php
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <?php
        }
    } else {
        ?>
        <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
            <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
        </div>
        <?php
    }
    ?>
</div>