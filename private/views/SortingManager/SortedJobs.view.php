<div class="mdl-card__supporting-text no-padding" id="SortedJobs" style="display:none">
<table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Job_ID</th>
            <th class="mdl-data-table__cell--non-numeric">Start_Date</th>
            <th class="mdl-data-table__cell--non-numeric">Assign_Line</th>
            <th class="mdl-data-table__cell--non-numeric">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (is_array($rows) && !empty($rows)) {
            foreach ($rows as $row) {
                // Your table row generation code here
                ?>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric"><?= $row->Sorting_Job_ID ?? " " ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?= $row->Start_Date ?? " "  ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?= $row->Line_No ?? " "  ?></td>
                    <td class="mdl-data-table__cell--non-numeric"><span
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