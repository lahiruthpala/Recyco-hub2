<table class="mdl-data-table mdl-js-data-table" style="width: 100%; table-layout: fixed;">
    <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">Inventory_ID</th>
            <th class="mdl-data-table__cell--non-numeric">Wieght</th>
            <th class="mdl-data-table__cell--non-numeric">Type</th>
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
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Inventory_ID ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Weight ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <?= $row->Type ?>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">
                            <?= $row->Status ?>
                        </span>
                    </td>
                    <td class="mdl-data-table__cell--non-numeric"><button onclick="loadComponent('ViewInventory')"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">View</button></td>
                    <td class="mdl-data-table__cell--non-numeric">
                        <button
                            onclick="window.location.href = 'http://localhost:8380/Recyco-hub2/private/views/Include/qrscaner/index.view.php'"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal"
                            style="border-radius: 99px;">
                            Assign
                        </button>
                    </td>

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