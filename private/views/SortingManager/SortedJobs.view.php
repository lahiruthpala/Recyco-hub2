<div class="card__supporting-text no-padding" id="SortedJobs" style="display:none">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
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
                foreach ($rows as $row) {
                    // Your table row generation code here
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric"><?= $row->Sorting_Job_ID ?? " " ?></td>
                        <td class="data-table__cell--non-numeric"><?= $row->Start_Date ?? " " ?></td>
                        <td class="data-table__cell--non-numeric"><?= $row->Line_No ?? " " ?></td>
                        <td class="data-table__cell--non-numeric"><span
                                class="label label--mini color--green"><?= $row->Status ?? " " ?></span>
                        </td>
                    </tr>
                    <?php
                } ?>
            </tbody>
            <?php
    } else {
        ?>
            <div style="display: flex;width: 100%;justify-content: center;align-content: center;">
                <img src="<?= ROOT ?>/images/NoInventory.jpg" alt="No data found" style="width: 400px;">
            </div>
            <?php
    }
    ?>
    </table>
</div>