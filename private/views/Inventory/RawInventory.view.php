<div class="card__supporting-text no-padding" id="RawInventory" style="display: none; padding-top:0;">
    <?php
    if (is_array($rows) && !empty($rows)) {
        ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <th class="data-table__cell--header">Type</th>
                <th class="data-table__cell--header">Total Weight</th>
            </thead>
            <?php
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadRawInventoryInfo('Inventory/RawInventoryInfo', '<?= $row->waste_type ?>')">
                    <td class="data-table__cell--non-numeric">
                        <?= $row->waste_type ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Weight?>
                    </td>
                </tr>
                <?php
            }
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