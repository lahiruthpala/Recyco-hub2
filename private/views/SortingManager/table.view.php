<table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">#</th>
            <th class="mdl-data-table__cell--non-numeric">Request ID</th>
            <th class="mdl-data-table__cell--non-numeric">Arrival Date</th>
            <th class="mdl-data-table__cell--non-numeric">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (is_array($rows) && !empty($rows)) {
            foreach ($rows as $row) {
                // Your table row generation code here
                ?>
                <tr>
                    <td class="mdl-data-table__cell--non-numeric"><?=$row->Inventory_ID?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?=$row->Weight?></td>
                    <td class="mdl-data-table__cell--non-numeric"><?=$row->Type?></td>
                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green"><?=$row->Status?></span>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric"><button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">View</button></td>
                </tr>
                <?php
            }
        } else {
            // If $rows is not an array or is empty
            echo "No data available.";
        }
        ?>
    </tbody>
</table>