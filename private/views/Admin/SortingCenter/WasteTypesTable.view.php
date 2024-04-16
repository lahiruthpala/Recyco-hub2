<div class="card__supporting-text no-padding" id="WasteTypesTable" style="display:none">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Waste Type</th>
                <th class="data-table__cell--header">Price</th>
                <th class="data-table__cell--header" style="padding-left: 70px;">Status</th>
                <th class="data-table__cell--header"></th>
                <th class="data-table__cell--header"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Name ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Price . ' LKR/Kg' ?? 'Price is not defined' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Collecting' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                onclick="Edit('<?= ROOT . 'Admin/WasteTypeEdit/' . $row->Waste_ID?>','NewWasteType')"
                                style="margin-right: 10px;">Edit</a>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect"
                                href="<?= ROOT ?>/Admin/WasteTypeDelete/<?= $row->Waste_ID ?>"
                                style="margin-right: 10px;background-color: red;color: white;">Remove</a>
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
    <div style="display:flex;justify-content: end;">
        <button onclick="loadComponent('NewWasteType')" style="margin: 50px 29px 2px 4px;width: 100px;"
            id="NewWasteType_Button" class="button js-button button--raised js-ripple-effect button--colored-smoke">Add
            new waste type</Button>
    </div>
</div>