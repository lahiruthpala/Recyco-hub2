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
                          
                            <span class="label label--mini color--green">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->waste_type ?? '' ?>
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