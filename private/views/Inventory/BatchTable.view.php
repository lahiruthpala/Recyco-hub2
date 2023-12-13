<div class="mdl-card__supporting-text no-padding" id="NewInventory" style="display: block;">
    <table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Batch_No</th>
                <th class="mdl-data-table__cell--non-numeric">Discription</th>
                <th class="mdl-data-table__cell--non-numeric">Created_By</th>
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
                        <?= $row->Batch_ID ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Description ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= Auth::getUserName() ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">
                            <?= $row->Status ?>
                        </span>
                    </td>

                    <!-- Assuming you want to increment the ID for the buttons -->
                    <td class="mdl-data-table__cell--non-numeric">
                        <a href="<?=ROOT?>/Inventory/progress">
                        <button id="view<?= $id ?>"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">View</button>
                            <a>
                    </td>

                    <td class="mdl-data-table__cell--non-numeric">
                        <button onclick="loadComponent('InventoryAssign', '<?= $row->Batch_ID ?>')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">Assign</button>
                    </td>

                    <td class="mdl-data-table__cell--non-numeric">
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