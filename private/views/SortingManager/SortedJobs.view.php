<div class="card__supporting-text no-padding" id="SortedJobs" style="display:none">
<table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
    <thead>
        <tr>
            <th class="data-table__cell--header">Job_ID</th>
            <th class="data-table__cell--header">Start_Date</th>
            <th class="data-table__cell--header">Assign_Line</th>
            <th class="data-table__cell--header">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (is_array($rows) && !empty($rows)) {
            foreach ($rows as $row) {
                // Your table row generation code here
                ?>
                <tr>
                    <td class="data-table__cell--non-numeric"><?= $row->Sorting_Job_ID ?? " " ?></td>
                    <td class="data-table__cell--non-numeric"><?= $row->Start_Date ?? " "  ?></td>
                    <td class="data-table__cell--non-numeric"><?= $row->Line_No ?? " "  ?></td>
                    <td class="data-table__cell--non-numeric"><span
                            class="label label--mini color--green"><?= $row->Status ?? " "  ?></span>
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