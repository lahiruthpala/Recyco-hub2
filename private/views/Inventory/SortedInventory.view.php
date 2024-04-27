<div class="card__supporting-text no-padding" id="SortedInventory" style="display: none; padding-top:0;">
    <?php
    if (is_array($rows) && !empty($rows)) { ?>
        <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
            <thead>
                <tr>
                    <th class="data-table__cell--header"></th>
                    <th class="data-table__cell--header">Type</th>
                    <th class="data-table__cell--header">Weight</th>
                    <th class="data-table__cell--header">Status</th>
                </tr>
            </thead>
            <?php
            $i = 0;
            foreach ($rows as $row) {
                ?>
                <tr onclick="loadScreen2('<?= '/SortingManager/SortedInventorySell?id=' . $row->Inventory_ID?>')">
                    <td class="data-table__cell--non-numeric">
                        <?= '#. ' . $i ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="data-table__cell--non-numeric">
                        <?= $row->Weight . ' Kg' ?>
                    </td>
                    <td class="data-table__cell--non-numeric"><span class="label label--mini color--green">
                            <?= $row->Status ?>
                        </span>
                    </td>
                </tr>
                <?php
                $i += 1;
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