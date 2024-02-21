<div class="card__supporting-text no-padding" id="PendingCollections" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Job_ID</th>
                <th class="data-table__cell--header">Assign Aria</th>
                <th class="data-table__cell--header">Date</th>
                <th class="data-table__cell--header" style="padding-left: 70px">Status</th>
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
                            <?= $row->sector_ID  ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Assigned_Date ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Active' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "No data available.";
            }
            ?>
        </tbody>
    </table>
</div>