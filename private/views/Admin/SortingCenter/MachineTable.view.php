<div class="card__supporting-text no-padding" id="MachineTable" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Machine Type</th>
                <th class="data-table__cell--header">Waste Type</th>
                <th class="data-table__cell--header">Location</th>
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
                            <?= $row->Machine_Type ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->waste_type ?? 'Company_abc' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Location ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Operational' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect button--colored-green"
                                href="<?= ROOT ?>/Admin/details/<?= $row->Machine_ID ?>/Assigned"
                                style="margin-right: 10px;">Edit</a>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding:0 0 0 20px">
                            <a class="button js-button button--raised js-ripple-effect"
                                href="<?= ROOT ?>/Admin/MachineRemove/<?= $row->Machine_ID ?>"
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
</div>