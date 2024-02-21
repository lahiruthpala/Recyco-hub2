<div class="card__supporting-text no-padding" id="SortedInventory" style="display: none; padding-top:0;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Inventory ID</th>
                <th class="data-table__cell--header">Type</th>
                <th class="data-table__cell--header">Location</th>
                <th class="data-table__cell--header">Status</th>
            </tr>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            $id = 1; // Initialize ID counter
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td class="data-table__cell--non-numeric" id="batch<?= $id ?>">
                        <?= $row->Inventory_ID ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Type?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="data-table__cell--non-numeric"><span class="label label--mini color--green">
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