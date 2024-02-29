<div class="card__supporting-text no-padding" id="MachineTable" style="display: none;">
    <table class="data-table js-data-table" style="width: 100%; table-layout: fixed;">
        <thead>
            <tr>
                <th class="data-table__cell--header">Machine ID</th>
                <th class="data-table__cell--header">Location</th>
                <th class="data-table__cell--header">Machine Type</th>
                <!-- <th class="data-table__cell--non-numeric">Next Service</th> -->
                <th class="data-table__cell--header"style="padding-left: 70px;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($rows) && !empty($rows)) {
                foreach ($rows as $row) {
                    ?>
                    <tr>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Machine_ID ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Location ?? 'Company_abc' ?>
                        </td>
                        <td class="data-table__cell--non-numeric">
                            <?= $row->Machine_Type ?? '' ?>
                        </td>
                        <td class="data-table__cell--non-numeric" style="padding-left: 70px;">
                            <span
                                class="label label--mini <?php echo $row->Status === 'Operational' ? 'color--green' : 'color--red'; ?>">
                                <?= $row->Status ?? '' ?>
                            </span>
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