<div class="card__supporting-text no-padding" id="AcceptedJobs" style="display: none;">


   <?php
    if (is_array($rows) && !empty($rows)) {
        ?>

        <table class="data-table js-data-table" id="assignedTable" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Pickup ID</th>
                    <th class="data-table__cell--header">Assigned Date</th>
                    <th class="data-table__cell--header">Status</th>
                    <th class="data-table__cell--header"></th>
                    <th class="data-table__cell--header"></th>
                </tr>
            </thead>
            <tbody>
                <?php
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
                        
                            <span class="label label--mini color--light-blue">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric">
                             <?= $row->waste_type ?? '' ?>
                        </td>
                        <?php

                        if ($row->Status == 'Accepted') {
                            ?>
                            <td class="data-table__cell--non-numeric">
                                <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                    href="<?= ROOT ?>/collector/details/<?= $row->Job_ID ?>/Accepted"
                                    style="margin-right: 10px;">View</a>

                            </td>


                            <?php
                        }
                        ?>


                    </tr>
                </tbody>
            <?php
                }
                ?>
        </table>
        <?php
    } else {
        ?>
        <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
            <img src="<?= ROOT ?>/images/NoTask.jpg" alt="No data found" style="width: 400px;">
        </div>
        <?php
    }
    ?>
</div>
