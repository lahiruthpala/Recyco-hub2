<div class="mdl-card__supporting-text no-padding" id="SortedInventory" style="display: none;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Inventory ID</th>
                <th class="mdl-data-table__cell--non-numeric">Type</th>
                <th class="mdl-data-table__cell--non-numeric">Location</th>
                <th class="mdl-data-table__cell--non-numeric">Status</th>
            </tr>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            $id = 1; // Initialize ID counter
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric" id="batch<?= $id ?>">
                        <?= $row->Inventory_ID ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Type?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">
                            <?= $row->Status ?>
                        </span>
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