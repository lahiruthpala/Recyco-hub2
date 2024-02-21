<div class="mdl-card__supporting-text no-padding" id="RawInventory" style="display: none;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr style="background-color: #333;width: 100%;">
                <th class="mdl-data-table__cell--non-numeric">Type</th>
                <th class="mdl-data-table__cell--non-numeric">Total Weight</th>
                <th class="mdl-data-table__cell--non-numeric">Location</th>
            </tr>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            $id = 1; // Initialize ID counter
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadRawInventoryInfo('Inventory/RawInventoryInfo', '<?= $row->Type ?>', '<?= $row->Location ?>')">
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Weight ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Location ?>
                    </td>
                </tr>
                <?php
                $id++; // Increment ID for the next row
            }
        } else {
            echo "No data available.";
        }
        ?>
    </table>
</div>