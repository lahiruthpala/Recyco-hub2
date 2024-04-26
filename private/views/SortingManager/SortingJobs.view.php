<div class="card__supporting-text no-padding" id="SortingJobs" style="display:block">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header">Machine Type</th>
                    <th class="data-table__cell--header">Waste Type</th>
                    <th class="data-table__cell--header">Start_Date</th>
                    <th class="data-table__cell--header">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    // Your table row generation code here
                    ?>
                    <tr onclick="loadScreen('SortingManager/SortingJobProgress', '<?= $row->Sorting_Job_ID ?>')">
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Machine_Type ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->waste_type ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Start_Date ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <span class="label label--mini color--green">
                                <?= $row->Status ?>
                            </span>
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