<div class="card__supporting-text no-padding" id="NewInventory" style="display: block; padding-top:0;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <th class="data-table__cell--header">Batch_No</th>
            <th class="data-table__cell--header" style="width: 20%">Discription</th>
            <th class="data-table__cell--header">Created_By</th>
            <th class="data-table__cell--header" style="text-align: center;">Status</th>
            <th class="data-table__cell--header" style="text-align: center;">Assign To</th>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            $id = 1; // Initialize ID counter
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadScreen('Inventory/BatchProgress', '<?= $row->Batch_ID ?>')">
                    <td class="data-table__cell--non-numeric" id="batch<?= $id ?>">
                        <?= $row->Batch_ID ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= limitString($row->Description, 20) ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= Auth::getUserName() ?>
                    </td>
                    <td class="data-table__cell--non-numeric" style="text-align: center;">
                        <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
                            <?= $row->Status ?>
                        </span>
                    </td>
                    <td class="data-table__cell--non-numeric" style="text-align: center;">
                        <?php if ($row->Status == "New"): ?>
                            <button onclick="loadComponent('InventoryAssign', '<?= $row->Batch_ID ?>')"
                                class="button js-button button--raised js-ripple-effect button--colored-teal"
                                style="border-radius: 99px;background-color: #027855;" <?= ($row->Status === 'Assigned') ? 'disabled' : '' ?>>
                                Assign
                            </button>
                        <?php else: ?>
                            <?= $row->Collector_ID ?>
                        <?php endif; ?>

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