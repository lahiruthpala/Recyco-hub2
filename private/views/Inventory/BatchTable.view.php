<div class="card__supporting-text no-padding" id="NewInventory" style="display: block; padding-top:0;">
<?php
        if (is_array($rows) && !empty($rows)) {
            ?>
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <th class="data-table__cell--header" style="width: 20%">Discription</th>
            <th class="data-table__cell--header">Created_By</th>
            <th class="data-table__cell--header" style="text-align: center;">Status</th>
            <th class="data-table__cell--header" style="text-align: center;"></th>
            <th class="data-table__cell--header" style="text-align: center;">Assign To</th>
        </thead>
        <?php
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td class="data-table__cell--non-numeric">
                        <?= limitString($row->Description, 50) ?>
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
                    <a href="<?=ROOT?>/Inventory/BatchProgress/?id=<?= $row->Batch_ID ?>">
                        <button
                            class="button js-button button--raised js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;background-color: #4ae3e3;">
                            View
                        </button>
                    </a>
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