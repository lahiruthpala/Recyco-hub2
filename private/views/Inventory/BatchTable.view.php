<div class="mdl-card__supporting-text no-padding" id="NewInventory" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Batch_No</th>
                <th class="mdl-data-table__cell--non-numeric" style="width: 20%" >Discription</th>
                <th class="mdl-data-table__cell--non-numeric">Created_By</th>
                <th class="mdl-data-table__cell--non-numeric" style="text-align: center;">Status</th>
            </tr>
        </thead>
        <?php
        if (is_array($rows) && !empty($rows)) {
            $id = 1; // Initialize ID counter
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadScreen('Inventory/progress/Batch', '<?= $row->Batch_ID ?>')">
                    <td class="mdl-data-table__cell--non-numeric" id="batch<?= $id ?>">
                        <?= $row->Batch_ID ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= limitString($row->Description, 20) ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= Auth::getUserName() ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric" style="text-align: center;">
                        <span class="label label--mini color--<?= statuscolor($row->Status) ?>">
                            <?= $row->Status ?>
                        </span>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric" style="text-align: center;">
                        <button onclick="loadComponent('InventoryAssign', '<?= $row->Batch_ID ?>')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">Assign</button>
                    </td>

                    <td class="mdl-data-table__cell--non-numeric" style="text-align: center;">
                        <button id="Discard<?= $id ?>" onclick="loadComponent2('')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red"
                            style="border-radius: 99px;">Discard</button>
                    </td>
                </tr>
                <?php
                $id++; // Increment ID for the next row
            }
        } else {
            echo "No data available.";
        }
        ?>

    </table>.
</div>