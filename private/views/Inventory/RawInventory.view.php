<div class="card__supporting-text no-padding" id="RawInventory" style="display: none; padding-top:0;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <th class="data-table__cell--header">Type</th>
            <th class="data-table__cell--header">Total Weight</th>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadRawInventoryInfo('Inventory/RawInventoryInfo', '<?= $row->Type ?>')">
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Weight ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "No data available.";
        }
        ?>
    </table>
</div>